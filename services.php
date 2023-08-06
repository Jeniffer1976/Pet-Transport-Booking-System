<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="/images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/services.css">
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


    <!-- Service Buttons -->
    <div class="container grad1">
        <div class="container regularcontainer">
            <div class="row">
                <div class="col-sm">
                    <div class="regular">
                        <img src="images/schedule.png" alt="">
                        <p class="font8">Regular</p>
                        <a class="font8" href="#regular">Read More</a>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="regular">
                        <img src="images/calendar.png" alt="">
                        <p class="font8">Ad-hoc</p>
                        <a class="font8" href="#regular">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--  -->



    <!-- Regular Service Section -->
    <div class="gradient">
        <div class="container aboutcontent" id="regular">
            <div class="row">
                <div class="col-4">
                    <div class="container">
                        <img class=one src="images/schedule.png">
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div align="left">
                            <div class="font1 display-6 fw-bold lh-1 mb-3">
                                About our regular service</div>
                            <div class="text4">
                                Does your pet go attend daycare? Or do you need to take your pup for a monthly visit to the vet?
                                <br>
                                At Waggin Wheels', we offer regular pickup service that will fit into your routine and schedule so you won't have to repeat or make a booking for each and every time.
                                <br>
                                Our driver will pick your pup up and drop them back home at your convenience once your schedule has been set and arranged. We take away the stress of coordinating, driving in traffic and having to wait for your beloved pets for you when you have a busy schedule!
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <h2 class="font5">Benefits for regular</h2>
                        <br>
                        <div class="container">
                            <div class="row p-3">
                                <div class="row">
                                    <div class="col p-3 themed-grid-col font6 col1">Fixed schedule:
                                        <div class="text16">A flexible and reliable pet transport system that fits your schedule. Whether you need weekly, bi-weekly, or monthly trips, Waggin' Wheels has you covered.
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col p-3 themed-grid-col font6 col1">Cost saving:
                                        <div class="text16">you'll not only save on time on transportation but with Waggin' Wheels you can embrace our discounted and cost-saving regular service
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row p-3">
                                <div class="row">
                                    <div class="col p-3 themed-grid-col font6 col1">Providing the same dedicated staff every trip:
                                        <div class="text16">Our highly-trained team ensures a smooth and comfortable journey for your beloved companions, allowing them to form a special bond with our experienced caregivers
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col p-3 themed-grid-col font6 col1">Personalized care and attention:
                                        <div class="text16">Our team of expert staff also trained to observe and understand your pet's unique patterns and preferences, so you can expect our dedicated staff look out your pets individual needs throughout the journey</div>
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


        <!-- Ad-hoc Service Section -->
        <hr>
        <div class="container" id="adhoc">
            <div class="row">
                <div class="col-4">
                    <div class="container">
                        <img class=one src="images/calendar.png">
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div align="left">
                            <div class="font1 display-6 fw-bold lh-1 mb-3">
                                About our ad-hoc service</div>
                            <div class="text4">
                            At Waggin' Wheels, we offer on-demand pickups and drop-offs for your furry companions. Whether it's a spontaneous outing, a sudden travel plan, or unexpected commitments, Waggin' Wheels is here to ensure your pet's safe and comfortable journey, every time. With our seamless booking process and reliable service, you can trust Waggin' Wheels to be there when you need us the most. Experience the freedom and peace of mind with our ad hoc pet transport solution
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <h2 class="font5">Benefits for ad-hoc</h2>
                        <br>
                        <div class="container">
                            <div class="row p-3">
                                <div class="row">
                                    <div class="col p-3 themed-grid-col font6 col1">Flexibility:
                                        <div class="text16">You have the freedom to schedule trips according to your own convenience. No need to commit to fixed schedules or worry about cancellations 
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col p-3 themed-grid-col font6 col1">Pay-as-you-go:
                                        <div class="text16">Unlike regular services that require upfront commitments, we allow you to pay only for the trips you use. This pay-as-you-go approach ensures you save money by avoiding unnecessary expenses on unused transport days
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row p-3">
                                <div class="row">
                                    <div class="col p-3 themed-grid-col font6 col1">Short Notice Availability:
                                        <div class="text16">Our ad hoc service is designed to cater to your urgent pet transport needs, providing peace of mind during unexpected situations
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col p-3 themed-grid-col font6 col1">Reduced Commitment:
                                        <div class="text16">our ad hoc service lets you use pet transport only when necessary. This means you can avoid unnecessary expenses during periods when you don't need frequent transport </div>
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


        <!-- Request a Quote button -->

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