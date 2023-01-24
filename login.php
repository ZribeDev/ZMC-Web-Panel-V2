<?php session_start(); /* Starts the session */


/* Check Login form submitted */
if (isset($_POST["Submit"])) {

    /* Check and assign submitted Username and Password to new variable */
    $Username = isset($_POST["Username"]) ? $_POST["Username"] : "";
    $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";
    include 'creds.php';
    /* Check Username and Password existence in defined array */
    if (isset($logins[$Username]) && $logins[$Username] == $Password) {
        /* Success: Set session variables and redirect to Protected page  */
        $_SESSION["UserData"]["Username"] = $logins[$Username];
        echo '<script>window.location.replace("/index.php");</script>';
        
        exit();
    } else {
        /*Unsuccessful attempt: Set error message */
        $msg = "<span style='color:red'>Invalid Login Details</span>";
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="stylelogin.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="" method="post" name="Login_Form">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="Username" placeholder="Username" id="username" autocomplete="off" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="Password" placeholder="Password" id="password" autocomplete="off" required>
				<input type="submit" value="Login" name="Submit">
			</form>
		</div>
	</body>
</html>