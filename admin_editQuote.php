<?php

include "dbFunctions.php";
$quote_id = $_GET['quote_id'];

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
$profile = $infoRow['profile'];

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