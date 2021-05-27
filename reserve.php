<?php include('templates/header.php');?>
<?php include('config.php');?>
<?php include('connect.php');?>

<div class="col-md-12">
    <h2>Available products to reserve!</h2>
<div class="col-md-4">
    <h3>London</h3>
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
      echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='GET' action='reserve.php'>
      <button name='id' value='$id' type='submit'>Reserve</button></div><br/><br/>
      </form>
  </td>
  </tr>";


mysqli_close($db);

}
}
}
?>
</div>

<div class="col-md-4">
</div>

<div class="col-md-4">
</div>

