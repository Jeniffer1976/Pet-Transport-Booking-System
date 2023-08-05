<?php
include_once("loginFunctions.php");

if (isset($_SESSION['username'])) {
    $role = $_SESSION['role'];
} else {
    $role = "none";
}

if (isset($_GET['logout'])) {
    logout();
    echo "test";
}

?>

<style>
    <?php include("stylesheets/common.css") ?>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<?php
if ($role != 'admin') { ?>
    <nav class="navbar sticky-top navbar-expand-lg">
        <div class="m-0 order-0 order-md-1 position-absolute main-logo">
        <?php } else { ?>
            <nav class="navbar sticky-top navbar-expand-lg" style='height: 5em;'>
                <div class="m-0 order-0 order-md-1 position-absolute main-logo" style="margin-left: 20px !important; margin-top: 5px !important">
                <?php } ?>
                <?php if ($role != 'admin') { ?>
                    <a class="mx-auto" href="index.php">
                        <img src="images/logo.svg" height="120" width="120">
                    <?php } else { ?>
                        <a class="mx-auto" href="admin.php">
                            <img src="images/logo.svg" height="70" width="70">
                        <?php } ?>
                        </a>
                </div>
                <div class="container-fluid con1">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <?php if ($role != 'admin') { ?>
                                <li class="nav-item active">
                                    <a class="nav-link nav-text" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-text" href="services.php">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-text" href="about.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-text" href="contact.php">Contact Us</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <ul class='navbar-nav'>
                        <li class="nav-item">
                            <?php if (isset($_SESSION['username'])) { ?> <!-- if user is logged in -->
                                <button type="button" class="btn btn-outline-danger rounded-pill mt-2 me-2" onclick="location.href = '?logout'">Sign Out <i class="fas fa-sign-out-alt ms-2"></i></button>

                            <?php } else { ?>
                                <button type="button" class="btn btn-outline-success rounded-pill mt-2 me-2" onclick="document.location='signIn.php'">Sign In <i class="fas fa-sign-in-alt ms-2"></i></button>

                            <?php } ?>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            if ($role == 'admin') {
                        ?> <!-- if user is logged in -->
                                <li class="nav-item" style='margin-top: 5%; color: #1E53B3'>
                                    <span style='font-size: 1.05em; font-weight: 600; font-family: "Nunito"; letter-spacing: 1px'>Hi,
                                        <?php echo $_SESSION['firstName'] ?>!
                                        <span>
                                </li>
                        <?php }
                        } ?>
                        <li class="nav-item dropdown">

                            <a class="nav-link" role="button" data-bs-toggle="dropdown">
                                <?php if (isset($_SESSION['profile'])) {
                                    $profile = $_SESSION['profile']
                                ?>
                                    <!-- <img src="images/profileImg/<?php //echo $profile 
                                                                        ?>" height="40" width="40"
                                    style="object-fit: cover; border-radius: 50%;"> -->
                                    <!-- <img src="data:image/jpg;charset=utf8;base64,<?php // echo base64_encode($profile); 
                                                                                        ?>" height="40" width="40"
                                    style="object-fit: cover; border-radius: 50%;"> -->
                                    <img src="data:image/png;base64,<?php echo stripcslashes(base64_encode($profile)) ?>" height="40" width="40" style="object-fit: cover; border-radius: 50%;" onerror="this.onerror=null; this.src='images/person.svg'">
                                <?php } else { ?>
                                    <i class="fas fa-user-circle profileicon"></i>

                                <?php } ?>
                            </a>
                            <?php
                            if ($role != 'admin') { ?>
                                <ul class="dropdown-menu">
                                <?php } else { ?>
                                    <ul class="dropdown-menu" style="left: -7em;position: absolute">
                                    <?php } ?>
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        if ($role != 'admin') {
                                    ?> <!-- if user is logged in -->
                                            <li class="ms-3">
                                                <h5>Hi,
                                                    <?php echo $_SESSION['firstName'] ?>
                                                    <h5>
                                            </li>
                                        <?php } ?>
                                        <li><a class="dropdown-item" href="accountOverview.php">View profile</a></li>
                                        <li><a class="dropdown-item text2" onclick="location.href = '?logout'">Sign out <i class="fas fa-sign-out-alt ms-2"></i></a></li>
                                    <?php } else { ?>
                                        <li><a class="dropdown-item" href="signIn.php">Sign In <i class="fas fa-sign-in-alt ms-2"></i></a>
                                        </li>
                                        <li><a style="color:#1E53B3" class="dropdown-item" href="signUp.php">Create an
                                                account</a>
                                        </li>
                                    <?php } ?>

                                    </ul>
                        </li>
                    </ul>
                    <?php
                    if ($role != 'admin') { ?>
                        <!-- inbox logo -->
                        <div>
                            <!-- <i class="fas fa-bell inboxicon" onclick="document.location='inbox.php'"></i> -->
                            <span class="fa-stack inboxwhole" onclick="document.location='inbox_new.php'">
                                <i class="fas fa-circle fa-stack-2x inboxbg"></i>
                                <i class="fas fa-bell fa-stack-1x inboxbell"></i>
                            </span>
                        </div>


                        <!-- faq logo -->
                        <div>
                            <i class="fas fa-question-circle faqicon" onclick="document.location='faq.php'"></i>
                        </div>
                    <?php } ?>
                    <div>
                        <?php
                        if ($role != 'admin') {
                            if (isset($_SESSION['username'])) {
                        ?>

                                <button type="button" class="btn rounded-pill gradient2 req-text" onclick="location.href='requestquote.php'">Request a
                                    quote</button>
                            <?php
                            } else {
                            ?>
                                <button type="button" class="btn rounded-pill gradient2 req-text" onclick="openReqErr()">Request a
                                    quote</button>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </nav>