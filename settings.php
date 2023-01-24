<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Server Panel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          
          <h2 id="brand">ZMC Web Panel</h2>
          
        </div>
        
      </div>
      <div class="sidebar">
        <a href="/index.php">
          <span class="material-symbols-rounded">
            grid_view
            </span>
            <h3>Home</h3>
        </a>
        <a href="console.php">
          <span class="material-symbols-rounded">
            terminal
            </span>
            <h3>Console</h3>
        </a>
        <a href="files.php" >
          <span class="material-symbols-rounded">
            folder
            </span>
            <h3>Files</h3>
        </a> 
        <a href="backup.php" >
          <span class="material-symbols-rounded">
            backup
            </span>
            <h3>Backup</h3>
        </a>
        <a href="users.php">
          <span class="material-symbols-rounded">
            manage_accounts
            </span>
            <h3>Users</h3>
        </a>
        <a href="settings.php" class="active">
          <span class="material-symbols-rounded">
            settings
            </span>
            <h3>Settings</h3>
        </a>
        
        <a href="logout.php">
          <span class="material-symbols-rounded">
            logout
            </span>
            <h3>Log out
            </h3>
        </a>

      </div>
    </aside>
    <! ----------------------------------------------------->
    <main>
      <h1 id="welcome">Welcome, Admin</h1>
      <div class="insights">
        <div class="sales">
          <span class="material-symbols-rounded">settings</span>
          
          <div class="middle">
            <div class="left">
              <br>
                <iframe name="hid1" style="display:none;"></iframe>
                <form action="man.php" method="get" target="hid1">
                    <input type="hidden" name="ad_id" value="2">    
                    <input type="hidden" name="installserver" value="2">               
                
                    <select name="servertype">
                    <option value="bukkit">Bukkit</option>
                    <option value="spigot">Spigot</option>
                    <option value="paper">Paper</option>
                    <option value="fabric">Fabric</option>
                    <option value="forge">Forge</option>
                    <option value="vanilla" selected>Vanilla</option>
                    </select>
                    <br><br>
                    <input type="submit" onclick="alert('Server Installed!'); location.reload();" value="Install Server">
                    
                </form>

              <br>
              
              
              <div>
                
               
              </div>
            </div>
            
          </div>
          <small class="text-muted">Server Setup</small>
        </div>
      </div>  

       
      

    </main>
    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <span class="material-symbols-rounded">
            menu
            </span>
        </button>
        
        
      </div>
    </div>
  </div>
  
  <script type="text/javascript" src="app.js"></script>
  
</body>
</html>