<?php

$conn = new PDO('mysql:host=localhost;dbname=waggingwheel_v1', 'root', '');
foreach ($_POST['petFname'] as $key => $value) {
    $petSql = "INSERT INTO pet (quote_id, first_name, last_name, type, breed, age, weight, height, width, additional_info) 
                        VALUES ('1', :fname, :lname, :type, :breed, :age, :weight, :height, :width, :additional_info)";

    $petStmt = $conn->prepare($petSql);
    $petStmt->execute([
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

// request quote
session_start();
include("dbFunctions.php");

// if ($_SERVER['REQUEST_METHOD'] == "POST") //if u request then it will proceed wait then
if (isset($_POST['requestQuote'])) {
    $message = "";
    $isSuccessful = false;
    //something was posted
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $servicetype = $_POST['servicetype'];
    $pickupdate = $_POST['pickupdate'];
    $firstpickup = $_POST['firstpickup'];
    $secondpickup = $_POST['secondpickup'];
    $pickupaddress = $_POST['pickupaddress'];
    $firstNameSI = $_POST['firstNameSI'];
    $lastNameSI = $_POST['lastNameSI'];
    $contactSI = $_POST['contactSI'];
    $emailSI = $_POST['emailSI'];
    $tickSI = $_POST['tickSI'];
    $dropoffaddress = $_POST['dropoffaddress'];
    $firstNameRI = $_POST['firstNameRI'];
    $lastNameRI = $_POST['lastNameRI'];
    $contactRI = $_POST['contactRI'];
    $emailRI = $_POST['emailRI'];
    $tickRI = $_POST['tickRI'];

    //save to database
    $insertSI = "INSERT INTO senderrecipient_details 
    (sr_id, first_name, last_name, contact, email) 
    VALUES 
    (NULL, '$firstNameSI', '$lastNameSI', '$contactSI', '$emailSI')";

    $latest_SIid = "SELECT MAX(sr_id) AS latest_sr_id FROM senderrecipient_details";

    $insertRI = "INSERT INTO senderrecipient_details 
    (sr_id, first_name, last_name, contact, email) 
    VALUES 
    (NULL, '$firstNameRI', '$lastNameRI', '$contactRI', '$emailRI')";

    $latest_RIid = "SELECT MAX(sr_id) AS latest_sr_id FROM senderrecipient_details";

    $insertPD = "INSERT INTO pickup_details 
    (pickUp_id, pickUp_date, first_pickUp_time, second_pickUp_time) 
    VALUES 
    (NULL, '$pickupdate', '$firstpickup', '$secondpickup')";

    $insertQuote = "INSERT INTO quote 
    (`quote_id`, `owner_id`, `pickUp_id`, `service_type`, `pickUp_address`, `dropOff_address`, `sender_id`, `recipient_id`) 
    VALUES 
    (NULL, '2', '2', '$servicetype', '$pickupaddress', '$dropoffaddress', '3', '1')";

}

?>