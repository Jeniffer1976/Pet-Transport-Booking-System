<?php
include_once("loginFunctions.php");

if (isset($_GET['logout'])) {
    logout();
    echo "test";
}

?>

<style>
    <?php include("stylesheets/common.css") ?>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<nav class="navbar sticky-top navbar-expand-lg">
    <div class="m-0 order-0 order-md-1 position-absolute main-logo">
        <a class="mx-auto" href="index.php">
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
            </ul>
        </div>

        <ul class='navbar-nav'>
            <li class="nav-item dropdown">
                <a class="nav-link" role="button" data-bs-toggle="dropdown">
                    <?php if (isset($_SESSION['profile'])) {
                        $profile = $_SESSION['profile']
                            ?>
                        <img src="images/profileImg/<?php echo $profile ?>" height="40" width="40"
                            style="object-fit: cover; border-radius: 50%;">
                    <?php } else { ?>
                        <img src="images/person.svg" height="35" width="35">
                        
                    <?php } ?>
                </a>

                <ul class="dropdown-menu" style="left: -7em;position: absolute">
                    <?php if (isset($_SESSION['username'])) { ?> <!-- if user is logged in -->
                        <li class="ms-3">
                            <h5>Hi,
                                <?php echo $_SESSION['firstName'] ?>
                                <h5>
                        </li>
                        <li><a class="dropdown-item" href="accountOverview.php">View profile</a></li>
                        <li><a class="dropdown-item text2" onclick="location.href = '?logout'">Sign out <i
                                    class="fas fa-sign-out-alt ms-2"></i></a></li>
                    <?php } else { ?>
                        <li><a class="dropdown-item" href="signIn.php">Sign In <i class="fas fa-sign-in-alt ms-2"></i></a>
                        </li>
                        <li><a style="color:#1E53B3" class="dropdown-item" href="signUp.php">Create an account</a></li>
                    <?php } ?>

                </ul>
            </li>
        </ul>
        <div>
        
        </div>
    </div>
</nav>