<?php
include "dbFunctions.php";

// if (isset($_SESSION['username'])) {

// $username = $_SESSION['username'];
// $firstName = $_SESSION['firstName'];
// $lastName = $_SESSION['lastName'];
// $email = $_SESSION['email'];
// $mobile = $_SESSION['mobile'];
// $password = $_SESSION['password'];
// $role = $_SESSION['role'];

// $staff_pw = 
$staff_id = $_GET['staff_id'];

$staffInfoQuery = "SELECT *
    FROM staff S
    INNER JOIN users U
    ON S.username = U.username 
    WHERE staff_id = '$staff_id'";

$staffInfoStatus = mysqli_query($link, $staffInfoQuery) or die(mysqli_error($link));

$infoRow = mysqli_fetch_array($staffInfoStatus);
$staff_id = $infoRow['staff_id'];
$staff_fname = $infoRow['first_Name'];
$staff_lname = $infoRow['last_Name'];
$staff_email = $infoRow['email'];
$staff_contact = $infoRow['contact_no'];
$staff_username = $infoRow['username'];
$staff_pw = $infoRow['password'];
$staff_gender = $infoRow['gender'];
$staff_birthdate = $infoRow['birth_date'];
// $profile = $infoRow['profile'];


// if ($role == 'admin') {
//     $gender = $_SESSION['gender'];
//     $birthdate = $_SESSION['birthDate'];

//     if ($gender == 'F') {
//         $gender = 'Female';
//     } else {
//         $gender = 'Male';
//     }
// }

