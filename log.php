<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>


<?php
$logRaw = shell_exec("docker logs "."mc");
$logNewlines = str_replace("\n", "<br>", $logRaw);
echo $logNewlines;
?>
