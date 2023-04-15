<?php

require "../partials/db.php";

session_start();

if(!isset($_SESSION['loggedin'])){

    header('location: C:\xampp\htdocs\AuctionSystem\buyer\login_1.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Other</title>
</head>
<body>
<div class="bg-container">
    <!-- background image-->

<div class="card">
    <div class="card-group">

        <?php

        $sql = "SELECT * FROM `product` join product_image on product.id = product_image.product_id where product.catogary = 'others'";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            ?>


            <div class="card sm-2" style="max-width: 540px; margin: 20px 20px; left: 10px;color: black; border: 1px solid black;">
            <center><img src=<?php echo $row['path'] ?> width="400px"></center>
                <div class='card-body'>
                    <u> <h5 class='card-title'> <?php echo $row['name']; ?> </h5></u>
                    <p class='card-text'><?php echo $row['description']; ?></p>
                    <p class='card-text'>Rs <?php echo $row['msp']; ?> </p>
                    <?php

                    // checking if bid needs to be started or ended

                    $today = date("Y-m-d");    // today's date
                    $bidday = $row['bidstart'];      // check if the date to start the bid has arrived
                    $bidend = $row['bidend'];        // check if the date to end the bid has arrived


                    if($today<$bidday){
                        $sql_status = "UPDATE `product` SET `status` = 'not started' WHERE `product`.`id` = $id";        // updating status
                        $result_status = mysqli_query($conn, $sql);
                        ?>
                        <a href='#' class='btn btn-primary disabled'>Bid Not Started Yet</a>

                    <?php }
                    else if($today >= $bidday && $today<$bidend ){
                        $sql_status = "UPDATE `product` SET `status` = 'on sale' WHERE `product`.`id` = $id";        // updating status
                        $result_status = mysqli_query($conn, $sql);
                        ?>
                        <a href='../buyer/product_display.php?pId=<?php echo $row['id']; ?>'< class='btn btn-primary'>BID</a>
                        <?php
                    }
                    else if($today>$bidend ){
                        $sql_status = "UPDATE `product` SET `status` = 'sold' WHERE `product`.`id` = $id";  // updating status
                        $result_status = mysqli_query($conn, $sql);
                        ?>
                        <a href='../buyer/product_display.php?pId=<?php echo $row['id']; ?>' class='btn btn-danger ' >Sold out</a>
                    <?php } ?>
                </div>
            </div>

            <?php
        }
        ?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </div>
</body>
</html>


