

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>

    <div class="slider">
    <!-- fade css -->
    <div class="myslide fade">
      <img src="images/1.jpg" style="width: 100%; height: 100%;">
    </div>

    <div class="myslide fade">
      <img src="images/2.jpg" style="width: 100%; height: 100%;">
    </div>

    <div class="myslide fade">
      <img src="images/3.jpg" style="width: 100%; height: 100%;">
    </div>

    <div class="myslide fade">
      <img src="images/4.jpg" style="width: 100%; height: 100%;">
    </div>

    <div class="myslide fade">
      <img src="images/5.jpg" style="width: 100%; height: 100%;">
    </div>
    <!-- /fade css -->

    <!-- onclick js -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="dotsbox" style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
    </div>
    <!-- /onclick js -->
  </div>

  <style> 

.slider{
  position: relative;
  width: 100%;
  background: #2c3e50; 
}
.myslide{
  height: 655px;
  display: none;
  overflow: hidden;
}

.quotesection{
  align-items: center;
}

.quote{
  font-style: italic;
  text-align: center;
  font-size: 4.5rem;
}

.prev, .next{
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  font-size: 50px;
  padding: 15px;
  cursor: pointer;
  color: #fff;
  transition: 0.1s;
  user-select: none;
}
.prev:hover, .next:hover{
  color: black; 
}
.next{
  right: 0;
}
.dotsbox{
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  bottom: 20px;
  cursor: pointer;
}
.dot{
  display: inline-block;
  width: 15px;
  height: 15px;
  border: 3px solid #fff;
  border-radius: 50%;
  margin: 0 10px;
  cursor: pointer;
}

.active, .dot:hover{
  border-color: black;
}

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: 0.8}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: 0.8}
  to {opacity: 1}
}

@-webkit-keyframes posi {
  from {left: 25%;}
  to {left: 15%;}
}


@keyframes posi {
  from {left: 25%;}
  to {left: 15%;}
}

.myslide img{
  transform: scale(1.5, 1.5);
  -webkit-animation-name: zoomin;
    -webkit-animation-duration: 40s;
    animation-name: zoomin;
    animation-duration: 40s;
}
@-webkit-keyframes zoomin {
  from {transform: scale(1, 1);}
  to {transform: scale(1.5, 1.5);}
}


@keyframes zoomin {
  from {transform: scale(1, 1);}
  to {transform: scale(1.5, 1.5);}
}

@media screen and (max-width: 800px){
  .myslide{
    height: 500px;
  }

  @-webkit-keyframes posi2 {
    from {top: 35%;}
    to {top: 50%;}
  }


  @keyframes posi2 {
    from {top: 35%;}
    to {top: 50%;}
  }
}
@media screen and (max-width: 520px){
  .sign{
    margin-right: 20px;
  }
  .sign a{
    font-size: 12px;
  }
}
/* SCHEME SLIDER END */
.heading{
  height: 20vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  }
  
  .heading h2{
  font-size: 2.5rem;
  color: #14213d;
  text-transform: uppercase;
  padding: 0.4rem 0;
  letter-spacing: 4px;
  }
  .line div{
  margin: 0 0.2rem;
  }
  .line div:nth-child(1),
  .line div:nth-child(3){
  height: 3px;
  width: 70px;
  background: #14213d;
  border-radius: 5px;
  }
  .line{
  display: flex;
  align-items: center;
  }
  .line div:nth-child(2){
  width: 10px;
  height: 10px;
  background: #14213d;
  border-radius: 50%;
  }

:root {
  --d: 700ms;
  --e: cubic-bezier(0.19, 1, 0.22, 1);
  --font-sans: "Rubik", sans-serif;
  --font-serif: "Cardo", serif;
}

