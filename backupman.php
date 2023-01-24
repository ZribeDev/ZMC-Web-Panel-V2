<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>

<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$container = "mc";
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
$name = generateRandomString(6)."_backup.zip";
shell_exec("docker exec mc zip -r ".$name." ./");

shell_exec("docker cp ".$container.":/data/".$name." ./backups/".$name);

?>
<h1>Please be patient while we are backing up your server!</h1><h3>Why is the page loading slowly? It is because we are zipping your files! it will take a long time if you have a very big server!</h3>
<br>
<a href="<?php echo "/backups/".$name ?>" id="dl" download>Click here if your download did not start.</a>
<a href="/backup.php">Click here to go back to the backup page.</a>
<script>
(function download() {
    document.getElementById('dl').click();
})()
</script>