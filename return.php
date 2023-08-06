<?php 
// Include configuration file 
include_once 'config.php'; 
 
// Include database connection file 
include_once 'dbConnect.php'; 

include('dbFunctions.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$owner_id = $_SESSION['owner_id'];

// If transaction data is available in the URL 
if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
    // Get transaction information from URL 
    $quote_id = $_GET['item_number'];  
    $description = $_GET['item_name'];  
    $txn_id = $_GET['tx']; 
     
    // Check if transaction data exists with the same TXN ID. 
    $prevPaymentResult = $db->query("SELECT * FROM receipt WHERE txn_id = '".$txn_id."'"); 
 
    if($prevPaymentResult->num_rows > 0){ 

    }else{ 
        // Insert tansaction data into the database 
        $insert = $db->query("INSERT INTO receipt(owner_id, receipt_date, txn_id, description) 
        VALUES('".$owner_id."', CURRENT_DATE(),'".$txn_id."','".$description."')"); 
        $receipt_id = $db->insert_id; 
        
        // $invoice_no = strtoupper(date( "M")). date("y-").$invoice_id;

        // $updateInvoiceNo = $db->query("UPDATE `invoice` SET `invoice_no` = '$invoice_no' WHERE `invoice_id` = $invoice_id;"); 

        $updateStatus = $db->query("UPDATE `quote` SET `status` = 'completed' WHERE `quote_id` = '$quote_id'"); 
    } 
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return | Waggin Wheels</title>

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
    <link rel="stylesheet" href="stylesheets/payment.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbar.php" ?>
    <!--  -->

    <div class="container" align="center">
        <div class="row main">
            <div class="col-7 returnstatus">
                <h1 class="error">Your payment has been successfully received. Thank you!</h1>
                <br>
                <a href="index.php" class="btn-link link">Back to homepage</a>
            </div>
            <div class="col-4 returnimg">
                <img src="images/return.png" alt="return cat" width='350' height='480'>
            </div>
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