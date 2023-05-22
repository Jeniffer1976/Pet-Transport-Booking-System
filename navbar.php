<?php 
include_once("loginFunctions.php") ; 
 
if (isset($_SESSION['user_id'])) { 
    echo $_SESSION['firstName']; 
} 
 
if (isset($_GET['logout'])) { 
    logout(); 
} 
 
?>

<style>
<?php include("stylesheets/common.css") ?>
</style>

<nav class="navbar sticky-top navbar-expand-lg">
    <div class="m-0 order-0 order-md-1 position-absolute main-logo">
        <a class="mx-auto" href="#">
            <img src="images/logo.svg" height="120" width="120">
        </a>
    </div>
    <div class="container-fluid con1">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text" href="#">Home</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link text" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text" href="#">Contact Us</a>
                </li>
            </ul>
        </div>

        <ul class='navbar-nav'>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><img src="images/person.svg" height="25" width="25"></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="">View profile</a></li>
                    <li><a class="dropdown-item text2" href="">Sign out <i class="bi bi-box-arrow-left"></i></a></li>
                </ul>
              </li>
        </ul>
        <div>
            <button type="button" class="btn rounded-pill primaryBtn1 gradient2 text">Request a quote</button>
        </div>
    </div>
</nav>