if ($_SERVER['REQUEST_METHOD'] == "POST") //if u request then it will proceed wait then
{
    $message = "";
    $isSuccessful = false;
    //something was posted
    $emailN = $_POST['email'];

    $firstNameN = $_POST['first_Name'];
    $lastNameN = $_POST['last_Name'];
    $contactN = $_POST['contact_no'];

    $imageExists = '';
    if (!empty($_FILES['profileImgEdit']['tmp_name'])) {
        if ($_FILES['profileImgEdit']['size'] < 1000000) {
            $profilePic = addslashes(file_get_contents($_FILES['profileImgEdit']['tmp_name']));
            $imageExists = ", profile = '$profilePic'";
            $message .= "<br>The profile picture will be updated in your next login.";
            // $_SESSION['profile'] = $profilePic;
        }
    }

    // if ($_SESSION['role'] == 'admin') {
    //     $genderN = $_POST['gender'];

    //     if ($genderN == 'Female') {
    //         $genderN = 'F';

    //     } else {
    //         $genderN = 'M';
    //     }

    $birthdateN = $_POST['birth_date'];
    // }

    //save to database

    $checkPassword = "SELECT password
        FROM users
        WHERE username = '$staff_username'";

    $checkPasswordStatus = mysqli_query($link, $checkPassword);

    $rowPassword = mysqli_fetch_array($checkPasswordStatus);

    // if ($_SESSION['role'] == 'admin') {
    $updateAccount = "UPDATE staff
                    SET first_Name='$firstNameN', last_Name='$lastNameN', contact_no ='$contactN', email='$emailN', birth_date='$birthdateN'" . $imageExists . "
                    WHERE username='$staff_username'";

    // }
    $updateAccountStatus = mysqli_query($link, $updateAccount);


    if (!isset($_POST['checkEditPassword'])) {

        if (($updateAccountStatus)) {

            $infoRow['first_Name'] = $firstNameN;
            $infoRow['last_Name'] = $lastNameN;
            $infoRow['email'] = $emailN;
            $infoRow['contact_no'] = $contactN;
            $infoRow['birth_date'] = $birthdateN;
            $infoRow['profile'] = $profilePic ?? $infoRow['profile'];

            // if ($_SESSION['role'] == 'admin') {
            //     $_SESSION['gender'] = $genderN;
            //     $_SESSION['birthDate'] = $birthdateN;
            // }
            $message = "Staff account has been successfully updated. <i class='far fa-smile'></i>";
            $isSuccessful = true;
            if ($imageExists != '') {
                $message .= "<br>The profile picture will be updated in your next login.";
            }
            Header("Location: editStaff.php?staff_id=" . $staff_id . "&msg=" . $message);
            // header("Location: accountOverview.php"); //makes it go to signIn page directly.

        } else {
            $message = "The account update was unsuccessful";
            // $isSuccessful = false;
        }

    } else {

        if ($_POST['oldPassword'] == $rowPassword['password']) {
            $passwordN = $_POST['newPassword'];

            $updateUsers = "UPDATE users
                SET password='$passwordN' 
                WHERE username='$staff_username'";

            $updateUsersStatus = mysqli_query($link, $updateUsers);

            $infoRow['password'] = $passwordN;

            if (($updateUsersStatus && $updateAccountStatus)) {
                $infoRow['first_Name'] = $firstNameN;
                $infoRow['last_Name'] = $lastNameN;
                $infoRow['email'] = $emailN;
                $infoRow['contact_no'] = $contactN;
                $infoRow['birth_date'] = $birthdateN;
                $infoRow['profile'] = $profilePic ?? $infoRow['profile'];

                // if ($_SESSION['role'] == 'admin') {
                //     $_SESSION['gender'] = $genderN;
                //     $_SESSION['birthDate'] = $birthdateN;
                // }
                $message = "Staff account has been successfully updated. <i class='far fa-smile'></i>";
                $isSuccessful = true;
                if ($imageExists != '') {
                    $message .= "<br>The profile picture will be updated in your next login.";
                }
                Header("Location: editStaff.php?staff_id=" . $staff_id . "&msg=" . $message);

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

// } else {
//     header("Location: signIn.php");
//     exit();
// }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Account | Waggin Wheels</title>

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
            <a href="editAdmin.php" class="btn btn-back"><i class="far fa-arrow-alt-circle-left"></i> Back to Administrators</a>
        <?php } ?>
        <h1 class="header1">EDIT STAFF ACCOUNT</h1>

        <div class="container account">
            <div class="row">
                <div class="col col-4 sidebar" style="height: 49em;">
                    <a class="active nav-link nav-text" href="editAccount.php"><i class="fa-solid fa-pen"></i>Edit
                        Account</a>
                </div>

                <div class="col col-8" style="height: 49em;">
                    <?php
                    if (isset($_REQUEST['msg'])) {
                        $message = $_REQUEST['msg'];
                        ?>
                        <div class="alert alert-success errorMsg" role="alert">
                            <?php echo $message ?>
                        </div>
                        <br>
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
                                            <?php if (isset($infoRow['profile'])) {
                                                $profile = $infoRow['profile']
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
                                            <?php echo strtoupper($staff_fname) . " " . strtoupper($staff_lname) ?>
                                        </h3>
                                        <span class="para">aka @
                                            <?php echo $staff_username ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="username" class="form-label para">Username:</label>
                                </div>
                                <div class="col-md-6">
                                    <span class="para">
                                        <?php echo $staff_username ?>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <label for="first_Name" class="form-label para">First Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="first_Name"
                                        placeholder="<?php echo ucfirst($staff_fname) ?>"
                                        value='<?php echo ucfirst($staff_fname) ?>' required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_Name" class="form-label para">Last Name:</label>
                                    <input type="text" class="form-control rounded-pill" name="last_Name"
                                        placeholder="<?php echo ucfirst($staff_lname) ?>"
                                        value='<?php echo ucfirst($staff_lname) ?>' required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label para">Email:</label>
                                    <input type="email" class="form-control rounded-pill" name="email"
                                        placeholder="<?php echo $staff_email ?>" value='<?php echo $staff_email ?>'
                                        required>
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
                                    <label for="contact_no" class="form-label para">Mobile Number:</label>
                                    <input type="tel" class="form-control rounded-pill" name="contact_no"
                                        pattern="[0-9]{8}" required placeholder="<?php echo $staff_contact ?>"
                                        value='<?php echo $staff_contact ?>'>
                                </div>
                                <?php //if ($_SESSION['role'] == 'admin') { ?>
                                <div class="col-md-6">
                                    <label for="birth_date" class="form-label para">Birthdate:</label>
                                    <input type="date" class="form-control rounded-pill" name="birth_date" required
                                        placeholder="YYYY-mm-dd" value='<?php echo $staff_birthdate ?>'>
                                </div>
                                <div class="col-md-6">
                                        <label for="gender" class="form-label para">Gender:</label>

                                        <?php
                                        $options = array("Female", "Male");
                                        ?>

                                        <select class="form-control form-select rounded-pill" name="gender">
                                            <?php foreach ($options as $option): ?>
                                                <option value="<?php echo $option; ?>" <?php if ($staff_gender == $option): ?>
                                                       selected="selected" <?php endif; ?>>
                                                    <?php echo $option; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                <!-- <?php //} ?> -->

                                <div class="row">
                                    <div class="col">
                                        <button type="reset"
                                            class="btn btn-outline-danger btn-light primarybtn rounded-pill"
                                            style="margin-top: 15%">Undo</button>
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-primary primarybtn rounded-pill"
                                            style="float: right; margin-top: 15%">Save Changes</button>
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