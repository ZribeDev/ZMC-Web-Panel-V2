<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>


<?php
echo str_replace("\n","<br>", shell_exec("docker logs "."mc"));
?>
