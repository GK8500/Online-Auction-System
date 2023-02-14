
<?php
require "../partials/db.php";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Cart</title>
    <?php
//    include "../partials/_navbar.php";
    ?>

</head>
<body>

<?php
$user = $_SESSION['username'];

$sql = "SELECT * FROM `product` WHERE catogary ='appliances' ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num>0) {
while ($row = mysqli_fetch_assoc($result)) {


?>
<!--        Bootstrap-->

<div class="card-deck">
    <div class="card">
        <img class="card-img-top" src="../seller/uploads/test.jpg" alt="Card image cap">
        <div class="card-body">
            <u> <h5 class='card-title'> <?php echo $row['name']; ?> </h5></u>
            <p class='card-text'><?php echo $row['description']; ?></p>
            <p class='card-text'>Rs <?php echo $row['msp']; ?> </p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
    </div>
</div>
</body>
</html>
<?php }
      };
?>
