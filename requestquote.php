<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request A Quote | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="/images/logoNoText.ico">

    <!-- Script -->
    <script src="script.js"></script>

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
    <link rel="stylesheet" href="stylesheets/home.css">
    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/quote.css">



</head>

<body>

    <!-- Navbar -->
    <?php include("navbar.php") ?>

    <!--  -->


    <!-- Form -->
    <div class="container-fluid">
        <br>
        <h1 class="header1">REQUEST A QUOTE</h1>

        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>

            <div class="progress-step progress-step-active" data-title="Owner's Info"></div>
            <div class="progress-step" data-title="Service Type"></div>
            <div class="progress-step" data-title="Pick-up"></div>
            <div class="progress-step" data-title="Drop-off"></div>
            <div class="progress-step" data-title="Pet's Info"></div>
        </div>

        <!-- <h3 class="header2">OWNER'S INFORMATION</h3> -->

        <section class="inverse full-bleed overflow-hidden" id="form">
            <div class="container-fluid d-flex justify-content-center">
                <form method="post" action="">
                    <div class="form-step form-step-active">
                        <h3 class="header2 m-0 pb-3" align="left">OWNER'S INFORMATION</h3>
                        <div class="row g-3 gx-5">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label para" align="left">First Name:</label>
                                <input type="text" class="form-control rounded-pill" name="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label para" align="left">Last Name:</label>
                                <input type="text" class="form-control rounded-pill" name="lastName" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label para" align="left">Email:</label>
                                <input type="email" class="form-control rounded-pill" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <h3 class="header2 m-0 pb-3" align="left">TYPE OF SERVICE</h3>
                        <div class="row g-3 gx-5">
                            <div class="col-md-12">
                                <label for="service" class="form-label para" align="left">Choose type of service:</label>
                                <select id="service" class="form-control rounded-pill para dropdown-toggle"
                                    name="service" required>
                                    <option value="regular">Regular</option>
                                    <option value="adhoc">Ad-hoc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <h3 class="header2 m-0 pb-3" align="left">PICK UP INFORMATION</h3>
                        <div class="row g-3 gx-5">
                            <div class="col-md">
                            </div>
                            <div class="col-md-6">
                                <label for="pickup" class="form-label para" align="left">Prefered pick up date:</label>
                                <input type="text" class="form-control rounded-pill" name="pickup" required>
                            </div>
                            <div class="col-md">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label para">Last Name:</label>
                                <input type="text" class="form-control rounded-pill" name="lastName" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label para" align="left">Address:</label>
                                <input type="text" class="form-control rounded-pill" name="address" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" />
                        </div>
                        <div class="input-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" />
                        </div>
                        <div class="btns-group">
                            <a href="#" class="btn btn-prev">Previous</a>
                            <input type="submit" value="Submit" class="btn" />
                        </div>
                    </div>

                </form>
            </div>
        </section>

        <div class="btns-group">
            <a href="#" class="btn btn-prev">Previous</a>
            <a href="#" class="btn btn-next">Next</a>
        </div>
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
</body>

</html>