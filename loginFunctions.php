<?php
include "dbFunctions.php";
session_start();

function login($username, $password)
{
    global $link;
    $queryCheck = "SELECT * FROM users
          WHERE username ='$username'
          AND password = '$password'";

    $resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

    if (mysqli_num_rows($resultCheck) == 1) {
        header("Location: index.php"); 
        exit();

    } else {
        return "That's not the right username or password. Please try again";
    }
}
?>