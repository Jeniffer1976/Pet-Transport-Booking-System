<?php
include "dbFunctions.php";
if (session_status() === PHP_SESSION_NONE)
    session_start();

function login($username, $password)
{
    global $link;

    $userPassQuery = "SELECT * FROM users U
    INNER JOIN pet_owner PO 
    ON U.username = PO.username 
    WHERE U.username ='$username' 
    AND password = '$password'"; // check for correct username and password

    $userQuery = "SELECT username FROM users WHERE username = '$username'"; // check if username exists

    $userStatus = mysqli_query($link, $userQuery) or die(mysqli_error($link));
    $userPassStatus = mysqli_query($link, $userPassQuery) or die(mysqli_error($link));

    if (mysqli_num_rows($userStatus) == 1) { // check if username exists
        if (mysqli_num_rows($userPassStatus) == 1) { // check for correct username and password
            $row = mysqli_fetch_array($userPassStatus);
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['first_Name'];
            $_SESSION['lastName'] = $row['last_Name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['mobile'] = $row['mobile'];
            header("Location: index.php");
            exit();

        } else {
            return "That's not the right password.";
        }
    } else {
        return "That username does not exist.";
    }
}

function logout()
{
    if (isset($_SESSION['username'])) {
        session_destroy();
        header("Location: index.php");
        exit();
        // $_SESSION = array(); 
    }
}
?>