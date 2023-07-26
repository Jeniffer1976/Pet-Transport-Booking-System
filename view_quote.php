<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Quote | Waggin Wheels</title>
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
    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/view_quote.css">

</head>

<body>

    <?php
    include "dbFunctions.php";
    $quote_id = $_POST['quote_id'];

    $generalInfoQuery = "SELECT * FROM quote Q
    INNER JOIN pet_owner PO ON PO.owner_id = Q.owner_id
    WHERE Q.quote_id = '$quote_id'";

    $generalInfoStatus = mysqli_query($link, $generalInfoQuery) or die(mysqli_error($link));

    $infoRow = mysqli_fetch_array($generalInfoStatus);
    $owner_id = $infoRow['owner_id'];
    $po_fname = $infoRow['first_Name'];
    $po_lname = $infoRow['last_Name'];
    $po_email = $infoRow['email'];
    $po_mobile = $infoRow['mobile'];
    $po_username = $infoRow['username'];
    $profile = $infoRow['profile_pic'];

    $service_type = $infoRow['service_type'];
    $pickUp_address = $infoRow['pickUp_address'];
    $dropOff_address = $infoRow['dropOff_address'];

    $sender_id = $infoRow['sender_id'];
    $recipient_id = $infoRow['recipient_id'];
    // $ = $infoRow[''];
    
    $petQuery = "SELECT * FROM pet WHERE quote_id = '$quote_id'";
    $petStatus = mysqli_query($link, $petQuery) or die(mysqli_error($link));

    $petContent = [];
    while ($petRow = mysqli_fetch_array($petStatus)) {
        $petContent[] = $petRow;
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

    $pickupQuery = "SELECT * FROM pickup_details WHERE quote_id = '$quote_id'";
    $pickupStatus = mysqli_query($link, $pickupQuery) or die(mysqli_error($link));

    $pickupContent = [];
    while ($pickupRow = mysqli_fetch_array($pickupStatus)) {
        $pickupContent[] = $pickupRow;
    }


    ?>


    <div class="quoteScreen_wrapper">
        <div class="shadow"></div>
        <div class="quote_wrap">
            <div class="row">
                <div class="col-11"></div>
                <div class="col">
                    <button type="button" onclick="exitAnim()" class="exitBtn">
                        <i class="fas fa-times text-secondary"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-4 box petInfo">
                    <p class="boxHeader">Pet</p>
                    <div class="petInfo-container">
                        <?php
                        $pet_count = count($petContent);
                        for ($p = 0; $p < count($petContent); $p++) {
                            $p_firstName = $petContent[$p]['first_name'];
                            $p_lastName = $petContent[$p]['last_name'];

                            // $pet_name = $p_firstName . " " . $p_lastName;
                        
                            $type = $petContent[$p]['type'];
                            $breed = $petContent[$p]['breed'];
                            $age = $petContent[$p]['age'];
                            $weight = $petContent[$p]['weight'];
                            $height = $petContent[$p]['height'];
                            $width = $petContent[$p]['width'];
                            $addInfo = $petContent[$p]['additional_info'];
                            ?>

                            <?php if ($pet_count > 1) { ?>
                                <hr>
                                <p>
                                    Pet
                                    <?php echo $p + 1 ?>
                                </p>
                                <hr>
                            <?php } ?>
                            <div class="row">
                                <div class="col">
                                    <p>First Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($p_firstName) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Last Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($p_lastName) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Type of pet:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $type ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Breed:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $breed ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Age:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $age ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Weight(Kg):</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $weight . "Kg" ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Height(Cm):</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $height . "Cm" ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Width(Cm):</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $width . "Cm" ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Additional Comments:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $addInfo ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-7 box ownerInfo">
                            <p class="boxHeader">Owner</p>
                            <div class="row">
                                <div class="col">
                                    <p>Username:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $po_username ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>First Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($po_fname) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Last Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($po_lname) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Email:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $po_email ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Contact No.</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php
                                        $mobile = strval($po_mobile);
                                        $arrMobile = str_split($mobile, 4);
                                        echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 mt-4 profilebox">
                            <!-- <p class="boxHeader">Profile</p> -->
                            <?php if (isset($profile)) { ?>
                                <img src="images/profileImg/<?php echo $profile ?>" height="150" width="150"
                                    style="object-fit: cover; border-radius: 50%;">
                            <?php } else { ?>
                                <img src="images/person.svg" height="80" width="80">
                            <?php } ?>
                        </div>
                        <div class="col-5 box senderInfo">
                            <p class="boxHeader">Sender</p>
                            <div class="row">
                                <div class="col">
                                    <p>First Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($s_firstName) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Last Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($s_lastName) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Email:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $s_email ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Contact No.</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php
                                        $mobile = strval($s_contact);
                                        $arrMobile = str_split($mobile, 4);
                                        echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 box reciInfo">
                            <p class="boxHeader">Recipient</p>
                            <div class="row">
                                <div class="col">
                                    <p>First Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($r_firstName) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Last Name:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo ucfirst($r_lastName) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Email:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $r_email ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Contact No.</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php
                                        $mobile = strval($r_contact);
                                        $arrMobile = str_split($mobile, 4);
                                        echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 box pickInfo">
                            <p class="boxHeader">Pick-Up</p>
                            <div class="pickInfo-container">
                                <div class="row">
                                    <div class="col">
                                        <p>Address:</p>
                                    </div>
                                    <div class="col">
                                        <p>
                                            <?php echo $pickUp_address ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                for ($u = 0; $u < count($pickupContent); $u++) {
                                    $pickUp_date = $pickupContent[$u]['pickUp_date'];
                                    $first_pickUp_time = $pickupContent[$u]['first_pickUp_time'];
                                    $second_pickUp_time = $pickupContent[$u]['second_pickUp_time'];
                                    ?>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <p>Type of service:</p>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <?php echo $service_type ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Pickup date:</p>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <?php echo $pickUp_date ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <?php if (is_null($second_pickUp_time)) { ?>
                                            <div class="col">
                                                <p>Pick-Up Time:</p>
                                            </div>

                                            <div class="col">
                                                <p>
                                                    <?php echo date("H:i a", strtotime($first_pickUp_time)) ?>
                                                </p>
                                            </div>
                                        <?php } else { ?>
                                            <p style="margin-bottom:-1px;text-align:center;">Pick-Up Time:</p>
                                            <p style="display:none"></p>
                                            <div class="col">
                                                <p>1st: <span style="font-weight: 500; color: #525151;">
                                                        <?php echo date("H:i a", strtotime($first_pickUp_time)) ?>
                                                    </span></p>
                                            </div>
                                            <p style="display:none"></p>
                                            <div class="col">
                                                <p style="text-align: end;">2nd:<span style="font-weight: 500; color: #525151;">
                                                        <?php echo date("H:i a", strtotime($second_pickUp_time)) ?>
                                                    </span></p>
                                            </div>

                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-5 box dropInfo">
                            <p class="boxHeader">Drop-Off</p>
                            <div class="row">
                                <div class="col">
                                    <p>Address:</p>
                                </div>
                                <div class="col">
                                    <p>
                                        <?php echo $dropOff_address ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php //include("footer.php") ?>
    <!--  -->

    <!-- Background -->
    <!-- <div class="bgclass">
        <div class="gradient"></div>
    </div> -->
    <!--  -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="scripts/viewQuote.js"></script>

</body>

</html>