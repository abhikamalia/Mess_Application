<?php

	$date = date('d/m/Y');
	$ip = $_SERVER['REMOTE_ADDR'];
	echo $ip;
	$check = 1;
	$query = "SELECT * FROM admin ORDER BY id DESC";
	$result = mysqli_query($database , $query);
	while ($row = $result -> fetch_assoc()) {
		# code...
		if ($row['today_date'] == $date) {
			# code...
			if ($row['ip'] == $ip) {
				$check = 0;
			}
		}
	}
	if ($check == 1) {
		# code...
		$query2 = "INSERT INTO admin(ip , today_date) VALUES(? , ?)";
		$statement = $database -> prepare($query2);
		$statement -> bind_param('ss' , $ip , $date);
		$statement -> execute();
		mysqli_query($database , $query2);
	}

	
	
?>