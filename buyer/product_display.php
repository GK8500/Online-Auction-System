<?php
include "../partials/db.php";
$id = $_GET['pId'];

$sql = "SELECT product.*, product_image.path imagePath FROM `product` join product_image WHERE product_image.product_id = $id";
$result = mysqli_query($conn, $sql);
session_start();
$user = $_SESSION['username'];
echo $user;
if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
    exit;
}
$row = mysqli_fetch_assoc($result);
?>

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
        .container-fluid {
            padding: 5% 15%;
        }

        h6 {
            color: darkblue;
        }

        h1 {
            padding: 10px;
            padding-left: 0;
        }

        .cable {
            padding: 10px;
            padding-left: 0;
        }

        /* Horizontal card slider */

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #00b09b;
            /* fallback for old browsers */
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-gradient(linear,
                    left top,
                    right top,
                    from(#96c93d),
                    to(#00b09b));
            background: linear-gradient(to right, #96c93d, #00b09b);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 4px 16px;
        }

        #cards-container {
            overflow: hidden;
            margin: 20px;
        }

        .cards {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 99999px;
        }

        .card {
            /* Add shadows to create the "card" effect */
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            background: #fff;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            width: 235px;
            margin: 15px 7.5px;
        }

        .card:hover {
            -webkit-box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .card .img {
            max-width: 220px;
            height: 220px;
            display: inline-block;
        }

        #slide-left-container,
        #slide-right-container {
            display: none;
        }

        #slide-left-container.active,
        #slide-right-container.active {
            display: block;
            cursor: pointer;
        }

        .slide-left,
        .slide-right {
            border-color: #fff;
            border-style: solid;
            height: 20px;
            width: 20px;
            margin-top: 30%;
        }

        .slide-left {
            border-width: 4px 0 0 4px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            margin-left: 40%;
        }

        .slide-right {
            border-width: 4px 4px 0 0;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            margin-left: 22%;
        }
    </style>
</head>

<body>
	
    <div class="row container-fluid">
        <div class="col-lg-6 col-sm-6">
            <img src=<?php echo $row['imagePath'] ?> width="400px">
        </div>
        <div class="col-lg-6 col-sm-6">
            <h6><?php echo $row['catogary']; ?></h6>
            <h1><?php echo $row['name']; ?></h1>
            <!-- substr is used to cut down the number of cahrecters displayd in a certain area-->
            <p><?php echo $row['description']; ?> </p>

            <hr>

            <div class="cable">
                <p>Current Bid</p>
                <button type="button" class="btn btn-outline-info"><?php echo $row['msp']; ?></button>

            </div>
            <hr>
            <form action="product_display.php?pId=<?php echo $id; ?>" method="POST">
                <span style="padding-right: 6px;"><input name="price" required="required" type="number"></span>
                <?PHP
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $price = $_POST['price'];

                    // checking if the bidding price is higher than the last one

                    if ($price > $row['msp']) {
                        $sql = "UPDATE `product` SET `msp` = '$price' WHERE `product`.`id` = $id";
                        $result = mysqli_query($conn, $sql);

                        // Adding the highest bidder to the table

                        $sql = "UPDATE `product` SET `username` = '$user' WHERE `product`.`id` = $id";
                        $result = mysqli_query($conn, $sql);
                    }
                }
                ?>


                <input type="submit" class="btn btn-success" value="Bid"></input>


            </form>
        </div>
    </div>

	<?php
	
	$sql1 = "SELECT * FROM product WHERE id = $id";
	$result1 = mysqli_query($conn, $sql1);
	

	$product_row = mysqli_fetch_assoc($result1);
	$cat = $product_row['catogary'];
	echo $cat;
	

	$sql2 = "SELECT * FROM product WHERE catogary = '$cat' ";
	$result2 = mysqli_query($conn, $sql2);
	
	while($cat_row = mysqli_fetch_assoc($result2) ){

	

	?>

    <div class="container">
    <div id="slide-left-container">
      <div class="slide-left">
      </div>
    </div>
    <div id="cards-container">
      <div class="cards">
        <div class="card">
          <img src="img src=<?php echo $row['imagePath'] ?>" alt="Animals" style="width:100%">
          <div class="container">
            <h4>
              <b><?php echo $row['name']; ?></b>
            </h4>
          </div>
        </div>

		<?php } ?>
      </div>
    </div>

    <div id="slide-right-container">
      <div class="slide-right">
      </div>
    </div>

  </div>

<script> 

function updateSliderArrowsStatus(
  cardsContainer,
  containerWidth,
  cardCount,
  cardWidth
) {
  if (
    $(cardsContainer).scrollLeft() + containerWidth <
    cardCount * cardWidth + 15
  ) {
    $("#slide-right-container").addClass("active");
  } else {
    $("#slide-right-container").removeClass("active");
  }
  if ($(cardsContainer).scrollLeft() > 0) {
    $("#slide-left-container").addClass("active");
  } else {
    $("#slide-left-container").removeClass("active");
  }
}
$(function() {
  // Scroll products' slider left/right
  let div = $("#cards-container");
  let cardCount = $(div)
    .find(".cards")
    .children(".card").length;
  let speed = 500;
  let containerWidth = $(".container").width();
  let cardWidth = 250;

  updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);

  //Remove scrollbars
  $("#slide-right-container").click(function(e) {
    if ($(div).scrollLeft() + containerWidth < cardCount * cardWidth) {
      $(div).animate(
        {
          scrollLeft: $(div).scrollLeft() + cardWidth
        },
        {
          duration: speed,
          complete: function() {
            setTimeout(
              updateSliderArrowsStatus(
                div,
                containerWidth,
                cardCount,
                cardWidth
              ),
              1005
            );
          }
        }
      );
    }
    updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
  });
  $("#slide-left-container").click(function(e) {
    if ($(div).scrollLeft() + containerWidth > containerWidth) {
      $(div).animate(
        {
          scrollLeft: "-=" + cardWidth
        },
        {
          duration: speed,
          complete: function() {
            setTimeout(
              updateSliderArrowsStatus(
                div,
                containerWidth,
                cardCount,
                cardWidth
              ),
              1005
            );
          }
        }
      );
    }
    updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
  });

  // If resize action ocurred then update the container width value
  $(window).resize(function() {
    try {
      containerWidth = $("#cards-container").width();
      updateSliderArrowsStatus(div, containerWidth, cardCount, cardWidth);
    } catch (error) {
      console.log(
        `Error occured while trying to get updated slider container width: 
            ${error}`
      );
    }
  });
});


</script>

</body>

</html>