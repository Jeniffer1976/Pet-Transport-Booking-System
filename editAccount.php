<?php
include "loginFunctions.php";

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $mobile = $_SESSION['mobile'];
    $password = $_SESSION['password'];

    if ($_SERVER['REQUEST_METHOD'] == "POST") //if u request then it will proceed wait then
    {
        $message = "";
        $isSuccessful = false;
        //something was posted
        $emailN = $_POST['email'];
        $passwordN = $_POST['newPassword'];
        $firstNameN = $_POST['firstName'];
        $lastNameN = $_POST['lastName'];
        $phoneN = $_POST['phone'];

        //save to database
        $checkUsername = "SELECT DISTINCT username
            FROM users
            WHERE username = '$usernameN'";

        $checkPassword = "SELECT password
        FROM users
        WHERE username = '$username'";

        $checkUsernameStatus = mysqli_query($link, $checkUsername);

        $checkPasswordStatus = mysqli_query($link, $checkPassword);

        if (mysqli_num_rows($checkUsernameStatus)) {
            $row = mysqli_fetch_array($checkUsernameStatus);
            $checkUsername = $row['username'];

            $message = "The username " . $checkUsername . " already exists";

        } else {
            $rowPassword = mysqli_fetch_array($checkPasswordStatus);
            if ($password == $rowPassword['password']){

                $updateUsers = "UPDATE users
                SET password='$passwordN' 
                WHERE username='$username'";
    
                $updateUsersStatus = mysqli_query($link, $updateUsers);
    
                $updatePetOwners = "UPDATE pet_owner
                    SET first_Name='$firstNameN', last_Name='$lastNameN', email='$emailN', mobile='$phoneN'
                    WHERE username='$username'";
    
                $updatePetOwnersStatus = mysqli_query($link, $updatePetOwners);            

                $_SESSION['firstName'] = $firstNameN;
                $_SESSION['lastName'] = $lastNameN;
                $_SESSION['email'] = $emailN;
                $_SESSION['mobile'] = $phoneN;
                $_SESSION['password'] = $passwordN;
    
                if ($updateUsersStatus && $updatePetOwnersStatus) {
                    $message = "Your account has been successfully updated";
                    $isSuccessful = true;
                    header("Location: accountOverview.php"); //makes it go to signIn page directly.
    
                } else {
                    $message = "The account update was unsuccessful";
                }
            }  else {
                $message = "The old password does not match with the one in the system";
            }

        }
    }

} else {
    header("Location: signIn.php");
    exit();
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account | Waggin Wheels</title>

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
</head>

<body>

    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!--  -->

    <!--Account Overview Section-->
    <div class="container-fluid">
        <br>
        <h1 class="header1">EDIT ACCOUNT</h1>

        <div class="container account">
            <div class="row">
                <div class="col col-4 sidebar" style="height: 48em;">
                    <a class="nav-link nav-text" href="accountOverview.php"><i class="fa-solid fa-house"></i>Account Overview</a>
                    <a class="active nav-link nav-text" href="editAccount.php"><i class="fa-solid fa-pen"></i>Edit Account</a>
                    <a class="nav-link nav-text" href="membershipStatus.php"><i class="fa-solid fa-crown"></i>Membership</a>
                    <a class="nav-link nav-text" href="invoiceHist.php"><i class="fa-solid fa-clock"></i>Invoice History</a>
                </div>

                <div class="col col-8" style="height: 48em;">
                    <div class="row row1">
                        <div class="col-3">
                            <img src="images/person.svg" id="profilePic">
                        </div>

                        <div class="col">
                            <h3 class="header3"><?php echo strtoupper($firstName)." ".strtoupper($lastName) ?></h3>
                            <span class="para">aka @<?php echo $username ?></span>
                        </div>
                    </div>
                    <div class="row row2">
                        <div class="container-fluid d-flex justify-content-center">
                            <form class="row g-3 gx-5" method="post" action="">
                                <div class="col-md-6">
                                    <label for="username" class="form-label para">Username:</label>
                                </div>
                                <div class="col-md-6">
                                    <span class="para"><?php echo $username ?></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label para">First Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="firstName" placeholder="<?php echo ucfirst($firstName)?>"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label para">Last Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="lastName" placeholder="<?php echo ucfirst($lastName) ?>"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label para">Email:</label>
                                    <input type="email" class="form-control rounded-pill" name="email" placeholder="<?php echo $email ?>"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label para">Old Password:</label>
                                    <input type="password" class="form-control rounded-pill" name="oldPassword" required>
                                </div>                                
                                <div class="col-md-6">
                                    <label for="password" class="form-label para">New Password:</label>
                                    <input type="password" class="form-control rounded-pill" name="newPassword" required>
                                </div>
                                <div class="col-6">
                                    <label for="phone" class="form-label para">Mobile Number:</label>
                                    <input type="tel" class="form-control rounded-pill" name="phone" pattern="[0-9]{8}" required
                                        placeholder="<?php echo $mobile ?>">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="reset" class="btn btn-outline-danger btn-light primarybtn rounded-pill" style="margin-top: 15%">Cancel</button>
                                    </div>

                                    <div class="col" style="">
                                        <button type="submit" class="btn btn-primary primarybtn rounded-pill" style="float: right; margin-top: 15%">Save Profile</button>
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
    <script src="scripts/script.js"></script>
</body>

</html>