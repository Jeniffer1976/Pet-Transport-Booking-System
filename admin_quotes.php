<?php
include "loginFunctions.php";

if (!isset($_SESSION['username'])) {

    header("Location: signIn.php");
    exit();
}

global $link;

// $quoteQuery = "
//     SELECT Q.quote_id, Q.service_type, Q.pickUp_address, Q.dropOff_address, TIME_FORMAT(PD.first_pickUp_time, '%H %i') AS 'first_pickUp_time', TIME_FORMAT(PD.second_pickUp_time, '%H %i') AS 'second_pickUp_time', PO.first_Name, PO.last_Name, P.first_name AS 'pet_name', P.type, P.breed, P.age, P.weight, P.height, P.width
//     FROM quote Q 
//     INNER JOIN pet_owner PO ON Q.owner_id = PO.owner_id 
//     INNER JOIN pet P ON Q.quote_id = P.quote_id 
//     INNER JOIN pickup_details PD ON Q.quote_id = PD.quote_id
// ";

$quoteQuery = "SELECT * FROM quote";

$quoteStatus = mysqli_query($link, $quoteQuery) or die(mysqli_error($link));
// $quoteRow = mysqli_fetch_array($quoteStatus);

while ($quoteRow = mysqli_fetch_array($quoteStatus)) {
    $quoteContent[] = $quoteRow;
}
// if (!empty($quoteRow)) { // check quotes exist
// $quote_id = $arrContent[$i]['quote_id'];

// $po_firstName = $arrContent[$i]['first_Name'];
// $po_lastName = $arrContent[$i]['last_Name'];

// $service_type = $arrContent[$i]['service_type'];
// $pickUp_address = $arrContent[$i]['pickUp_address'];
// $dropOff_address = $arrContent[$i]['dropOff_address'];
// $first_pickUp_time = $arrContent[$i]['first_pickUp_time'];
// $second_pickUp_time = $arrContent[$i]['second_pickUp_time'];

// $first_name = $arrContent[$i]['first_Name'];
// $last_name = $arrContent[$i]['last_Name'];

// $pet_name = $arrContent[$i]['pet_name'];
// $type = $arrContent[$i]['type'];
// $breed = $arrContent[$i]['breed'];
// $age = $arrContent[$i]['age'];
// $weight = $arrContent[$i]['weight'];
// $height = $arrContent[$i]['height'];
// $width = $arrContent[$i]['width'];

// }

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
    <!-- <div class="container" style="margin-left:500px">
        <?php

        // echo $quote_id . "<br>";
        // echo $service_type . "<br>";
        // echo $pickUp_address . "<br>";
        // echo $dropOff_address . "<br>";
        // echo $first_pickUp_time . "<br>";
        // echo $second_pickUp_time . "<br>";
        // echo $first_name . "<br>";
        // echo $last_name . "<br>";
        // echo $pet_name . "<br>";
        // echo $type . "<br>";
        // echo $breed . "<br>";
        // echo $age . "<br>";
        // echo $weight . "<br>";
        // echo $height . "<br>";
        // echo $width . "<br>";
        ?>


    </div> -->

    <div class="container" style="margin-top:-700px; margin-left:400px; width:750px">
        <h2 class="header1">Customer Quotes</h2><br>
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th>Owner</th>
                    <th>Pet</th>
                    <th>Pick Up</th>
                    <th>Drop Off</th>
                    <th>Service</th>
                </tr>
                </tr>
            </thead>
            <tbody class="align-middle td-text" style="text-align:center;padding:40px;">
                <?php for ($i = 0; $i < count($quoteContent); $i++) {
                    $quote_id = $quoteContent[$i]['quote_id'];
                    $owner_id = $quoteContent[$i]['owner_id'];

                    // $po_firstName = $arrContent[$i]['first_Name'];
                    // $po_lastName = $arrContent[$i]['last_Name'];
                    // $owner_name = $po_firstName." ".$po_lastName;
                
                    $service_type = $quoteContent[$i]['service_type'];
                    $pickUp_address = $quoteContent[$i]['pickUp_address'];
                    $dropOff_address = $quoteContent[$i]['dropOff_address'];
                    $sender_id = $quoteContent[$i]['sender_id'];
                    $recipient_id = $quoteContent[$i]['recipient_id'];

                    $ownerQuery = "SELECT first_Name, last_Name FROM pet_owner WHERE owner_id = '$owner_id'";

                    $ownerStatus = mysqli_query($link, $ownerQuery) or die(mysqli_error($link));
                    // $quoteRow = mysqli_fetch_array($quoteStatus);
                
                    $ownerRow = mysqli_fetch_array($ownerStatus);
                    $po_firstName = $ownerRow['first_Name'];
                    $po_lastName = $ownerRow['last_Name'];
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
                        <td>
                            <?php
                            $pet_count = count($petContent);
                            echo "x" . $pet_count . "<br>";

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




                                echo $pet_name . "<br>";
                                echo $type . "<br>";
                                echo $breed . "<br>";
                                echo $weight . " &nbsp;&nbsp;&nbsp;&nbsp;" . $width . " x " . $height . "cm<br><br>";
                                ;
                            }
                            ?>
                        </td>
                        <td>
                            <?php

                            echo $pickUp_address. "<br>";
                            for ($u = 0; $u < count($pickupContent); $u++) {
                                $pickUp_date = $pickupContent[$u]['pickUp_date'];
                                $first_pickUp_time = $pickupContent[$u]['first_pickUp_time'];
                                $second_pickUp_time = $pickupContent[$u]['second_pickUp_time'];
                            }
                            echo $pickUp_date. "<br>";
                            if (is_null($second_pickUp_time)) {
                                echo date("H:i a", strtotime($first_pickUp_time)). "<br>";
                            } else {
                                echo "1st: ". date("H:i a", strtotime($first_pickUp_time)). " &nbsp;&nbsp;&nbsp;&nbsp;2nd: " .date("H:i a", strtotime($second_pickUp_time)). "<br>";
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