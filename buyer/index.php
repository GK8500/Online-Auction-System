
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="cc\bg.css">
    <title>Home</title>

</head>
<body>
    
    <?php
    include "../partials/_navbar.php";
    ?>


    <div id="carouselExampleIndicators" class="carousel slide" style="padding-left: 10px; padding-right:10px; padding-top:10px;margin-top:60px">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRefjw2AQNtBmWDlM8YhZR7ymmycLH-2ziNWg&usqp=CAU" class="d-block w-100" alt="..." style="height: 300px;width : 50% ;margin-left:20px">
        </div>
        <div class="carousel-item">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRefjw2AQNtBmWDlM8YhZR7ymmycLH-2ziNWg&usqp=CAU" class="d-block w-100" alt="..." style="height: 300px;width : 50% ;margin-left:20px">
        </div>
        <div class="carousel-item">
          <img src="data:image/png;base64,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" class="d-block w-100" alt="..." style="height: 300px;width : 50%; margin-left:20px">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="row">
    <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>

 <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px;">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>
 <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px;">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>
 <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px;">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>
 <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px;">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>
 <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px;">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>
 <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px;">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>
 <div class="col-sm-3">
    <div class="card" style="width: 18rem; margin-left: 10px; margin-top:20px;margin-right:10px;margin-bottom:20px;">
      <img src="https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg" class="card-img-top" alt="..." style= "height:200px; width:250px">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    </div>



</div>

</body>
</html>