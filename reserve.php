<?php include('templates/header.php');?>
<?php include('config.php');?>
<?php include('connect.php');?>

lägg till knappar som representerar städer där regn finns :P koppla dom till reservationssytem?


<h4> vilken stad är du i </h4>

<button name='vendingmachine' value='vendingmachine'  method="get" class='reserve' type='submit'>london</button>
<button> Tokyo </button>
<button> London </button>

<?php 

$query = "SELECT umbrellaID, vendingmachine FROM umbrella";

$stmt = $conn->prepare($query);
$stmt->bind_result($umbrellaID, $vendingmachine);
$stmt->execute();

while ($stmt->fetch()) {

    if (isset($_GET['vendingmachine'])) {

  if ($vendingmachine=='london'){
  echo "hej";
  }
};

//if (isset($_GET['bookID'])) { //button activated / get info
  //$bookID = $_GET['bookID']; // bookID clicked same as bookID in database

  //$query = "UPDATE Book SET reservation=1 WHERE bookID = $bookID";

//$stmt = $conn->prepare($query);
//$stmt->execute();

//header("location: mybooks.php");
//exit();
}

<<<<<<< HEAD
<p>image</p>
<button> Reserve </button>
<p>image</p>
<button> Reserve </button>
<p>image</p>
<button> Reserve </button>
=======
//?>
>>>>>>> 738f254aedc2a3c3295da30ba9a259701b753f5b
