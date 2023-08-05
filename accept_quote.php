<?php
include "dbFunctions.php";
if (isset($_POST['quote_id'])) {
    $quote_id = $_POST['quote_id'];
    $staff_id = $_POST['staff_id'];

    $ownerQuery = "SELECT owner_id FROM quote 
    WHERE quote_id = '$quote_id'";

    $addressQuery = "SELECT pickUp_address, dropOff_address FROM quote 
    WHERE quote_id = '$quote_id'";

    $addressStatus = mysqli_query($link, $addressQuery) or die(mysqli_error($link));
    $ownerStatus = mysqli_query($link, $ownerQuery) or die(mysqli_error($link));

    $addressRow = mysqli_fetch_array($addressStatus);
    $pickUp_address = $addressRow['pickUp_address'];
    $dropOff_address = $addressRow['dropOff_address'];

    $ownerRow = mysqli_fetch_array($ownerStatus);
    $owner_id = $ownerRow['owner_id'];

}
if (isset($_POST['price'])) {
    $price = $_POST['price'];
    $accQuoteId = $_POST['currQuoteId'];
    $ownerId = $_POST['currOwnerId'];
    $staff_id = $_POST['staff_id'];
    $priceQuery = "UPDATE quote SET status = 'pending', price = '$price', staff_id = '$staff_id' WHERE quote_id = '$accQuoteId'";
    mysqli_query($link, $priceQuery) or die(mysqli_error($link));


    // update invoice table
    $results = $db->query("SELECT t.pickUp_date, t.last_name, t.trip_type, t.quote_id, t.price, t.service_type
    FROM (
        SELECT PD.pickUp_date, PO.last_name, Q.trip_type, Q.quote_id, PO.owner_id, Q.status, Q.price,Q.service_type,
               (@row_number := IF(@prev_quote_id = Q.quote_id, @row_number + 1, 1)) AS rn,
               (@prev_quote_id := Q.quote_id) AS dummy
        FROM quote Q
        INNER JOIN pet_owner PO ON PO.owner_id = Q.owner_id
        INNER JOIN pickup_details PD ON PD.quote_id = Q.quote_id
        CROSS JOIN (SELECT @row_number := 0, @prev_quote_id := NULL) AS vars
        ORDER BY Q.quote_id, PO.last_name, Q.trip_type, PD.pickUp_date
    ) t
    WHERE t.rn = 1 AND t.owner_id = $ownerId AND t.status = 'pending'");

    $row = $results->fetch_assoc();
    $pickDate = date_create($row['pickUp_date']);
    $serType = $row['service_type'];
    $tripType = $row['trip_type'];
    $last_name = $row['last_name'];
    $dispDate = "";
    $dispDay = "";
    if ($serType == "regular") {
        $dispDate = date_format($pickDate, "l") . "s";
        $dispDay = "Once a week";
    } else if ($serType == "adhoc") {
        $dispDate = date_format($pickDate, "l j ") . strtoupper(date_format($pickDate, "M ")) . date_format($pickDate, "Y");
    }
    $itemName = "Monthly Transport for " . date_format($pickDate, "F Y") . " - " . $dispDay . "*" . $tripType . "* (" . $dispDate . ") -" . $last_name;

    $invoiceQuery = "INSERT INTO `invoice` (`owner_id`, `quote_id`, `invoice_date`, `due_date`, `description`) 
                                    VALUES ('$ownerId', '$accQuoteId', CURRENT_DATE(), TIMESTAMPADD(DAY,7,CURRENT_DATE()),  '$itemName');";
    mysqli_query($link, $invoiceQuery) or die(mysqli_error($link));
    $invoice_id = mysqli_insert_id($link);
    // $invoice_id = $db->insert_id; 

    $invoice_no = strtoupper(date("M")) . date("y-") . $invoice_id;

    $updateInvoiceNo = $db->query("UPDATE `invoice` SET `invoice_no` = '$invoice_no' WHERE `invoice_id` = $invoice_id;");
    header("Location: admin_quotes.php");
}


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
                <form action="" method="post">
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
                            <input type="hidden" name="currOwnerId" value="<?php echo $owner_id ?>">
                            <input type="hidden" name="staff_id" value="<?php echo $staff_id ?>">
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