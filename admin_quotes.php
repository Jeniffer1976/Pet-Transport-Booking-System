<?php
include "loginFunctions.php";

if (!isset($_SESSION['username'])) {

    header("Location: signIn.php");
    exit();
}

global $link;

$currusername = $_SESSION['username'];

if (isset($_POST['price'])) { // when quote is accepted
    $price = $_POST['price'];
    $accQuoteId = $_POST['currQuoteId'];
    $staff_id = $_SESSION['staff_id'];
    $priceQuery = "UPDATE quote SET status = 'pending', price = '$price', staff_id = '$staff_id' WHERE quote_id = '$accQuoteId'";
    mysqli_query($link, $priceQuery) or die(mysqli_error($link));
}

if (isset($_POST['declineQuote'])) {
    $decQuoteId = $_POST['decQuoteId'];
    $staff_id = $_SESSION['staff_id'];
    $priceQuery = "UPDATE quote SET status = 'a_rejected', staff_id = '$staff_id' WHERE quote_id = '$decQuoteId'";
    mysqli_query($link, $priceQuery) or die(mysqli_error($link));
    // $_POST['decQuoteId'] = "";
}

if (isset($_POST['submitFilter'])) {
    $month = $_POST['filterMonth'];
    if ($month == "showall") {
        $quoteQuery = "SELECT DISTINCT Q.quote_id, Q.owner_id, Q.service_type, Q.pickUp_address, Q.dropOff_address, Q.sender_id, Q.recipient_id, Q.status, Q.price 
        FROM quote Q 
        INNER JOIN pickup_details PD ON Q.quote_id= PD.quote_id 
        ORDER BY Q.status DESC, PD.pickUp_date DESC";

    } else {
        $quoteQuery = "SELECT DISTINCT Q.quote_id, Q.owner_id, Q.service_type, Q.pickUp_address, Q.dropOff_address, Q.sender_id, Q.recipient_id, Q.status, Q.price 
        FROM quote Q INNER JOIN pickup_details PD ON Q.quote_id= PD.quote_id 
        WHERE MONTH(PD.pickUp_date) = '$month' 
        ORDER BY Q.status DESC, PD.pickUp_date DESC";

    }
} else {
    $quoteQuery = "SELECT DISTINCT Q.quote_id, Q.owner_id, Q.service_type, Q.pickUp_address, Q.dropOff_address, Q.sender_id, Q.recipient_id, Q.status, Q.price 
        FROM quote Q 
        INNER JOIN pickup_details PD ON Q.quote_id= PD.quote_id 
        ORDER BY Q.status DESC, PD.pickUp_date DESC";

}
$quoteStatus = mysqli_query($link, $quoteQuery) or die(mysqli_error($link));
while ($quoteRow = mysqli_fetch_array($quoteStatus)) {
    $quoteContent[] = $quoteRow;
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quotes | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Stylesheets -->

    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/admin.css">
    <link rel="stylesheet" href="stylesheets/responsive.css">
</head>

<body>

    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!--  -->

    <!-- Header -->
    <!-- <h1 class="header1">CUSTOMER QUOTES</h1> -->
    <!-- -->

    <!-- Sidebar -->
    <div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <div class="nav-option">
                    <a class="nav-link nav-text" href="admin.php">
                        <i class="fa-solid fa-gauge"></i>
                        Dashboard
                    </a>

                </div>

                <div class="option2 nav-option active">
                    <a class="nav-link nav-text" href="admin_quotes.php">
                        <i class="fa-solid fa-table"></i>
                        Quotes
                    </a>

                </div>

                <?php if ($currusername == "admin1_Farrah") { ?>

                    <div class="nav-option option3">
                        <a class="nav-link nav-text" href="editAdmin.php">
                            <i class="fa-solid fa-user-gear"></i>
                            Administrators
                        </a>

                    </div>
                <?php } ?>
            </div>
        </nav>
    </div>
    <!-- -->

    <!-- Table -->

    <div class="container quoteTable">
        <h2 class="header1">Customer Quotes</h2><br>
        <div class="tableLegend" align="right">
            <p>
                <span class="text-secondary rounded-pill p-2" style="background-color:#C3E6CB">Completed Booking</span>
                <span class="text-secondary rounded-pill p-2" style="background-color:#FFEEBA">Payment Pending</span>
                <span class="text-secondary rounded-pill p-2" style="background-color:#F5C6CB">Rejected Booking</span>
            </p>
        </div>
        <!-- <form action="" method="post">
            <input type="text" name="filterMonth">
            <input type="submit" name="submitFilter" value="filter">
        </form> -->
        <div class="row">
            <div class="col-2" style="position:fixed">
                <?php
                $monthQuery = "SELECT DISTINCT MONTHNAME(pickUp_date) AS month_name, MONTH(pickUp_date) AS month 
                FROM pickup_details ORDER BY MONTH(pickUp_date)";

                $monthStatus = mysqli_query($link, $monthQuery) or die(mysqli_error($link));
                while ($monthRow = mysqli_fetch_array($monthStatus)) {
                    $monthContent[] = $monthRow;
                }

                ?>
                <form action="" method="post">
                    <div class="filterMonth" align="left">
                        <select name="filterMonth">
                            <option value="showall" selected>Show all</option>

                            <?php
                            for ($m = 0; $m < count($monthContent); $m++) { ?>
                                <option value="<?php echo $monthContent[$m]['month'] ?>"><?php echo $monthContent[$m]['month_name'] ?></option>
                                <?php
                            }

                            ?>
                        </select>

                        <br><input type="submit" id="submitFilter" class="mt-2" name="submitFilter" value="Filter">
                    </div>

                </form>
                <div class="filterMonth-text" align="left">
                    <?php if (isset($month)) {
                        if ($month == "showall") {
                            ?>
                            <h5><b>All months</b></h5>

                            <?php
                        } else {
                            ?>
                            <h5>Month:
                                <b>
                                    <?php echo date("F", mktime(0, 0, 0, $month, 10)) ?>
                                </b>
                            </h5>
                            <?php
                        }
                    }
                    ?>
                </div>


            </div>
            <div class="col-2"></div>
            <div class="col-10">
                <table class="table table-striped table-light">
                    <thead class="sticky-top tb-header">
                        <tr>
                            <th>Owner</th>
                            <th>Pet</th>
                            <th>Pick Up</th>
                            <th>Drop Off</th>
                            <th>Service</th>
                            <th></th>

                        </tr>

                    </thead>
                    <tbody class="align-middle" style="padding:40px;">
                        <?php for ($i = 0; $i < count($quoteContent); $i++) {
                            $quote_id = $quoteContent[$i]['quote_id'];
                            $owner_id = $quoteContent[$i]['owner_id'];
                            // $_SESSION['temp_owner_id'] = $owner_id;
                        
                            $service_type = $quoteContent[$i]['service_type'];
                            $pickUp_address = $quoteContent[$i]['pickUp_address'];
                            $dropOff_address = $quoteContent[$i]['dropOff_address'];
                            $sender_id = $quoteContent[$i]['sender_id'];
                            $recipient_id = $quoteContent[$i]['recipient_id'];
                            $status = $quoteContent[$i]['status'];
                            $price = $quoteContent[$i]['price'];

                            $tableStyle = "";
                            if ($status == "pending") {
                                $tableStyle = "table-warning";
                            } else if ($status == "completed") {
                                $tableStyle = "table-success";
                            } else if ($status == "a_rejected") {
                                $tableStyle = "table-danger";
                            }


                            $ownerQuery = "SELECT first_Name, last_Name, email, mobile, profile FROM pet_owner WHERE owner_id = '$owner_id'";

                            $ownerStatus = mysqli_query($link, $ownerQuery) or die(mysqli_error($link));

                            $ownerRow = mysqli_fetch_array($ownerStatus);
                            $po_firstName = $ownerRow['first_Name'];
                            $po_lastName = $ownerRow['last_Name'];
                            $po_email = $ownerRow['email'];
                            $po_mobile = $ownerRow['mobile'];
                            $po_profile = $ownerRow['profile'];
                            $owner_name = $po_firstName . " " . $po_lastName;

                            $petQuery = "SELECT * FROM pet WHERE quote_id = '$quote_id'";
                            $petStatus = mysqli_query($link, $petQuery) or die(mysqli_error($link));

                            $petContent = [];
                            while ($petRow = mysqli_fetch_array($petStatus)) {
                                $petContent[] = $petRow;
                            }

                            $pickupQuery = "SELECT * FROM pickup_details WHERE quote_id = '$quote_id'";
                            $pickupStatus = mysqli_query($link, $pickupQuery) or die(mysqli_error($link));

                            $pickupContent = [];
                            while ($pickupRow = mysqli_fetch_array($pickupStatus)) {
                                $pickupContent[] = $pickupRow;
                            }

                            $senderQuery = "SELECT  SR.first_name, SR.last_name, SR.contact, SR.email FROM senderrecipient_details SR 
                            INNER JOIN quote Q ON Q.sender_id = SR.sr_id 
                            WHERE Q.owner_id = '$owner_id'";
                            $senderStatus = mysqli_query($link, $senderQuery) or die(mysqli_error($link));

                            $senderRow = mysqli_fetch_array($senderStatus);

                            $s_firstName = $senderRow['first_name'];
                            $s_lastName = $senderRow['last_name'];
                            $s_contact = $senderRow['contact'];
                            $s_email = $senderRow['email'];

                            $recipientQuery = "SELECT SR.first_name, SR.last_name, SR.contact, SR.email FROM senderrecipient_details SR 
                                INNER JOIN quote Q ON Q.recipient_id = SR.sr_id 
                                WHERE Q.owner_id = '$owner_id'";
                            $recipientStatus = mysqli_query($link, $recipientQuery) or die(mysqli_error($link));

                            $recipientRow = mysqli_fetch_array($recipientStatus);
                            $r_firstName = $recipientRow['first_name'];
                            $r_lastName = $recipientRow['last_name'];
                            $r_contact = $recipientRow['contact'];
                            $r_email = $recipientRow['email'];

                            ?>
                            <tr class="<?php echo $tableStyle ?>">
                                <td>
                                    <?php echo $owner_name ?>
                                </td>
                                <td class="petCol">
                                    <?php
                                    $pet_count = count($petContent);
                                    echo "<span class='me-5 pe-3' style='font-style:italic'>No. of Pets</span>x" . $pet_count . "<br><br>";

                                    for ($p = 0; $p < count($petContent); $p++) {
                                        $p_firstName = $petContent[$p]['first_name'];
                                        $p_lastName = $petContent[$p]['last_name'];

                                        $pet_name = $p_firstName . " " . $p_lastName;

                                        $type = $petContent[$p]['type'];
                                        $breed = $petContent[$p]['breed'];
                                        $age = $petContent[$p]['age'];
                                        $weight = $petContent[$p]['weight'];
                                        $height = $petContent[$p]['height'];
                                        $width = $petContent[$p]['width'];

                                        ?>
                                        <div>
                                            <?php
                                            echo $pet_name . "<br>";
                                            echo $type . "<br>";
                                            echo $breed . "<br>";
                                            echo $weight . "Kg &nbsp;&nbsp;&nbsp;&nbsp;" . $width . " x " . $height . "cm<br><br>";
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php

                                    echo $pickUp_address . "<br>";
                                    for ($u = 0; $u < count($pickupContent); $u++) {
                                        $pickUp_date = $pickupContent[$u]['pickUp_date'];
                                        $first_pickUp_time = $pickupContent[$u]['first_pickUp_time'];
                                        $second_pickUp_time = $pickupContent[$u]['second_pickUp_time'];

                                        echo date("d/m/Y", strtotime($pickUp_date)) . "<br>";
                                        if (is_null($second_pickUp_time)) {
                                            echo date("H:i a", strtotime($first_pickUp_time)) . "<br><br>";
                                        } else {
                                            echo "1st: " . date("H:i a", strtotime($first_pickUp_time)) . " &nbsp;&nbsp;&nbsp;&nbsp;2nd: " . date("H:i a", strtotime($second_pickUp_time)) . "<br><br>";
                                        }
                                    }



                                    ?>
                                </td>
                                <td>
                                    <?php echo $dropOff_address ?>
                                </td>
                                <td>
                                    <?php echo $service_type ?>
                                </td>
                                <td>
                                    <div class="action">
                                        <?php if ($status == "unassigned") { ?>
                                            <form method="post" action="accept_quote.php" style="margin-bottom:-10px">
                                                <input type="hidden" id="quote_id" name="quote_id"
                                                    value="<?php echo $quote_id ?>" />
                                                <button type="submit" id="acceptQuoteBtn" class="actionBtns">
                                                    <i class="fas fa-check text-success"></i>
                                                </button>
                                            </form>

                                            <form method="post" action="decline_quote.php" style="margin-bottom:-10px">
                                                <input type="hidden" id="quote_id" name="quote_id"
                                                    value="<?php echo $quote_id ?>" />
                                                <input type="hidden" id="quote_id" name="owner_name"
                                                    value="<?php echo $owner_name ?>" />
                                                <button type="submit" id="declineQuoteBtn" class="actionBtns">
                                                    <i class="fas fa-times text-danger"></i>
                                                </button>
                                            </form>
                                        <?php } ?>

                                        <form method="post" action="view_quote.php" id="passOwnerId"
                                            style="margin-bottom:-10px">
                                            <input type="hidden" id="quote_id" name="quote_id"
                                                value="<?php echo $quote_id ?>" />
                                            <button type="submit" id="viewQuoteBtn" class="actionBtns">
                                                <i class="fas fa-eye text-secondary"></i>
                                            </button>
                                        </form>

                                        <?php if (($status == "unassigned") || ($status == "pending")) { ?>
                                            <form method="get" action="admin_editOverview.php" id="passOwnerId"
                                                style="margin-bottom:-10px">
                                                <input type="hidden" id="quote_id" name="quote_id"
                                                    value="<?php echo $quote_id ?>" />
                                                <button type="submit" id="editQuoteBtn" class="actionBtns">
                                                    <i class="fa-solid fa-pen text-secondary"></i>
                                                </button>
                                            </form>

                                        <?php } ?>

                                        <?php if (($status == "unassigned") || ($status == "pending") || ($status == "completed")) { ?>
                                            <button class="actionBtns" id="wabtn"
                                                onclick="window.open('https://wa.me/+65<?php echo $po_mobile ?>', '_blank')">
                                                <i class="fab fa-whatsapp fa-l"></i>
                                            </button>
                                            <button class="actionBtns" onclick="location.href='mailto:<?php echo $po_email ?>'">
                                                <i class="fas fa-envelope fa-l text-secondary"></i>
                                            </button>
                                        <?php } ?>

                                        <?php if (($status == "pending")) { ?>
                                            <form method="get" action="invoice.php" id="passOwnerId" target="_blank"
                                                style="margin-bottom:-10px">
                                                <input type="hidden" id="quote_id" name="quote_id"
                                                    value="<?php echo $quote_id ?>" />
                                                <button type="submit" id="invoiceBtn" class="actionBtns">
                                                    <i class="fa-solid fa-clipboard"></i>
                                                </button>
                                            </form>

                                        <?php } ?>

                                    </div>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

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
    <script src="scripts/sidebarscript.js"></script>
    <script>
        // $('#monthfilter').click(function () {
        //     month = $(this).val();
        //     jQuery('#div_session_write').load('session_write.php?filterMonth=7');
        //     location.reload();

        // });
    </script>
    <!-- <script src="scripts/defineVariable.js"></script> -->

</body>

</html>