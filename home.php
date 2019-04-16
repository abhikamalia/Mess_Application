<?php include('connect.php'); ?>
<?php include('active_user.php'); ?>

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
      <a href="#" class="w3-button w3-block w3-black">HOME</a>
    </div>
    
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-black">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="#where" class="w3-button w3-block w3-black">WHERE</a>
    </div>
    <div class="w3-col s3">

     	<a href="#reserve" class="w3-button w3-block w3-black">RESERVE</a>

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
        <a href="feedback.php" class="w3-button w3-block w3-black">Feedback</a>
        <a href="#about" class="w3-button w3-block w3-black">Contact us</a>
       
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


<!-- Menu Container -->
<div class="w3-container" id="menu">

  <div class="w3-content" style="max-width:700px">
 	 
    <h4 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE MENU</span></h4>

  		
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Eat');" id="myLink">
        <div class="w3-col s6 tablink">Eat</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');">
        <div class="w3-col s6 tablink">Drinks</div>
      </a>
    </div>

    <div id="Eat" class="w3-container menu w3-padding-48 w3-card">
    	<h4 class="w3-center"><span><?php echo date('l');  ?></span></h4>
     	<h5>Specials</h5>
      	<?php

      		$query = "SELECT * FROM menu ORDER BY id DESC";
      		$result = mysqli_query($database , $query);
      		while ($row = $result -> fetch_assoc()) {?>
      			<p class="w3-text-grey"><?php  echo $row['special_meal']; ?></p><br>			
      	<?php
      			break;
      		}

      	?><br>
    
      	<h5>Meal</h5>
       	<?php

      		$query2 = "SELECT * FROM menu ORDER BY id DESC";
      		$result2 = mysqli_query($database , $query2);
      		while ($row2 = $result2 -> fetch_assoc()) {?>
      			<p class="w3-text-grey"><?php  echo $row2['meal']; ?></p><br>			
      <?php
      			break;
      		}

      ?><br>
      
    
      
    </div>

    <div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
    	<h4 class="w3-center"><span><?php echo date('l');  ?></span></h4>
      <h5>Specials</h5>
      <?php

      		$query3 = "SELECT * FROM menu ORDER BY id DESC";
      		$result3 = mysqli_query($database , $query3);
      		while ($row3 = $result3 -> fetch_assoc()) {?>
      			<p class="w3-text-grey"><?php  echo $row3['special_drink']; ?></p><br>			
      <?php
      			break;
      		}

      ?><br>
      
    
      <h5>Regular</h5>
      <?php

      		$query4 = "SELECT * FROM menu ORDER BY id DESC";
      		$result4 = mysqli_query($database , $query4);
      		while ($row4 = $result4 -> fetch_assoc()) {?>
      			<p class="w3-text-grey"><?php  echo $row4['drink']; ?></p><br>			
      <?php
      			break;
      		}

      ?><br>
    
      
    </div>  
    <!--<img src="./food2.jpg" style="width:100%;max-width:1000px;margin-top:32px;">-->
  </div>
</div>


<div class="w3-container">
  <div class="w3-content" style="max-width:700px">
  		



  <?php

    if (isset($_POST['submit'])) {
      # code...
      $name = $_POST['name'];
      $seats = $_POST['people'];
      $date = $_POST['date'];
      $contact = $_POST['contact'];
      $message = $_POST['message'];
      $query = "INSERT INTO reserve(name , seats , event_date , message , contact) VALUES(? , ? , ? , ? , ?)";
      $statement = $database -> prepare($query);
      $statement -> bind_param('sssss' , $name , $seats , $date , $message , $contact);
      $statement -> execute();
      mysqli_query($database , $query);

    }
    $total_seats = 100;
    $seats = 0;
    $query5 = "SELECT   SUM(seats) FROM reserve";
    $result5 = mysqli_query($database , $query5);
    while ($row5 = $result5 -> fetch_assoc()) {
      # code...
      $seats = $row5['SUM(seats)'];?>
  <?php
    }
      $available_seats = $total_seats - $seats;?>

  
  	 	<h5 class="w3-center w3-tag">SEATS AVAILABLE : </h5>
  		<span class="w3-text-grey"><?php echo $available_seats; ?></span><br>
  		<h5 class="w3-center w3-tag">SEATS BOOKED: </h5>
  		<span class="w3-text-grey"><?php echo $seats; ?></span>
  

  		
  </div>
</div>

<!-- Contact/Area Container -->
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">WHERE TO FIND US</span></h5>
    
    <p style="width:100%;max-width: 700px;" class="w3-responsive"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.7515340248433!2d72.54558856450834!3d23.032893434947777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84ebef343033%3A0x27ed930388331268!2sH+Block%2C+LDCE+Hostel!5e0!3m2!1sen!2sin!4v1554396523986!5m2!1sen!2sin" width="400" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></p>
    <!--<img src="/w3images/map.jpg" class="w3-image" style="width:100%">-->
    <!--<p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>-->
    
  </div>
</div>
<div class="w3-container" id="reserve" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
  	<br>
  	<br>
  	<p><strong>Reserve</strong> seats, ask for today's special or just send us a message:</p>
    <form action="home.php" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Contact No." required name="contact"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="people"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" ></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="message"></p>
      <p><button class="w3-button w3-black" name="submit" onclick="window.alert('Order placed Successfully......Soon you will receive a call for confirmation....')" type="submit">SEND</button></p>
    </form>
  </div>
</div>

<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <!--<h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT THE MESS</span></h5>
    <p></p>
    <p></p>-->
    <!--<div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Use products from nature for what it's worth - but never too early, nor too late." Fresh is the new sweet.</i></p>
      <p>Chef, Coffeeist and Owner: Liam Brown</p>
    </div>-->
    <img src="./index.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Opening hours:</strong> everyday from 7am to 9pm.</p>
    <p><strong>Address:</strong> L.D college of Engg. M.E hostel</p>
    <p><strong>Name:</strong> Sunil bhai</p>
    <p><strong>Mobile:</strong></p>
  </div>
</div>

<!-- End page content -->
</div>
<div class="w3-sand w3-grayscale w3-large">


<!-- Menu Container -->
<div class="w3-container" id="menu">
<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p>Created by <a href="#"  target="_blank" class="w3-hover-text-green">Abhikamalia</a></p>
</footer>


<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>

