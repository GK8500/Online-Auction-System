<?php
    include "../partials/db.php";

session_start();

$seller_id = $_SESSION['id'];

if(!isset($_SESSION['loggedin'])){

    header("location: login_1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../cc/bg.css">
    <title>Seller Dash</title>

</head>
<style>
 


    body {
      display: flex;
      flex-wrap: wrap;
    }

    .cards {
      background-color: rgb(253, 223, 223);
      background-image: linear-gradient(to top, #000000, #0d0d0d, #333333, #515151, #808080);
      border: 1px solid black;
      color: rgb(255, 255, 255);
      border-radius: 10px;
      width: 20%;
      padding: 5px 5px 5px 5px;
      margin-left: 30px;
      margin-top: 200px;
      height: 410px;
    }

    img {
      height: 40%;
      width: 100%;
    }

    header {
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

    }

    .body {
      padding: 2px 2px 2px 2px;
    }

    .btn {
      display: flex;
      justify-items: center;
      border: 1px solid black;
      border-radius: 7px;
      cursor: pointer;
      background-color: rgb(0, 234, 255);
      color: rgb(0, 0, 0);
      padding: .5em 0.75em;
      margin-bottom: 5px;;
    }

    .btn:hover {
      border: 1px solid rgb(255, 255, 255);
      background-color: rgb(233, 151, 36);
      color: rgb(255, 255, 255);
    }

    .image {
      width: 100%;

    }

    h3{
        text-align: center;
        display: block;
    }
</style>
<body>

<?php 
include "../seller/seller_nav.php";
        echo"<br>";
        echo"<br>";
        echo"<br>";
    $usernames =  $_SESSION['username'];
  ?>



    <?php
	
  $sql = "SELECT * FROM `product` join product_image on product.id = product_image.product_id where product.sold_by = '$seller_id'";
  $result = mysqli_query($conn, $sql);

  $num = mysqli_num_rows($result);

  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];           // id added

  ?>

      <?php
      // check if the product has already been displayed
      if ($row['sortorder'] == 1) {

        // if image path is given

        if ($row['path'] != null) {



      ?>

     

          <div class="cards">
            <header>
              <img src=<?php echo $row['path'] ?> class='card-img-top' alt='' style='height:200px; width:250px'>
            <?php }
          // if image path is not given

          else {
            ?>
              <img src='https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg' class='card-img-top' alt='' style='height:200px; width:250px'>
            <?php } ?>
            <H3> <?php echo $row['name']; ?></H3>
            </header>
            <div class="body">
              <p class='card-text'><?php $string = $row['description'];
                                    $stringCut = substr($string, 0, 100);
                                    echo $stringCut . '....';
                                    ?></p>
              <p class='card-text'> </p>

            </div>
           
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
              <a href='product_display.php?pId=<?php echo $row['id']; ?>' < class='btn btn-primary'>BID</a>
            <?php
            } else if ($today > $bidend) {
              $sql_status = "UPDATE `product` SET `status` = 'sold' WHERE `product`.`id` = $id";  // updating status
              $result_status = mysqli_query($conn, $sql);
            ?>
              <a href='product_display.php?pId=<?php echo $row['id']; ?>' class='btn btn-success '>You Won</a>  
            <?php } ?>
          </div>
          
    <?php
      }
    }
  }
    ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
</body>
</html>


