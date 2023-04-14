<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Navbar</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ps-3 fixed-top"  style="margin-bottom: 20px ;">
    <a class="navbar-brand" href="#">AW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../seller/Seller_dash.php">Home</a>
            </li>
            <!-- new product -->
            <li class="nav-item">
                <a class="nav-link" href="../seller/product_registration.php">Sell</a>
            </li>


<?php       if(!isset($_SESSION['loggedin'])){
             ?>
            <div class="float-right" style="text-align:right">
                <li class="nav-item">
                    <a class="nav-link" href="../seller/signup.php" >Sign Up</a>
                </li>

            <?php } ?>
            </div><div class="float-right" style="text-align:right">
                <li class="nav-item">
                    <a class="nav-link" href="../seller/logout.php" >Logout</a>
                </li>
                
            </div>
            <li class="nav-item">
                <a class="nav-link" href="../buyer/about.php">About Us</a>
            </li>
        </ul>
    </div>

</nav>
<div >
        <hr>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>