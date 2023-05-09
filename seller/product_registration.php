<?php

    require "../partials/db.php";
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header("location: login.php");
        exit;
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Seller ID needs to be inserted in the product table as well
        // Use $_SESSION['username']

        $filename = $_FILES["upload"]["name"];
        $tempname = $_FILES["upload"]["tmp_name"];

        $folder = "../seller/uploads/" . $filename;
        move_uploaded_file($tempname, $folder);

        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $start = $_POST['starttime'];
        $end = $_POST['endtime'];

        // $sql = "INSERT INTO `product` (`id`,`sold_by` , `name`, `description`, `msp`, `catogary`, `bidstart`, `bidend`, `username` ,`status`, `path`) VALUES (NULL, 2 ,'$name', '$desc', '$price', 'fashion', '$start', '$end', '' , 'not started', '$folder')";
        $sql = "INSERT INTO `product` (`id`,`sold_by` , `name`, `description`, `msp`, `catogary`, `bidstart`, `bidend`, `username`, `status`, `path`) VALUES (NULL, '2', '$name', '$desc', '$price', '$category', '$start', '$end', '', 'not started', '$folder')";      
        $result = mysqli_query($conn,$sql);
        
          
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulations!</strong> New product added.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    include "../seller/seller_nav.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="../cc/bg.css" rel="stylesheet">
    <title>Product Registration</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;

        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-content: center;
        }
        .item {
        	padding: 25px;
        	background-color: rgba(0,0,0,0.5);
        	border-radius: 5px;
        	color: #fff;
        }


    </style>
</head>

<body>
<?php
// include "seller_nav.php";
?>

<div class="containers" style="display: flex; justify-content: center; margin-top:100px">


    <form action="../seller/product_registration.php" autocapitalize="on" autocomplete="on" method="POST" enctype="multipart/form-data">
    <div class="item">
        <h1 style="text-align: center; padding: 15px"> PRODUCT REGISTRATION</h1>
        <hr>
        <table style="border: 0; border-spacing:5px; padding:3px;">
            <tbody>
            <tr>
                <th>Name</th>
                <td><label>
                    <input name="name" required="required" type="text">
                </label>
                </td>
            </tr>
            <tr>
                <th>Description</th>
                <td>
                    <label>
                        <textarea cols="30" name="desc" required="required" rows="5"></textarea>
                    </label>
                </td>
            </tr>
            <tr>
                <th>
                    Put images for your product
                </th>
                <td>
                    <input multiple="multiple" name="upload" required="required" type="file">
                </td>
            </tr>
            <tr>
                <th>Minimum Selling Price</th>
                <td><input name="price" required="required" type="number"></td>
            </tr>
            <tr>
                <th>Choose a category for your product:</th>
                <td>
                    <select id="categories" name="category">
                      <option value="appliances">Home Appliances</option>
                      <option value="homedecor">Home Decor</option>
                      <option value="Electronics">Laptop/Mobile Phones/Watches</option>
                      <option value="fashion">Fashion</option>
                      <option value="watches">Watches</option>
                      <option value="cars&bikes">Vehicals</option>
                      <option value="Coins">Coins & Currency</option>
                      <option value="others">others</option>
                      
                    </select></td>
            </tr>
            <tr>
                <th>Start time of bid</th>
                <td><input id="starttime" name="starttime" required="required" type="datetime-local"></td>
            </tr>
            <tr>
                <th>End time of bid</th>
                <td><input id="endtime" name="endtime" required="required" type="datetime-local"></td>
            </tr>
            <tr>
                <td colspan="2" style="display: flex; justify-content: center; margin: 10px; padding: 10px"><input
                        name="submit" type="submit"></td>
            </tr>
            </tbody>
        </table>
    </div>
    </form>
</div>
z
</body>
</html>




