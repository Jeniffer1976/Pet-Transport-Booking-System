<?php

$username = $_SESSION['username'];
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$email = $_SESSION['email'];
$mobile = $_SESSION['mobile'];
$password = $_SESSION['password'];
$role = $_SESSION['role'];

if ($role == 'admin') {
    $birthdate = $_SESSION['birthDate'];
    $gender = $_SESSION['gender'];

    if ($gender == 'F') {
        $gender = 'Female';
    } else {
        $gender = 'Male';
    }
}

?>
<style>
    <?php include("stylesheets/view_quoteBtn.css") ?>
</style>

<!--Bootstrap CSS link take note of version-->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->

<!--Boostrap JS link-->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script> -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ownerInfoModal">
    View Quote
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
                    <div class="col-5">
                        <span class="para"><b>First Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo ucfirst($firstName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Last Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo ucfirst($lastName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Email:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo $email ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Contact No.:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php
                            $mobile = strval($mobile);

                            $arrMobile = str_split($mobile, 4);

                            echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                            ?>
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#serviceModal" data-bs-toggle="modal">To Type of Service
                    Section</button>
            </div>
        </div>
    </div>
</div>
<!-- -->

<!-- Type of Service Modal -->
<div class="modal fade" id="serviceModal" aria-hidden="true" aria-labelledby="serviceModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="serviceModalLabel">Type of Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Type of Service:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php // echo $service ?>
                            Regular
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <?php //if statement if service adhoc or regular ?>
                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Service Quantity:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $serviceQuantity ?>
                            1
                        </span>
                    </div>
                </div>
                <?php //end of if statement ?>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#ownerInfoModal" data-bs-toggle="modal">Back to Owner's
                    Information</button>
                <button class="btn btn-primary" data-bs-target="#pickUpModal" data-bs-toggle="modal">To Pick Up
                    Information</button>
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
                <?php // for loop for multiple pick up times ?>

                <hr class="rounded">
                <span class="para"><b>Preferred pick up date: <?php //echo the number of pet? ?></b></span>
                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Preferred pick up date:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $pickUpDate[0] ?>
                            18/7/2023
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>First pick up time:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo ($pickUptime[0])[0] ?>
                            12:00
                        </span>
                    </div>
                </div>
                <hr class="rounded">

                <?php //if statement for one-way or two-way ?>
                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Second pick up time:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo ($pickUptime[0])[1] ?>
                            16:00
                        </span>
                    </div>
                </div>
                <?php //end of if statement ?>
                <hr class="rounded">
                <?php //end of for loop ?>

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Address:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $pickUpAddress ?>
                            Blk 9 #01-12 Dempsey Road, Dempsey Hill
                        </span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#serviceModal" data-bs-toggle="modal">Back to Type of
                    Service Section</button>
                <button class="btn btn-primary" data-bs-target="#senderModal" data-bs-toggle="modal">To Sender's
                    Information</button>
            </div>
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
                <?php //if statement if owner is the sender ?>
                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>First Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo ucfirst($firstName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Last Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo ucfirst($lastName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Email:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo $email ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Contact No.:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php
                            $mobile = strval($mobile);

                            $arrMobile = str_split($mobile, 4);

                            echo '+65 ' . $arrMobile[0] . " " . $arrMobile[1];
                            ?>
                        </span>
                    </div>
                </div>
                <?php //end of if statement ?>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#pickUpModal" data-bs-toggle="modal">Back to Pick Up Section</button>
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
                    <div class="col-5">
                        <span class="para"><b>Address:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $dropOffAddress ?>
                            7 Bukit Batok Street 22
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
                    <div class="col-5">
                        <span class="para"><b>First Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo ucfirst($firstName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Last Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo ucfirst($lastName) ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Email:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php echo $email ?>
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Contact No.:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php
                            $mobile = strval($mobile);

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
                <?php // for loop for multiple pick up times ?>

                <hr class="rounded">
                <span class="para"><b>Pet<?php //echo the number of pet? ?>'s Info:</b></span>
                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>First Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo ucfirst($firstNamePet) ?>
                            George
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Last Name:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo ucfirst($lastNamePet) ?>
                            The Second
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Type of pet:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $petType ?>
                            Dog
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Breed:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $petBreed ?>
                            German Shepherd
                        </span>
                    </div>
                </div>

                <!-- Size of pet -->

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Weight (Kg):</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $petWeight ?>
                            32.5Kg
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Height (Cm):</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php // echo $petHeight ?>
                            62Cm
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Width (Cm):</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //ecjp $petWidth ?>
                            107Cm
                        </span>
                    </div>
                </div>

                <hr class="rounded">

                <div class="row">
                    <div class="col-5">
                        <span class="para"><b>Addtional Comments:</b></span>
                    </div>

                    <div class="col">
                        <span class="para">
                            <?php //echo $petComment ?>
                            Allergic to chocolate
                        </span>
                    </div>
                </div>

                <?php //end of for loop ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-target="#recipientModal" data-bs-toggle="modal">Back to Recipient's
                    Information</button>
            </div>
        </div>
    </div>
</div>
<!-- -->