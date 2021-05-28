<?php include('templates/header.php');?>
<?php include('config.php');?>
<?php include('connect.php');?>

<div class="row-regn">
<div class="col-md-12">
<h2>Login</h2>

<?php

      ini_set('session.cookie_httponly', true); // cookie is only accessible via php, not javascript which makes it harder for the hacker

        session_start();
       // startar igång session

          if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {    

        //grabs username and pw entered by the user, escapestring prevents SQL injection + XSS since it does not allow code???
          $username = mysqli_real_escape_string($db, trim($_POST['username'])); //user cannot write code in the form, only text -> it escapes special characters in a string
          $password = mysqli_real_escape_string($db, trim($_POST['password'])); //user cannot write code in the form, only text -> it escapes special characters in a string
       
      //removes backslashes and cleans up data retrieved from a database or from an HTML form, PREVENTS SQL INJECTIONS
          $username = stripcslashes($username); //user cannot write code in the form, only text
          $password = stripcslashes($password); //user cannot write code in the form, only text

          $query = "SELECT id, customerID, username, password, usertype FROM customer
                    WHERE username = '$username' AND " . "password = '".md5($password)."'"; //lösen blir siffor i databas
          $data = mysqli_query($db, $query);//prepares for execution

          //echo "<br> The query: $query <br>";
          
          $result = mysqli_query($db,$query);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $count = mysqli_num_rows($result);

          if ($count == 1){ //returns number of rows present in the result set
  
          // Verify user password and set $_SESSION -> sessions allows to stora away individual pieces of information (like cookies), but the data gets stored on server instead of client.
            $_SESSION['customerID'] = $row["customerID"]; //sets user ID for session
            $_SESSION['username'] = $username; //username is same as variable above
            $_SESSION['password'] = $row["password"]; 
            $_SESSION['usertype'] = $row["usertype"]; //sets usertype for session
            $_SESSION['loginstatus'] = true; //user is logged in and visible in nav
            // add ip for session hijacking

            //här är det inte fel
          if ($row['usertype'] == '1') {
            header("location:user.php");
        } else if ($row['usertype'] == '2') {
            header("location:admin.php");
        } else {
          echo "<h1> Login failed </h1>";
        }

        

      }
    }

    
    if (!isset($_SESSION['user'])){ ?>
      <div id="login">
          <form action="login.php" method="POST">
            <p>Username</p>
            <input type="text" name="username">
            <span style="display:block; height: 22px;"></span>
            <p>Password</p>
            <input type="password" name="password">
            <input type="submit" value="Login">
          </form>
        </div> <?php
      }else{ ?>
            <a href="logout.php">Log out</a>
    <?php	}
  ?>
  

        
    </div>
</div>
      </div>
      </div>