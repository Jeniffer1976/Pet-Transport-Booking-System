<?php

// // request quote
// session_start();
// include("dbFunctions.php");

// $servicetype = $_POST['servicetype'];
// $pickupaddress = $_POST['pickupaddress'];

// $firstNameSI = $_POST['firstNameSI'];
// $lastNameSI = $_POST['lastNameSI'];
// $contactSI = $_POST['contactSI'];
// $emailSI = $_POST['emailSI'];

// $dropoffaddress = $_POST['dropoffaddress'];
// $firstNameRI = $_POST['firstNameRI'];
// $lastNameRI = $_POST['lastNameRI'];
// $contactRI = $_POST['contactRI'];
// $emailRI = $_POST['emailRI'];
// $owner_id = $_SESSION['owner_id'];

// //save to database
// $insertSI = "INSERT INTO senderrecipient_details 
//     (sr_id, first_name, last_name, contact, email) 
//     VALUES 
//     (NULL, '$firstNameSI', '$lastNameSI', '$contactSI', '$emailSI')";

// $insertSIStatus = mysqli_query($link, $insertSI) or die(mysqli_error($link));
// $latest_SIid = mysqli_insert_id($link);

// $insertRI = "INSERT INTO senderrecipient_details 
//     (sr_id, first_name, last_name, contact, email) 
//     VALUES 
//     (NULL, '$firstNameRI', '$lastNameRI', '$contactRI', '$emailRI')";

// $insertRIStatus = mysqli_query($link, $insertRI) or die(mysqli_error($link));
// $latest_RIid = "mysqli_insert_id($link)";

// $insertQuote = "INSERT INTO quote 
//     (quote_id, owner_id, service_type, pickUp_address, dropOff_address, sender_id, recipient_id) 
//     VALUES 
//     (NULL, '$owner_id', '$servicetype', '$pickupaddress', '$dropoffaddress', '$latest_SIid', '$latest_RIid')";

// mysqli_query($link, $insertQuote) or die(mysqli_error($link));
// $lastest_quoteId = mysqli_insert_id($link);


// $conn = new PDO('mysql:host=localhost;dbname=waggingwheel_v1', 'root', '');

// foreach ($_POST['petFname'] as $key => $value) {
//     $petSql = "INSERT INTO pet (quote_id, first_name, last_name, type, breed, age, weight, height, width, additional_info) 
//                         VALUES (:quoteid, :fname, :lname, :type, :breed, :age, :weight, :height, :width, :additional_info)";

//     $petStmt = $conn->prepare($petSql);
//     $petStmt->execute([
//         'quoteid' => $lastest_quoteId,
//         'fname' => $value,
//         'lname' => $_POST['petLname'][$key],
//         'type' => $_POST['petType'][$key],
//         'breed' => $_POST['breed'][$key],
//         'age' => $_POST['age'][$key],
//         'weight' => $_POST['weight'][$key],
//         'height' => $_POST['height'][$key],
//         'width' => $_POST['width'][$key],
//         'additional_info' => $_POST['addInfo'][$key]
//     ]);
// }

// foreach ($_POST['petFname'] as $key => $value) {
//     $petSql = "INSERT INTO pet (quote_id, first_name, last_name, type, breed, age, weight, height, width, additional_info) 
//                         VALUES (:quoteid, :fname, :lname, :type, :breed, :age, :weight, :height, :width, :additional_info)";

//     $petStmt = $conn->prepare($petSql);
//     $petStmt->execute([
//         'quoteid' => $lastest_quoteId,
//         'fname' => $value,
//         'lname' => $_POST['petLname'][$key],
//         'type' => $_POST['petType'][$key],
//         'breed' => $_POST['breed'][$key],
//         'age' => $_POST['age'][$key],
//         'weight' => $_POST['weight'][$key],
//         'height' => $_POST['height'][$key],
//         'width' => $_POST['width'][$key],
//         'additional_info' => $_POST['addInfo'][$key]
//     ]);
// }
// echo "Items inserted successfully";

// request quote
session_start();
include("dbFunctions.php");

// $firstName = $_POST['firstName'];
// $lastName = $_POST['lastName'];
// $email = $_POST['email'];
$owner_fnameSession = $_SESSION['firstName'];
$owner_lnameSession = $_SESSION['lastName'];
$owner_emailSession = $_SESSION['email'];
$owner_mobileSession = $_SESSION['mobile'];

