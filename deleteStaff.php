<?php
include "dbFunctions.php";
$staff_id = $_POST['staff_id'];
$staff_username = $_POST['staff_username']
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff Account | Waggin Wheels</title>

    <link rel="icon" type="image/x-icon" href="images/logoNoText.ico">

    <!--Bootstrap CSS link take note of version-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/signUp.css">
    <link rel="stylesheet" href="stylesheets/decline_quote.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>
<div class="quoteScreen_wrapper">
        <div class="shadow"></div>
        <div class="quote_wrap">
            <button type="button" onclick="exitAnim2()" class="exitBtn">
                <i class="fas fa-times text-secondary"></i>
            </button>
            <div class="container decline-content">
                <p>Are you sure you would like to delete this account?
                </p><br>
                <div class="row buttons">
                    <div class="col" align="left">
                        <button type="button" class="btn btn-secondary"
                            onclick="location.href='editAdmin.php'">Cancel</button>
                    </div>
                    <div class="col">
                        <form action="editAdmin.php" method="post" style="margin-bottom:-1px">
                            <input type="hidden" name="delStaffId" value="<?php echo $staff_id ?>">
                            <input type="hidden" name="delStaffusers" value="<?php echo $staff_username ?>">
                            <input type="submit" name="delStaff" value="Delete Account" class="btn btn-danger">
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Background -->
    <div class="bgclass">
        <div class="gradient"></div>
    </div>
    <!--  -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="scripts/viewQuote.js"></script>
</body>

</html>