<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff | Waggin Wheels</title>
    <link rel="icon" type="image/x-icon" href="/images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/viewStaff.css">

</head>

<body>

    <?php
    include "dbFunctions.php";
    $staff_id = $_POST['staff_id'];

    $staffInfoQuery = "SELECT * FROM staff 
    WHERE staff_id = '$staff_id'";

    $staffInfoStatus = mysqli_query($link, $staffInfoQuery) or die(mysqli_error($link));

    $infoRow = mysqli_fetch_array($staffInfoStatus);
    $staff_id = $infoRow['staff_id'];
    $staff_fname = $infoRow['first_Name'];
    $staff_lname = $infoRow['last_Name'];
    $staff_email = $infoRow['email'];
    $staff_contact = $infoRow['contact_no'];
    $staff_username = $infoRow['username'];
    $staff_hiredate = $infoRow['hire_date'];
    $staff_birthdate = $infoRow['birth_date'];
    $staff_gender = $infoRow['gender'];
    $profile = $infoRow['profile'];
    ?>


    <div class="quoteScreen_wrapper">
        <div class="shadow"></div>
        <div class="quote_wrap">
            <button type="button" onclick="exitAnim2()" class="exitBtn">
                <i class="fas fa-times text-secondary"></i>
            </button>

            <!-- <div class="row">
                <div class="col"> -->

            <div class="row">
                <div class="col-11 box staffInfo">
                    <div class="row headerNimg">
                        <p class="col-11 boxHeader" align="center">Staff Information</p>
                        <div class="col-1 profilebox">
                            <!-- <p class="boxHeader">Profile</p> -->
                            <?php if (isset($profile)) { ?>
                                <img src="data:image/png;base64,<?php echo stripcslashes(base64_encode($profile)) ?>" height="80" width="80" style="object-fit: cover; border-radius: 50%;">
                            <?php } else { ?>
                                <img src="images/person.svg" height="80" width="80">
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <p>Username:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $staff_username ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>First Name:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo ucfirst($staff_fname) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Last Name:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo ucfirst($staff_lname) ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Email:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $staff_email ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Contact No.</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php
                                $contact = strval($staff_contact);
                                $arrContact = str_split($contact, 4);
                                echo '+65 ' . $arrContact[0] . " " . $arrContact[1];
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Birth Date:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $staff_birthdate ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Hire Date:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $staff_hiredate ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Gender:</p>
                        </div>
                        <div class="col">
                            <p>
                                <?php echo $staff_gender ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-2 mt-4 profilebox"> -->
                <!-- <p class="boxHeader">Profile</p> -->

            </div>
            <!-- </div>
            </div> -->
        </div>
    </div>
    </div>


    <!-- Footer -->
    <?php //include("footer.php") 
    ?>
    <!--  -->

    <!-- Background -->
    <!-- <div class="bgclass">
        <div class="gradient"></div>
    </div> -->
    <!--  -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="scripts/viewQuote.js"></script>

</body>

</html>