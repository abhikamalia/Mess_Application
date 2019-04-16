
<?php
	
	include('connect.php');
     if (isset($_POST['submit1'])) {
        # code...
          $username = $_POST['username'];
          $password = $_POST['password'];
          $query = "SELECT * FROM users";
          $result = mysqli_query($database , $query);
          while ($row = $result -> fetch_assoc()) {
            # code...
            if ($row['username'] == $username and $row['password'] == $password) {
              # code...
              session_start();
              $_SESSION['username'] = $username;
              header('location:home.php');

            }
          }
          
      }

?>

