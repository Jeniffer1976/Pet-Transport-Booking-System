<?php
include "dbFunctions.php";
$quote_id = $_POST['quote_id'];

if (isset($_POST['comSvcBtn'])) {
    $comSvcId = $_POST['comSvcId'];
    $comSvcQuery = "UPDATE quote SET status = 'completed_svc' WHERE quote_id = $comSvcId";
    $comSvcStatus = mysqli_query($link, $comSvcQuery) or die(mysqli_error($link));
    header("Location: admin_quotes.php");

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote | Waggin Wheels</title>
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
    <link rel="stylesheet" href="stylesheets/decline_quote.css">
    <link rel="stylesheet" href="stylesheets/common.css">
</head>

<body>
    <div class="quoteScreen_wrapper">
        <div class="shadow"></div>
        <div class="quote_wrap">
            <button type="button" onclick="exitAnim()" class="exitBtn">
                <i class="fas fa-times text-secondary"></i>
            </button>
            <div class="container svcCom-content p-2">
                <div class="m-3 row">
                    <div class="col-8">
                        <img src="images/comSvc.jpg" alt="Service Completed" width="150" style="border-radius:50%">

                    </div>
                    <div class="col-2 text-success mt-5 pt-3">
                        <p>Service Completed</p>

                    </div>
                </div>

                <br>
                <div class="row buttons">
                    <div class="col" align="left">
                        <button type="button" class="btn btn-secondary"
                            onclick="location.href='admin_quotes.php'">Cancel</button>
                    </div>
                    <div class="col">
                        <form action="" method="post" style="margin-bottom:-1px">
                            <input type="hidden" name="comSvcId" value="<?php echo $quote_id ?>">
                            <input type="submit" name="comSvcBtn" value="Completed" class="btn btn-success">
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