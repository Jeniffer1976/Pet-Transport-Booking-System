<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/home.css">
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
    <div class="grad1">
        <?php include("navbar.php") ?>

        <!--  -->


        <!-- Opening -->
        <br>
        <div class="container col-xxl-10 px-4 py-2">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="images/homepagepets.png" class="d-block mx-lg-auto img-fluid" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="font1 display-4 fw-bold lh-1 mb-3">Never leave your FURiends behind</h1>
                    <h5 class="font2 display-8 fw-bold lh-1 mb-3">Waggin Wheels offer a flexible door to door, transport service throughout Singapore.</h5>
                    <p class="text4">Rest assured knowing that your pet will be in good hands throughout the journey.
                        We provide a safe, comfortable and reliable pet transportation services for your loved pets to and fro your desired destination.
                    </p>
                    <!-- Temporarily removed due to supervisor's feedback -->
                    <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn rounded-pill btn-primary btn-lg px-5 me-md-2" onclick="document.location='requestquote.php'">Request a
                            qoute</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!--  -->


    <!-- Testimonials -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="55%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect></rect>
                </svg>

                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="header4">Testimonials</h1>
                        <img class="avatar" src="images/hansdog.jpg">
                        <h2 class="font4">With her fetching us, our hooman feels assured</h2>
                        <p class="text3">"We love to go to puppy school in Farrah's car which is spotlessly clean. We don't feel nauseous in her car and she takes good care of us with her careful driving. With her fetching us, our hooman feels assured." </p>
                        <p class="text3">- Hans & Tobi, Member since 2021</p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="60%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect></rect>
                </svg>

                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="header4">Testimonials</h1>
                        <img class="avatar" src="images/nicboy.jpg">
                        <h2 class="font4">From the moment I contacted them, <br>
                            their team was professional, caring, and efficient.</h2>
                        <p class="text3">"I recently used Waggin' Wheels to move my beloved dog across the country,
                            and I couldn't be happier with their services. From the moment I contacted them,
                            their team was professional, caring, and efficient. They handled all the necessary
                            paperwork,
                            ensured my dog's safety during the journey, and provided regular updates along the way.
                            My furry friend arrived happy and healthy, and I highly recommend Waggin' Wheels to anyone
                            in need of reliable and trustworthy pet transportation."</p>
                        <p class="text3">- Nic, Member since 2019</p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="60%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect></rect>
                </svg>

                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="header4">Testimonials</h1>
                        <img class="avatar" src="images/hannahgirl.jpg">
                        <h2 class="font4">Always goes the extra mile to provide the best service possible</h2>
                        <p class="text3">"We have been with Waggin Wheels since they first started in 2020. Farrah always goes the extra mile to provide the best service possible. She is responsible, patient and caring to the pups under her care. Farrah helps to send Mochi to puppy school twice a week. I won't have to worry about Mochi's journey to and from school because Farrah provides timely pictures updates. Most importantly Mochi is always happy to see Farrah. We are extremely thankful to Farrah and would definitely recommend her professional, safe, clean and crate-free transport!"</p>
                        <p class="text3">- Hannah, Member since 2020</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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