$servicetype = $_POST['servicetype'];

// $pickupdate = $_POST['pickupdate'];
// $firstpickup = $_POST['firstpickup'];
// $secondpickup = $_POST['secondpickup'];
$pickupaddress = $_POST['pickupaddress']; //what is this

$firstNameSI = $_POST['firstNameSI'];
$lastNameSI = $_POST['lastNameSI'];
$contactSI = $_POST['contactSI'];
$emailSI = $_POST['emailSI'];
$tickSI = $_POST['tickSI'];

$dropoffaddress = $_POST['dropoffaddress']; //what is this
$firstNameRI = $_POST['firstNameRI'];
$lastNameRI = $_POST['lastNameRI'];
$contactRI = $_POST['contactRI'];
$emailRI = $_POST['emailRI'];

$tripType = $_POST['tripToggle'];

$tickRI = $_POST['tickRI'];

//save to database
$SIExists = false;
$SRExists = false;

$SIExistId = "";
$SRExistId = "";

// $insertSIQuery = "";
// $insertRIQuery = "";

if (isset($tickSI)) {
    $SIExistQuery = "SELECT sr_id FROM senderrecipient_details 
                    WHERE contact = '$owner_mobileSession' 
                    AND email = '$owner_emailSession'";
    $SIExistStatus = mysqli_query($link, $SIExistQuery) or die(mysqli_error($link));


    if (mysqli_num_rows($SIExistStatus) == 1) {
        $row = mysqli_fetch_array($SIExistStatus);
        $SIExistId = $row['sr_id'];
        $SIExists = true;
    } else {
        $insertSIQuery = "INSERT INTO senderrecipient_details 
        (sr_id, first_name, last_name, contact, email)  
        VALUES 
        (NULL, '$owner_fnameSession', '$owner_lnameSession', '$owner_mobileSession', '$owner_emailSession');";
        $insertSIStatus = mysqli_query($link, $insertSIQuery) or die(mysqli_error($link));
        $lastest_SIid = mysqli_insert_id($link);

    }


} else {

    $SIExistQuery = "SELECT sr_id FROM senderrecipient_details 
                    WHERE contact = '$contactSI' 
                    AND email = '$emailSI'";
    $SIExistStatus = mysqli_query($link, $SIExistQuery) or die(mysqli_error($link));


    if (mysqli_num_rows($SIExistStatus) == 1) {
        $row = mysqli_fetch_array($SIExistStatus);
        $SIExistId = $row['sr_id'];
        $SIExists = true;
    } else {
        $insertSIQuery = "INSERT INTO senderrecipient_details 
        (sr_id, first_name, last_name, contact, email) 
        VALUES 
        (NULL, '$firstNameSI', '$lastNameSI', '$contactSI', '$emailSI');";
        $insertSIStatus = mysqli_query($link, $insertSIQuery) or die(mysqli_error($link));
        $lastest_SIid = mysqli_insert_id($link);

    }

}

// $SIrow = mysqli_fetch_array($insertSIStatus);
// $lastest_SIid = $SIrow['last_insert_id()'];


// $latest_SIidQuery = "SELECT MAX(sr_id) AS latest_sr_id FROM senderrecipient_details";
if (isset($tickRI)) {
    $SRExistQuery = "SELECT sr_id FROM senderrecipient_details 
                    WHERE contact = '$owner_mobileSession' 
                    AND email = '$owner_emailSession'";
    $SRExistStatus = mysqli_query($link, $SRExistQuery) or die(mysqli_error($link));

    if (mysqli_num_rows($SRExistStatus) == 1) {
        $row = mysqli_fetch_array($SRExistStatus);
        $SRExistId = $row['sr_id'];
        $SRExists = true;
    } else {
        $insertRIQuery = "INSERT INTO senderrecipient_details 
        (sr_id, first_name, last_name, contact, email) 
        VALUES 
        (NULL, '$owner_fnameSession', '$owner_lnameSession', '$owner_mobileSession', '$owner_emailSession');
        ";
        $insertRIStatus = mysqli_query($link, $insertRIQuery) or die(mysqli_error($link));
        $lastest_RIid = mysqli_insert_id($link);

    }

} else {

    $SRExistQuery = "SELECT sr_id FROM senderrecipient_details 
    WHERE contact = '$contactRI' 
    AND email = '$emailRI'";
    $SRExistStatus = mysqli_query($link, $SRExistQuery) or die(mysqli_error($link));

    if (mysqli_num_rows($SRExistStatus) == 1) {
        $row = mysqli_fetch_array($SRExistStatus);
        $SRExistId = $row['sr_id'];
        $SRExists = true;
    } else {
        $insertRIQuery = "INSERT INTO senderrecipient_details 
        (sr_id, first_name, last_name, contact, email) 
        VALUES 
        (NULL, '$firstNameRI', '$lastNameRI', '$contactRI', '$emailRI');
        ";
        $insertRIStatus = mysqli_query($link, $insertRIQuery) or die(mysqli_error($link));
        $lastest_RIid = mysqli_insert_id($link);

    }
}


