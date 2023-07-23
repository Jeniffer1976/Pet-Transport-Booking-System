<?php
include "dbFunctions.php";
if (session_status() === PHP_SESSION_NONE)
    session_start();

function login($username, $password)
{
    global $link;

    $usersQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $usernameQuery = "SELECT username FROM users WHERE username = '$username'"; // check if username exists

    $userStatus = mysqli_query($link, $usersQuery) or die(mysqli_error($link));
    $usersRow = mysqli_fetch_array($userStatus);

    $usernameStatus = mysqli_query($link, $usernameQuery) or die(mysqli_error($link));

    if (mysqli_num_rows($usernameStatus) == 1) { // check if username exists

        if ($usersRow["role"]=="customer") {

            $customerPassQuery = "SELECT * FROM users U
            INNER JOIN pet_owner PO 
            ON U.username = PO.username 
            WHERE U.username ='$username' 
            AND password = '$password'"; // check for correct username and password

            $customerPassStatus = mysqli_query($link, $customerPassQuery) or die(mysqli_error($link));

            if (mysqli_num_rows($customerPassStatus) == 1) { // check for correct username and password
                $row = mysqli_fetch_array($customerPassStatus);
                $_SESSION['owner_id'] = $row['owner_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['firstName'] = $row['first_Name'];
                $_SESSION['lastName'] = $row['last_Name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['mobile'] = $row['mobile'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['profile'] = $row['profile_pic'];
                $_SESSION['role'] = $row['role'];
                header("Location: index.php");
                exit();

            } else {
                return "That's not the right password.";
            }

        } else {
            $adminPassQuery = "SELECT * FROM users U
            INNER JOIN staff S 
            ON U.username = S.username 
            WHERE U.username ='$username' 
            AND password = '$password'"; // check for correct username and password

            $adminPassStatus = mysqli_query($link, $adminPassQuery) or die(mysqli_error($link));

            if (mysqli_num_rows($adminPassStatus) == 1) { // check for correct username and password
                $row = mysqli_fetch_array($adminPassStatus);
                $_SESSION['username'] = $row['username'];
                $_SESSION['firstName'] = $row['first_Name'];
                $_SESSION['lastName'] = $row['last_Name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['mobile'] = $row['contact_no'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['hireDate'] = $row['hire_date'];
                $_SESSION['resignationDate'] = $row['resignation_date'];
                $_SESSION['birthDate'] = $row['birth_date'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['profile'] = $row['profile_pic'];
                $_SESSION['role'] = $row['role'];
                header("Location: admin.php");
                exit();

            } else {
                return "That's not the right password.";
            }
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