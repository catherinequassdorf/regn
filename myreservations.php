<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

<?php
echo "<h1>This is ".$_SESSION['customerID']." ".$_SESSION['user']." 's account.</h1>";
echo "<h1>you have booked ".$_SESSION['umbrellaID']."</h1>";

$query = "SELECT id FROM customerUmbrella WHERE customer_fk= " . $_SESSION['customerID'];
$stmt = $db->prepare($query);
$stmt->bind_result($id);
$stmt->execute();

while ($stmt->fetch()) {
  echo "<td>".$id."</td>";
}

?>