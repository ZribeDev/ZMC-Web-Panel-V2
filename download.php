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

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}



$container = "mc";
if (isset($_GET["file"])) {
    if (isset($_GET["filename"])) {
        $name = generateRandomString(6)."_".$_GET["filename"];
        shell_exec("docker cp ".$container.":/data/".$_GET["file"]." ./downloads/".$name);
        
        
    }
}
?>
<a href="<?php echo "/downloads/".$name ?>" id="dl" download>Click here if your download did not start.</a>
<a href="/files.php">Click here to go back to the files page.</a>
<script>
(function download() {
    document.getElementById('dl').click();
})()
</script>