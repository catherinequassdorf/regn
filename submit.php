<!-- funkar ej -->
<?php include('config.php');?>

<title>Registering!</title>
</head>

<body>
<h2>Registration successful!</h2>

<?php

$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO customer(username, password, usertype) " . 
"VALUES ('$username', '$password', 0)";

$result = mysqli_query ($db, $query)
    or die('Error querying database.');

mysqli_close($db);

    echo 'You added the user ' . $username . ' which has the password ' . $password;

?>
<br/>
<a href="/index.php">Go back to startpage</a>
