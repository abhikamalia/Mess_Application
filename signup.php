<?php include('connect.php');  ?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
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
</head>
<body>
  <div class="w3-top">
  <div class="w3-row w3-padding w3-black">

    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-black">ABOUT</a>
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


<div class="w3-sand w3-grayscale w3-large">

<div class="w3-container" id="login">

  <div class="w3-content" style="max-width:700px">
   
    

      
     <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Login');" id="myLink">
        <div class="w3-col s6 tablink">Login</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Signup');">
        <div class="w3-col s6 tablink">Sign up</div>
      </a>
    </div>

    <div id="Login" class="w3-container menu w3-padding-48 w3-card">
      <h4 class="w3-center"><span><?php echo date('l');  ?></span></h4>
      <form action="login.php" method="post">
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" required name="username"></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
     
          <p><button class="w3-button w3-black" name="submit"  type="submit">Login</button></p>
    </form>
      
      
    </div>

    <div id="Signup" class="w3-container menu w3-padding-48 w3-card">
      <h4 class="w3-center"><span><?php echo date('l');  ?></span></h4>
        <form action="signup.php" method="post">
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" required name="username"></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
     
          <p><button class="w3-button w3-black" name="submit" type="submit">Sign Up</button></p>
      </form>

      <form action="signup.php" method="post">
    <input type="text" placeholder="user" name="username"><br>
    <input type="text" placeholder="password" name="password"><br>
    <input type="submit" value="submit" name="submit"><br>
  </form>
        
  </div>
</div>

<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p>Created by <a href="#"  target="_blank" class="w3-hover-text-green">Abhikamalia</a></p>
</footer>


   <!--<form action="signup.php" method="post">
    <input type="text" placeholder="user" name="username"><br>
    <input type="text" placeholder="password" name="password"><br>
    <input type="submit" value="submit" name="submit"><br>
  </form>

  <form action="signup.php" method="post">
    <input type="text" placeholder="user" name="username"><br>
    <input type="text" placeholder="password" name="password"><br>
    <input type="submit" value="submit1" name="submit"><br>
  </form>-->


  
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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "INSERT INTO users(username , password) VALUES(? , ?)";
        $statement = $database -> prepare($query);
        $statement -> bind_param('ss' , $username , $password);
        $statement -> execute();
        mysqli_query($database , $query);
        session_start();
        $_SESSION['username'] = $username;
        header('location:home.php');
      }

      if (isset($_POST['submit1'])) {
        # code...
          $username = $_POST['username'];
          $password = md5($_POST['password']);
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
<!--
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


<div class="w3-top">
  <div class="w3-row w3-padding w3-black">

    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-black">ABOUT</a>
    </div>
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


<div class="w3-sand w3-grayscale w3-large">

<div class="w3-container" id="login">

  <div class="w3-content" style="max-width:700px">
   
    

      
     <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Login');" id="myLink">
        <div class="w3-col s6 tablink">Login</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Signup');">
        <div class="w3-col s6 tablink">Sign up</div>
      </a>
    </div>

    <div id="Login" class="w3-container menu w3-padding-48 w3-card">
      <h4 class="w3-center"><span><?php echo date('l');  ?></span></h4>
      <form action="login.php" method="post">
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" required name="username"></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
     
          <p><button class="w3-button w3-black" name="submit"  type="submit">Login</button></p>
    </form>
      
      
    </div>

    <div id="Signup" class="w3-container menu w3-padding-48 w3-card">
      <h4 class="w3-center"><span><?php echo date('l');  ?></span></h4>
        <form action="signup.php" method="post">
          <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Username" required name="username"></p>
          <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Password" required name="password"></p>
     
          <p><button class="w3-button w3-black" name="submit" type="submit">Sign Up</button></p>
      </form>

      <form action="signup.php" method="post">
    <input type="text" placeholder="user" name="username"><br>
    <input type="text" placeholder="password" name="password"><br>
    <input type="submit" value="submit" name="submit"><br>
  </form>
        
  </div>
</div>

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
-->
