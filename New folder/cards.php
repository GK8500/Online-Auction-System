

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>

    <style>
        body{
            display: flex;
        }

        .cards{
            background-color: rgb(253, 223, 223);
            background-image: linear-gradient(to top, #000000, #0d0d0d, #333333, #515151, #808080);
            border: 1px solid black;
            color: rgb(255, 255, 255);
            border-radius: 10px;
            width: 15%;
            padding: 5px 5px 5px 5px;
            margin-left: 30px;
            margin-top: 50px;



        }

        header{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }
        .body{
            padding: 2px 2px 2px 2px;
        }

        .btn{
            display: flex;
            justify-items: center;
            border: 1px solid black;
            border-radius: 7px;
            cursor: pointer;
            background-color: rgb(0, 234, 255);
            color: rgb(0, 0, 0);
            padding: .5em 0.75em;
        }
        .btn:hover{
            border: 1px solid rgb(255, 255, 255);
            background-color: rgb(233, 151, 36);
            color: rgb(255, 255, 255);
        }
        .image{
            width: 100%;

        }

    </style>
</head>
<body>
  
    <div class="cards">
        <header>
        <img src=<?php echo $row['imagepath'] ?> class='card-img-top' alt='' style='height:200px; width:250px'>
                <?php }
                // if image path is not given

              else {
                ?>
                  <img src='https://m.media-amazon.com/images/I/61Dw5Z8LzJL._SL1000_.jpg' class='card-img-top' alt='' style='height:200px; width:250px'>
                <?php } ?>
            <H3> <?php echo $row['name']; ?></H3>
        </header>
        <div class="body">
        <p class='card-text'><?php $string = $row['description'];
                                        $stringCut = substr($string, 0, 100);
                                        echo $stringCut . '....';
                                        ?></p>
                  <p class='card-text'> </p>

        </div>
        <br>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button" style="justify-content: center;">BID Rs <?php echo $row['msp']; ?></button>
        </div>
        <?php

// checking if bid needs to be started or ended

$today = date("Y-m-d");    // today's date
$bidday = $row['bidstart'];      // check if the date to start the bid has arrived
$bidend = $row['bidend'];        // check if the date to end the bid has arrived


if ($today < $bidday) {
  $sql_status = "UPDATE `product` SET `status` = 'not started' WHERE `product`.`id` = $id";        // updating status
  $result_status = mysqli_query($conn, $sql);
?>
  <a href='#' class='btn btn-primary disabled'>Bid Not Started Yet</a>

<?php } else if ($today >= $bidday && $today < $bidend) {
  $sql_status = "UPDATE `product` SET `status` = 'on sale' WHERE `product`.`id` = $id";        // updating status
  $result_status = mysqli_query($conn, $sql);
?>
  <a href='product_display.php?pId=<?php echo $row['id']; ?>' < class='btn btn-primary'>BID</a>
<?php
} else if ($today > $bidend) {
  $sql_status = "UPDATE `product` SET `status` = 'sold' WHERE `product`.`id` = $id";  // updating status
  $result_status = mysqli_query($conn, $sql);
?>
  <a href='product_display.php?pId=<?php echo $row['id']; ?>' class='btn btn-danger '>Sold out</a>
<?php } ?>
</div>
    </div>
    

</body>
</html>


