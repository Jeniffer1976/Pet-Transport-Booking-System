<?php
include "loginFunctions.php";

if (!isset($_SESSION['username'])) {

    header("Location: signIn.php");
    exit();
}

global $link;

$currusername = $_SESSION['username'];

if (isset($_POST['delStaff'])) {
    $delStaffId = $_POST['delStaffId'];
    // $delStaffusers = $_POST['delStaffusers'];
    $delQuery = "UPDATE quote SET staff_id = NULL
    WHERE staff_id = $delStaffId";
    $delQuery2 = "DELETE staff,users FROM staff INNER JOIN users ON staff.username = users.username WHERE staff.staff_id = $delStaffId";
    // $delQuery3 = "DELETE FROM users WHERE users.username = $delStaffusers";
    $delStatus = mysqli_query($link, $delQuery) or die(mysqli_error($link));
    $delStatus2 = mysqli_query($link, $delQuery2) or die(mysqli_error($link));
    // $delStatus3 = mysqli_query($link, $delQuery3) or die(mysqli_error($link));
}

$accQuery = "SELECT staff_id, first_Name, last_Name, contact_no, email, username 
    FROM staff 
    ORDER BY staff_id ASC";

$accStatus = mysqli_query($link, $accQuery) or die(mysqli_error($link));
while ($accRow = mysqli_fetch_array($accStatus)) {
    $accContent[] = $accRow;
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Staff | Waggin Wheels</title>

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
    <!-- <link rel="stylesheet" href="stylesheets/admin_dashboard.css"> -->
    <link rel="stylesheet" href="stylesheets/responsive.css">
    <link rel="stylesheet" href="stylesheets/editAdmin.css">

</head>

<body>

    <!-- Navbar -->
    <?php include("navbar.php") ?>
    <!--  -->

    <!-- Sidebar -->
    <div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <div class="nav-option">
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

                    <div class="nav-option option3 active">
                        <a class="nav-link nav-text" href="editAdmin.php">
                            <i class="fa-solid fa-user-gear"></i>
                            Staffs
                        </a>

                    </div>
                <?php } ?>

            </div>
        </nav>
    </div>
    <!-- -->

    <div class="container accTable" style='min-height: 60vh;'>
        <h2 class="header1">Staff</h2>
        <div class="addstaff" align="right">
            <button type="button" class="btn rounded-pill mt-2 me-2 button" onclick="document.location='addstaff.php'">Add Account <i class="fas fa-user-plus addicon"></i></button>
        </div>
        <br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-11">
                <table class="table table-striped table-light">
                    <thead class="sticky-top tb-header">
                        <tr>
                            <th>Name/Username</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Quotes Assigned</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>

                    </thead>
                    <tbody class="align-middle" style="padding:40px;">
                        <?php for ($i = 0; $i < count($accContent); $i++) {
                            $staff_id = $accContent[$i]['staff_id'];
                            $staff_firstName = $accContent[$i]['first_Name'];
                            $staff_lastName = $accContent[$i]['last_Name'];
                            $staff_username = $accContent[$i]['username'];
                            $staff_email = $accContent[$i]['email'];
                            $staff_contact = $accContent[$i]['contact_no'];
                            $staff_name = $staff_firstName . " " . $staff_lastName . "<br>" . "@" . $staff_username;
                            $quotecountQuery = "SELECT COUNT(staff_id) AS quote_count FROM quote WHERE staff_id = $staff_id";
                            $quotecountStatus = mysqli_query($link, $quotecountQuery) or die(mysqli_error($link));
                            $qcRow = mysqli_fetch_array($quotecountStatus);
                            $quote_countnum = $qcRow['quote_count'];

                        ?>
                            <tr>
                                <td>
                                    <?php echo $staff_name ?>
                                </td>
                                <td>
                                    <?php echo $staff_contact ?>
                                </td>
                                <td>
                                    <?php echo $staff_email ?>
                                </td>
                                <td>
                                    <?php echo $quote_countnum ?>
                                </td>
                                <td>
                                    <!-- <div class="row"> -->
                                    <div class="action">
                                <td>
                                    <form method="post" action="viewStaff.php" id="passOwnerId" style="margin-bottom:-10px">
                                        <input type="hidden" id="staff_id" name="staff_id" value="<?php echo $staff_id ?>" />
                                        <button type="submit" id="viewStaffBtn" class="actionBtns">
                                            <i class="fas fa-eye text-secondary"></i>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <!-- <div class="col-4"> -->
                                    <form method="get" action="editStaff.php" id="passOwnerId" style="margin-bottom:-10px">
                                        <input type="hidden" id="staff_id" name="staff_id" value="<?php echo $staff_id ?>" />
                                        <button type="submit" id="editQuoteBtn" class="actionBtns">
                                            <i class="fa-solid fa-pen text-secondary"></i>
                                        </button>
                                    </form>
                                    <!-- </div> -->
                                </td>

                                <td>
                                    <?php if ($staff_username != "admin1_Farrah") { ?>
                                        <!-- <div class="col-4"> -->
                                        <form method="post" action="deleteStaff.php" style="margin-bottom:-10px">
                                            <input type="hidden" id="staff_id" name="staff_id" value="<?php echo $staff_id ?>" />
                                            <input type="hidden" id="staff_username" name="staff_username" value="<?php echo $staff_username ?>" />
                                            <button type="submit" id="deleteBtn" class="actionBtns">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </form>
                                        <!-- </div> -->
                                    <?php } ?>

                                </td>

            </div>
            <!-- </div> -->

            </td>
            </tr>

        <?php } ?>
        </tbody>
        </table>

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