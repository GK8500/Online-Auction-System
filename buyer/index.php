<?php
require "../partials/db.php";
session_start();

if (!isset($_SESSION['loggedin'])) {

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
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->


  <title>Home</title>

  <style>
body {
        height: 100vh;
        /* width: 100rem; */
        background-color: red; /* For browsers that do not support gradients */
        /* background-image: linear-gradient(to right, #ee7752, #e73c7e, #9581F4, #23a6d5, #23d5ab); */
        background-image: linear-gradient(to right, #8ED081, #F4D35E, #EE964B, #F95738);
        background-size:cover;
}


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
      margin-top: 100px;
      margin-bottom: 100px;
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
    }

    .btn:hover {
      border: 1px solid rgb(255, 255, 255);
      background-color: rgb(233, 151, 36);
      color: rgb(255, 255, 255);
    }

    .image {
      width: 100%;

    }


</style>

</head>

<body>

  <?php
  include "../partials/_navbar.php";
  ?>

    <img src="https://induseasywheels.indusind.com/media/magefan_blog/Online-Auctions.jpg" alt="" srcset="" style="margin-top: 55px; height: 500px; border: 5px solid rgb(0, 0, 0); border-end-start-radius: 20px; border-bottom-right-radius: 20px;">
 
  <?php

  

  $sql = "SELECT product.* FROM product";
   $result = mysqli_query($conn, $sql);

  $num = mysqli_num_rows($result);
  
  
  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $today = date("Y-m-d");    // today's date
      $bidday = $row['bidstart'];      // check if the date to start the bid has arrived
      $bidend = $row['bidend'];        // check if the date to end the bid has arrived

      if ($today < $bidday || $today >= $bidday && $today < $bidend){
      $id = $row['id'];           // id added

  ?>
      <?php
      // check if the product has already been displayed
      

        // if image path is given

        if ($row['path'] != null) {



      ?>

     

          <div class="cards">
            <header>
              <img src=<?php echo $row['path'] ?> class='card-img-top' alt=''>
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
            <br>
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
              <a href='product_display.php?pId=<?php echo $row['id']; ?>' class='btn btn-danger '>Sold out</a>  
            <?php } ?>
          </div>
          
    <?php
      }
    }
  }

    ?>

    </div>
    </div>
  
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script>
      let slideIndex = 0;
      showSlides();
      
      function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
      }
      </script>
      
</body>



</html>