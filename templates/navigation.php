<nav>
    <ul class="nav-list">
        <a href="index.php" class= "<?php echo($currentPage == 'index.php' || $currentPage == '') ? 'active' : ''?> ">Home</a>
        <a href="about.php" class= "<?php echo($currentPage == 'about.php') ? 'active' : ''?> ">About us</a>
        <a href="weather.php" class= "<?php echo($currentPage == 'weather.php') ? 'active' : ''?> ">Weather</a>
        <a href="reserve.php" class= "<?php echo($currentPage == 'reserve.php') ? 'active' : ''?> ">Reserve</a>
        <a href="register.php" class= "<?php echo($currentPage == 'register.php') ? 'active' : ''?> ">Register</a>
        <a href="login.php" class= "<?php echo($currentPage == 'login.php') ? 'active' : ''?> ">Login</a>
        </ul>
</nav>