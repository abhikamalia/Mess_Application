


<?php
	include('connect.php');
	if (isset($_GET['delete'])) {
		# code...
		$id = $_GET['delete'];
		$query = "DELETE FROM reserve WHERE id = {$id}";
		mysqli_query($database , $query);
		
		header('location:cook_dashboard.php#reserve');
		echo $id;
		
	}

?>