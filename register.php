<?php include('templates/header.php');?>

<form method="POST" action="submit.php">
						<label for="title">Username:</label>
                        <input type="text" id="title" name="username" /><br />
                        <label for="isbn">Password:</label>
                        <input type="text" id="isbn" name="password" />
                        <input type="submit" value="Register!" name="submit" />
					</form>