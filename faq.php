<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs | Waggin Wheels</title>

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
    <link rel="stylesheet" href="stylesheets/faq.css">
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


    <!-- Inbox form -->
    <br>
    <div class="container">
        <h1 class="header1">FAQ</h1>
        <br>
        <div align="center">
            <!-- <div class="collapsible row">
                <div class="col-10">
                    <p>HOW DO YOU TRANSPORT OUR PETS?</p>
                </div>
                <div class="col-2">
                    <i class="fas fa-caret-down arrow"></i>
                </div>
            </div>
            <div class="content">
                <p>The safety and comfort of your pet is our utmost priority. Every pet is assessed prior to their
                    ride
                    to determine how they are transported i.e. in a crate, with seat belt, if they need to be
                    separated
                    from other pets, etc.</p>
            </div>
            <br>
            <div class="collapsible row">
                <div class="col-10">
                    <p>DOES MY PET HAVE TO TRAVEL IN A CRATE?</p>
                </div>
                <div class="col-2">
                    <i class="fas fa-caret-down arrow"></i>
                </div>
            </div>
            <div class="content">
                <p>If your pet is a dog, then no. Most of our customers choose to have their dogs lay comfortably on the
                    seats fastened with a safety belt harness. If your pet is a cat, then yes, we require cats to be
                    transported in carriers.</p>
            </div>
            <br>
            <div class="collapsible row">
                <div class="col-10">
                    <p>DO I NEED TO MAKE AN APPOINTMENT?</p>
                </div>
                <div class="col-2">
                    <i class="fas fa-caret-down arrow"></i>
                </div>
            </div>
            <div class="content">
                <p>Yes, you have to schedule an appointment at least 24 hours in advance to ensure availability.</p>
            </div>
            <br>
            <div class="collapsible row">
                <div class="col-10">
                    <p>CAN I ACCOMPANY MY PET ON THE RIDE?</p>
                </div>
                <div class="col-2">
                    <i class="fas fa-caret-down arrow"></i>
                </div>
            </div>
            <div class="content">
                <p>Sure! There is an additional charge of $10 for each person joining the ride. Rest assured that if you
                    let your pet travel alone and leave them in our care, your pet will be well-taken care of and will
                    arrive at its destination safely.</p>
            </div>
            <br>
            <div class="collapsible row">
                <div class="col-10">
                    <p>WHAT IS CONSIDERED A ROUND TRIP?</p>
                </div>
                <div class="col-2">
                    <i class="fas fa-caret-down arrow"></i>
                </div>
            </div>
            <div class="content">
                <p>A round trip refers to a journey to a place and back.
                    When you opt for a round trip, this means that our driver will send your pet to their appointment
                    and when they are ready to leave, be sent back home.
                </p>
            </div>
            <br>
            <div class="collapsible row">
                <div class="col-10">
                    <p>WHAT IS OUR CANCELLATION POLICY?</p>
                </div>
                <div class="col-2">
                    <i class="fas fa-caret-down arrow"></i>
                </div>
            </div>
            <div class="content">
                <p>You can cancel your booking and receive a full refund up to 24 hours before the scheduled ride.
                    Cancellation made less than 24 hours will be subject to a 50% cancellation fee.</p>
            </div> -->
            <button class="collapsible">HOW DO YOU TRANSPORT OUR PETS?</button>
            <div class="content">
                <p>The safety and comfort of your pet is our utmost priority. Every pet is assessed prior to their
                    ride
                    to determine how they are transported i.e. in a crate, with seat belt, if they need to be
                    separated
                    from other pets, etc.</p>
            </div>
            <br>
            <button class="collapsible">DOES MY PET HAVE TO TRAVEL IN A CRATE?</button>
            <div class="content">
                <p>If your pet is a dog, then no. Most of our customers choose to have their dogs lay comfortably on the
                    seats fastened with a safety belt harness. If your pet is a cat, then yes, we require cats to be
                    transported in carriers.</p>
            </div>
            <br>
            <button class="collapsible">DO I NEED TO MAKE AN APPOINTMENT?</button>
            <div class="content">
                <p>Yes, you have to schedule an appointment at least 24 hours in advance to ensure availability.</p>
            </div>
            <br>
            <button class="collapsible">CAN I ACCOMPANY MY PET ON THE RIDE?</button>
            <div class="content">
                <p>Sure! There is an additional charge of $10 for each person joining the ride. Rest assured that if you
                    let your pet travel alone and leave them in our care, your pet will be well-taken care of and will
                    arrive at its destination safely.</p>
            </div>
            <br>
            <button class="collapsible">WHAT IS CONSIDERED A ROUND TRIP?</button>
            <div class="content">
                <p>A round trip refers to a journey to a place and back.
                    When you opt for a round trip, this means that our driver will send your pet to their appointment
                    and when they are ready to leave, be sent back home.</p>
            </div>
            <br>
            <button class="collapsible">WHAT IS OUR CANCELLATION POLICY?</button>
            <div class="content">
                <p>You can cancel your booking and receive a full refund up to 24 hours before the scheduled ride.
                    Cancellation made less than 24 hours will be subject to a 50% cancellation fee.</p>
            </div>
            <br>
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
    <script src="scripts/faq.js"></script>

</body>

</html>