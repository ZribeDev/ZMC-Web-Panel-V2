<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>


<?php
$logRaw = shell_exec("docker logs "."mc");
$logSanitized = htmlspecialchars($logRaw);
$logNewlines = str_replace("\n", "<br>", $logSanitized);
echo $logNewlines;
?>
