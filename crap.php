
<?php

	echo $_SESSION['user'];
?>


<!--
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container" align="center">
		<div class="row">
			<div class="col-md-12" align="center" style="margin-top: 20px;">

				<label class="label" style="font-size: 45px;color: black;font-weight: bold;">MENU</label>
				<br>
				<br>
				<?php

					$today_date = date("d/m/Y");
					$query = "SELECT * FROM menu ORDER BY id DESC";
					$result = mysqli_query($database , $query);
					while ($row = $result -> fetch_assoc()) {
						if ($row['today_date'] == $today_date) {?>
							
						
						<div class="row" style="background: rgb(230 , 240 , 240);box-shadow: -4px -4px 5px black;height: 70%;margin-bottom: 50px;">
							<label class="label pull-right" style="margin-top: 20px;font-size: 20px;color: blue;"><?php echo $row['today_date']; ?></label>
							<br>
							<?php
								$query3 = "SELECT * FROM percentage ORDER BY id DESC";
								$result3 = mysqli_query($database , $query3);
								while ($row3 = $result3 -> fetch_assoc()) {
									# code...
									$date = date("d/m/Y");
									if ($row3['cook_username'] == $row['username'] and $row['today_date'] == $date) {?>
										<label class="label pull-right" style="display : inline-block ;font-size: 20px;color: green;">Vacant seats : <?php echo $row3['percent']; ?></label>


							<?php
										break;

									}
								}

							?>
							<br>
							<?php
								$query2 = "SELECT * FROM picture ORDER BY id DESC";
								$result2 = mysqli_query($database , $query2);
								while ($row2 = $result2 -> fetch_assoc()) {
									# code...
									if ($row2['username'] == $row['username']) {?>
										<img src="<?php echo $row2['image']; ?>" height ="250px" width = "250px" style ="border-radius: 50%;margin : auto;display: inline-block;">
										<a class="btn btn-block" style="width: 25%;display: inline-block;" href="mess_profile.php?id=<?php echo $row['id']; ?>"><label class="label" style="font-size: 30px;font-weight: bold;color: black;"><?php echo $row['mess_name']; ?></label></a>
							<?php	
										break;		
									}
								}
							?>
									<br>

								
								<a class="btn btn-block" style="width: auto;display: inline-block;font-size: 25px;color: green;font-weight: bold;" href="location.php?cook_username=<?php echo $row['username'];  ?>">Location</a>
								<a class="btn btn-block" style="width: auto;display: inline-block;font-size: 25px;color: green;font-weight: bold;" href="mess_profile.php?cook_username=<?php echo $row['username']; ?>">Order a parcel</a>
								<a class="btn btn-block" style="width: auto;display: inline-block;font-size: 25px;color: green;font-weight: bold;" href="reserve.php?c_username=<?php echo $row['username']; ?>">Reserve seats</a>
				<?php
							}
						}
					

				
				?>

				<!--<?php
					$today_date = date("d/m/Y");
					$query = "SELECT * FROM menu ORDER BY id DESC";
					$result = mysqli_query($database , $query);
					while ($row = $result -> fetch_assoc()) {
						if ($row['today_date'] == $today_date) {?>
							
						
						<div class="row" style="background: rgb(230 , 240 , 240);box-shadow: -4px -4px 5px black;height: 100%;">
							<label class="label pull-right" style="margin-top: 20px;font-size: 20px;color: blue;"><?php echo $row['today_date']; ?></label>
							<br>
							<?php
								$query3 = "SELECT * FROM percentage ORDER BY id DESC";
								$result3 = mysqli_query($database , $query3);
								while ($row3 = $result3 -> fetch_assoc()) {
									# code...
									$date = date("d/m/Y");
									if ($row3['cook_username'] == $row['username'] and $row['today_date'] == $date) {?>
										<label class="label pull-right" style="display : inline-block ;font-size: 20px;color: green;">Vacant seats : <?php echo $row3['percent']; ?></label>


							<?php
										break;

									}
								}

							?>
							<br>
							<?php
								$query2 = "SELECT * FROM picture ORDER BY id DESC";
								$result2 = mysqli_query($database , $query2);
								while ($row2 = $result2 -> fetch_assoc()) {
									# code...
									if ($row2['username'] == $row['username']) {?>
										<img src="<?php echo $row2['image']; ?>" height ="250px" width = "250px" style ="border-radius: 50%;margin : auto;display: inline-block;">
							<?php	
										break;		
									}
								}
							?>
							<a class="btn btn-block" style="width: 25%;display: inline-block;" href="mess_profile.php?id=<?php echo $row['id']; ?>"><label class="label" style="font-size: 30px;font-weight: bold;color: black;"><?php echo $row['mess_name']; ?></label></a>
							<br>
							<br>
							<label class="label" style="font-size: 20px;color: black;"><?php echo $row['menu']; ?></label>
							<br>
							<br>
						</div>
						<br>
						<br>

				<?php
						}				
					}

				?>
			</div>
		</div>
	</div>
</body>
</html>-->