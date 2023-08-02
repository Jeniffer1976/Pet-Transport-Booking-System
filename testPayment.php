<?php
require_once('config.php');
include('dbFunctions.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$owner_id = $_SESSION['owner_id'];
$quoteQuery = "SELECT * FROM `quote` WHERE status = 'pending' AND owner_id = :owner_id";
$quoteStmt = $conn->prepare($quoteQuery);
$quoteStmt->execute([
    'owner_id' => $owner_id,
]);
?>
<html>

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

<body>

    <div style="width:700px; margin:50 auto;">
        <h2>PayPal Payment Integration in PHP</h2>

        <?php
        if (!empty($quoteStmt)) {
            foreach ($quoteStmt as $quote) {
                ?>
                <div class='product_wrapper'>
                    <div class='name'>
                        <?php echo $quote['quote_id']; ?>
                    </div>
                    <div class='price'>$
                        <?php echo $quote['price']; ?>
                    </div>
                    <form method='post' action='<?php echo PAYPAL_URL; ?>'>

                        <!-- PayPal business email to collect payments -->
                        <input type='hidden' name='business' value='<?php echo PAYPAL_EMAIL; ?>'>

                        <!-- Details of item that customers will purchase -->
                        <input type='hidden' name='quote_id' value='<?php echo $quote['quote_id']; ?>'>
                        <input type='hidden' name='price' value='<?php echo $quote['price']; ?>'>
                        <input type='hidden' name='owner_id' value='<?php echo $owner_id ?>'>

                        <!-- for paypal  -->
                        <input type='hidden' name='amount' value='<?php echo $quote['price']; ?>'>
                        <input type='hidden' name='currency_code' value='<?php echo CURRENCY; ?>'>
                        <input type='hidden' name='no_shipping' value='1'>
                        <input type='hidden' name='item_number' value='<?php echo $quote['quote_id']; ?>'>
                        <input type='hidden' name='item_name' value='this one?'>

                        <!-- PayPal return, cancel & IPN URLs -->
                        <input type='hidden' name='return' value='<?php echo RETURN_URL; ?>'>
                        <input type='hidden' name='cancel_return' value='<?php echo CANCEL_URL; ?>'>
                        <input type='hidden' name='notify_url' value='<?php echo NOTIFY_URL; ?>'>

                        <!-- Specify a Pay Now button. -->
                        <input type="hidden" name="cmd" value="_xclick">
                        <button type='submit' class='pay'>Pay Now</button>
                    </form>
                </div>
                <?php
            }
        }
        ?>

    </div>
</body>

</html>