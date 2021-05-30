<?php include('config.php');?>
<?php include('connect.php');?>
<?php include('templates/header.php');?>

<div class="col-md-12">
<div class="d-flex justify-content-center">
    <h2>Available products to reserve!</h2>
</div>
<div class="d-flex justify-content-center">
<?php
echo "<p>Welcome <b>".$_SESSION['user']."</b>! You can book your wanted products here.</p>";
?>
</div>
</div>


<div class="col-md-12">
<div class="d-flex justify-content-center">
</br>
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
    echo "<tr><div class='col-md-12'>
    <div class='d-flex justify-content-center'>";
    echo "Umbrella #<td>$umbrellaID</td>";
    echo "</br>";
    echo "Location:<td> $vendingmachine </td>";
    echo "</br>";
          echo "<td><form class='return-button' method='POST' action='reserve.php'>
          <button name='reserve' value='$umbrellaID' type='submit'>Reserve</button></div><br/>
        
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
 $umbrellaID = $_POST['reserve'];//denna gör så att det kopplas till rätt paraply UNIK
 //$name = $_POST['reserve']; 
 $customerID = $_SESSION['customerID'];

 $query1 = "UPDATE umbrella SET reserved=1 WHERE umbrellaID=$umbrellaID"; //denna funkar
 $query2 = "INSERT INTO `customerUmbrella` (`id`, `umbrella_fk`, `customer_fk`, `name_fk`, `reserved`, `whenadded`) VALUES (NULL, '$umbrellaID', '$customerID', '$name', '1', now())";

$stmt1 = $db->prepare($query1);
$stmt2 = $db->prepare($query2);
$stmt1->execute();
$stmt2->execute();

header("location:myreservations.php");

}


?>

</div>
</div>
