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

if($reserved==0 && $vendingmachine=='london') {     // 0 = available, 1 = not available

//table creationnnn
echo "<h2>London</h2>";

echo "<td> $name </td>";
      echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='GET' action='reserve.php'>
      <button name='id' value='$id' type='submit'>Reserve</button></div><br/><br/>
      </form>
  </td>
  </tr>";

}

if($reserved==0 && $vendingmachine=='tokyo') {     // 0 = available, 1 = not available

    //table creationnnn
    echo "<h2>Tokyo</h2>";
    
    echo "<td> $name </td>";
          echo "<div class='button-wrapper'><br/><td><form class='button return-button' method='GET' action='reserve.php'>
          <button name='id' value='$id' type='submit'>Reserve</button></div><br/><br/>
          </form>
      </td>
      </tr>";
}

if($reserved==0 && $vendingmachine=='stockholm') {     // 0 = available, 1 = not available

    //table creationnnn
    echo "<h2>Stockholm</h2>";
    
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