// $RIrow = mysqli_fetch_array($insertRIStatus);
// $lastest_RIid = $RIrow['last_insert_id()'];
// $latest_RIidQuery = "SELECT MAX(sr_id) AS latest_sr_id FROM senderrecipient_details";

// $insertPDQuery = "INSERT INTO pickup_details 
//     (pickUp_id, pickUp_date, first_pickUp_time, second_pickUp_time) 
//     VALUES 
//     (NULL, '$pickupdate', '$firstpickup', '$secondpickup');
//     SELECT LAST_INSERT_ID();";


// $insertPDStatus = mysqli_query($link, $insertPDQuery) or die(mysqli_error($link));    
// $pickuprow = mysqli_fetch_array($insertPDStatus);
// $lastest_pickUpid = $pickuprow['LAST_INSERT_ID()'];

// $latest_picukUpidQuery = "SELECT MAX(pickUp_id) AS latest_pickUp_id FROM pickup_details";
$owner_id = $_SESSION['owner_id'];

if ($SIExists) {
    $insertSIid = $SIExistId;
} else {
    $insertSIid = $lastest_SIid;
}

if ($SRExists) {
    $insertSRid = $SRExistId;
} else {
    $insertSRid = $lastest_RIid;
}

$insertQuoteQuery = "INSERT INTO quote 
    (`quote_id`, `owner_id`, `service_type`, `pickUp_address`, `dropOff_address`, `sender_id`, `recipient_id`, `status`,`quote_date`, `trip_type`) 
    VALUES 
    (NULL, '$owner_id', '$servicetype', '$pickupaddress', '$dropoffaddress', '$insertSIid', '$insertSRid', 'unassigned', now(), '$tripType')";

mysqli_query($link, $insertQuoteQuery) or die(mysqli_error($link));

$lastest_quoteId = mysqli_insert_id($link);

foreach ($_POST['pickupdate'] as $key => $value) {
    $pickUpSql = "INSERT INTO  pickup_details (quote_id, pickUp_date, first_pickUp_time, second_pickUp_time) 
                                    VALUES (:quoteid, :pickupDate, :firstPickup, :secondPickup )";

    $petStmt = $conn->prepare($pickUpSql);

    if (isset($tripToggle)) {
        $petStmt->execute([
            'quoteid' => $lastest_quoteId,
            'pickupDate' => $value,
            'firstPickup' => $_POST['firstpickup'][$key],
            'secondPickup' => $_POST['secondpickup'][$key],
        ]);
    } else {
        $petStmt->execute([
            'quoteid' => $lastest_quoteId,
            'pickupDate' => $value,
            'firstPickup' => $_POST['onepickup'][$key],
            'secondPickup' => null
        ]);
    }

}


foreach ($_POST['petFname'] as $key => $value) {
    $petSql = "INSERT INTO pet (quote_id, first_name, last_name, type, breed, age, weight, height, width, additional_info) 
                        VALUES (:quoteid, :fname, :lname, :type, :breed, :age, :weight, :height, :width, :additional_info)";

    $petStmt = $conn->prepare($petSql);
    $petStmt->execute([
        'quoteid' => $lastest_quoteId,
        'fname' => $value,
        'lname' => $_POST['petLname'][$key],
        'type' => $_POST['petType'][$key],
        'breed' => $_POST['breed'][$key],
        'age' => $_POST['age'][$key],
        'weight' => $_POST['weight'][$key],
        'height' => $_POST['height'][$key],
        'width' => $_POST['width'][$key],
        'additional_info' => $_POST['addInfo'][$key]
    ]);
}
echo "Items inserted successfully";

?>