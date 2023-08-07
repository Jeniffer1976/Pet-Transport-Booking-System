<?php
include "loginFunctions.php";

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $mobile = $_SESSION['mobile'];
    $password = $_SESSION['password'];
    $role = $_SESSION['role'];



    if ($role == 'admin') {
        $gender = $_SESSION['gender'];
        $birthdate = $_SESSION['birthDate'];

        if ($gender == 'F') {
            $gender = 'Female';
        } else {
            $gender = 'Male';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") //if u request then it will proceed wait then
    {
        $message = "";
        $isSuccessful = false;
        //something was posted
        $emailN = $_POST['email'];

        $firstNameN = $_POST['firstName'];
        $lastNameN = $_POST['lastName'];
        $phoneN = $_POST['phone'];

        $imageExists = '';
        if (!empty($_FILES['profileImgEdit']['tmp_name'])) {
            if ($_FILES['profileImgEdit']['size'] < 1000000) {
                $profilePic = addslashes(file_get_contents($_FILES['profileImgEdit']['tmp_name']));
                $imageExists = ", profile = '$profilePic'";
                $message += "<br>The profile picture will be updated in your next login.";
                // $_SESSION['profile'] = $profilePic;
            }
        }

        if ($_SESSION['role'] == 'admin') {
            $genderN = $_POST['gender'];

            if ($genderN == 'Female') {
                $genderN = 'F';

            } else {
                $genderN = 'M';
            }

            $birthdateN = $_POST['birthdate'];
        }

        //save to database

        $checkPassword = "SELECT password
        FROM users
        WHERE username = '$username'";

        $checkPasswordStatus = mysqli_query($link, $checkPassword);

        $rowPassword = mysqli_fetch_array($checkPasswordStatus);

        if ($_SESSION['role'] != 'admin') {

            $updateAccount = "UPDATE pet_owner
                SET first_Name='$firstNameN', last_Name='$lastNameN', email='$emailN', mobile='$phoneN'" . $imageExists . "
                WHERE username='$username'";

        } else {
            $updateAccount = "UPDATE staff
                    SET gender='$genderN', first_Name='$firstNameN', last_Name='$lastNameN', contact_no ='$phoneN', email='$emailN', birth_date='$birthdateN'" . $imageExists . "
                    WHERE username='$username'";

        }
        $updateAccountStatus = mysqli_query($link, $updateAccount);


        if (!isset($_POST['checkEditPassword'])) {

            if (($updateAccountStatus)) {

                $_SESSION['firstName'] = $firstNameN;
                $_SESSION['lastName'] = $lastNameN;
                $_SESSION['email'] = $emailN;
                $_SESSION['mobile'] = $phoneN;
                $_SESSION['profile'] = $profilePic ?? $_SESSION['profile'];

                if ($_SESSION['role'] == 'admin') {
                    $_SESSION['gender'] = $genderN;
                    $_SESSION['birthDate'] = $birthdateN;
                }
                $message = "Your account has been successfully updated. <i class='far fa-smile'></i>";
                $isSuccessful = true;
                if ($imageExists != '') {
                    $message .= "<br>The profile picture will be updated in your next login.";
                }
                Header("Location: accountOverview.php?msg=" . $message);
                // header("Location: accountOverview.php"); //makes it go to signIn page directly.

            } else {
                $message = "The account update was unsuccessful";
                // $isSuccessful = false;
            }

        } else {

            if (SHA1($_POST['oldPassword']) == $rowPassword['password']) {
                $passwordN = SHA1($_POST['newPassword']);

                $updateUsers = "UPDATE users
                SET password= '$passwordN' 
                WHERE username='$username'";

                $updateUsersStatus = mysqli_query($link, $updateUsers);

                $_SESSION['password'] = $passwordN;

                if (($updateUsersStatus && $updateAccountStatus)) {
                    $_SESSION['firstName'] = $firstNameN;
                    $_SESSION['lastName'] = $lastNameN;
                    $_SESSION['email'] = $emailN;
                    $_SESSION['mobile'] = $phoneN;
                    $_SESSION['profile'] = $profilePic ?? $_SESSION['profile'];

                    if ($_SESSION['role'] == 'admin') {
                        $_SESSION['gender'] = $genderN;
                        $_SESSION['birthDate'] = $birthdateN;
                    }
                    $message = "Your account has been successfully updated. <i class='far fa-smile'></i>";
                    $isSuccessful = true;
                    if ($imageExists != '') {
                        $message .= "<br>The profile picture will be updated in your next login.";
                    }
                    Header("Location: accountOverview.php?msg=" . $message);

                    // header("Location: accountOverview.php"); //makes it go to signIn page directly.

                } else {
                    $message = "The account update was unsuccessful";
                    // $isSuccessful = false;

                }

            } else {
                $message = "The old password does not match with the one in the system";
                // $isSuccessful = false;
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
        <?php if ($_SESSION['role'] != 'customer') { ?>
            <a href="admin.php" class="btn btn-back"><i class="far fa-arrow-alt-circle-left"></i> Back to Dashboard</a>
        <?php } ?>
        <h1 class="header1">EDIT ACCOUNT</h1>

        <div class="container account">
            <div class="row">
                <div class="col col-4 sidebar" style="height: 49em;">
                    <a class="nav-link nav-text" href="accountOverview.php"><i class="fa-solid fa-house"></i>Account
                        Overview</a>
                    <a class="active nav-link nav-text" href="editAccount.php"><i class="fa-solid fa-pen"></i>Edit
                        Account</a>
                    <?php if ($_SESSION['role'] == 'customer') { ?>
                        <a class="nav-link nav-text" href="invoiceHist.php"><i class="fa-solid fa-clock"></i>Invoice
                            History</a>
                    <?php } ?>
                </div>

                <div class="col col-8" style="height: 49em;">
                    <?php if (isset($message)) { ?>
                        <?php if ($isSuccessful == false) { ?>
                            <div class="alert alert-danger errorMsg" role="alert">
                                <?php echo $message ?>
                            </div>
                            <br>
                        <?php } ?>
                    <?php } ?>

                    <div class="row row2">
                        <div class="container-fluid d-flex justify-content-center">
                            <form class="row g-3 gx-5" method="post" action="" enctype="multipart/form-data">
                                <div class="row row1">
                                    <div class="col-3">
                                        <div id="errTip">The image is too big (Max 1MB)</div>
                                        <input name="profileImgEdit" type="file" accept="image/*" id="imgUpload"
                                            onchange="displayImage(this)" style="display:none">
                                        <div class="profileImgDisplay">
                                            <!-- <img src="images/default.jpg" id="imgPreview" alt="Preview"> -->
                                            <?php if (isset($_SESSION['profile'])) {
                                                $profile = $_SESSION['profile']
                                                    ?>
                                                <img src="data:image/png;base64,<?php echo stripslashes(base64_encode($profile)) ?>"
                                                    id="imgPreview"
                                                    onerror="this.onerror=null; this.src='images/person.svg'">
                                            <?php } else { ?>
                                                <img src="images/person.svg" id="imgPreview">
                                            <?php } ?>
                                            <button type="button" class="imgBtn" onclick="triggerClick()"><i
                                                    class="fas fa-pen"></i></button>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <h3 class="header3">
                                            <?php echo strtoupper($firstName) . " " . strtoupper($lastName) ?>
                                        </h3>
                                        <span class="para">aka @
                                            <?php echo $username ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="username" class="form-label para">Username:</label>
                                </div>
                                <div class="col-md-6">
                                    <span class="para">
                                        <?php echo $username ?>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label para">First Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="firstName"
                                        placeholder="<?php echo ucfirst($firstName) ?>"
                                        value='<?php echo ucfirst($firstName) ?>' required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label para">Last Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="lastName"
                                        placeholder="<?php echo ucfirst($lastName) ?>"
                                        value='<?php echo ucfirst($lastName) ?>' required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label para">Email:</label>
                                    <input type="email" class="form-control rounded-pill" name="email"
                                        placeholder="<?php echo $email ?>" value='<?php echo $email ?>' required>
                                </div>
                                <div class="form-check editPassword" style='margin-left: 5%;'>
                                    <input class="form-check-input border border-3" type="checkbox"
                                        id="checkEditPassword" name='checkEditPassword'
                                        style="border-color: #808080 !important;">
                                    <label class="form-check-label" for="checkEditPassword" style="color:#338762; font-weight: 500;
                                    font-style: italic;">
                                        Tick if changing password
                                    </label>
                                </div>

                                <div class="col-md-6 passwordShow" id='passwordOld'>
                                    <label for="password" class="form-label para">Old Password:</label>
                                    <input type="password" class="form-control rounded-pill" name="oldPassword"
                                        id='oPw'>
                                </div>
                                <div class="col-md-6 passwordShow" id='passwordNew'>
                                    <label for="password" class="form-label para">New Password:</label>
                                    <input type="password" class="form-control rounded-pill" name="newPassword"
                                        id='nPw'>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label para">Mobile Number:</label>
                                    <input type="tel" class="form-control rounded-pill" name="phone" pattern="[0-9]{8}"
                                        required placeholder="<?php echo $mobile ?>" value='<?php echo $mobile ?>'>
                                </div>
                                <?php if ($_SESSION['role'] == 'admin') { ?>
                                    <div class="col-md-6">
                                        <label for="birthdate" class="form-label para">Birthdate:</label>
                                        <input type="date" class="form-control rounded-pill" name="birthdate" required
                                            placeholder="YYYY-mm-dd" value='<?php echo $birthdate ?>'>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label para">Gender:</label>

                                        <?php
                                        $options = array("Female", "Male");
                                        ?>

                                        <select class="form-control form-select rounded-pill" name="gender">
                                            <?php foreach ($options as $option): ?>
                                                <option value="<?php echo $option; ?>" <?php if ($gender == $option): ?>
                                                       selected="selected" <?php endif; ?>>
                                                    <?php echo $option; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col">
                                        <button type="reset"
                                            class="btn btn-outline-danger btn-light primarybtn rounded-pill"
                                            style="margin-top: 15%">Undo</button>
                                    </div>

                                    <div class="col" style="">
                                        <button type="submit" class="btn btn-primary primarybtn rounded-pill"
                                            style="float: right; margin-top: 15%">Save Profile</button>
                                    </div>
                                </div>
                            </form>

                        </div>




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
    <script>

        const checkbox = document.getElementById('checkEditPassword');

        const passwordO = document.getElementById('passwordOld');
        const passwordN = document.getElementById('passwordNew');
        const passwordOInput = document.getElementById('oPw');
        const passwordNInput = document.getElementById('nPw');

        checkbox.addEventListener('click', function handleClick() {
            // if (checkbox.checked) {
            //     passwordO.style.display = 'none';
            //     passwordN.style.display = 'none';

            //     passwordOInput.required = false;
            //     passwordNInput.required = false;
            // } else {
            //     passwordO.style.display = 'block';
            //     passwordN.style.display = 'block';

            //     passwordOInput.required = true;
            //     passwordNInput.required = true;
            // }
            if (checkbox.checked) {
                passwordO.style.display = 'block';
                passwordN.style.display = 'block';

                passwordOInput.required = true;
                passwordNInput.required = true;
            } else {
                passwordO.style.display = 'none';
                passwordN.style.display = 'none';

                passwordOInput.required = false;
                passwordNInput.required = false;
            }
        });

    </script>
</body>

</html>