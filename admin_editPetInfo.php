<?php
session_start();
include("dbFunctions.php");

if (isset($_SESSION['username'])) {
    if (!($role = "admin")) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: signIn.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") { //if u request then it will proceed wait then

    $message = "";
    $isSuccessful = false;

    $quoteId = $_GET['quote_id'];

    // Pet's Infomation
    foreach ($_POST['p_fname'] as $key => $value) {
        $petSql = "UPDATE pet 
        SET first_name=:fname, last_name=:lname, type=:type, breed=:breed, 
        age=:age, weight=:weight, height=:height, width=:width, additional_info=:additional_info
        WHERE quote_id=$quoteId
        AND pet_id=:pet_id";

        $petStmt = $conn->prepare($petSql);
        $petStmt->execute([
            'fname' => $value,
            'lname' => $_POST['p_lname'][$key],
            'type' => $_POST['p_type'][$key],
            'breed' => $_POST['p_breed'][$key],
            'age' => $_POST['p_age'][$key],
            'weight' => $_POST['p_weight'][$key],
            'height' => $_POST['p_height'][$key],
            'width' => $_POST['p_width'][$key],
            'additional_info' => $_POST['addInfo'][$key],
            'pet_id' => $_POST['pet_id'][$key]
        ]);
    }

    if ($petStmt) {
        $message = "Pet Details have successfully been updated";
        $isSuccessful = true;
    } else {
        $message = "The update was unsuccessful";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quotes | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Stylesheets -->

    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/account.css">
    <link rel="stylesheet" href="stylesheets/responsive.css">
    <link rel="stylesheet" href='stylesheets/admin_editQuote.css'>
</head>

<body>

    <?php


    ?>

    <!-- Navbar -->
    <?php
    include("admin_editQuote.php");
    include("navbar.php");
    ?>
    <!--  -->


    <!-- Edit Quote -->
    <div class="container-fluid">
        <br>

        <a href="admin_quotes.php" class="btn btn-back"><i class="far fa-arrow-alt-circle-left"></i> Back to Quotes</a>

        <h1 class="header1">EDIT QUOTE</h1>

        <div class="container account">
            <div class="row">
                <!--Sidebar-->
                <div class="col col-4 sidebar" style="height: 38em;">

                    <?php if ($status == 'pending') { ?>
                        <a class="nav-link nav-text"
                            href="admin_editOverview.php?quote_id=<?php echo $quote_id ?>"><i
                                class="fa-solid fa-circle-info"></i>General
                            Information</a>

                    <?php } else { ?>
                        <a class="nav-link nav-text"
                            href="admin_editOverview.php?quote_id=<?php echo $quote_id ?>"><i
                                class="fa-solid fa-user"></i>Owner
                            Information</a>
                    <?php } ?>

                    <a class="nav-link nav-text" href="admin_editPickUp.php?quote_id=<?php echo $quote_id ?>"><i
                            class="fa-solid fa-house"></i>Pick
                        Up Information</a>
                    <a class="nav-link nav-text" href="admin_editDropOff.php?quote_id=<?php echo $quote_id ?>"><i
                            class="fa-solid fa-location-dot"></i>Drop Off Information</a>
                    <a class="active nav-link nav-text" href="admin_editPetInfo.php?quote_id=<?php echo $quote_id ?>"><i
                            class="fa-solid fa-dog"></i>Pet's
                        Information</a>
                </div>

                <div class="col col-8" style="height: 38em;" id="petInfoForm">

                    <div class="container-fluid d-flex justify-content-center">
                        <form class="row g-3 gx-5" method="post" action="">

                            <?php
                            $pet_count = count($petContent);
                            for ($p = 0; $p < count($petContent); $p++) {
                                $p_firstName = $petContent[$p]['first_name'];
                                $p_lastName = $petContent[$p]['last_name'];

                                // $pet_name = $p_firstName . " " . $p_lastName;
                            
                                $type = $petContent[$p]['type'];
                                $breed = $petContent[$p]['breed'];
                                $age = $petContent[$p]['age'];
                                $weight = $petContent[$p]['weight'];
                                $height = $petContent[$p]['height'];
                                $width = $petContent[$p]['width'];
                                $addInfo = $petContent[$p]['additional_info'];
                                $petId = $petContent[$p]['pet_id'];
                                ?>

                                <?php if ($pet_count > 1) { ?>
                                    <hr class='rounded'>
                                    <span class='para'>
                                        Pet
                                        <?php echo $p + 1 ?>
                                    </span>
                                    <hr class='rounded'>
                                <?php } ?>

                                <div class="col-md-6">
                                    <label for="p_fname" class="form-label para">First Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="p_fname[]"
                                        placeholder="<?php echo ucfirst($p_firstName) ?>"
                                        value="<?php echo ucfirst($p_firstName) ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="p_lname" class="form-label para">Last Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="p_lname[]"
                                        placeholder="<?php echo ucfirst($p_lastName) ?>"
                                        value="<?php echo ucfirst($p_lastName) ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="p_type" class="form-label para">Type of Pet:</label>
                                    <input type="text" class="form-control rounded-pill" name="p_type[]"
                                        placeholder="<?php echo $type ?>" value="<?php echo $type ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="p_breed" class="form-label para">Breed:</label>
                                    <input type="text" class="form-control rounded-pill" name="p_breed[]"
                                        placeholder="<?php echo $breed ?>" value="<?php echo $breed ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="p_age" class="form-label para">Age:</label>
                                    <input type="number" class="form-control rounded-pill" name="p_age[]"
                                        placeholder=" <?php echo $age ?>" value="<?php echo $age ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="p_weight" class="form-label para">Weight (Kg):</label>
                                    <input type="number" class="form-control rounded-pill" name="p_weight[]"
                                        placeholder="<?php echo $weight ?>" value="<?php echo $weight ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="p_height" class="form-label para">Height (Cm):</label>
                                    <input type="number" class="form-control rounded-pill" name="p_height[]"
                                        placeholder="<?php echo $height ?>" value="<?php echo $height ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="p_width" class="form-label para">Width (Cm):</label>
                                    <input type="number" class="form-control rounded-pill" name="p_width[]"
                                        placeholder="<?php echo $width ?>" value="<?php echo $width ?>">
                                </div>

                                <div class="col-12">
                                    <label for="addInfo" class="form-label para mt-4" align="left">Additional
                                        Comments:</label>
                                    <textarea name="addInfo[]" rows="4" cols="50" class="form-control rounded"
                                        placeholder='<?php echo $addInfo ?>'><?php echo $addInfo ?>
                                        </textarea>
                                </div>
                                <input type="hidden" id="pet_id" name="pet_id[]" value="<?php echo $petId ?>" />

                            <?php } ?>

                            <div class="row">
                                <div class="col">
                                    <button type="reset"
                                        class="btn btn-outline-danger btn-light primarybtn rounded-pill"
                                        style="margin-top: 15%">Cancel</button>
                                </div>

                                <div class="col" style="">
                                    <button type="submit" class="btn btn-primary primarybtn rounded-pill"
                                        style="float: right; margin-top: 15%">Save Changes</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <?php if (isset($message)) { ?>
                        <?php if ($isSuccessful == true) { ?>
                            <div class="alert alert-success errorMsg" role="alert">
                                <?php echo $message ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger errorMsg" role="alert">
                                <?php echo $message ?>
                            </div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <!-- Footer -->
    <?php include("footer.php") ?>
    <!--  -->


    <!-- Background -->
    <div class="bgclass">
        <div class="gradient"></div>
    </div>
    <!--  -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/sidebarscript.js"></script>
</body>

</html>