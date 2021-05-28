<?php include('config.php') ?>
<?php include('connect.php') ?>
<?php include('templates/header.php');?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="index.css">
</head>
<body>

<?php

session_start();
$old_sessionid = session_id();
session_regenerate_id();
$new_sessionid = session_id();

if(isset($_POST['user']) && isset($_POST['pass'])){ //when button press
  //$password = md5($password); // protects the password
  $username = mysqli_real_escape_string($conn, $_POST['user']); // won't let users write code in input (xss, sql injections, attack)
  $password = mysqli_real_escape_string($conn, $_POST['pass']);  

    $query = "SELECT customerID, username, password, usertype FROM customer
              WHERE username = '$username' AND " . "password = '".md5($password)."'"; 

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result); 

    if($count == 1){   // if what has been submitted, exists in the database
      $_SESSION['customerID'] = $row["customerID"]; //sets user ID for session
      $_SESSION['usertype'] = $row["usertype"]; //sets usertype for session
      $_SESSION['user'] = $username; 
    }

      if ($row['usertype'] == '1') { // admin
      header("location:index.php"); 
      }else if ($row['usertype'] == '2') { // users
      header("location:index.php");
      }else{  
      echo "<h1> Login failed. Invalid username or password.</h1>";  
  }    
} 
?>
  
  <form action="logintest.php" method="post">
  <div class="container">
    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user">
    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass">
    <br>
    <button type="submit" name="user_login" value="login" >Login</button>
  </div>
</form>  

</body>
</html>