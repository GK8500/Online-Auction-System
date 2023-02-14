<?php
require "../partials/db.php";

session_start();

if (!isset($_SESSION['loggedin'])) {

    header("location: login_1.php");
    exit;
}


$sql = "SELECT * FROM `product` WHERE `id` = '3'";
$result = mysqli_query($conn, $sql);

// selecting a certain product

while ($row = mysqli_fetch_assoc($result)){
foreach($row as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../cc/bg.css">
    <title>Home</title>

</head>
<body>
<?php //include "../partials/_navbar.php"; ?>
<div class='row'>
    <div class='col-sm-3'>
        <div class='card' style='width: 18rem; margin: 20px 20px; left: 10px'>
            <img src='../seller/uploads/test.jpg' class='card-img-top' alt=''
                 style='height:200px; width:250px' />
            <div class='card-body'>
                <h5 class='card-title' name='name' > <?php echo $row['name']; ?> </h5>
                <p class='card-text'><?php echo $row['description'];
                
                ?></p>
                <?php
                $today = date("Y-m-d");
                $bidday = $row['bidstart'];
                $bidend = $row['bidend'];
                if($today<$bidday){
                ?>
                <a href='#' class='btn btn-primary disabled'>Bid Not Started Yet</a> <?php }
                else if($today >= $bidday && $today<$bidend ){
                ?>
                    <a href='product_display.php?pId=<?php echo $row['id']; ?>'>< class='btn btn-primary'>BID</a>
                <?php
                }
                else if($today>$bidend ){

                ?>
                <a href='#' class='btn btn-danger disabled'>Sold out</a>
                <?php } ?>
            </div>
        </div>
    </div>


</body>


<?php
}
?>
