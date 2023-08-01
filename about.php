<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

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
                    </div>
                </div>
                <div class="col-4">
                    <div class="services">
                        <p class="">Why us?</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="services">
                        <p class="">Mission, Vision <br>
                        and Values</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--  -->


    <!-- Company Profile Section -->
    <div class="gradient">
        <div class="container aboutcontent">
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
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
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
                                        <img class="col-4 cp" src="images/teamhands.jpg"></img>
                                        <img class="col-4 cp" src="images/group.jpg"></img>
                                        <img class="col-4 cp" src="images/teamhands.jpg"></img>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <img class="col-4 cp" src="images/teamhands.jpg"></img>
                                        <img class="col-4 cp" src="images/group.jpg"></img>
                                        <img class="col-4 cp" src="images/group.jpg"></img>
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
        <div class="container aboutcontent">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div align="right">
                            <div class="font20 display-6 fw-bold lh-1 mb-3">
                                Why us?</div>
                            <div class="text41">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
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
                                        <div class="col font6 ww">Improved Performance:
                                            <div class="text6">Regular servicing helps maintain the optimal
                                                performance
                                            </div>
                                        </div>
                                        <div class="col font6 cx">Bad:
                                            <div class="text6">This gonna be a description of first bad service examples
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col font6 ww">Improved Performance:
                                            <div class="text6">Regular servicing helps maintain the optimal
                                                performance
                                            </div>
                                        </div>
                                        <div class="col font6 cx">Bad:
                                            <div class="text6">This gonna be a description of first bad service examples
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col font6 ww">Improved Performance:
                                            <div class="text6">Regular servicing helps maintain the optimal
                                                performance
                                            </div>
                                        </div>
                                        <div class="col font6 cx">Bad:
                                            <div class="text6">This gonna be a description of first bad service examples
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
        <div class="container aboutcontent">
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
                        <div class="mvvpara">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat.
                        </div>
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
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                    nisi
                                                    ut
                                                    aliquip ex ea commodo consequat
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 cp">
                                            <div class="mvvcon">
                                                <div class="mvvheader2 display-6 fw-bold">
                                                    Vision</div>
                                                <br>
                                                <div class="mvvpara ww">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                    nisi
                                                    ut
                                                    aliquip ex ea commodo consequat
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 cp">
                                            <div class="mvvcon">
                                                <div class="mvvheader2 display-6 fw-bold">
                                                    Values</div>
                                                <br>
                                                <div class="mvvpara ww">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                    nisi
                                                    ut
                                                    aliquip ex ea commodo consequat
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