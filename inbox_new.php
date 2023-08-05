<?php
// Include configuration file 
include_once 'config.php';

// Include database connection file 
include_once 'dbConnect.php';
?>

<div class="container">
    <?php
    include('dbFunctions.php');

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $owner_id = $_SESSION['owner_id'];
    // Fetch products from the database 
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
        WHERE t.rn = 1 AND t.owner_id = $owner_id AND t.status = 'pending'");
    while ($row = $results->fetch_assoc()) {
        ?>
        <div class="pro-box">
            <div class="body">
                <?php
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
                ?>

                <h5>
                    <?php echo $itemName; ?>
                </h5>
                <h6>Price:
                    <?php echo '$' . $row['price'] . ' ' . PAYPAL_CURRENCY; ?>
                </h6>

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

                    <!-- Display the payment button. -->
                    <input type="image" name="submit" border="0"
                        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                </form>
            </div>
        </div>
    <?php } ?>
</div>