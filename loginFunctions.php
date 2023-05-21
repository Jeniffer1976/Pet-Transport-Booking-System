<?php
include "dbFunctions.php";
if(session_status() === PHP_SESSION_NONE) session_start();

function login($username, $password)
{
    global $link;
    $queryCheck = "SELECT * FROM users, pet_owner
          WHERE username ='$username'
          AND password = '$password'";

    $resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

    if (mysqli_num_rows($resultCheck) == 1) {
        $row = mysqli_fetch_array($resultCheck);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['firstName'] = $row['first_name'];
        $_SESSION['lastName'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile'] = $row['mobile'];
        header("Location: index.php");
        exit();

    } else {
        return "That's not the right username or password. Please try again";
    }
}

function logout(){
    if (isset($_SESSION['user_id'])) {
        session_destroy();
        header("Location: index.php");
		exit();
        // $_SESSION = array();
    }
}
?>