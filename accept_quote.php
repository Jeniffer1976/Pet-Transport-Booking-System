<?php
include "dbFunctions.php";
$quote_id = $_POST['quote_id'];

$addressQuery = "SELECT pickUp_address, dropOff_address FROM quote 
WHERE quote_id = '$quote_id'";

$addressStatus = mysqli_query($link, $addressQuery) or die(mysqli_error($link));

$addressRow = mysqli_fetch_array($addressStatus);
$pickUp_address = $addressRow['pickUp_address'];
$dropOff_address = $addressRow['dropOff_address'];

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote | Waggin Wheels</title>
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
    <link rel="stylesheet" href="stylesheets/accept_quote.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>
    <div class="quoteScreen_wrapper">
        <div class="shadow"></div>
        <div class="quote_wrap">
            <button type="button" onclick="exitAnim()" class="exitBtn">
                <i class="fas fa-times text-secondary"></i>
            </button>
            <div class="content">
                <div class="box">
                    <div class="row">
                        <div class="col-5">
                            <p>Pick-Up Address:</p>
                        </div>
                        <div class="col-7">
                            <p>
                                <?php echo $pickUp_address ?>
                            </p>
                        </div>
                        <div class="col-5">
                            <p>Drop-Off Address:</p>
                        </div>
                        <div class="col-7">
                            <p>
                                <?php echo $dropOff_address ?>
                            </p>
                        </div>
                    </div>
                </div>
                <form action="admin_quotes.php" method="post">
                    <div class="row mt-5" align="left">
                        <div class="col-3">
                            <label for="price" id="priceLabel" class="mt-2">
                                <h5> Price: </h5>
                            </label>
                        </div>
                        <div class="col-5">
                            <span id="dollarSym">$</span>
                            <input type="number" min="1" step="any" name="price" id="priceInp">
                            <input type="hidden" name="currQuoteId" value="<?php echo $quote_id ?>">
                            <!-- <input type="number" min="1" step="any" name="price" id="priceInp" placeholder=" $" /> -->
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary rounded-pill" id="submitBooking">Make
                                Booking</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <!-- Background -->
    <div class="bgclass">
        <div class="gradient"></div>
    </div>
    <!--  -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="scripts/viewQuote.js"></script>


</body>

</html>