<?php
$currentPage = basename($_SERVER['PHP_SELF']);
 //echo $currentPage; //

$current_page = explode('/', $_SERVER['REQUEST_URI']);
$current_page = end($current_page);

//koppling is OK!
$host = "localhost";
$databdase = "regn";
$user = "root";
$password = "root";

session_start();

?>