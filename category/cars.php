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
<link rel="stylesheet" href="bg.css">
<head>
	<title>Vehicle Category Page</title>
	<style>
		/* Reset styles */
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			color: #333;
			background-color: #f9f9f9;
		}

		h1,
		h2,
		h3 {
			margin: 20px 0;
			text-align: center;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}

		.row {
			display: flex;
			flex-wrap: wrap;
			margin: 0 -10px;
		}

		.col {
			flex: 1;
			padding: 10px;
		}

		.card {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			transition: transform 0.2s ease-in-out;
			cursor: pointer;
			overflow: hidden;
		}

		.card:hover {
            background-color: #585858;
            color: #fff;
			transform: translateY(-5px);
		}

		.card img {
			max-width: 100%;
			height: auto;
		}

		.card-body {
			padding: 20px;
		}

		.card-title {
			font-size: 20px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.card-text {
			font-size: 16px;
			line-height: 1.5;
			margin-bottom: 20px;
		}

		.card-price {
			font-size: 24px;
			font-weight: bold;
			color: #008000;
		}
		.card-price:hover {
			font-size: 24px;
			font-weight: bold;
			color: #ffffff;
		}

		.card-location {
			font-size: 16px;
			font-weight: bold;
			color: #666;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<?php
    include "../partials/_navbar.php";

	$sql = "SELECT * FROM `product` where product.catogary = 'cars&bikes'";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
	?>
		<div class="container">
			<h1 style="padding-top: 40px;">Vehicles</h1>
			<div class="row">
				<div class="col">
					<div class="card">
					<center><img src=<?php echo $row['path'] ?> width="400px"></center>
						<div class="card-body">
							<div class="card-title"><?php echo $row['name']; ?></div>
							<div class="card-text"><?php echo $row['description']; ?></div>
							<div class="card-price">Rs <?php echo $row['msp']; ?> </div>
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
				</div>
			<?php
		}
			?>

            </div>
</body>
</html>