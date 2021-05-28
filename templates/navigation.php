<?php
$currentPage = basename($_SERVER['PHP_SELF']);?>


<?php
	$_SESSION['loggedin'] = false;
		if(!empty($_SESSION['user'])){
			$loggedin = true;
	} else {
			$loggedin = false;
		}
 ?>

<nav>
    <ul class="nav-list">
        <a href="index.php" class= "<?php echo($currentPage == 'index.php' || $currentPage == '') ? 'link' : ''?> ">HOME</a>
        <a href="about.php" class= "<?php echo($currentPage == 'about.php') ? 'link' : ''?> ">ABOUT US</a>
        <a href="weather.php" class= "<?php echo($currentPage == 'weather.php') ? 'link' : ''?> ">WEATHER</a>
        <a href="reserve.php" class= "<?php echo($currentPage == 'reserve.php') ? 'link' : ''?> ">RESERVE</a>


        
        <?php if (!isset($_SESSION['user'])) {
            ?><a href="register.php" class= "<?php echo($currentPage == 'register.php') ? 'link' : ''?> ">REGISTER</a>
            <a href="login.php" class= "<?php echo($currentPage == 'login.php') ? 'link' : ''?>">LOG IN</a>
            <?php
    } else if($loggedin == true){
			?><a class="<?php echo ($currentPage == 'myreservations.php') ? 'link' : NULL ?>"href="myreservations.php">MY RESERVATIONS</a>
            <a class="<?php echo ($currentPage == 'login.php') ? 'link' : NULL ?>"href="logout.php">LOG OUT</a>
            <?php
		} 
    ?>

        </ul>
</nav>