.page-content {
  display: grid;
  grid-gap: 1rem;
  padding: 2.5rem;
  max-width: 1024px;
  margin: 0 auto;
  font-family: var(--font-sans);
}
@media (min-width: 600px) {
  .page-content {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (min-width: 800px) {
  .page-content {
    grid-template-columns: repeat(4, 1fr);
  }
}

.card {
  position: relative;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  padding: 1rem;
  width: 100%;
  text-align: center;
  color: whitesmoke;
  background-color: whitesmoke;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1), 0 4px 4px rgba(0, 0, 0, 0.1), 0 8px 8px rgba(0, 0, 0, 0.1), 0 16px 16px rgba(0, 0, 0, 0.1);
}
@media (min-width: 600px) {
  .card {
    height: 350px;
  }
}
.card:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 110%;
  background-size: cover;
  background-position: 0 0;
  transition: transform calc(var(--d) * 1.5) var(--e);
  pointer-events: none;
}
.card:after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 200%;
  pointer-events: none;
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.009) 11.7%, rgba(0, 0, 0, 0.034) 22.1%, rgba(0, 0, 0, 0.072) 31.2%, rgba(0, 0, 0, 0.123) 39.4%, rgba(0, 0, 0, 0.182) 46.6%, rgba(0, 0, 0, 0.249) 53.1%, rgba(0, 0, 0, 0.32) 58.9%, rgba(0, 0, 0, 0.394) 64.3%, rgba(0, 0, 0, 0.468) 69.3%, rgba(0, 0, 0, 0.54) 74.1%, rgba(0, 0, 0, 0.607) 78.8%, rgba(0, 0, 0, 0.668) 83.6%, rgba(0, 0, 0, 0.721) 88.7%, rgba(0, 0, 0, 0.762) 94.1%, rgba(0, 0, 0, 0.79) 100%);
  transform: translateY(-50%);
  transition: transform calc(var(--d) * 2) var(--e);
}
.card:nth-child(1):before {
  background-image: url(https://images.unsplash.com/photo-1517021897933-0e0319cfbc28?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
}
.card:nth-child(2):before {
  background-image: url(https://images.unsplash.com/photo-1533903345306-15d1c30952de?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
}
.card:nth-child(3):before {
  background-image: url(https://images.unsplash.com/photo-1545243424-0ce743321e11?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
}
.card:nth-child(4):before {
  background-image: url(https://images.unsplash.com/photo-1531306728370-e2ebd9d7bb99?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
}
.card:nth-child(5):before {
  background-image: url(https://images.unsplash.com/photo-1531306728370-e2ebd9d7bb99?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
}
.card:nth-child(6):before {
  background-image: url(https://images.unsplash.com/photo-1531306728370-e2ebd9d7bb99?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
}
.card:nth-child(7):before {
  background-image: url(https://images.unsplash.com/photo-1531306728370-e2ebd9d7bb99?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);
}

.content {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  padding: 1rem;
  transition: transform var(--d) var(--e);
  z-index: 1;
}
.content > * + * {
  margin-top: 1rem;
}

.title {
  font-size: 1.3rem;
  font-weight: bold;
  line-height: 1.2;
}

.copy {
  font-family: var(--font-serif);
  font-size: 1.125rem;
  font-style: italic;
  line-height: 1.35;
}

.btn {
  cursor: pointer;
  margin-top: 1.5rem;
  padding: 0.75rem 1.5rem;
  font-size: 0.65rem;
  font-weight: bold;
  letter-spacing: 0.025rem;
  text-transform: uppercase;
  color: white;
  background-color: #14213d;
  border: none;
}
.btn:hover {
  background-color: #fca311;
}
.btn:focus {
  outline: 1px dashed yellow;
  outline-offset: 3px;
}

@media (hover: hover) and (min-width: 600px) {
  .card:after {
    transform: translateY(0);
  }

  .content {
    transform: translateY(calc(100% - 4.5rem));
  }
  .content > *:not(.title) {
    opacity: 0;
    transform: translateY(1rem);
    transition: transform var(--d) var(--e), opacity var(--d) var(--e);
  }

  .card:hover,
.card:focus-within {
    align-items: center;
  }
  .card:hover:before,
.card:focus-within:before {
    transform: translateY(-4%);
  }
  .card:hover:after,
.card:focus-within:after {
    transform: translateY(-50%);
  }
  .card:hover .content,
.card:focus-within .content {
    transform: translateY(0);
  }
  .card:hover .content > *:not(.title),
.card:focus-within .content > *:not(.title) {
    opacity: 1;
    transform: translateY(0);
    transition-delay: calc(var(--d) / 8);
  }

  .card:focus-within:before, .card:focus-within:after,
.card:focus-within .content,
.card:focus-within .content > *:not(.title) {
    transition-duration: 0s;
  }
}

  </style>

  <script>
    const myslide = document.querySelectorAll('.myslide'),
      dot = document.querySelectorAll('.dot');
    let counter = 1;
    slidefun(counter);

    let timer = setInterval(autoSlide, 8000);
    function autoSlide() {
      counter += 1;
      slidefun(counter);
    }
    function plusSlides(n) {
      counter += n;
      slidefun(counter);
      resetTimer();
    }
    function currentSlide(n) {
      counter = n;
      slidefun(counter);
      resetTimer();
    }
    function resetTimer() {
      clearInterval(timer);
      timer = setInterval(autoSlide, 8000);
    }

    function slidefun(n) {

      let i;
      for (i = 0; i < myslide.length; i++) {
        myslide[i].style.display = "none";
      }
      for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(' active', '');
      }
      if (n > myslide.length) {
        counter = 1;
      }
      if (n < 1) {
        counter = myslide.length;
      }
      myslide[counter - 1].style.display = "block";
      dot[counter - 1].className += " active";
    }
  </script>
  <!-- Schemes end -->

  <!-- Scheme Card Start -->
  <div class="heading">
    <h2>Schemes</h2>
    <div class="line">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <main class="page-content">
    <!-- <div class="card">
      <div class="content">
        <h2 class="title">Education</h2>
        <p class="copy">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button class="btn">View</button>
      </div>
    </div> -->
<div class="card" style= " background-image: url(https://images.unsplash.com/photo-1533903345306-15d1c30952de?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ);">
  <div class="content">
        <h2 class="title"> <?php echo $row['name']; ?></h2>
        <p class="copy"><?php $string = $row['description'];
                                    $stringCut = substr($string, 0, 100);
                                    echo $stringCut . '....';
                                    ?></p>
        <button class="btn"><?php

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
</button>
      </div>
    </div>
    <!-- <div class="card">
      <div class="content">
        <h2 class="title">Health</h2>
        <p class="copy">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button class="btn">View</button>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">Women Empowerment</h2>
        <p class="copy">Lorem, ipsum dolor sit amet consectetur adipisicing eli hammad.</p>
        <button class="btn">View</button>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">Human Rights</h2>
        <p class="copy">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button class="btn">View</button>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">Animal Rights</h2>
        <p class="copy">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button class="btn">View</button>
      </div>
    </div>
    <div class="card">
      <div class="content">
        <h2 class="title">Charity</h2>
        <p class="copy">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
        <button class="btn">View</button>
      </div>
    </div>
  </main> -->
  <!-- Scheme Card end -->
</head>
<body>
  
    
    

</body>
</html>


