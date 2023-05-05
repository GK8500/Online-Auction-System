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
<html>

<head>
    <title>Home Appliances</title>
    <link rel="stylesheet" type="text/css" href="bg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: sans-serif;
    }

    header {
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
    }

    h1 {
        font-size: 2rem;
        margin: 0;
    }

    nav ul {
        display: flex;
        list-style: none;
    }

    nav ul li {
        margin-right: 1rem;
    }

    nav ul li:last-child {
        margin-right: 0;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        padding: 0.5rem;
    }

    nav ul li a:hover {
        background-color: #fff;
        color: #333;
    }

    main {
        padding: 2rem;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 2rem;
    }

    .product-grid article {
        border: 1px solid #ccc;
        padding: 1
    }
</style>

<body>
    <header style="margin-top:56px;">
        <h1>Home Appliances</h1>
    </header>
    <?php

    $sql = "SELECT * FROM `product` where catogary ='appliances'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
    ?>
        <main>
            <section class="product-grid" >
                <article style="background-color: #333; color: white; border-radius: 10px; border-color: #000000; padding: 10px 10px 10px 10px;">
                   <center> <img src=<?php echo $row['path'] ?> width="400px"> </center>
                    <h2><?php echo $row['name']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                    <p>Rs <?php echo $row['msp']; ?> </p>

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
                </article>
                </div>
                </div>

            <?php
        }
            ?>
            </section>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        

        
</body>

</html>