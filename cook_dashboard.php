<?php include('connect.php'); ?>


<!DOCTYPE html>
<html>
<title>EasyTummy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
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
}

.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-black">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#add" class="w3-button w3-block w3-black">ADD MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="#menu" class="w3-button w3-block w3-black">MENU</a>
    </div>
    <div class="w3-col s3">
      <a href="#reserve" class="w3-button w3-block w3-black">RESERVED</a>
    </div>
  </div>
</div>

<!-- Header with image -->
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
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE MENU</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Eat');" id="myLink">
        <div class="w3-col s6 tablink">Eat</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');">
        <div class="w3-col s6 tablink">Drink</div>
      </a>
    </div>

    <div id="Eat" class="w3-container menu w3-padding-48 w3-card">
    <h4 class="w3-center"><span><?php echo date('l');  ?></span></h4>
      <h5>Special</h5>
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
    <!--<img src="/w3images/coffeehouse2.jpg" style="width:100%;max-width:1000px;margin-top:32px;">-->
    <?php

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
<div class="w3-container" id="reserve" style="padding-bottom:32px;">
  	<div class="w3-content" style="max-width:700px">
    <!--<h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">WHERE TO FIND US</span></h5>
    <p>Find us at some address at some place.</p>
    <img src="/w3images/map.jpg" class="w3-image" style="width:100%">-->
    <!--<p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>-->
    <br>
    <br>
    <h5>RESERVED SEATS</h5>
    <?php

      	$query = "SELECT * FROM reserve ORDER BY id DESC";
      	$result = mysqli_query($database , $query);
      	while ($row = $result -> fetch_assoc()) {?>
      		<div class="w3-light-grey">
      			<p class="w3-text-grey">Name    : <?php  echo $row['name']; ?></p>			
      			<p class="w3-text-grey">Contact : <?php  echo $row['contact']; ?></p>
	      		<p class="w3-text-grey">Seats   : <?php  echo $row['seats']; ?></p>
	      		<p class="w3-text-grey">Date    : <?php  echo $row['event_date']; ?></p>
	      		<p class="w3-text-grey">Message : <?php  echo $row['message']; ?></p>
	      		<a href="test.php?delete=<?php echo $row['id'] ?>"  class ="w3-button w3-black">DONE</a>
      		</div>

			<!--<?php
				if (isset($_GET['delete'])) {
					# code...
					$id = $_GET['delete'];
					$query5 = "DELETE FROM reserve WHERE name = {$name}";
					mysqli_query($database , $query5);
					
				}

			?>-->
	      	
	      	<br>
	      	<br>
      	<?php
      		
      	}

    ?><br>
    
    
    
	</div>
</div>
<div class="w3-container" id="add" style="padding-bottom:32px;">
	<div class="w3-content" style="max-width:700px">
		<p><strong>Add</strong> Today's Menu</p>
    	<form action="cook_dashboard.php" method="post">
      		<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Meal" required name="meal"></p>
      		<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Special Meal" required name="special_meal"></p>
      		<!--<p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>-->
      		<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Regular Drink" required name="drink"></p>
      		<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Special Drink" required name="special_drink"></p>
      		<p><button class="w3-button w3-black" name="submit" type="submit">ADD</button></p>
    	</form>
	</div>
</div>

</div>
    
    
 

<div class="w3-container">
  <div class="w3-content" style="max-width:700px">
    
    <!--<div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Use products from nature for what it's worth - but never too early, nor too late." Fresh is the new sweet.</i></p>
      <p>Chef, Coffeeist and Owner: Liam Brown</p>
    </div>-->
    <img src="./index.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Opening hours:</strong> everyday from 7am to 9pm.</p>
    <p><strong>Address:</strong> L.D college of Engg. M.E hostel</p>
  </div>
</div>

<!-- End page content -->
</div>

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



<?php
	
	if (isset($_POST['submit'])) {
		# code...
		$special_meal = $_POST['special_meal'];
		$meal = $_POST['meal'];
		$special_drink = $_POST['special_drink'];
		$drink = $_POST['drink'];
		$query = "INSERT INTO menu(special_meal , meal , special_drink , drink) VALUES(? , ? , ? , ?)";
		$statement = $database -> prepare($query);
		$statement -> bind_param('ssss' , $special_meal , $meal , $special_drink , $drink);
		$statement -> execute();
		mysqli_query($database , $query);
		
	}

?>


