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

$tripToggle = $_POST['tripToggle'];
$tickRI = $_POST['tickRI'];

//save to database
if (isset($tickSI)) {
    $insertSIQuery = "INSERT INTO senderrecipient_details 
    (sr_id, first_name, last_name, contact, email) 
    VALUES 
    (NULL, '$owner_fnameSession', '$owner_lnameSession', '$owner_mobileSession', '$owner_emailSession');";
} else {
    $insertSIQuery = "INSERT INTO senderrecipient_details 
    (sr_id, first_name, last_name, contact, email) 
    VALUES 
    (NULL, '$firstNameSI', '$lastNameSI', '$contactSI', '$emailSI');";
}

$insertSIStatus = mysqli_query($link, $insertSIQuery) or die(mysqli_error($link));
// $SIrow = mysqli_fetch_array($insertSIStatus);
// $lastest_SIid = $SIrow['last_insert_id()'];
$lastest_SIid = mysqli_insert_id($link);

// $latest_SIidQuery = "SELECT MAX(sr_id) AS latest_sr_id FROM senderrecipient_details";
if (isset($tickRI)) {
    $insertRIQuery = "INSERT INTO senderrecipient_details 
    (sr_id, first_name, last_name, contact, email) 
    VALUES 
    (NULL, '$owner_fnameSession', '$owner_lnameSession', '$owner_mobileSession', '$owner_emailSession');
    ";
} else {
    $insertRIQuery = "INSERT INTO senderrecipient_details 
    (sr_id, first_name, last_name, contact, email) 
    VALUES 
    (NULL, '$firstNameRI', '$lastNameRI', '$contactRI', '$emailRI');
    ";
}


$insertRIStatus = mysqli_query($link, $insertRIQuery) or die(mysqli_error($link));
// $RIrow = mysqli_fetch_array($insertRIStatus);
// $lastest_RIid = $RIrow['last_insert_id()'];
$lastest_RIid = mysqli_insert_id($link);
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

$insertQuoteQuery = "INSERT INTO quote 
    (`quote_id`, `owner_id`, `service_type`, `pickUp_address`, `dropOff_address`, `sender_id`, `recipient_id`) 
    VALUES 
    (NULL, '$owner_id', '$servicetype', '$pickupaddress', '$dropoffaddress', '$lastest_SIid', '$lastest_RIid')";

mysqli_query($link, $insertQuoteQuery) or die(mysqli_error($link));

$lastest_quoteId = mysqli_insert_id($link);

$conn = new PDO('mysql:host=localhost;dbname=waggingwheel_v1', 'root', '');

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