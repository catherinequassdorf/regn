<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

<?php

echo "<h1>This is <b>".$_SESSION['user']."'s</b> reservations.</h1>";

$query = "SELECT id, umbrella_fk, reserved, whenadded FROM customerUmbrella WHERE customer_fk='".$_SESSION['customerID']."'";
$id=$row['id'];
$umbrella_fk=$row['umbrella_fk'];
$whenadded=$row['whenadded'];
$reserved_fk=$row['reserved'];

$stmt = $db->prepare($query);
$stmt->bind_result($id, $umbrella_fk, $reserved, $whenadded);
$stmt->execute();

while ($stmt->fetch()) {
  echo "<h4>Your order number <b>#".$id."</b> was booked on <b>".$whenadded."</b> and contains the product #<b>".$umbrella_fk."</b></h4>";
  echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='GET' action='myreservations.php'>
  <button name='return' value='$id' type='submit'>Return</button></div><br/><br/>";
}


if (isset($_GET['return'])) {
    $id = $_GET['return'];

   $query1 = "UPDATE umbrella SET reserved=0 WHERE umbrellaID=$umbrella_fk"; //fixa bugg
   $query2 = "DELETE FROM customerUmbrella WHERE id = $id";
   
   $stmt1 = $db->prepare($query1);
   $stmt2 = $db->prepare($query2);
   $stmt1->execute();
   $stmt2->execute();
   header("location:myreservations.php");
   }

?>

<?php

?>