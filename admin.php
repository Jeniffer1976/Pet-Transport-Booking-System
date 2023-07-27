<?php
include "loginFunctions.php";

if (!isset($_SESSION['username'])) {

    header("Location: signIn.php");
    exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!--Boostrap JS link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Stylesheets -->

    <link rel="stylesheet" href="stylesheets/common.css">
    <link rel="stylesheet" href="stylesheets/admin.css">
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

                <div class="nav-option option3">
                    <a class="nav-link nav-text" href="editAdmin.php">
                        <i class="fa-solid fa-user-gear"></i>
                        Administrators
                    </a>

                </div>

                <div class="nav-option option4">
                    <a class="nav-link nav-text" href="editCustomers.php">
                        <i class="fa-solid fa-user"></i>
                        Customers
                    </a>

                </div>

            </div>
        </nav>
    </div>
    <!-- -->

    <div class="container dashb">
    <div class="container dashboard">
        <div class="row">
            <div class="col-6">
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
                                <div class="col-4 col8">
                                    <div class="container col6">
                                        <div align="center">
                                            <div class="date font7 h3">20/07</div>
                                            <div class="time font7 h4">3:00PM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="container">
                                        <div class="row">
                                            <div align="left">
                                                <h2 class="font12 h3">Pending payment</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="container">
                                                    <div class="row">
                                                        <div align="left">
                                                            <h2 class="text6 bi bi-person-fill"> -
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

                        <div class="container col5">
                            <div class="row">
                                <div class="col-4 col8">
                                    <div class="container col6">
                                        <div align="center">
                                            <div class="date font7 h3">19/07</div>
                                            <div class="time font7 h4">9:00PM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="container">
                                        <div class="row">
                                            <div align="left">
                                                <h2 class="font12 h3">Completed order</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="container">
                                                    <div class="row">
                                                        <div align="left">
                                                            <h2 class="text6 bi bi-person-fill"> -
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
                        <div class="container col5">
                            <div class="row">
                                <div class="col-4 col8">
                                    <div class="container col6">
                                        <div align="center">
                                            <div class="date font7 h3">18/07</div>
                                            <div class="time font7 h4">2:20PM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="container">
                                        <div class="row">
                                            <div align="left">
                                                <h2 class="font12 h3">New request quote</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="container">
                                                    <div class="row">
                                                        <div align="left">
                                                            <h2 class="text6 bi bi-person-fill"> -
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
                                            <h2 class="font12 display-6 fw-bold lh-1 mb-3 bi bi-calendar3"> MY ORDERS
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
                                                <button
                                                    class="btn person1 bi bi-chevron-right font12 display-6 fw-bold lh-1 mb-3"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseExample1" aria-expanded="false"
                                                    aria-controls="collapseExample"> Last 7 days (1)
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseExample1">
                                                <div class="card card-body card1">
                                                    <table class="table table-hover">
                                                        <thead class="font11">
                                                            <tr>
                                                                <th scope="col">DATE AND TIME</th>
                                                                <th scope="col">ORDER #</th>
                                                                <th scope="col">PICK UP</th>
                                                                <th scope="col">DROP OFF</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="font10">
                                                            <tr>
                                                                <th scope="row">FRI 21/07 <br>
                                                                3:00PM</th>
                                                                <td>7090</td>
                                                                <td>Bedok</td>
                                                                <td>Jurong</td>
                                                            </tr>
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
                                                <button
                                                    class="btn person1 bi bi-chevron-right font12 display-6 fw-bold lh-1 mb-3"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseExample2" aria-expanded="false"
                                                    aria-controls="collapseExample"> Today (0)
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseExample2">
                                                <div class="card card-body card1">
                                                    <table class="table table-hover">
                                                        <thead class="font11">
                                                            <tr>
                                                                <th scope="col">DATE AND TIME</th>
                                                                <th scope="col">ORDER #</th>
                                                                <th scope="col">PICK UP</th>
                                                                <th scope="col">DROP OFF</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="font10">
                                                        
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
                                                <button
                                                    class="btn person1 bi bi-chevron-right font12 display-6 fw-bold lh-1 mb-3"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseExample3" aria-expanded="false"
                                                    aria-controls="collapseExample"> Next 7 days (2)
                                                </button>
                                            </p>
                                            <div class="collapse" id="collapseExample3">
                                                <div class="card card-body card1">
                                                    <table class="table table-hover">
                                                        <thead class="font11">
                                                            <tr>
                                                                <th scope="col">DATE AND TIME</th>
                                                                <th scope="col">ORDER #</th>
                                                                <th scope="col">PICK UP</th>
                                                                <th scope="col">DROP OFF</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="font10">
                                                            <tr>
                                                                <th scope="row">FRI 21/07 <br>
                                                                3:00PM</th>
                                                                <td>7092</td>
                                                                <td>Bedok South</td>
                                                                <td>Pioneer</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">THUR 20/07 3:00PM</th>
                                                                <td>7021</td>
                                                                <td>Tuas</td>
                                                                <td>Loyang Point</td>
                                                            </tr>
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
            <div class="col-6">
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
                                    <div class="col-6 p-3 themed-grid-col col16 col14">10
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
                                    <div class="col p-3 themed-grid-col col16 col10">0
                                        <div class="text6">Rejected orders
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col p-3 themed-grid-col col16 col11">2
                                        <div class="text6">Confirmed orders</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row p-3">
                                <div class="row">
                                    <div class="col p-3 themed-grid-col col16 col12">4
                                        <div class="text6">Pending payment
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="col p-3 themed-grid-col col16 col13">1
                                        <div class="text6">Completed orders</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row p-3">
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col-6 p-3 themed-grid-col col16 col15">1
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
        <div>
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