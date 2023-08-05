<?php
// Include configuration file 
include_once 'config.php';

// Include database connection file 
include_once 'dbConnect.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/inbox.css">
    <link rel="stylesheet" href="stylesheets/common.css">
    <!-- <link rel="stylesheet" href="stylesheets/admin.css"> -->

</head>

<body>

    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->

    <div class="container">
        <?php
        include('dbFunctions.php');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $owner_id = $_SESSION['owner_id'];
        // Fetch products from the database 
        $results = $db->query("SELECT t.pickUp_date, t.last_name, t.trip_type, t.quote_id, t.price, t.service_type, t.pickUp_address, t.dropOff_address
        FROM (
            SELECT PD.pickUp_date, PO.last_name, Q.trip_type, Q.quote_id, PO.owner_id, Q.status, Q.price,Q.service_type, Q.pickUp_address, Q.dropOff_address,
                   (@row_number := IF(@prev_quote_id = Q.quote_id, @row_number + 1, 1)) AS rn,
                   (@prev_quote_id := Q.quote_id) AS dummy
            FROM quote Q
            INNER JOIN pet_owner PO ON PO.owner_id = Q.owner_id
            INNER JOIN pickup_details PD ON PD.quote_id = Q.quote_id
            CROSS JOIN (SELECT @row_number := 0, @prev_quote_id := NULL) AS vars
            ORDER BY Q.quote_id, PO.last_name, Q.trip_type, PD.pickUp_date
        ) t
        WHERE t.rn = 1 AND t.owner_id = $owner_id AND t.status = 'pending'");
        ?>

        <br>
        <div class="container">
            <h1 class="header1">INBOX</h1>
            <?php if ($results->num_rows == 0) { ?>
                <div align="center">
                    <img src="images/inbox.png" alt="inbox cat" width='350' height='350'>
                </div>
                <h1 class="header3" align="center">Nothing to see here...</h1>
            <?php } else { ?>

                <?php
                while ($row = $results->fetch_assoc()) {
                ?>
                    <div class="pro-box">
                        <div class="body">
                            <?php
                            $pickDate = date_create($row['pickUp_date']);
                            $serType = $row['service_type'];
                            $tripType = $row['trip_type'];
                            $last_name = $row['last_name'];
                            $pickAddress = $row['pickUp_address'];
                            $dropAddress = $row['dropOff_address'];
                            $dispDate = "";
                            $dispDay = "";
                            if ($serType == "regular") {
                                $dispDate = date_format($pickDate, "l") . "s";
                                $dispDay = "Once a week";
                            } else if ($serType == "adhoc") {
                                $dispDate = date_format($pickDate, "l j ") . strtoupper(date_format($pickDate, "M ")) . date_format($pickDate, "Y");
                            }
                            $itemName = "Monthly Transport for " . date_format($pickDate, "F Y") . " - " . $dispDay . "*" . $tripType . "* (" . $dispDate . ") - " . $last_name;
                            ?>

                            <!-- <h5>
                        <?php //echo $itemName; 
                        ?>
                    </h5>
                    <h6>Price:
                        <?php //echo '$' . $row['price'] . ' ' . PAYPAL_CURRENCY; 
                        ?>
                    </h6> -->

                            <div class="row">
                                <div class="col-1 paw">
                                    <i class="fas fa-paw"></i>
                                </div>
                                <div class="col box inbox">
                                    <p class="boxHeader" align="left">BOOKING CONFIRMATION</p>
                                    <div class="row">
                                        <div class="col">
                                            <p>
                                                <b>
                                                    <?php echo $itemName; ?>
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Pick-up Address:</p>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <?php echo $pickAddress; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Drop-off Address:</p>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <?php echo $dropAddress; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Service type:</p>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <?php echo $serType; ?>
                                            </p>
                                        </div>
                                    </div>



                                    <div class="row cfmbtn" align="center">
                                        <div class="col">
                                            <!-- PayPal payment form for displaying the buy button -->
                                            <form action="<?php echo PAYPAL_URL; ?>" method="post">
                                                <!-- Identify your business so that you can collect the payments. -->
                                                <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                                                <!-- Specify a Buy Now button. -->
                                                <input type="hidden" name="cmd" value="_xclick">

                                                <!-- Specify details about the item that buyers will purchase. -->
                                                <input type="hidden" name="item_name" value="<?php echo $itemName; ?>">
                                                <input type="hidden" name="item_number" value="<?php echo $row['quote_id']; ?>">
                                                <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
                                                <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                                                <!-- Specify URLs -->
                                                <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                                <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                                                <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">

                                                <input type="submit" class="btn btn-success rounded-pill primaryBtn" value="Confirm and proceed with payment" name="confirm">
                                                <!-- <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"> -->
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form method="get" action="invoice.php" id="passOwnerId" target="_blank">
                                                <input type="hidden" id="quote_id" name="quote_id" value="<?php echo $row['quote_id'] ?>" />
                                                <!-- <div class="viewinvoice">
                                                <input type="submit" id="invoiceBtn" class="btn btn-success rounded-pill primaryBtn" value="View Invoice">
                                                <i class="fas fa-clipboard"></i>
                                            </div> -->
                                                <button type="submit" class="btn btn-success rounded-pill primaryBtn">View Invoice &nbsp; <i class="fas fa-clipboard"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- PayPal payment form for displaying the buy button -->
                            <!-- <form action="<? //php echo PAYPAL_URL; 
                                                ?>" method="post"> -->
                            <!-- Identify your business so that you can collect the payments. -->
                            <!-- <input type="hidden" name="business" value="<?php //echo PAYPAL_ID; 
                                                                                ?>"> -->

                            <!-- Specify a Buy Now button. -->
                            <!-- <input type="hidden" name="cmd" value="_xclick"> -->

                            <!-- Specify details about the item that buyers will purchase. -->
                            <!-- <input type="hidden" name="item_name" value="<?php //echo $itemName; 
                                                                                ?>">
                        <input type="hidden" name="item_number" value="<?php //echo $row['quote_id']; 
                                                                        ?>">
                        <input type="hidden" name="amount" value="<?php //echo $row['price']; 
                                                                    ?>">
                        <input type="hidden" name="currency_code" value="<?php //echo PAYPAL_CURRENCY; 
                                                                            ?>"> -->

                            <!-- Specify URLs -->
                            <!-- <input type="hidden" name="return" value="<?php //echo PAYPAL_RETURN_URL; 
                                                                            ?>">
                        <input type="hidden" name="cancel_return" value="<?php //echo PAYPAL_CANCEL_URL; 
                                                                            ?>">
                        <input type="hidden" name="notify_url" value="<?php //echo PAYPAL_NOTIFY_URL; 
                                                                        ?>"> -->

                            <!-- Display the payment button. -->
                            <!-- <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"> -->
                            <!-- </form> -->
                        </div>
                    </div>
                    <br>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
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