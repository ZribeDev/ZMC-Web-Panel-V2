<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>


<?php
  function runcmd($dock, $cmdRaw) {
    $cmdSanitized = escapeshellarg($cmdRaw);
    shell_exec("docker exec ".$dock." mc-send-to-console ".$cmdSanitized);
    echo 'Command executed (200)<br>';
    echo 'Command: '.$cmd;
  }
  function servstop($dock) {
    shell_exec("docker stop ".$dock);
    echo 'Command executed (200)<br>';
    echo 'Command: SERVER STOP';
  }
  function servkill($dock) {
    shell_exec("docker kill ".$dock);
    echo 'Command executed (200)<br>';
    echo 'Command: SERVER KILL';
  }
  function servstart($dock) {
    shell_exec("docker start ".$dock);
    echo 'Command executed (200)<br>';
    echo 'Command: SERVER START';
  }
  function servrestart($dock) {
    shell_exec("docker restart ".$dock);
    echo 'Command executed (200)<br>';
    echo 'Command: SERVER START';
  }

  function deleteuser($username) {
    $rows = file("creds.php");    
    $blacklist = '\''.$username.'\'';

    foreach($rows as $key => $row) {
        if(preg_match("/($blacklist)/", $row)) {
            unset($rows[$key]);
        }
    }

    file_put_contents("creds.php", implode("\n", $rows));

    file_put_contents('creds.php',
    preg_replace(
        '~[\r\n]+~',
        "\r\n",
        trim(file_get_contents('creds.php'))
    )
);
    echo 'Command executed (200)<br>';
    echo 'Command: USER DELETE';
  }
  function adduser($username, $password) {
    $username = str_replace(" ", "_", $username);
    $password = str_replace(" ", "_", $password);
    $fp = fopen('creds.php', 'a');//opens file in append mode  
    fwrite($fp, "\n".'<?php $logins[\''.$username.'\'] = "'.$password.'"?>');    
    fclose($fp);  
    echo 'Command executed (200)<br>';
    echo 'Command: USER ADD';

  }

  function filesysclrcache() {
    $dir = "./downloads";
    if(file_exists($dir)){
        
        $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
        $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ( $ri as $file ) {
            $file->isDir() ?  rmdir($file) : unlink($file);
        }
    }

    $dir = "./uploads";
    if(file_exists($dir)){
        
        $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
        $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ( $ri as $file ) {
            $file->isDir() ?  rmdir($file) : unlink($file);
        }
    }

    $dir = "./backups";
    if(file_exists($dir)){
        
        $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
        $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ( $ri as $file ) {
            $file->isDir() ?  rmdir($file) : unlink($file);
        }
    }
  }


  function install_server($server) {
    shell_exec("docker kill mc");
    shell_exec("docker rm -f mc");
    shell_exec("docker volume rm mc");
    
    if ($server === "paper") { 
      shell_exec("docker run -d -v mc:/data \
      -e TYPE=PAPER \
      -p 25565:25565 -e EULA=TRUE --name mc itzg/minecraft-server");
    } elseif ($server === "spigot") {
      shell_exec("docker run -d -v mc:/data \
      -e TYPE=SPIGOT \
      -p 25565:25565 -e EULA=TRUE --name mc itzg/minecraft-server");
    } elseif ($server === "bukkit") {
      shell_exec("docker run -d -v mc:/data \
      -e TYPE=BUKKIT \
      -p 25565:25565 -e EULA=TRUE --name mc itzg/minecraft-server");
    } elseif ($server === "forge") {
      shell_exec("docker run -d -v mc:/data \
      -e TYPE=FORGE \
      -p 25565:25565 -e EULA=TRUE --name mc itzg/minecraft-server");
    } elseif ($server === "fabric") {
      shell_exec("docker run -d -v mc:/data \
      -e TYPE=FABRIC \
      -p 25565:25565 -e EULA=TRUE --name mc itzg/minecraft-server");
    } elseif ($server === "vanilla") {
      shell_exec("docker run -d -v mc:/data \
      -e TYPE=VANILLA \
      -p 25565:25565 -e EULA=TRUE --name mc itzg/minecraft-server");
    }
  }

  function filesysdeleteFile($loc) {
    shell_exec("docker exec mc rm ".$loc);
  }

  

  if (isset($_GET["command"])) {
    runcmd("mc", $_GET["command"]);
  }
  if (isset($_GET["stop"])) {
    servstop("mc");
  }
  if (isset($_GET["start"])) {
    servstart("mc");
  }
  if (isset($_GET["restart"])) {
    servrestart("mc");
  }
  if (isset($_GET["kill"])) {
    servkill("mc");
  }
  if (isset($_GET["clrcache"])) {
    filesysclrcache();
  }
  if (isset($_GET["deletefile"])) {
    filesysdeleteFile($_GET["deletefile"]);
  }
  if (isset($_GET["installserver"])) {
    install_server($_GET["servertype"]);
  }

  if (isset($_GET["deleteuser"])) {
    deleteuser($_GET["deleteuser"]);
  }

  if (isset($_GET["adduser"])) {
    adduser($_GET["adduser"], $_GET["adduserpass"]);
  }


?>