<!--<?php include('top_cook.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container" align="center">

		<div class="row" align="center">

			<div class="col-md-10" align="center" style="display: inline-block;background: rgb(230 , 240 , 240);height: 130%;margin-top: 30px;">
				<div class="row">
					<form action="cook_dashboard.php" method="post" style="margin-top: 20px;">
					<input type="submit" name="submit3" value="Go" style="font-size: 15px;color: white;background: green;" class="pull-right" >
					<input type="text" name="percent" placeholder="Vacant Seats..." style="width: 10%;" class="pull-right">

				</form>
				</div>
				
				<?php 
					$cook_username = $_SESSION['cook_username'];
					$query2 = "SELECT * FROM picture ORDER BY id DESC";
					$result2 = mysqli_query($database , $query2);
					while ($row2 = $result2 -> fetch_assoc()) {
						# code...
						if ($row2['username'] == $cook_username) {?>
							<img src="<?php echo $row2['image']; ?>" height ="300" width = "300" style ="margin-top: 30px;border-radius: 50%;">
							<br>
							<br>
				<?php
							break;
						}
					}

				?>
				<form action="cook_dashboard.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" style="width: 8%;height: 28px;display: inline-block;">
					<input type="submit" name="submit2" value="Update picture" class="btn btn-success" style="display: inline-block;height: 28px;font-size: 13px;">
				</form>
				<?php
					$cook_username = $_SESSION['cook_username'];
					$query = "SELECT * FROM cook";
					$result = mysqli_query($database , $query);
					while ($row = $result -> fetch_assoc()) {
						if ($row['username'] == $cook_username) {
								$mess_name = $row['mess_name'];?>
							<label class="label" style="font-size: 30px;color: black;"><?php echo $row['mess_name'];  ?></label>
						
						
				<?php
							break;
						}
					}

				?>
				<form action="cook_dashboard.php" method="post">
					
					<br>
					<br>
					<input type="text" name="menu" placeholder="Enter your Menu" style="margin-top: 30px;width: 50%;">
					<br>
					<br>
					<input type="submit" name="submit" class="btn btn-success" value="Submit" style="width: 50%">
					<br>

				</form>
			</div>
			<div class="col-sm-1" align="center" style="display: inline-block;background: rgb(230 , 240 , 240);width : 15%;height: 130%;margin-top: 30px;margin-left: 10px;">
				<p style="font-size: 20px;font-weight: bold;color: black;width: 100%;">Parcel Orders</p>
				<?php
					$cook_username = $_SESSION['cook_username'];

					$query4 = "SELECT * FROM notification";
					$result4 = mysqli_query($database , $query4);
					while ($row4 = $result4 -> fetch_assoc()) {
						# code...
						if ($row4['cook_username'] == $cook_username) {?>
							<li style="font-size: 20px;font-weight: bold;color: green;"><?php echo $row4['username']; ?></li>


				<?php
						}
					}

				?>
				
			</div>
		</div>
	</div>
</body>
</html>
-->
<!--
<?php
	if (isset($_POST['submit'])) {
			# code...
		$menu = $_POST['menu'];
		$username = $_SESSION['cook_username'];
		$date = date("d/m/Y");
 		$query = "INSERT INTO menu(mess_name , menu , username , today_date) VALUES(? , ? , ? , ?)";
		$statement = $database -> prepare($query);
		$statement -> bind_param('ssss' , $mess_name , $menu , $username , $date);
		$statement -> execute();
		mysqli_query($database , $query);
		header('location:cook_dashboard.php');
	}	

?>
<?php
	if (isset($_POST['submit2'])) {
		# code...
		$cook_username = $_SESSION['cook_username'];

		$files = $_FILES['file'];
		$filename = $files['name'];
		$fileerror = $files['error'];
		$filetmp = $files['tmp_name'];
		$fileext = explode('.', $filename);
		$fileextcheck = strtolower(end($fileext));

		$fileextstored = array('jpg' , 'jpeg' , 'png');
		if (in_array($fileextcheck, $fileextstored)) {
			# code...
			$destinationfile = 'pictures/' . $filename;
			move_uploaded_file($filetmp, $destinationfile);
			$query3 = "INSERT INTO picture(image , username) VALUES(? , ? )";
			$statement = $database -> prepare($query3);
			$statement -> bind_param('ss' , $destinationfile , $cook_username);
			$statement -> execute();
			mysqli_query($database , $query3);
			header('location:cook_dashboard.php');

		}
	}

?>

<?php

	if (isset($_POST['submit3'])) {
		# code...
		$percent = $_POST['percent'];
		$cook_username = $_SESSION['cook_username'];
		$today_date = date("d/m/Y");
		$query = "INSERT INTO percentage(percent , cook_username , today_date) VALUES(? , ? , ?)";
		$statement = $database -> prepare($query);
		$statement -> bind_param('sss' , $percent , $cook_username , $today_date);
		$statement -> execute();
		mysqli_query($database , $query);

	}

?>-->