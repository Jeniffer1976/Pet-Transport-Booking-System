<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="/images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/contact.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->

    <!-- Contact Form -->
    <div class="container-fluid" id="signUpSection">
        <br>
        <h1 class="header1">CONTACT US</h1>

        <section class="inverse full-bleed overflow-hidden" id="contactForm">
            <div class="container-fluid d-flex justify-content-center">
                <form class="row g-3 gx-5" method="post" action="contactFormAction.php" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label para">First Name:</label>

                        <?php if (isset($_SESSION['username'])) { ?> <!-- if user is logged in -->
                            <input id='firstName' type="text" class="form-control rounded-pill" name="firstName" placeholder="Johnny"
                                required value='<?php echo $_SESSION['firstName'] ?>'>

                        <?php } else { ?>
                            <input id='firstName' type="text" class="form-control rounded-pill" name="firstName" placeholder="Johnny"
                            required  >
                        <?php } ?>

                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label para">Last Name:</label>

                        <?php if (isset($_SESSION['username'])) { ?> <!-- if user is logged in -->
                            <input id='lastName' type="text" class="form-control rounded-pill" name="lastName" placeholder="Leuwis"
                            required value='<?php echo $_SESSION['lastName'] ?>'>

                        <?php } else { ?>
                            <input id='lastName'  type="text" class="form-control rounded-pill" name="lastName" placeholder="Leuwis"
                            required >
                        <?php } ?>

                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label para">Email:</label>

                        <?php if (isset($_SESSION['username'])) { ?> <!-- if user is logged in -->
                            <input id='email' type="email" class="form-control rounded-pill" name="email" placeholder="test@email.com"
                            required  value='<?php echo $_SESSION['email'] ?>'>

                        <?php } else { ?>
                            <input id='email' type="email" class="form-control rounded-pill" name="email" placeholder="test@email.com"
                            required  >
                        <?php } ?>

                    </div>
                    <div class="col-12">
                        <label for="message" class="form-label para mt-4" align="left">
                            Message:</label>
                        <textarea name="message" rows="4" cols="50" class="form-control rounded" list='addInfoList' required >
                        </textarea>
                    </div>
                    <div class="col-12 text-center form-group">
                        <button id='contact' name="contact" class="btn btn-primary primarybtn rounded-pill">
                            Submit
                        </button>
                        <!-- <button type="submit" name="signUp" class="btn btn-primary primarybtn rounded-pill">Submit
                            <a id='contact' href=''></a>
                        </button> -->
                    </div>
                </form>


            </div>

            <!-- <?php //if (isset($message)) { ?>
                <?php //if ($isSuccessful == true) { ?>
                    <div class="alert alert-success errorMsg" role="alert">
                        <?php //echo $message ?>
                    </div>
                <?php //} else { ?>
                    <div class="alert alert-danger errorMsg" role="alert">
                        <?php //echo $message ?>
                    </div>
                <?php //} ?>
            <?php //} ?> -->
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
    <script src="scripts/contact.js"></script>
    <script src='scripts/script.js'></script>
</body>

</html>