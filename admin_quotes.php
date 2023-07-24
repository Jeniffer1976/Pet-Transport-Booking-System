<?php
include "loginFunctions.php";

if (!isset($_SESSION['username'])) {

    header("Location: signIn.php");
    exit();
}

global $link;

$quoteQuery = "SELECT * FROM quote Q INNER JOIN pickup_details PD ON Q.quote_id= PD.quote_id ORDER BY PD.pickUp_date DESC";

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

                <div class="nav-option option3">
                    <a class="nav-link nav-text" href="editAdmin.php">
                        <i class="fa-solid fa-user-gear"></i>
                        Administrators
                    </a>

                </div>

                <div class="nav-option option4">
                    <a class="nav-link nav-text" href="editCustomers.php">
                        <i class="fa-solid fa-user"></i>
                        Customers
                    </a>

                </div>

            </div>
        </nav>
    </div>
    <!-- -->

    <!-- Table -->

    <div class="container quoteTable" align="center">
        <h2 class="header1">Customer Quotes</h2><br>
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

                    $service_type = $quoteContent[$i]['service_type'];
                    $pickUp_address = $quoteContent[$i]['pickUp_address'];
                    $dropOff_address = $quoteContent[$i]['dropOff_address'];
                    $sender_id = $quoteContent[$i]['sender_id'];
                    $recipient_id = $quoteContent[$i]['recipient_id'];

                    $ownerQuery = "SELECT first_Name, last_Name, mobile FROM pet_owner WHERE owner_id = '$owner_id'";

                    $ownerStatus = mysqli_query($link, $ownerQuery) or die(mysqli_error($link));

                    $ownerRow = mysqli_fetch_array($ownerStatus);
                    $po_firstName = $ownerRow['first_Name'];
                    $po_lastName = $ownerRow['last_Name'];
                    $po_mobile = $ownerRow['mobile'];
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

                    ?>
                    <tr>
                        <td>
                            <?php echo $owner_name ?>
                        </td>
                        <td class="petCol">
                            <?php
                            $pet_count = count($petContent);
                            echo "<div>x" . $pet_count . "<br></div>";

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
                                    echo $weight . " &nbsp;&nbsp;&nbsp;&nbsp;" . $width . " x " . $height . "cm<br><br>";
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

                                echo $pickUp_date . "<br>";
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
                                <button class="actionBtns">
                                    <i class="fas fa-check text-success"></i>
                                </button>
                                <button class="actionBtns">
                                    <i class="fas fa-times text-danger"></i>
                                </button>
                                <?php include('view_quote.php'); 
                                echo $po_firstName?>
                                <!-- <button>   
                                    <i class="fas fa-eye text-secondary"></i>
                                </button> -->

                                <button class="actionBtns" id="wabtn"
                                    onclick="window.open('https://wa.me/+65<?php echo $po_mobile ?>', '_blank')">
                                    <i class="fab fa-whatsapp fa-l"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>


    </div>

    <div class="container text-center">
        <!-- View Quote Button-->
        <?php include('view_quote.php') ?>
        <!-- -->
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
</body>

</html>