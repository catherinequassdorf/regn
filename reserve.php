<?php include('templates/header.php');?>
<?php include('config.php');?>
<?php include('connect.php');?>

<div class="col-md-12">
<div class="d-flex justify-content-center">
    <h2>Available products to reserve!</h2>
</div>
</div>


<div class="col-md-12">
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


if($onloan==0) {     // 0 = available, 1 = not available
    //table creationnnn
    echo "<tr>";
    echo "<td> $name </td>";
    echo "<td> $vendingmachine </td>";
          echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='POST' action='reserve.php'>
          <button name='reserve' value='$umbrellaID' type='submit'>Reserve</button></div><br/><br/>
          </form>
      </td>
      </tr>";

}
}
}

?>

<?php

echo "<h1>welcome ".$_SESSION['customerID']."</h1>";

if (isset($_POST['reserve'])) {
 $umbrellaID = $_POST['reserve']; //denna gör så att det kopplas till rätt paraply UNIK
 $customerID = $_SESSION['customerID'];

//insert into dtabase
$sql = "INSERT INTO `customerUmbrella` (`umbrella_fk`, `customer_fk`, `whenadded`) VALUES ('$umbrellaID', '$customerID', '2021-05-28')";

if(mysqli_query($db, $sql)){
    echo "Yay! Successful!";
} else{
    echo "ERROR: $sql. " . mysqli_error($db);
}
}
?>

</div>
