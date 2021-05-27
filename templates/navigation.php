<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav>
    <ul class="nav-list">
        <a href="index.php" class= "<?php echo($currentPage == 'index.php' || $currentPage == '') ? 'active' : ''?> ">HOME</a>
        <a href="about.php" class= "<?php echo($currentPage == 'about.php') ? 'active' : ''?> ">ABOUT US</a>
        <a href="weather.php" class= "<?php echo($currentPage == 'weather.php') ? 'active' : ''?> ">WEATHER</a>
        <a href="reserve.php" class= "<?php echo($currentPage == 'reserve.php') ? 'active' : ''?> ">RESERVE</a>
        <a href="register.php" class= "<?php echo($currentPage == 'register.php') ? 'active' : ''?> ">REGISTER</a>
        <a href="myreservations.php" class= "<?php echo($currentPage == 'myreservations.php') ? 'active' : ''?> ">MY RESERVATIONS</a>
        <a href="login.php" class= "<?php echo($currentPage == 'login.php') ? 'active' : ''?> ">LOGIN</a>
        </ul>
</nav>