<?php include('connect.php'); ?>


<!DOCTYPE html>
<html>
<title>EasyTummy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<script type="text/javascript">
    function toggleMenu(){
      document.getElementById('w3-sidebar').classList.toggle('active');
    }
</script>
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("./food.jpg");
  min-height: 75%;
  width: 100%;
}


.menu {
  display: none;
}
</style>
<body>


<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    
    <div class="w3-col s3">
      <a href="home.php" class="w3-button w3-block w3-black">HOME</a>
    </div>
    
    <div class="w3-col s3">
      <a href="home.php#menu" class="w3-button w3-block w3-black">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="home.php#where" class="w3-button w3-block w3-black">WHERE</a>
    </div>
    <div class="w3-col s3">

     	<a href="home.php#reserve" class="w3-button w3-block w3-black">RESERVE</a>

    </div>
  </div>
  <div class="w3-col s3 " id="w3-sidebar" onclick="toggleMenu()">
      <div class="w3-toggle-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul>
        <a href="discount.php" class="w3-button w3-block w3-black">Discounts/Offers</a>
        <a href="feedback" class="w3-button w3-block w3-black">Feedback</a>
        <a href="home.php#about" class="w3-button w3-block w3-black">Contact us</a>
        
      </ul>
    </div>
</div>


<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">Breakfast 7am to 10am</span>
    <span class="w3-tag">Lunch 12pm to 2pm</span>
    <span class="w3-tag">Dinner from 7pm to 9pm</span>
    
   
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:90px">Ashapura<br>Mess</span>
  </div>
  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">L.D college of Engg. M.E hostel</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
	<div class="w3-container" id="discount" style="padding-bottom:32px;">
  		<div class="w3-content" style="max-width:700px">

        <form action="feedback.php" method="post">
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Your name" required name="name"></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Feedback" required name="feedback"></p>
          <p><button class="w3-button w3-black" name="submit" onclick="window.alert('Thank you for your feedback...')" type="submit">SEND</button></p>
        </form >
        <?php
          if (isset($_POST['submit'])) {
            # code...
            $feedback = $_POST['feedback'];
            $name = $_POST['name'];
            $query = "INSERT INTO feedback(name , feedback) VALUES(? , ?)";
            $statement = $database -> prepare($query);
            $statement -> bind_param('ss' , $name , $feedback);
            $statement -> execute();
            mysqli_query($database , $query);

          }

        ?>
  		</div>
  	</div>

<!-- End page content -->
</div>



<!-- Menu Container -->

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p>Created by <a href="#"  target="_blank" class="w3-hover-text-green">Abhikamalia</a></p>
</footer>
