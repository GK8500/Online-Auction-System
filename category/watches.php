<?php

require "../partials/db.php";

session_start();

if (!isset($_SESSION['loggedin'])) {

    header('location: ../buyer/login_1.php');
    exit;
}
include "../partials/_navbar.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Watches Category Page</title>
    <link rel="stylesheet" href="bg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        /* Reset default browser styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            height: 100vh;
            width: 100%;
            background-color: red;
            /* For browsers that do not support gradients */
            background-image: linear-gradient(to right, #AAFAC8, #C7FFED, #BBC8CA, #B592A0, #9C7178);
            background-size: cover;
        }

        /* Style the header */
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        /* Style the navigation menu */
        nav {
            background-color: #ccc;
            padding: 0.5rem;
        }

        nav ul {
            display: flex;
            list-style-type: none;
            justify-content: center;
        }

        nav li {
            margin: 0 1rem;
        }

        nav a {
            color: #333;
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        nav a:hover {
            background-color: #333;
            color: #fff;
        }

        /* Style the main content area */
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Style the individual product items */
        .product {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            padding: 1rem;
            width: 300px;
            border-radius: 0.25rem;
            text-align: center;
        }

        .product img {
            max-width: 100%;
            margin-bottom: 1rem;
        }

        .product h3 {
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
        }

        .product p {
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .product button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-size: 1rem;
            cursor: pointer;
        }

        .product button:hover {
            background-color: #fff;
            color: #333;
            border: 1px solid #333;
        }

        /* Style the footer */
        footer {
            background-color: #ccc;
            padding: 1rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <header style="margin-top:56px;">
        <h1>Watches Category</h1>
    </header>

    <main>
        <?php

        $sql = "SELECT * FROM `product` where product.catogary = 'watches'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
        ?>
            <!-- Product item 1 -->
            <div class="product">
            <center><img src=<?php echo $row['path'] ?> width="400px"></center>

                <h3><?php echo $row['name']; ?></h3>
                <p class='card-text'><?php echo $row['description']; ?></p>
                <p class='card-text'>Rs <?php echo $row['msp']; ?> </p>

                <?php

                // checking if bid needs to be started or ended

                $today = date("Y-m-d");    // today's date
                $bidday = $row['bidstart'];      // check if the date to start the bid has arrived
                $bidend = $row['bidend'];        // check if the date to end the bid has arrived


                if ($today < $bidday) {
                    $sql_status = "UPDATE `product` SET `status` = 'not started' WHERE `product`.`id` = $id";        // updating status
                    $result_status = mysqli_query($conn, $sql);
                ?>
                    <a href='#' class='btn btn-primary disabled'>Bid Not Started Yet</a>

                <?php } else if ($today >= $bidday && $today < $bidend) {
                    $sql_status = "UPDATE `product` SET `status` = 'on sale' WHERE `product`.`id` = $id";        // updating status
                    $result_status = mysqli_query($conn, $sql);
                ?>
                    <a href='../buyer/product_display.php?pId=<?php echo $row['id']; ?>' < class='btn btn-primary'>BID</a>
                <?php
                } else if ($today > $bidend) {
                    $sql_status = "UPDATE `product` SET `status` = 'sold' WHERE `product`.`id` = $id";  // updating status
                    $result_status = mysqli_query($conn, $sql);
                ?>
                    <a href='../buyer/product_display.php?pId=<?php echo $row['id']; ?>' class='btn btn-danger '>Sold out</a>
                <?php } ?>
            </div>
            </div>

        <?php
        }
        ?>

    </main>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>