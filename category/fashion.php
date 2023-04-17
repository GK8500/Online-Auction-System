<?php

require "../partials/db.php";

session_start();

if(!isset($_SESSION['loggedin'])){

    header('location: C:\xampp\htdocs\AuctionSystem\buyer\login_1.php');
    exit;
}
include "../partials/_navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Fashion Category Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #333;
			color: #fff;
			padding: 10px;
		}

		h1 {
			margin: 0;
			font-size: 36px;
			text-align: center;
		}

		nav {
			background-color: #4CAF50;
			overflow: hidden;
		}

		nav a {
			float: left;
			display: block;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		nav a:hover {
			background-color: #ddd;
			color: black;
		}

		nav a.active {
			background-color: #4CAF50;
			color: white;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.item {
			background-color: #fff;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
			margin-bottom: 20px;
			flex-basis: calc(33.33% - 20px);
			padding: 20px;
			box-sizing: border-box;
		}

		.item:hover {
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
		}

		.item img {
			max-width: 100%;
			height: auto;
		}

		.item h2 {
			margin-top: 0;
			font-size: 24px;
			font-weight: bold;
		}

		.item p {
			margin-bottom: 0;
			font-size: 18px;
			color: #666;
		}
	</style>
</head>
<link rel="stylesheet" href="bg.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<body>
	<header style="margin-top:56px;">
		<h1>Fashion Category</h1>
	</header>
	<div class="container">
		<div class="item">
			<?php

        $sql = "SELECT * FROM product WHERE catogary = 'fashion'";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            ?>
			<img class="card-img-top" src="../seller/uploads/test.jpg" alt="Card image cap" style="height:200px; width:250px; border: 10px solid black">
			<h2><?php echo $row['name']; ?></h2>
			<p><?php echo $row['description']; ?></p>
			<p><?php echo $row['msp']; ?></p>
		
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
		</div>
            <?php
        }
        ?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>





</body>
</html>

		