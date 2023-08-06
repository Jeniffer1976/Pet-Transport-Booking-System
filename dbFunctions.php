<?php
// $db_host = "localhost";
// $db_username = "id20783214_admin";
// $db_password = "3iLk7o4sT+";
// $db_name = "id20783214_wagginwheeldb";


// for testing
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "id20783214_wagginwheeldb";


$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
    // alternative way to display the error:
    // die(mysqli_connect_error());
}

$conn = new PDO('mysql:host=localhost;dbname=id20783214_wagginwheeldb', 'root', '');

$db = new mysqli("localhost", "root", "", "id20783214_wagginwheeldb");  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}

?>