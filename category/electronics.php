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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap');
    body {

    }
    .half {
        color: #ffffff;
        position: absolute;
        top: 250px;
        left: 300px;
        padding-top: 20px;
        opacity: 1;
        /*top: 8px;*/
        /*right: 16px;*/
    }
    .container{
      position: relative;
      text-align: LEFT;
        color: azure;
        font-family: 'Roboto', sans-serif;
        font-size: xxx-large;
      /*opacity: 0.5;*/
    }


  </style>
  <title>Electronics</title>
</head>
<body>
<div class="container">
  <!-- background image-->
  <img src="pictures/electronics1.jpg" alt="" srcset="" style="height: 50rem; width: 100%; object-fit: cover;">
  <div class="half" >
   <pre>
    <strong> Buying a high-end laptop in budget ?
     Or a flagship phone for a price
     of mid-ranger ?
    </strong>
   </pre>

  </div>
</div>
<div class="card">
    <div class="card-group">

        <?php

    $sql = "SELECT * FROM product WHERE catogary = 'electronics'";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        ?>


        <div class="card sm-2" style="max-width: 540px; margin: 20px 20px; left: 10px;color: black; border: 1px solid black;">
            <img class="card-img-top" src="../seller/uploads/test.jpg" alt="Card image cap" style="height:200px; width:250px; border: 10px solid black">
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