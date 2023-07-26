<!-- <style>
    <?php //include("stylesheets/view_quoteBtn.css") ?>
</style> -->

<!--Bootstrap CSS link take note of version-->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->

<!--Boostrap JS link-->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script> -->

<!-- Button trigger modal -->
<button type="button" id="viewQuoteBtn" class="actionBtns" data-bs-toggle="modal" data-bs-target="#ownerInfoModal" onclick="">
    <i class="fas fa-eye text-secondary"></i>
</button>

<!-- Owner's Info Modal -->
<div class="modal fade" id="ownerInfoModal" aria-labelledby="ownerInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ownerInfoModalLabel">Owner's Infomation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>First Name:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para" id="modal-PO_fname">
                            <?php echo ucfirst($po_firstName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Last Name:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo ucfirst($po_lastName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Email:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo $po_email ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Contact No.:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php
                            $mobile = strval($po_mobile);

                            $arrMobile = str_split($mobile, 4);

                            echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                            ?>
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#pickUpModal" data-bs-toggle="modal">To Pick Up
                    Infomation</button>
            </div>
        </div>
    </div>
</div>
<!-- -->



<!-- Pick Up Info Modal -->
<div class="modal fade" id="pickUpModal" aria-hidden="true" aria-labelledby="pickUpModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pickUpModalLabel">Pick Up Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Type of Service:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo $service_type ?>
                        </span>
                    </div>
                </div>
                <?php // for loop for multiple pick up times
                for ($u = 0; $u < count($pickupContent); $u++) {
                    $pickUp_date = $pickupContent[$u]['pickUp_date'];
                    $first_pickUp_time = $pickupContent[$u]['first_pickUp_time'];
                    $second_pickUp_time = $pickupContent[$u]['second_pickUp_time'];
                    ?>

                    <hr class="rounded">
                    <!-- <span class="para"><b>Preferred pick up date:

                        </b><br></span> -->
                    <!-- <hr class="rounded"> -->

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>Preferred pick up date:</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo $pickUp_date ?>
                            </span>
                        </div>
                    </div>

                    <!-- <hr class="rounded"> -->
                    <?php if (is_null($second_pickUp_time)) { ?>
                        <div class="row">
                            <div class="col-5" align="left">
                                <span class="para"><b>Pick up time:</b></span>
                            </div>

                            <div class="col" align="right">
                                <span class="para">
                                    <?php echo date("H:i a", strtotime($first_pickUp_time)) ?>
                                </span>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-5" align="left">
                                <span class="para"><b>First pick up time:</b></span>
                            </div>

                            <div class="col" align="right">
                                <span class="para">
                                    <?php echo date("H:i a", strtotime($first_pickUp_time)) ?>
                                </span>
                            </div>
                        </div>
                        <!-- <hr class="rounded"> -->

                        <?php //if statement for one-way or two-way ?>
                        <div class="row">
                            <div class="col-5" align="left">
                                <span class="para"><b>Second pick up time:</b></span>
                            </div>

                            <div class="col" align="right">
                                <span class="para">
                                    <?php echo date("H:i a", strtotime($second_pickUp_time)) ?>
                                </span>
                            </div>
                        </div>
                    <?php } ?>

                <?php } ?>
                <?php //end of if statement ?>
                <!-- <hr class="rounded"> -->
                <?php //end of for loop ?>

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Address:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo $pickUp_address ?>
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#ownerInfoModal" data-bs-toggle="modal">Back to Owner's
                    Information</button>
                <button class="btn btn-primary" data-bs-target="#senderModal" data-bs-toggle="modal">To Sender's
                    Information</button>
            </div>
            <!-- <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#serviceModal" data-bs-toggle="modal">Back to Type of
                    Service Section</button>
                <button class="btn btn-primary" data-bs-target="#senderModal" data-bs-toggle="modal">To Sender's
                    Information</button>
            </div> -->
        </div>
    </div>
</div>
<!-- -->

<!-- Sender's Info Modal -->
<div class="modal fade" id="senderModal" aria-hidden="true" aria-labelledby="pickUpModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pickUpModalLabel">Sender's Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Sender's info -->
                <?php

                ?>
                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>First Name:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo ucfirst($s_firstName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Last Name:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo ucfirst($s_lastName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Email:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo $s_email ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Contact No.:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php
                            $mobile = strval($s_contact);

                            $arrMobile = str_split($mobile, 4);

                            echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                            ?>
                        </span>
                    </div>
                </div>
                <?php //end of if statement ?>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#pickUpModal" data-bs-toggle="modal">Back to Pick Up
                    Section</button>
                <button class="btn btn-primary" data-bs-target="#dropOffModal" data-bs-toggle="modal">To Drop Off
                    Information</button>
            </div>
        </div>
    </div>
</div>
<!-- -->

<!-- Drop Off Info Modal -->
<div class="modal fade" id="dropOffModal" aria-hidden="true" aria-labelledby="dropOffModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="dropOffModalLabel">Drop Off Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Address:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo $dropOff_address ?>
                            <!-- 7 Bukit Batok Street 22 -->
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#senderModal" data-bs-toggle="modal">Back to Sender's
                    Information</button>
                <button class="btn btn-primary" data-bs-target="#petinfoModal" data-bs-toggle="modal">To Recipient's
                    Information</button>
            </div>
        </div>
    </div>
</div>
<!-- -->

<!-- Recipient's Info Modal -->
<div class="modal fade" id="recipientModal" aria-hidden="true" aria-labelledby="dropOffModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="dropOffModalLabel">Recipient's Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Recipient's info -->
                <?php //if statement if owner is the recipient ?>
                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>First Name:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo ucfirst($r_firstName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Last Name:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo ucfirst($r_lastName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Email:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php echo $r_email ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5" align="left">
                        <span class="para"><b>Contact No.:</b></span>
                    </div>

                    <div class="col" align="right">
                        <span class="para">
                            <?php
                            $mobile = strval($r_contact);

                            $arrMobile = str_split($mobile, 4);

                            echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                            ?>
                        </span>
                    </div>
                </div>
                <?php //end of if statement ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#dropOffModal" data-bs-toggle="modal">Back to Drop Off
                    Information</button>
                <button class="btn btn-primary" data-bs-target="#petinfoModal" data-bs-toggle="modal">To Pets'
                    Information</button>
            </div>
        </div>
    </div>
</div>
<!-- -->

<!-- Pet Info Modal -->
<div class="modal fade" id="petinfoModal" aria-hidden="true" aria-labelledby="petinfoModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="petinfoModalLabel">Pets' Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php // for loop for multiple pets
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
                    $add_info = $petContent[$p]['additional_info']

                        ?>
                    <hr class="rounded">
                    <?php if ($pet_count == 1) { ?>
                        <span class="para">
                            <b>Pet's Info:</b>
                        </span>
                    <?php } else { ?>
                        <span class="para">
                            <b>Pet
                                <?php echo $p + 1 ?>'s Info:
                            </b>
                        </span>
                    <?php } ?>
                    <hr class="rounded">

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>First Name:</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo ucfirst($p_firstName) ?>
                            </span>
                        </div>
                    </div>

                    <!-- <hr class="rounded"> -->

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>Last Name:</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo ucfirst($p_lastName) ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>Type of pet:</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo $type ?>
                            </span>
                        </div>
                    </div>

                    <!-- <hr class="rounded"> -->

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>Breed:</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo $breed ?>
                            </span>
                        </div>
                    </div>

                    <!-- Size of pet -->

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>Weight (Kg):</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo $weight . "Kg" ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>Height (Cm):</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo $height . "Cm" ?>
                            </span>
                        </div>
                    </div>

                    <!-- <hr class="rounded"> -->

                    <div class="row">
                        <div class="col-5" align="left">
                            <span class="para"><b>Width (Cm):</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo $width . "Cm" ?>
                            </span>
                        </div>
                    </div>

                    <!-- <hr class="rounded"> -->

                    <div class="row mb-5">
                        <div class="col-5" align="left">
                            <span class="para"><b>Addtional Comments:</b></span>
                        </div>

                        <div class="col" align="right">
                            <span class="para">
                                <?php echo $add_info ?>
                            </span>
                        </div>
                    </div>

                <?php } ?>



                <?php //end of for loop ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#recipientModal" data-bs-toggle="modal">Back to
                    Recipient's
                    Information</button>
            </div>
        </div>
    </div>
</div>
<!-- -->