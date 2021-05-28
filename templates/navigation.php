
<nav>
    <ul class="nav-list">
        <a href="index.php" class= "<?php echo($currentPage == 'index.php' || $currentPage == '') ? 'active' : ''?> ">HOME</a>
        <a href="about.php" class= "<?php echo($currentPage == 'about.php') ? 'active' : ''?> ">ABOUT US</a>
        <a href="weather.php" class= "<?php echo($currentPage == 'weather.php') ? 'active' : ''?> ">WEATHER</a>
        <a href="reserve.php" class= "<?php echo($currentPage == 'reserve.php') ? 'active' : ''?> ">RESERVE</a>
        <a href="register.php" class= "<?php echo($currentPage == 'register.php') ? 'active' : ''?> ">REGISTER</a>


        <?php if (isset($_SESSION['loginstatus'])) {
            ?><a class="<?php echo ($current_page == 'logout.php') ? 'active' : NULL ?>"href="logout.php">Log out!</a><?php

		} else {
            ?><a class="<?php echo ($current_page == 'loginpage.php') ? 'active' : NULL ?>"href="login.php">Log in?</a><?php
		}
	
    ?>
        </ul>
</nav>