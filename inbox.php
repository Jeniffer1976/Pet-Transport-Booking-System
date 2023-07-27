<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox | Waggin Wheels</title>

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
    <link rel="stylesheet" href="stylesheets/inbox.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->


    <!-- Inbox form -->
    <br>
    <div class="container">
        <h1 class="header1">INBOX</h1>
        <!-- <div align="center"> -->
        <div class="row">
            <div class="col-1 paw">
                <i class="fas fa-paw"></i>
            </div>
            <div class="col box inbox">
                <p class="boxHeader" align="left">BOOKING CONFIRMATION</p>
                <div class="row">
                    <div class="col">
                        <p>Pick-up Date & Time:</p>
                    </div>
                    <div class="col">
                        <p>
                            4 July, 9:30 am
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Pick-up Address:</p>
                    </div>
                    <div class="col">
                        <p>
                            Choa Chu Kang
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Drop-off Address:</p>
                    </div>
                    <div class="col">
                        <p>
                            Jurong West
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Service type:</p>
                    </div>
                    <div class="col">
                        <p>
                            Ad-Hoc
                        </p>
                    </div>
                </div>
                <div class="cfmbtn" align="center">
                    <input type="submit" class="btn btn-success rounded-pill primaryBtn" value="Confirm and proceed with payment" name="confirm">
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-1 paw">
                <i class="fas fa-paw"></i>
            </div>
            <div class="col box inbox">
                <p class="boxHeader" align="left">BOOKING CONFIRMATION</p>
                <div class="row">
                    <div class="col">
                        <p>Pick-up Date & Time:</p>
                    </div>
                    <div class="col">
                        <p>
                            5 July, 10:30 am
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Pick-up Address:</p>
                    </div>
                    <div class="col">
                        <p>
                            Geylang
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Drop-off Address:</p>
                    </div>
                    <div class="col">
                        <p>
                            Bukit Batok
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Service type:</p>
                    </div>
                    <div class="col">
                        <p>
                            Ad-Hoc
                        </p>
                    </div>
                </div>
                <div class="cfmbtn" align="center">
                    <input type="submit" class="btn btn-success rounded-pill primaryBtn" value="Confirm and proceed with payment" name="confirm">
                </div>
            </div>
        </div>

        <!-- </div> -->
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