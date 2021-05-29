myreservations.php

<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

<?php

//lägga till return knapp här

echo "<h1><b>".$_SESSION['customerID']." ".$_SESSION['user']."'s</b> account.</h1>";

$query = "SELECT id FROM customerUmbrella WHERE customer_fk= " . $_SESSION['customerID'];
$id=$row['id'];
$whenadded=$row['whenadded'];
$name_fk=$row['name_fk'];
//lägg till här så when added syns typ genom *??

$stmt = $db->prepare($query);
$stmt->bind_result($id);
$stmt->execute();

while ($stmt->fetch()) {
  echo "<h4>Your order number #".$id." was booked on ".$whenadded." and consists of ".$name_fk."</h4>";
  echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='GET' action='myreservations.php'>
  <button name='return' value='$umbrellaID' type='submit'>Return</button></div><br/><br/>";
}
//echoa ut totalpris på ngt sätt?

?>

<?php


if (isset($_GET['return'])) {
 $umbrellaID = $_GET['reserve']; //denna gör så att det kopplas till rätt paraply UNIK
 $customerID = $_SESSION['customerID'];

//ett försök till att returna produkter
 $query1 = "UPDATE umbrella SET reserved=0 WHERE umbrellaID=$umbrellaID";
 $query2 = "DELETE FROM `customerUmbrella` WHERE umbrellaID=$umbrellaID";

$stmt1 = $db->prepare($query1);
$stmt2 = $db->prepare($query2);
$stmt1->execute();
$stmt2->execute();
}
?>
_____________

reserve.php 

<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

<div class="col-md-12">
<div class="d-flex justify-content-center">
    <h2>Available products to reserve!</h2>
</div>
<div class="d-flex justify-content-center">
    <p>The daily rate is 89SEK per product.</p>
</div>
<div class="d-flex justify-content-center">
<?php
echo "<p>Welcome <b>".$_SESSION['user']."</b>! You can book your wanted products here.</p>";
?>
</div>
</div>


<?php

$sql = mysqli_query($db, "SELECT *  FROM umbrella");

$count = mysqli_num_rows($sql); //mysqli_num_rows räknar rows från databasen

//kollar ifall database returnerar more than 0 rows
if($count>0){
//om rows >0 FETCHAR VI DATAN!!!
while ($row = mysqli_fetch_array($sql)){

///denna delen stores variable i every field
$umbrellaID=$row['umbrellaID'];
$name=$row['name'];
$color=$row['color'];
$barcode=$row['barcode'];
$vendingmachine=$row['vendingmachine'];
$reserved=$row['reserved'];

if($reserved==0) {     // 0 = available, 1 = not available
    //table creationnnn
    echo "<tr>";
    echo "<td> $name </td>";
    echo "<td> $vendingmachine </td>";
          echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='POST' action='reserve.php'>
          <button name='reserve' value='$umbrellaID' type='submit'>Reserve</button></div><br/><br/>
          </form>
      </td>
      </tr>";
} //else { //fixa denna så den bara echoar en gång samt att den ej syns när andra produkter syns
  //  echo "No available prpducts :(";
//}
}
}


?>

<?php


if (isset($_POST['reserve'])) {
 $umbrellaID = $_POST['reserve']; //denna gör så att det kopplas till rätt paraply UNIK
 $customerID = $_SESSION['customerID'];

 $query1 = "UPDATE umbrella SET reserved=1 WHERE umbrellaID=$umbrellaID";
 $query2 = "INSERT INTO `customerUmbrella` (`umbrella_fk`, `customer_fk`, `whenadded`) VALUES ('$umbrellaID', '$customerID', now())";

$stmt1 = $db->prepare($query1);
$stmt2 = $db->prepare($query2);
$stmt1->execute();
$stmt2->execute();
}
?>

</div>
</div>

_____

login.php 

<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

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
            $_SESSION['usertype'] = $row["usertype"]; //sets usertype for session
           // $_SESSION['loginstatus'] = true; //user is logged in and visible in nav
            // add ip for session hijacking
        

            header("location:myreservations.php");

        

        

      }
      
    }

    
  if (!isset($_SESSION['user']) ){ ?>
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

      _______