<!-- connects to database? BEHÖVS DENNA ELLER SKA JAG TA BORT -->

<?php


//opens database//
$db = mysqli_connect('localhost', 'root', 'root', 'regn') or die('Error connecting');

//checks if the database is connected
if ($db->connect_error){
    echo "Failed to connect to database: (" . $db->connect_error . " ) " . $db-> connect_error;
    exit ();
}

?>