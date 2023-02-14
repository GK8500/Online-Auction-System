
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
//        include "../partials/_navbar.php";
    ?>

</head>
<body>

<?php
$user = $_SESSION['username'];
echo $user;
$sql = "SELECT * FROM `product` WHERE `product`.`username` = '$user'";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if(true) {
    // works
while($row = mysqli_fetch_assoc($result)){


?>
<!--        Bootstrap-->

<div class="card mb-6" style="margin-top: 10px; margin-left: 10px;margin-right: 10px">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="../seller/uploads/test.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p class="card-text"><small class="text-muted">Bought for: Rs <?php echo $row['msp']; ?></small></p>

            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php }
};
?>
