
<?php
require "../partials/db.php";

session_start();

if(!isset($_SESSION['loggedin'])){

    header("location: login_1.php");
    exit;
}



    $sql = "SELECT * FROM `products` WHERE `id` = '1'";
    $result = mysqli_query($conn,$sql);

    // selecting a certain product

    while($row = mysqli_fetch_assoc($result)){



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../cc/bg.css">
    <title>Home</title>

</head>
<body>
<?php include "../partials/_navbar.php"; ?>
<div class='row'>
    <div class='col-sm-3'>
        <div class='card' style='width: 18rem; margin: 20px 20px; left: 10px'>
            <img src='https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg' class='card-img-top' alt='' style= 'height:200px; width:250px'>
            <div class='card-body'>
                <h5 class'=card-title' name='name'> <?php echo $row['name']; ?> </h5>
                <p class='card-text'><?php echo $row['description']; ?></p>
                <a href='#' class='btn btn-primary'>Go somewhere</a>
            </div>
        </div>
    </div>


</body>











<?php }

?>
<?php
$date1 = date("Y-m-d");
$date2 = $row['bidstart'];
if($date1<$date2 ){
    echo "works";
}
else if($date1 > $date2){
    echo "Not works";
}
?>
