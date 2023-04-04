<?php
    include "../partials/db.php";

session_start();

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
    <title>MyBids</title>
    <style>

    </style>
</head>
<body>
<?php include "../partials/_navbar.php";
        echo"<br>";
        echo"<br>";
        echo"<br>";
    $usernames =  $_SESSION['username'];
    $sql = "SELECT product.*, product_image.path imagepath, product_image.sortorder pic_no FROM product left join product_image on product.id = product_image.product_id AND username ='$usernames'";
    $result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);

if($num>0) {
while ($row = mysqli_fetch_assoc($result)) {
$id = $row['id'];           // id added

?>
<div class='card' style='width: 18rem; margin: 20px 20px; left: 10px'>
    <?php
    // check if the product has already been displayed
    if($row['pic_no'] == 1){

    // if image path is given

    if($row['imagepath'] != null){

        ?>
        <img src=<?php echo $row['imagepath'] ?> class='card-img-top' alt='' style='height:200px; width:250px'>
    <?php }

    // if image path is not given

    else{
        ?>
        <img src='https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg' class='card-img-top' alt='' style= 'height:200px; width:250px'>
    <?php } ?>
    <div class='card-body'>
        <u> <h5 class= 'card-title'> <?php echo $row['name']; ?> </h5></u>
        <p class='card-text'><?php  $string = $row['description'];
            $stringCut = substr($string,0,100);
            echo $stringCut.'....';
            ?></p>
        <p class='card-text'>Rs <?php echo $row['msp']; ?> </p>
    </div>
</div>

<?php
} }
}
?>

</body>
</html>

