<?php
session_start();
include("dbFunctions.php");

// if ($_SERVER['REQUEST_METHOD'] == "POST") //if u request then it will proceed wait then


?>

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

    <!-- jquery     -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>

    <div class="endScreen_wrapper">
        <div class="shadow"></div>
        <div class="message_wrap">
            <div style="display:flex">
                <span class="messageIcon">
                    <i class="fas fa-check"></i>
                </span>
                <p>You have successfully sent your quote. <br>We will get back to you shortly. <i
                        class="far fa-smile-beam"></i></p>
            </div>
            <div align="center">
                <button class="btn" style="display" onclick="location.href='index.php'"><i class="fas fa-home"></i>
                    Return to home</button>
            </div>
        </div>


    </div>

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

        <!-- <section class="inverse full-bleed overflow-hidden" id="form"> -->
        <!-- <div class="container-fluid d-flex justify-content-center"> -->
        <form method="post" action="" id="reqForm">
            <div class="form-step form-step-active">
                <h3 class="header2 m-0 pb-3" align="left">OWNER'S INFORMATION</h3>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="inverse full-bleed overflow-hidden" id="form">
                        <div class="row g-3 gx-5">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label para" align="left">First Name:</label>
                                <input type="text" id="firstName" class="form-control rounded-pill" name="firstName"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label para" align="left">Last Name:</label>
                                <input type="text" id="lastName" class="form-control rounded-pill" name="lastName"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label para" align="left">Email:</label>
                                <input type="email" id="email" class="form-control rounded-pill" name="email" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btns-group">
                    <a></a>
                    <a href="#" class="btn btn-next">Next <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            <div class="form-step">
                <h3 class="header2 m-0 pb-3" align="left">TYPE OF SERVICE</h3>
                <div class="container-fluid d-flex justify-content-center">

                    <div class="inverse full-bleed overflow-hidden" id="form">
                        <div class="row g-3 gx-5">
                            <div class="col-md">
                                <label for="servicetype" class="form-label para" align="left">Choose type of
                                    service:</label>
                                <select id="servicetype" class="rounded-pill para dropdown-toggle p-2" align="left"
                                    style="border:none; width:200px" name="servicetype" required>
                                    <option value="adhoc">Ad-hoc</option>
                                    <option value="regular">Regular</option>
                                </select>
                            </div>
                            <div class="col-md serviceQty">
                                <label for="serviceQty" class="form-label para" align="left">Service Quantity:</label>
                                <input type="number" class="form-control rounded-pill" name="serviceQty" id="serviceQty"
                                    style="width:120px" max="5" min="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev text-secondary"><i class="far fa-arrow-alt-circle-left"></i>
                        Previous</a>
                    <a href="#" class="btn btn-next" id="serviceNext">Next <i
                            class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            <div class="form-step">
                <h3 class="header2 m-0 pb-3" align="left">PICK UP INFORMATION</h3>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="inverse full-bleed overflow-hidden" id="form">
                        <div class="row g-3 gx-5">
                            <div class="pickUpTimings">
                                <div class="pickUpTimings-content row g-3 gx-5">
                                    <div class="col-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pickupdate" class="form-label para" align="left">Prefered pick up
                                            date:</label>
                                        <input type="date" id="pickupdate" class="form-control rounded-pill" name="pickupdate[]"
                                            required>
                                    </div>
                                    <div class="col-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="firstpickup" class="form-label para" align="left">First pick up
                                            time:</label>
                                        <input type="time" id="firstpickup" class="form-control rounded-pill para"
                                            name="firstpickup[]" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="secondpickup" class="form-label para" align="left">Second pick
                                            up
                                            time:</label>
                                        <input type="time" id="secondpickup" class="form-control rounded-pill para"
                                            name="secondpickup[]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="pickupaddress" class="form-label para" align="left">Address:</label>
                                <input type="text" id="pickupaddress" class="form-control rounded-pill" name="pickupaddress"
                                    required>
                            </div>
                            <br><br><br><br><br>
                            <h3 class="para"><b>Sender's Information:</b></h3>
                            <div class="col-md-6">
                                <label for="firstNameSI" class="form-label para" align="left">First Name:</label>
                                <input type="text" id="firstNameSI" class="form-control rounded-pill" name="firstNameSI"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastNameSI" class="form-label para" align="left">Last Name:</label>
                                <input type="text" id="lastNameSI" class="form-control rounded-pill" name="lastNameSI"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="contactSI" class="form-label para" align="left">Contact No:</label>
                                <input type="tel" id="contactSI" class="form-control rounded-pill" name="contactSI"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="emailSI" class="form-label para" align="left">Email:</label>
                                <input type="email" id="emailSI" class="form-control rounded-pill" name="emailSI"
                                    required>
                            </div>
                            <div class="col-md tick" align="left">
                                <input type="checkbox" id="tickSI" name="tickSI">
                                <label for="tick" class="para">Sender is the same as owner</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev text-secondary"><i class="far fa-arrow-alt-circle-left"></i>
                        Previous</a>
                    <a href="#" class="btn btn-next">Next <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            <div class="form-step">
                <h3 class="header2 m-0 pb-3" align="left">DROP OFF INFORMATION</h3>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="inverse full-bleed overflow-hidden" id="form">

                        <div class="row g-3 gx-5">
                            <div class="col-md">
                            </div>
                            <div class="col-12">
                                <label for="dropoffaddress" class="form-label para" align="left">Address:</label>
                                <input type="text" id="dropoffaddress" class="form-control rounded-pill" name="dropoffaddress"
                                    required>
                            </div>
                            <br><br><br><br><br>
                            <h3 class="para"><b>Recipient's Information:</b></h3>
                            <div class="col-md-6">
                                <label for="firstNameRI" class="form-label para" align="left">First Name:</label>
                                <input type="text" id="firstNameRI" class="form-control rounded-pill" name="firstNameRI"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastNameRI" class="form-label para" align="left">Last Name:</label>
                                <input type="text" id="lastNameRI" class="form-control rounded-pill" name="lastNameRI"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="contactRI" class="form-label para" align="left">Contact No:</label>
                                <input type="tel" id="contactRI" class="form-control rounded-pill" name="contactRI"
                                    required>
                            </div>
                            <div class="col-12">
                                <label for="emailRI" class="form-label para" align="left">Email:</label>
                                <input type="email" id="emailRI" class="form-control rounded-pill" name="emailRI"
                                    required>
                            </div>
                            <div class="col-12 tick" align="left">
                                <input type="checkbox" id="tickRI" name="tickRI">
                                <label for="tick" class="para">Recipient is the same as owner</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev text-secondary"><i class="far fa-arrow-alt-circle-left"></i>
                        Previous</a>
                    <a href="#" class="btn btn-next">Next <i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>

            <!-- Pet Info -->
            <div class="form-step petInfo">
                <div class="petSec">
                    <div>
                        <h3 class="header2 m-0 pb-3" align="left">PET'S INFORMATION</h3>
                        <div class="container-fluid d-flex justify-content-center">
                            <div class="inverse full-bleed overflow-hidden" id="form">
                                <div class="row g-3 gx-5">
                                    <div class="col-md-6">
                                        <label for="petFname" class="form-label para" align="left">First Name:</label>
                                        <input type="text" class="form-control rounded-pill" name="petFname[]" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="petLname" class="form-label para" align="left">Last Name:</label>
                                        <input type="text" class="form-control rounded-pill" name="petLname[]">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="petType" class="form-label para" align="left">Type of pet:</label>
                                        <input type="text" class="form-control rounded-pill" name="petType[]" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="breed" class="form-label para" align="left">Breed:</label>
                                        <input type="text" class="form-control rounded-pill" name="breed[]" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="breed" class="form-label para" align="left">Age:</label>
                                        <input type="number" class="form-control rounded-pill" name="age[]" required>
                                    </div>
                                    <h4 class="para-it mt-5 pt-3">Size of pet</h4>
                                    <div class="col-md-6">
                                        <label for="weight" class="form-label para" align="left">Weight (Kg):</label>
                                        <input type="number" class="form-control rounded-pill" step="0.1"
                                            name="weight[]" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="height" class="form-label para" align="left">Height (Cm):</label>
                                        <input type="number" class="form-control rounded-pill" step="0.1"
                                            name="height[]" required>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <label for="width" class="form-label para" align="left">Width (Cm):</label>
                                        <input type="number" class="form-control rounded-pill" step="0.1" name="width[]"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <label for="addInfo" class="form-label para mt-4" align="left">Additional
                                            Comments:</label>
                                        <textarea name="addInfo[]" rows="4" cols="50" class="form-control rounded">
                                    </textarea>
                                    </div>

                                    <div class="row g-3 gx-5 btns">
                                        <div class="col-md-10"></div>
                                        <div class="col-md petBtn">
                                            <button class="btn btn-light rounded-circle" id="addPet" type="button">
                                                <i class="fas fa-plus"></i></button>
                                            <p class="para">Add Pet</p>
                                        </div>

                                        <!-- <div class="col-md petBtn">
                                <p class="para">Delete Pet</p>
                                <button class="btn btn-light rounded-circle" id="delPet" type="button">
                                    <i class="fas fa-minus"></i></button>
                            </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev text-secondary"><i class="far fa-arrow-alt-circle-left"></i>
                        Previous</a>
                    <button class="btn" id="submitReq">Submit <i class="far fa-check-circle"></i></button>
                    <!-- <input type="submit" value="Submit" id="submitReq"> -->
                </div>

            </div>
        </form>
        <!-- </div> -->
        <!-- </section> -->


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
    <script src="scripts/quoteScript.js"></script>
    <script src="scripts/addDelInput.js"></script>
    <script type="text/javascript">
        var firstname = "<?php echo $_SESSION['firstName'] ?>";
        var lastname = "<?php echo $_SESSION['lastName'] ?>";
        var email = "<?php echo $_SESSION['email'] ?>";
        var mobile = "<?php echo $_SESSION['mobile'] ?>";
    </script>

</body>

</html>