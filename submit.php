<?php include('config.php');?>
<?php include('connect.php');?>

<title>Registration!</title>
</head>

<body>
<h2>Registration successful!</h2>

<?php
 
 // lägg till säkerhet här

 $username = $_POST['username'];
 $password = $_POST['password'];

//insert into dtabase
$sql = "INSERT INTO customer (username, password) VALUES ('$username', '".md5($password)."')";

if(mysqli_query($db, $sql)){
    echo "Yay! Successful!";
} else{
    echo "ERROR: $sql. " . mysqli_error($db);
}
 
mysqli_close($db);

echo 'You added the user ' . $username . ' which has the password ' . $password;

?>

<br/>
<a href="/login.php">Login now!</a>
