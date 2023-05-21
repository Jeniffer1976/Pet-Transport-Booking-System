<?php
// $db_host = "localhost";
// $db_username = "id20783214_admin";
// $db_password = "3iLk7o4sT+";
// $db_name = "id20783214_wagginwheeldb";


// for testing
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "c203_wagginwheelsdb";
// 
$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// $db_host = "localhost";
// $db_username = "root";
// $db_password = "";
// $db_name = "id20783214_wagginwheeldb";

if (!$link) {
    die(mysqli_error($link));
    // alternative way to display the error:
    // die(mysqli_connect_error());
}

// function login($username, $password)
// {
//     global $link;
//     $queryCheck = "SELECT * FROM users
//           WHERE username='$username'
//           AND password = '$password'";

//     $resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

//     if (mysqli_num_rows($resultCheck) == 1) {
//         header("Location: index.php"); 
//         exit();

//     } else {
//         return "That's not the right username or password. <br>Please try again";
//     }
// }
?>