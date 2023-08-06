<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/about.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>
    <div class="errScreen_wrapper">
        <div class="shadow"></div>
        <div class="err_wrap">
            <p>Please login to request a quote.
                <i class="far fa-smile"></i>
            </p>
            <div align="center">
                <button class="btn" style="display" onclick="location.href='signIn.php'">
                    Login <i class="fas fa-sign-in-alt"></i>
                </button>
                <br>
                <button class="btn" style="display" onclick="location.href='signUp.php'">
                    New user? Sign up now! <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->


    <!-- About Buttons -->
    <div class="container grad1">
        <div class="container servicescontainer">
            <div class="row">
                <div class="col-4">
                    <div class="services">
                        <p class="">Company profile</p>
                        <a class="rm" href="#companyprofile">Read More</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="services">
                        <p class="">Why us?</p>
                        <a class="rm" href="#why">Read More</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="services">
                        <p class="">Mission, Vision <br>
                            and Values</p>
                        <a class="rm" href="#mvv">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--  -->


    <!-- Company Profile Section -->
    <div class="gradient">
        <div class="container aboutcontent" id="companyprofile">
            <div class="row">
                <div class="col-4">
                    <div class="container ">
                        <img class=two src="images/user.png">
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div align="left">
                            <div class="font1 display-6 fw-bold lh-1 mb-3">
                                Company profile</div>
                            <div class="text4">
                                Waggin Wheels offer a flexible door to door, transport service throughout Singapore and we are happy to tailor an individual service to meet your needs.
                                We are dedicated to providing a pet transport service that take the stress out of coordinating travel arrangements for your pet. When you book our pet transport services at Waggin' Wheels, you can rest assured knowing that your pet will be in good hands throughout the journey. <br> <br>
                                We provide a safe, comfortable and reliable pet transportation services for your loved pets to and fro your desired destination-Pet Daycare, Veterinary Hospitals/Clinics, Grooming Salons, Boarding, Airport. When you trust our drivers at Waggin' Wheels, know that you have a team of pet lovers and experts on your side.
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->


                <!--Pictures -->
                <div class="container">
                    <div class="row">
                        <h2 class="font5">Our gallery</h2>
                        <br>
                        <div class="container cpcn">
                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <img class="col-4 cp" src="images/gallerypic6.jpg"></img>
                                        <img class="col-4 cp" src="images/gallerypic1.jpg"></img>
                                        <img class="col-4 cp" src="images/gallerypic5.png"></img>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <img class="col-4 cp" src="images/gallerypic2.jpg"></img>
                                        <img class="col-4 cp" src="images/gallerypic4.jpg"></img>
                                        <img class="col-4 cp" src="images/gallerypic3.jpg"></img>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <!--  -->


        <!-- Why Us Section -->
        <div class="container aboutcontent" id="why">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div align="right">
                            <div class="font20 display-6 fw-bold lh-1 mb-3">
                                Why us?</div>
                            <div class="text41">
                                At Waggin' Wheels, we are your number one choice for pet transportation, and here's why you should choose us! <br>
                                We absolutely LOVE animals, and it shows in the care and attention we provide. Our team includes certified dog trainers and first aid-trained professionals, ensuring your furry friend's safety and well-being throughout the journey. <br> With experienced and reliable drivers, you can trust us to transport your pet with the utmost care and responsibility. <br> <br>
                                Our approach is all about positive reinforcement, making every ride a positive and stress-free experience for your beloved companion. Our vehicles are always clean and safe, providing the perfect environment for a comfortable trip.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container">
                        <img class=two src="images/why.png">
                    </div>
                </div>

                <div class="container cn1">
                    <div class="row">
                        <div class="font51 h3">Comparision between us and another company on the market</div>
                        <br>
                        <div class="container">
                            <div class="container">
                                <div align=center>
                                    <div class="row">
                                        <div class="col font51 h6">Waggin' Wheels</div>
                                        <div class="col font51 h6">Company X</div>
                                    </div>
                                    <div class="row">
                                        <div class="col font6 ww">Cost saving:
                                            <div class="text60">Be it regular or ad-hoc service, both of our services are wallet-friendly
                                            </div>
                                        </div>
                                        <div class="col font6 cx">Expensive:
                                            <div class="text60">Quote unrealistic price for a trip
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col font6 ww">Flexibility:
                                            <div class="text60">Choose the dates from our wide range dates available
                                            </div>
                                        </div>
                                        <div class="col font6 cx">Rigid schedule:
                                            <div class="text60">Only selected dates available, eg service only available during office hours and weekdays
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col font6 ww">Personalized care and attention:
                                            <div class="text60">We ensure every trip is comfortable for every pets meeting their needs throughout the journey
                                            </div>
                                        </div>
                                        <div class="col font6 cx">Divided care and attention:
                                            <div class="text60">Having too many pets in one transport and untrained caregivers
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <hr>
        <!--  -->


        <!-- Mission Vision & Core Values Section -->
        <div class="container aboutcontent" id="mvv">
            <div class="container">
                <div class="row">
                    <div class=col-4></div>
                    <div class=col-4>
                        <img class="four" src="images/vision.png">
                    </div>
                    <div class=col-4></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="mvvheader display-6 fw-bold">
                            Unmatched Service, Unforgettable Experience</div>
                        <br>
                        <!--<div class="mvvpara">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat.
                        </div>-->
                        <div class="container cpcn">
                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <div class="col-4 cp">
                                            <div class="mvvcon">
                                                <div class="mvvheader2 display-6 fw-bold">
                                                    Mission</div>
                                                <br>
                                                <div class="mvvpara ww">
                                                    Provide safe, reliable, and stress-free pet transport services that ensure the well-being and happiness of pets during their journeys. We are committed to delivering exceptional care, comfort, and convenience, making every trip an enjoyable experience
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 cp">
                                            <div class="mvvcon">
                                                <div class="mvvheader2 display-6 fw-bold">
                                                    Vision</div>
                                                <br>
                                                <div class="mvvpara ww">
                                                    Become the leading pet transport service provider, setting the highest standards for pet transportation and care. We aim to build long-lasting relationships with pet owners, earning their trust through our unwavering commitment to quality, compassion, and professionalism.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 cp">
                                            <div class="mvvcon">
                                                <div class="mvvheader2 display-6 fw-bold">
                                                    Values</div>
                                                <br>
                                                <div class="mvvpara ww">
                                                    Pet Welfare: <br> We prioritize the well-being and safety of pets above all else<br><br>
                                                    Reliability: <br> Ensuring that pets reach their destinations on time and in good hands <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
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