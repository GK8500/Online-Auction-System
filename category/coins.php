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
  <title>Coins Category</title>
  <link rel="stylesheet" type="text/css" href="bg.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
  /* coins.css */

  /* Global Styles */
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: Arial, sans-serif;
  }

  header {
    background-color: #f2f2f2;
    padding: 20px;
  }

  nav {
    background-color: #333;
  }

  nav ul {

    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }

  nav li {
    float: left;
  }

  nav li a {
    display: block;
    color: #333;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  nav li a:hover {
    background-color: #ddd;
  }

  main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
  }

  section.filters {
    width: 20%;
    margin-right: 20px;
  }

  section.filters h2 {
    margin-bottom: 10px;
  }

  section.filters form {
    display: flex;
    flex-direction: column;
  }

  section.filters label {
    margin-bottom: 5px;
  }

  section.filters select {
    margin-bottom: 10px;
    padding: 5px;
  }

  section.filters button {
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  section.items {
    width: 75%;
  }

  section.items h2 {
    margin-bottom: 20px;
  }

  section.items .item {
    width: 33.33%;
    padding: 10px;
  }

  section.items .item img {
    max-width: 100%;
  }

  section.items .item h3 {
    margin-top: 10px;
    margin-bottom: 5px;
  }

  section.items .item p {
    margin-bottom: 5px;
  }

  footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
  }
</style>

<body>
  <header style="background-color: #333; margin-top:56px;">
    <h1 style="color: #ddd;">Coins Category</h1>
    <nav>
      <ul>

    </nav>
  </header>
  <main>


    <section class="items">
      <h2>Coins for Sale</h2>
      <?php

      $sql = "SELECT * FROM `product` where product.catogary = 'coins'";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
      ?>
        <div class="item" style="border: 1px solid black;">
        <center><img src=<?php echo $row['path'] ?> width="400px"></center>
          <h3><?php echo $row['name']; ?> </h3>
          <p><?php echo $row['description']; ?></p>
          <p>Rs <?php echo $row['msp']; ?></p>

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
      </div>

    </section>
  </main>
  <footer style="background-color: #333; color: #fff;">
    <p>&copy; 2023 Coins Auction, Inc.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>