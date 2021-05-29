<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

<?php

//lägga till return knapp här

echo "<h1><b>".$_SESSION['customerID']." ".$_SESSION['user']."'s</b> reservations.</h1>";

$query = "SELECT id, name_fk, reserved, whenadded FROM customerUmbrella WHERE customer_fk='".$_SESSION['customerID']."'";
$id=$row['id'];
$name_fk=$row['name_fk'];
$whenadded=$row['whenadded'];
$reserved_fk=$row['reserved'];

$stmt = $db->prepare($query);
$stmt->bind_result($id, $name_fk, $reserved, $whenadded);
$stmt->execute();

while ($stmt->fetch()) {
  echo "<h4>Your order number <b>#".$id."</b> was booked on <b>".$whenadded."</b> and contains the product <b>".$name_fk."</b></h4>";
  echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='GET' action='myreservations.php'>
  <button name='return' value='$id' type='submit'>Return</button></div><br/><br/>";
}


if (isset($_GET['return'])) {
    $id = $_GET['return'];
   //ett försök till att returna produkter

   $query1 = "UPDATE umbrella SET reserved=0";  //fattar ej umbrella
   $query2 = "DELETE FROM customerUmbrella WHERE id = $id";
   
   $stmt1 = $db->prepare($query1);
   $stmt2 = $db->prepare($query2);
   $stmt1->execute();
   $stmt2->execute();
   }

?>

<?php

?>