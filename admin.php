<?php
include "loginFunctions.php";

if (!isset($_SESSION['username'])) {

    header("Location: signIn.php");
    exit();
}
global $link;

$currusername = $_SESSION['username'];

$past7daysQuery = "SELECT * FROM pickup_details P INNER JOIN QUOTE Q ON P.quote_id = Q.quote_id WHERE pickUp_date >= (NOW() - INTERVAL 7 DAY) AND pickUp_date <= (NOW() - INTERVAL 1 DAY)";
$past7daysResult = mysqli_query($link, $past7daysQuery) or die(mysqli_error($link));
while ($past7daysnum_rows = mysqli_fetch_array($past7daysResult)) {
    $past7daysContent[] = $past7daysnum_rows;
}

$todayQuery = "SELECT * FROM pickup_details P INNER JOIN QUOTE Q ON P.quote_id = Q.quote_id WHERE DATE(pickUp_date) = DATE(NOW())";
$todayResult = mysqli_query($link, $todayQuery) or die(mysqli_error($link));
while ($todaynum_rows = mysqli_fetch_array($todayResult)) {
    $todayContent[] = $todaynum_rows;
}
$next7daysQuery = "SELECT * FROM pickup_details P INNER JOIN QUOTE Q ON P.quote_id = Q.quote_id WHERE pickUp_date <= (NOW() + INTERVAL 7 DAY) AND pickUp_date >= (NOW() + INTERVAL 1 DAY)";
$next7daysResult = mysqli_query($link, $next7daysQuery) or die(mysqli_error($link));
while ($next7daysnum_rows = mysqli_fetch_array($next7daysResult)) {
    $next7daysContent[] = $next7daysnum_rows;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Stylesheets -->

    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/admin.css">
    <link rel="stylesheet" href="stylesheets/admin_dashboard.css">
    <link rel="stylesheet" href="stylesheets/responsive.css">
</head>

<body>

    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!--  -->

    <!-- Sidebar -->
    <div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <div class="nav-option active">
                    <a class="nav-link nav-text" href="admin.php">
                        <i class="fa-solid fa-gauge"></i>
                        Dashboard
                    </a>

                </div>

                <div class="option2 nav-option">
                    <a class="nav-link nav-text" href="admin_quotes.php">
                        <i class="fa-solid fa-table"></i>
                        Quotes
                    </a>

                </div>

                <?php if ($currusername == "admin1_Farrah") { ?>

                    <div class="nav-option option3">
                        <a class="nav-link nav-text" href="editAdmin.php">
                            <i class="fa-solid fa-user-gear"></i>
                            Administrators
                        </a>

                    </div>
                <?php } ?>

            </div>
        </nav>
    </div>
    <!-- -->

    <div class="container dashb">
        <div class="container dashboard">
            <div class="row">
                <div class="col-7">
                    <div class="container recentupdate">
                        <div class="container">
                            <div class="container">
                                <div class="container">
                                    <div class="col">
                                        <div class="container">
                                            <div class="row">
                                                <div align="left">
                                                    <h2 class="font12 display-6 fw-bold lh-1 mb-3 bi bi-arrow-clockwise">
                                                        RECENT
                                                        UPDATES
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="container col5">
                                <div class="row">
                                    <div class="col-4 col18">
                                        <div class="container">
                                            <div align="center">
                                                <div class="date font7 h3">
                                                    <?php
                                                    $maxquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT MAX(quote_id) FROM quote)";
                                                    $maxquoteidResult = mysqli_query($link, $maxquouteidQuery);
                                                    $num_rows = mysqli_fetch_array($maxquoteidResult);
                                                    $date = date_create($num_rows['quote_date']);
                                                    echo date_format($date, 'd/m');
                                                    ?>
                                                </div>
                                                <div class="time font7 h4">
                                                    <?php
                                                    $maxquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT
                                                    MAX(quote_id) FROM quote)";
                                                    $maxquoteidResult = mysqli_query($link, $maxquouteidQuery);
                                                    $num_rows = mysqli_fetch_array($maxquoteidResult);
                                                    $date = date_create($num_rows['quote_date']);
                                                    echo date_format($date, 'h:i a');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="container">
                                            <div class="row">
                                                <div align="left">
                                                    <h2 class="font12 h3">
                                                        <?php
                                                        $maxquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT MAX(quote_id) FROM quote)";
                                                        $maxquoteidResult = mysqli_query($link, $maxquouteidQuery);
                                                        $num_rows = mysqli_fetch_array($maxquoteidResult);
                                                        $topupdatestatus = $num_rows['status'];
                                                        if ($topupdatestatus == "a_rejected") {
                                                            $topupdatestatus = "rejected";
                                                            echo ($topupdatestatus);
                                                        } else {
                                                            echo ($topupdatestatus);
                                                        }
                                                        ?>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div align="left">
                                                                <h2 class="text16 bi bi-person-fill">
                                                                    <?php
                                                                    $maxquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT MAX(quote_id) FROM quote)";
                                                                    $maxquoteidResult = mysqli_query($link, $maxquouteidQuery);
                                                                    $num_rows = mysqli_fetch_array($maxquoteidResult);
                                                                    $topupdateservicetype = $num_rows['service_type'];
                                                                    $topupdatepick = $num_rows['pickUp_address'];
                                                                    $topupdatedrop = $num_rows['dropOff_address'];
                                                                    echo $topupdateservicetype;
                                                                    ?>
                                                                    <div class="row">
                                                                        <div align="left">
                                                                            <h2 class="text16">
                                                                                <?php
                                                                                echo ("Pick up: $topupdatepick");
                                                                                ?>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div align="left">
                                                                            <h2 class="text16">
                                                                                <?php
                                                                                echo ("Drop off: $topupdatedrop");
                                                                                ?>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="container col5">
                                <div class="row">
                                    <div class="col-4 col18">
                                        <div class="container">
                                            <div align="center">
                                                <div class="date font7 h3">
                                                    <?php
                                                    $secondquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT (MAX(quote_id)-1) FROM quote)";
                                                    $secondquoteidResult = mysqli_query($link, $secondquouteidQuery);
                                                    $secondnum_rows = mysqli_fetch_array($secondquoteidResult);
                                                    $seconddate = date_create($secondnum_rows['quote_date']);
                                                    echo date_format($seconddate, 'd/m');
                                                    ?>
                                                </div>
                                                <div class="time font7 h4">
                                                    <?php
                                                    $secondquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT
                                                    (MAX(quote_id)-1) FROM quote)";
                                                    $secondquoteidResult = mysqli_query($link, $secondquouteidQuery);
                                                    $secondnum_rows = mysqli_fetch_array($secondquoteidResult);
                                                    $seconddate = date_create($secondnum_rows['quote_date']);
                                                    echo date_format($seconddate, 'h:i a');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="container">
                                            <div class="row">
                                                <div align="left">
                                                    <h2 class="font12 h3">
                                                        <?php
                                                        $secondquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT (MAX(quote_id)-1) FROM quote)";
                                                        $secondquoteidResult = mysqli_query($link, $secondquouteidQuery);
                                                        $secondnum_rows = mysqli_fetch_array($secondquoteidResult);
                                                        $secondupdatestatus = $secondnum_rows['status'];
                                                        if ($secondupdatestatus == "a_rejected") {
                                                            $secondupdatestatus = "rejected";
                                                            echo ($secondupdatestatus);
                                                        } else {
                                                            echo ($secondupdatestatus);
                                                        }
                                                        ?>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div align="left">
                                                                <h2 class="text16 bi bi-person-fill">
                                                                    <?php
                                                                    $secondquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT (MAX(quote_id)-1) FROM quote)";
                                                                    $secondquoteidResult = mysqli_query($link, $secondquouteidQuery);
                                                                    $secondnum_rows = mysqli_fetch_array($secondquoteidResult);
                                                                    $secondupdateservicetype = $secondnum_rows['service_type'];
                                                                    $secondupdatepick = $secondnum_rows['pickUp_address'];
                                                                    $secondupdatedrop = $secondnum_rows['dropOff_address'];
                                                                    echo $secondupdateservicetype;
                                                                    ?>
                                                                    <div class="row">
                                                                        <div align="left">
                                                                            <h2 class="text16">
                                                                                <?php
                                                                                echo ("Pick up: $secondupdatepick");
                                                                                ?>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div align="left">
                                                                            <h2 class="text16">
                                                                                <?php
                                                                                echo ("Drop off: $secondupdatedrop");
                                                                                ?>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container col5">
                                <div class="row">
                                    <div class="col-4 col18">
                                        <div class="container">
                                            <div align="center">
                                                <div class="date font7 h3">
                                                    <?php
                                                    $thirdquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT (MAX(quote_id)-2) FROM quote)";
                                                    $thirdquoteidResult = mysqli_query($link, $thirdquouteidQuery);
                                                    $thirdnum_rows = mysqli_fetch_array($thirdquoteidResult);
                                                    $thirddate = date_create($thirdnum_rows['quote_date']);
                                                    echo date_format($thirddate, 'd/m');
                                                    ?>
                                                </div>
                                                <div class="time font7 h4">
                                                    <?php
                                                    $thirdquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT
                                                    (MAX(quote_id)-2) FROM quote)";
                                                    $thirdquoteidResult = mysqli_query($link, $thirdquouteidQuery);
                                                    $thirdnum_rows = mysqli_fetch_array($thirdquoteidResult);
                                                    $thirddate = date_create($thirdnum_rows['quote_date']);
                                                    echo date_format($thirddate, 'h:i a');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="container">
                                            <div class="row">
                                                <div align="left">
                                                    <h2 class="font12 h3">
                                                        <?php
                                                        $thirdquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT (MAX(quote_id)-2) FROM quote)";
                                                        $thirdquoteidResult = mysqli_query($link, $thirdquouteidQuery);
                                                        $thirdnum_rows = mysqli_fetch_array($thirdquoteidResult);
                                                        $thirdupdatestatus = $thirdnum_rows['status'];
                                                        if ($thirdupdatestatus == "a_rejected") {
                                                            $thirdupdatestatus = "rejected";
                                                            echo ($thirdupdatestatus);
                                                        } else {
                                                            echo ($thirdupdatestatus);
                                                        }
                                                        ?>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div align="left">
                                                                <h2 class="text16 bi bi-person-fill">
                                                                    <?php
                                                                    $thirdquouteidQuery = "SELECT * FROM quote WHERE quote_id = (SELECT (MAX(quote_id)-2) FROM quote)";
                                                                    $thirdquoteidResult = mysqli_query($link, $thirdquouteidQuery);
                                                                    $thirdnum_rows = mysqli_fetch_array($thirdquoteidResult);
                                                                    $thirdupdateservicetype = $thirdnum_rows['service_type'];
                                                                    $thirdupdatepick = $thirdnum_rows['pickUp_address'];
                                                                    $thirdupdatedrop = $thirdnum_rows['dropOff_address'];
                                                                    echo $thirdupdateservicetype;
                                                                    ?>
                                                                    <div class="row">
                                                                        <div align="left">
                                                                            <h2 class="text16">
                                                                                <?php
                                                                                echo ("Pick up: $thirdupdatepick");
                                                                                ?>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div align="left">
                                                                            <h2 class="text16">
                                                                                <?php
                                                                                echo ("Drop off: $thirdupdatedrop");
                                                                                ?>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="container myorders">
                        <div class="container">
                            <div class="container">
                                <div class="container">
                                    <div class="col">
                                        <div class="container">
                                            <div align="left">
                                                <h2 class="font12 display-6 fw-bold lh-1 mb-3 bi bi-calendar3"> MY
                                                    ORDERS
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="container col9">
                                <div class="row">
                                    <div class="col8">
                                        <div class="container card1">
                                            <div align="left">
                                                <p class="d-inline-flex gap-1">
                                                    <button class="btn person1 bi bi-chevron-right font12 display-6 fw-bold lh-1 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                                                        <?php
                                                        $past7daysQuery = "SELECT * FROM pickup_details P INNER JOIN QUOTE Q ON P.quote_id = Q.quote_id WHERE pickUp_date >= (NOW() - INTERVAL 7 DAY) AND pickUp_date <= (NOW() - INTERVAL 1 DAY)";
                                                        $past7daysResult = mysqli_query($link, $past7daysQuery);
                                                        $past7daysnum_rows = mysqli_num_rows($past7daysResult);
                                                        echo ("Past 7 days ($past7daysnum_rows)");
                                                        ?>
                                                    </button>
                                                </p>
                                                <div class="collapse" id="collapseExample1">
                                                    <div class="card card-body card1">
                                                        <table class="table table-hover">
                                                            <thead class="font11">
                                                                <tr>
                                                                    <th scope="col">PICK UP DATE <br> AND TIME</th>
                                                                    <th scope="col">ORDER #</th>
                                                                    <th scope="col">PICK UP</th>
                                                                    <th scope="col">DROP OFF</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="font10">
                                                                <?php
                                                                if (($past7daysnum_rows) == 0) {
                                                                    echo ("");
                                                                } else
                                                                    for ($i = 0; $i < count($past7daysContent); $i++) {
                                                                        $past7daysdate = date_create($past7daysContent[$i]['pickUp_date']);
                                                                        $past7daysorderno = $past7daysContent[$i]['quote_id'];
                                                                        $past7dayspickup = $past7daysContent[$i]['pickUp_address'];
                                                                        $past7daysdropoff = $past7daysContent[$i]['dropOff_address'];

                                                                ?>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <?php
                                                                            echo date_format($past7daysdate, 'd/m');
                                                                            ?>
                                                                            <br>
                                                                            <?php
                                                                            echo date_format($past7daysdate, 'H:i a');
                                                                            ?>
                                                                        </th>
                                                                        <td>
                                                                            <?php
                                                                            echo ($past7daysorderno);
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo ($past7dayspickup);
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo ($past7daysdropoff);
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container col9">
                                <div class="row">
                                    <div class="col8">
                                        <div class="container card1">
                                            <div align="left">
                                                <p class="d-inline-flex gap-1">
                                                    <button class="btn person1 bi bi-chevron-right font12 display-6 fw-bold lh-1 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                                        <?php
                                                        $todayQuery = "SELECT * FROM pickup_details P INNER JOIN QUOTE Q ON P.quote_id = Q.quote_id WHERE DATE(pickUp_date) = DATE(NOW())";
                                                        $todayResult = mysqli_query($link, $todayQuery);
                                                        $todaynum_rows = mysqli_num_rows($todayResult);
                                                        echo ("Today ($todaynum_rows)");
                                                        ?>
                                                    </button>
                                                </p>
                                                <div class="collapse" id="collapseExample2">
                                                    <div class="card card-body card1">
                                                        <table class="table table-hover">
                                                            <thead class="font11">
                                                                <tr>
                                                                    <th scope="col">PICK UP DATE <br> AND TIME</th>
                                                                    <th scope="col">ORDER #</th>
                                                                    <th scope="col">PICK UP</th>
                                                                    <th scope="col">DROP OFF</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="font10">
                                                                <?php
                                                                if (($todaynum_rows) == 0) {
                                                                    echo ("");
                                                                } else
                                                                    for ($p = 0; $p < count($todayContent); $p++) {
                                                                        $todaydate = date_create($todayContent[$p]['pickUp_date']);
                                                                        $todayorderno = $todayContent[$p]['quote_id'];
                                                                        $todaypickup = $todayContent[$p]['pickUp_address'];
                                                                        $todaydropoff = $todayContent[$p]['dropOff_address'];
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <?php
                                                                            echo date_format($todaydate, 'd/m');
                                                                            ?>
                                                                            <br>
                                                                            <?php
                                                                            echo date_format($todaydate, 'H:i a');
                                                                            ?>
                                                                        </th>
                                                                        <td>
                                                                            <?php
                                                                            echo ($todayorderno);
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo ($todaypickup);
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo ($todaydropoff);
                                                                            ?>
                                                                        </td>
                                                                    </tr>

                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="container col9">
                                <div class="row">
                                    <div class="col8">
                                        <div class="container card1">
                                            <div align="left">
                                                <p class="d-inline-flex gap-1">
                                                    <button class="btn person1 bi bi-chevron-right font12 display-6 fw-bold lh-1 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                                        <?php
                                                        $next7daysQuery = "SELECT * FROM pickup_details P INNER JOIN QUOTE Q ON P.quote_id = Q.quote_id WHERE pickUp_date <= (NOW() + INTERVAL 7 DAY) AND pickUp_date >= (NOW() + INTERVAL 1 DAY)";
                                                        $next7daysResult = mysqli_query($link, $next7daysQuery);
                                                        $next7daysnum_rows = mysqli_num_rows($next7daysResult);
                                                        echo ("Next 7 days ($next7daysnum_rows)");
                                                        ?>
                                                    </button>
                                                </p>
                                                <div class="collapse" id="collapseExample3">
                                                    <div class="card card-body card1">
                                                        <table class="table table-hover">
                                                            <thead class="font11">
                                                                <tr>
                                                                    <th scope="col">PICK UP DATE <br> AND TIME</th>
                                                                    <th scope="col">ORDER #</th>
                                                                    <th scope="col">PICK UP</th>
                                                                    <th scope="col">DROP OFF</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="font10">
                                                                <?php
                                                                if (($next7daysnum_rows) == 0) {
                                                                    echo ("");
                                                                } else
                                                                    for ($q = 0; $q < count($next7daysContent); $q++) {
                                                                        $next7daysdate = date_create($next7daysContent[$q]['pickUp_date']);
                                                                        $next7daysorderno = $next7daysContent[$q]['quote_id'];
                                                                        $next7dayspickup = $next7daysContent[$q]['pickUp_address'];
                                                                        $next7daysdropoff = $next7daysContent[$q]['dropOff_address'];

                                                                ?>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <?php
                                                                            echo date_format($next7daysdate, 'd/m');
                                                                            ?>
                                                                            <br>
                                                                            <?php
                                                                            echo date_format($next7daysdate, 'H:i a');
                                                                            ?>
                                                                        </th>
                                                                        <td>
                                                                            <?php
                                                                            echo ($next7daysorderno);
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo ($next7dayspickup);
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo ($next7daysdropoff);
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <br>
                <div class="col-5">
                    <div class="container OVERVIEW">
                        <div class="container">
                            <div class="container">
                                <div class="container">
                                    <div class="col">
                                        <div class="container">
                                            <div class="row">
                                                <div align="center">
                                                    <h2 class="font17 display-6 fw-bold lh-1 mb-3">OVERVIEW
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col-6 p-3 themed-grid-col col16 col14 text20">
                                            <?php
                                            $newQuery = "SELECT * from quote WHERE status = 'unassigned'";
                                            $newResult = mysqli_query($link, $newQuery);

                                            $num_rows = mysqli_num_rows($newResult);

                                            echo ($num_rows);
                                            ?>
                                            <div class="text6">New quote request
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <div class="col p-3 themed-grid-col col16 col10">
                                            <?php
                                            $rejectedQuery = "SELECT * from quote WHERE status = 'a_rejected'";
                                            $rejectedResult = mysqli_query($link, $rejectedQuery);

                                            $num_rows = mysqli_num_rows($rejectedResult);

                                            echo ($num_rows);
                                            ?>
                                            <div class="text6">Rejected orders
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col p-3 themed-grid-col col16 col11">
                                            <?php
                                            $rejectedQuery = "SELECT * from quote WHERE status = 'assigned'";
                                            $rejectedResult = mysqli_query($link, $rejectedQuery);

                                            $num_rows = mysqli_num_rows($rejectedResult);

                                            echo ($num_rows);
                                            ?>
                                            <div class="text6">Confirmed orders</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <div class="col p-3 themed-grid-col col16 col12">
                                            <?php
                                            $pendingQuery = "SELECT * from quote WHERE status = 'pending'";
                                            $pendingResult = mysqli_query($link, $pendingQuery);

                                            $num_rows = mysqli_num_rows($pendingResult);

                                            echo ($num_rows);
                                            ?>
                                            <div class="text6">Pending payment
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col p-3 themed-grid-col col16 col13">
                                            <?php
                                            $completedQuery = "SELECT * from quote WHERE status = 'completed'";
                                            $completedResult = mysqli_query($link, $completedQuery);

                                            $num_rows = mysqli_num_rows($completedResult);

                                            echo ($num_rows);
                                            ?>
                                            <div class="text6">Completed payment</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row p-3">
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col-6 p-3 themed-grid-col col16 col15">
                                            <?php
                                            $completedsvcQuery = "SELECT * from quote WHERE status = 'completed_svc'";
                                            $completedsvcResult = mysqli_query($link, $completedsvcQuery);

                                            $num_rows = mysqli_num_rows($completedsvcResult);

                                            echo ($num_rows);
                                            ?>
                                            <div class="text6">Completed orders
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Footer -->
    <?php include("footer.php") ?>
    <!--  -->


    <!-- Background -->
    <div class="bgclass">
        <div class="gradient"></div>
    </div>
    <!--  -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/sidebarscript.js"></script>
</body>

</html>