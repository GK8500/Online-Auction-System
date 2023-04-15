<?php

require "../partials/db.php";

session_start();

if(!isset($_SESSION['loggedin'])){

    header('location: C:\xampp\htdocs\AuctionSystem\buyer\login_1.php');
    exit;
}

?>



<!DOCTYPE html>
<html>
  <head>
    <title>Home Decor Category</title>
    <link rel="stylesheet" type="text/css" href="bg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <style>
    /* Global styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
}

header {
  background-color: #333;
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

nav li {
  margin-right: 1rem;
}

nav a {
  color: #fff;
  text-decoration: none;
}

main {
  padding: 2rem;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: flex-start;
}

h2 {
  margin-top: 0;
}

/* Specific styles for home decor category page */
.filters {
  width: 25%;
}

.filters form {
  margin-bottom: 1rem;
}

.filters select,
.filters button {
  display: block;
  margin-bottom: 0.5rem;
  width: 100%;
}

.items {
  width: 70%;
}

.item {
  width: 30%;
  margin-bottom: 1rem;
}

.item img {
  display: block;
  max-width: 100%;
  height: auto;
}

.item h3 {
  margin-top: 0.5rem;
}

.item p {
  margin: 0;
}

  </style>
  <body>
    <header>
      <h1>Home Decor Category</h1>
    </header>
    <main>
      
      <section class="items">
        <h2>Home Decor Items for Sale</h2>
        <div class="item" style="border: 2.5px solid black; border-radius:10px; padding: 10px 10px 10px 10px;">
          <?php

          $sql = "SELECT * FROM product WHERE catogary = 'homedecor'";
          $result = mysqli_query($conn,$sql);
  
          while($row = mysqli_fetch_assoc($result)){
              $id = $row['id'];
              ?>
  
          <center><img class="card-img-top" src="../seller/uploads/test.jpg" alt="Card image cap" style="height:200px; width:250px; border: 10px solid black"></center>
          <h3> <?php echo $row['name']; ?> </h3>
          <p><?php echo $row['description']; ?></p>
          <p>Rs <?php echo $row['msp']; ?></p>
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

        </div>
        
      </section>
    </main>
    <footer style="background-color: #333; padding: 10px 10px 10px 10px; color:#fff">
      <p>&copy; 2023 Auction, Inc.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
