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

          if ( isset( $_POST['user'] ) && isset( $_POST['pass'] ) ) {    

        //grabs username and pw entered by the user, escapestring prevents SQL injection + XSS since it does not allow code???
          $username = mysqli_real_escape_string($db, trim($_POST['user'])); //user cannot write code in the form, only text -> it escapes special characters in a string
          $password = mysqli_real_escape_string($db, trim($_POST['pass'])); //user cannot write code in the form, only text -> it escapes special characters in a string

          $query = "SELECT customerID, username, password, usertype FROM customer
                    WHERE username = '$username' AND " . "password = '".md5($password)."'"; //lösen blir siffor i databas
          $data = mysqli_query($db, $query);//prepares for execution

          //echo "<br> The query: $query <br>";
          
          $result = mysqli_query($db,$query);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $count = mysqli_num_rows($result);

          if ($count == 1){ //returns number of rows present in the result set          
  
          // Verify user password and set $_SESSION -> sessions allows to stora away individual pieces of information (like cookies), but the data gets stored on server instead of client.
            $_SESSION['customerID'] = $row["customerID"]; //sets user ID for session
            $_SESSION['user'] = $username; //username is same as variable above
           // $_SESSION['password'] = $row["password"]; 
            $_SESSION['usertype'] = $row["usertype"]; //sets usertype for session
           $_SESSION['umbrella_fk'] = $row["umbrella_fk"];
           $_SESSION['rainponcho_fk'] = $row["rainponcho_fk"];
            $_SESSION['loginstatus'] = true; //user is logged in and visible in nav
            // add ip for session hijacking
        

          if ($row['usertype'] == '1') {
            header("location:user.php");
        } else if ($row['usertype'] == '2') {
            header("location:admin.php");
        } else {
          echo "<h3> Login failed </h3>";
          //usertype gör så att det strular
        }

        

        

      }
      
    }

    
  if (!isset($_SESSION['user']) && ['customerID'] ){ ?>
      <div id="login">
          <form action="login.php" method="POST">
            <p>Username</p>
            <input type="text" name="user">
            <span style="display:block; height: 22px;"></span>
            <p>Password</p>
            <input type="password" name="pass">
            <input type="submit" name="user_login" value="Login">
          </form>
        </div>

        </br>  
      
    <?php	}
  ?>
  

        
    </div>
</div>
      </div>
      </div>