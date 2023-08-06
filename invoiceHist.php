<?php
include "loginFunctions.php";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: signIn.php");
    exit();
}

$invhistQuery = "SELECT invoice.description, quote.price, quote.quote_id 
FROM (((users 
INNER JOIN pet_owner ON users.username = pet_owner.username) 
INNER JOIN invoice ON pet_owner.owner_id = invoice.owner_id) 
INNER JOIN quote ON invoice.quote_id = quote.quote_id)
WHERE users.username = '$username'";

$invhistStatus = mysqli_query($link, $invhistQuery) or die(mysqli_error($link));
while ($invRow = mysqli_fetch_array($invhistStatus)) {
    $invContent[] = $invRow;
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Overview | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/account.css">
    <link rel="stylesheet" href="stylesheets/invoice.css">

</head>

<body>

    <!-- Navbar -->
    <?php
    include("navbar.php");
    ?>
    <!--  -->

    <!--Account Overview Section-->
    <div class="container-fluid">
        <br>
        <?php if ($_SESSION['role'] != 'customer') { ?>
            <a href="admin.php" class="btn btn-back"><i class="far fa-arrow-alt-circle-left"></i> Back to Dashboard</a>
        <?php } ?>
        <h1 class="header1">INVOICE HISTORY</h1>

        <div class="container account">
            <div class="row">
                <div class="col col-4 sidebar" style="height: 50em;">
                    <a class="nav-link nav-text" href="accountOverview.php"><i class="fa-solid fa-house"></i>Account
                        Overview</a>
                    <a class="nav-link nav-text" href="editAccount.php"><i class="fa-solid fa-pen"></i>Edit Account</a>
                    <?php if ($_SESSION['role'] == 'customer') { ?>
                        <a class="active nav-link nav-text" href="invoiceHist.php"><i class="fa-solid fa-clock"></i>Invoice
                            History</a>
                    <?php } ?>
                </div>

                <div class="col col-8" style="height: 50em;">
                    <?php if (!isset($invContent)) { ?>
                        <div align="center">
                            <img src="images/invoice.png" alt="inbox cat" width='350' height='350'>
                        </div>
                        <h1 class="header3" align="center">No past records...</h1>
                    <?php } else { ?>
                        <table id="invoicetable">
                            <tr>
                                <th>Item Description</th>
                                <th>Pick-Up Date(s)</th>
                                <th>Total Price ($)</th>
                                <th>Download Invoice</th>
                            </tr>

                            <?php for ($i = 0; $i < count($invContent); $i++) {
                                $item_desc = $invContent[$i]['description'];
                                // $pudate = $invContent[$i]['pickUp_date'];
                                $price = $invContent[$i]['price'];

                                $pickupQuery = "SELECT pickup_details.pickUp_date 
                                FROM ((((users 
                                INNER JOIN pet_owner ON users.username = pet_owner.username) 
                                INNER JOIN invoice ON pet_owner.owner_id = invoice.owner_id) 
                                INNER JOIN quote ON invoice.quote_id = quote.quote_id) 
                                INNER JOIN pickup_details ON quote.quote_id = pickup_details.quote_id) 
                                WHERE users.username = '$username'";

                                $pickupStatus = mysqli_query($link, $pickupQuery) or die(mysqli_error($link));
                                while ($pickupRow = mysqli_fetch_array($pickupStatus)) {
                                    $pickupContent[] = $pickupRow;
                                }
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $item_desc ?>
                                    </td>
                                    <td class="w-25">
                                        <?php
                                        for ($u = 0; $u < count($pickupContent); $u++) {
                                            $pudate = $pickupContent[$u]['pickUp_date'];

                                            echo date("d/m/Y", strtotime($pudate)) . "<br><br>";
                                        }
                                        ?>
                                        <!-- <?php //echo $pudate 
                                                ?> -->
                                    </td>
                                    <td>
                                        <?php echo $price ?>
                                    </td>
                                    <td align="center" style="width:30px">
                                        <form method="get" action="invoice.php" id="passOwnerId" target="_blank">
                                            <input type="hidden" id="quote_id" name="quote_id" value="<?php echo $invContent[$i]['quote_id'] ?>" />
                                            <button type="submit" class="btn">
                                                <i class="fas fa-download download"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- -->

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