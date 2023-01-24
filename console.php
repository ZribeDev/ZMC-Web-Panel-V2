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
        <a href="console.php" class="active">
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
        <a href="settings.php" >
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
          <span class="material-symbols-rounded">terminal</span>
          
          <div class="middle">
            <div class="left">
              <br>
              <iframe id="theconsoleitselflol" src="/servlog.php" title="LOG" width="800px" height="500px" style="border:1px solid black;"></iframe>
              <br>
              <iframe name="hid1" style="display:none;"></iframe>
              <form action="man.php" method="get" target="hid1">
                  <input type="text" placeholder="Command..." id="command" name="command"></input>
                  <input type="hidden" name="ad_id" value="2">   
                  <input type="submit" name="run" value="Run">
                       
                </form>
              <div>
                
                <form action="man.php" method="get" target="hid1">
                    <input type="submit" value="Start">
                    <input type="hidden" name="ad_id" value="2">        
                    <input type="hidden" name="start" value="2">            
                </form>
                <form action="man.php" method="get" target="hid1">
                    <input type="submit" value="Stop">
                    <input type="hidden" name="ad_id" value="2">      
                    <input type="hidden" name="stop" value="2">             
                </form>
                <form action="man.php" method="get" target="hid1">
                    <input type="submit" value="Restart">
                    <input type="hidden" name="ad_id" value="2">    
                    <input type="hidden" name="restart" value="2">               
                </form>
                <form action="man.php" method="get" target="hid1">
                    <input type="submit" value="Kill">
                    <input type="hidden" name="ad_id" value="2">    
                    <input type="hidden" name="kill" value="2">               
                </form>
              </div>
            </div>
            
          </div>
          <small class="text-muted">Terminal</small>
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
  <script type="text/javascript" src="/tilt.js"></script>
  <script type="text/javascript" src="app.js"></script>
  <script type="text/javascript">
      VanillaTilt.init(document.querySelectorAll("#next"), {
          max: 25,
          speed: 400,
          glare: true,
          "max-glare": 1,
          perspective: 500,
          reverse: true,
          max: 20,
          scale: 1.1,
          
          
      });
  </script>
</body>
</html>

<script>
    const component = document.getElementById('theconsoleitselflol');
    component.scrollIntoView({behavior: "smooth", block: 'end'});
</script>