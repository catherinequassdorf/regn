<!-- funkar ej -->
<?php include('config.php');?>

<title>Adding a book!</title>
</head>

<body>
<h2>You submitted a book!</h2>

<?php


$username = $_POST['username'];
$password = $_POST['password'];


$db = mysqli_connect('localhost', 'root', 'root', 'regn') or die('Error connecting');

$query = "INSERT INTO customer (id, customerID, username, password, usertype) " . 
"VALUES ('1', '$username', '$password', 0)";

$result = mysqli_query ($db, $query)
    or die('Error querying database.');

mysqli_close($db);

    echo 'You added the user ' . $username . ' which has the password ' . $password;

?>
<br/>
<a href="/index.php">Go back to startpage</a>
