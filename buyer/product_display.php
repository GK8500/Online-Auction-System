<?php
include "../partials/db.php";
    $productId = $_REQUEST['productId'];
    $sql = "SELECT * FROM `products` WHERE `id` = $productId";
    $result = mysqli_query($conn, $sql);
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header("location: login.php");
        exit;
    }
while ($row = mysqli_fetch_assoc($result)) {
?>

</html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $row['name']; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <style>
            .container-fluid{
                padding: 5% 15%;
            }
            h6{
                color: darkblue;
            }
            h1{
                padding: 10px;
                padding-left: 0;
            }
            .cable{
                padding: 10px;
                padding-left: 0;
            }
        </style>
    </head>
    <body>
    <div class="row container-fluid">
        <div class="col-lg-6 col-sm-6">
            <img src="https://m.media-amazon.com/images/I/411yU+n3UkL._SY300_SX300_.jpg" width="400px" >
        </div>
        <div class="col-lg-6 col-sm-6">
            <h6><?php echo $row['catogary']; ?></h6>
            <h1><?php echo $row['name']; ?></h1>
            <p><?php echo $row['description']; ?> </p>
            <hr>

            <div class="cable">
                <p>Current Bid</p>
                <button type="button" class="btn btn-outline-info"><?php echo $row['msp']; ?></button>

            </div>
            <hr>
            <form action="product_display.php" method="POST">
            <span style="padding-right: 6px;"><input name="price" required="required" type="number"></span>
            <?PHP
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $price = $_POST['price'];
                if($price > $row['msp']){
                    $sql = "UPDATE `products` SET `msp` = '$price' WHERE `products`.`id` = 6";
                    $result = mysqli_query($conn, $sql);
                }}
             ?>
            <input type="submit" class="btn btn-success value="Bid">Bid</input>
            </form>

        </div>
    </div>
    </body>
    </html>
<?php  }
 ;
    ?>