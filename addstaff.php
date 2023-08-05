<?php
session_start();
include("dbFunctions.php");

// if ($_SERVER['REQUEST_METHOD'] == "POST") //if u request then it will proceed wait then
if (isset($_POST['addacc'])) {
    $message = "";
    $isSuccessful = false;
    //something was posted
    $gender = $_POST['gender'];

    $email = $_POST['email'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contact = $_POST['contact'];
    $hiredate = $_POST['hiredate'];
    $birthdate = $_POST['birthdate'];
    $password = $_POST['password'];

    $image = $_FILES['profileImg']['tmp_name'];
    $profilePic = addslashes(file_get_contents($image));

    //save to database
    $insertUsers = "INSERT INTO users
          (username, password, role) 
          VALUES 
          ('$username', '$password', 'admin')";

    $checkUsername = "SELECT DISTINCT username
        FROM users
        WHERE username = '$username'";

    $checkUsernameStatus = mysqli_query($link, $checkUsername);

    if (mysqli_num_rows($checkUsernameStatus)) {
        $row = mysqli_fetch_array($checkUsernameStatus);
        $checkUsername = $row['username'];

        $message = "The username " . $checkUsername . " already exists";
    } else {
        $insertUsersStatus = mysqli_query($link, $insertUsers);

        $insertStaff = "INSERT INTO staff
            (gender, first_name, last_name, contact_no, email, hire_date, birth_date, username, profile) 
            VALUES 
            ('$gender','$firstName','$lastName','$contact','$email','$hiredate','$birthdate','$username','$profilePic')";

        $insertStaffStatus = mysqli_query($link, $insertStaff);

        if ($insertUsersStatus && $insertStaffStatus) {
            $message = "Staff account has been successfully added";
            $isSuccessful = true;
            header("Location: editAdmin.php"); //makes it go to signIn page directly.

        } else {
            $message = "Account creation failed";
        }
    }
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff Account | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/addstaff.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>
    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->


    <!-- Add account Form -->
    <div class="container-fluid" id="addAccSection">
        <br>
        <a href="editAdmin.php" class="btn btn-back"><i class="far fa-arrow-alt-circle-left"></i> Back to Administrators</a>
        <h1 class="header1">ADD STAFF ACCOUNT</h1>
        <h3 class="header2">STAFF'S INFORMATION</h3>

        <section class="inverse full-bleed overflow-hidden" id="addstaffForm">
            <div class="container-fluid d-flex justify-content-center">
                <form class="row g-3 gx-5" method="post" action="" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="username" class="form-label para">Username:</label>
                        <input type="username" class="form-control rounded-pill" name="username" placeholder="Johnny2314" required>
                    </div>
                    <div class="col-md-6">
                        <label for="firstName" class="form-label para">First Name:</label>
                        <input type="text" class="form-control rounded-pill" name="firstName" placeholder="Johnny" required>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label para">Last Name:</label>
                        <input type="text" class="form-control rounded-pill" name="lastName" placeholder="Leuwis" required>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label para">Email:</label>
                        <input type="email" class="form-control rounded-pill" name="email" placeholder="test@email.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="hiredate" class="form-label para">Hire Date:</label>
                        <input type="date" class="form-control rounded-pill" name="hiredate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="birthdate" class="form-label para">Birth Date:</label>
                        <input type="date" class="form-control rounded-pill" name="birthdate" required>
                    </div>
                    <div class="col-12">
                        <label for="contact" class="form-label para">Mobile Number:</label>
                        <input type="tel" class="form-control rounded-pill" name="contact" pattern="[0-9]{8}" required placeholder="12345678">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label para">Password:</label>
                        <input type="password" class="form-control rounded-pill" name="password" required>
                    </div>
                    <div class="col-6">
                        <label for="gender" class="form-label para">Gender:</label>
                        <br>
                        <input type="radio" name="gender" value="M">
                        <label for="male" id="gender">Male</label>
                        <input type="radio" name="gender" value="F">
                        <label for="female" id="gender">Female</label><br>
                    </div>
                    <div class="col form-group" align="center">
                        <input name="profileImg" type="file" accept="image/*" id="imgUpload" onchange="displayImage(this)" style="display:none">
                        <div class="profileImgDisplay">
                            <img src="images/default.jpg" id="imgPreview" alt="Preview">
                            <button type="button" class="imgBtn" onclick="triggerClick()"><i class="fas fa-camera"></i></button>
                        </div>
                    </div>
                    <div class="col-12 text-center form-group">
                        <button type="submit" name="addacc" class="btn btn-primary primarybtn rounded-pill">Add
                            Account</button>
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
        </section>
    </div>

    <!--  -->


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
        function triggerClick() {
            document.querySelector("#imgUpload").click();
        }

        function displayImage(i) {
            if (i.files[0]) {
                var reader = new FileReader();

                reader.onload = function(i) {
                    document.querySelector("#imgPreview").setAttribute('src', i.target.result);
                }
                reader.readAsDataURL(i.files[0]);
            }

        }
    </script>
</body>

</html>