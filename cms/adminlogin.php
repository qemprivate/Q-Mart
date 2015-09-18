<?php
  
  session_start();

  include 'config.php';
  
  if ($_REQUEST['err'] != "") {

        $sentmsg = "<p><center><div>Invalid Email Address or Password</div></center></p>";
    }

  // Select settings
  $sqlSettings = "SELECT * FROM settings";
  
  try{
    $querySettings = $db->query($sqlSettings);

    $querySettings->setFetchMode(PDO::FETCH_ASSOC);

    $rowSettings = $querySettings->fetch();

    }
    catch(PDOException $e) {
        die($e->getMessage());
    }

// Select language

    if ($_SESSION['lang'] == "") {
      $_SESSION['lang'] = $rowSettings['langid'];
    }

  $sqlSettings = "SELECT * FROM languages WHERE id = " . $_SESSION['lang'];
  
  try{
    $queryLang = $db->query($sqlSettings);

    $queryLang->setFetchMode(PDO::FETCH_ASSOC);

    $rowLang = $queryLang->fetch();

    }
    catch(PDOException $e) {
        die($e->getMessage());
    }

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">



<!-- fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Inline CSS 
================================================== -->

</head>
<body>

          
              
<center><?php echo $sentmsg; ?></center>
<h1 class="productname">Admin Login</h1>

<form class="form-vertical" action="login.php" method="POST" style="display: block;margin: 0 auto;width: 316px;">
	<div class="control-group">
            <div class="controls">
                <input type="username" name="username" id="username" class="text-input" placeholder="username">
            </div>
    </div>
    <div class="control-group">
            <div class="controls">
            	<input type="password" name="password" id="password" class="text-input" placeholder="password">
            </div>
    </div>
    <button type="submit" name="submit" class="btn btn-special has-tooltip" id="submit-create">Sign in</button>
</form>
      
<style>
.text-input{background-color:#fff;border:1px solid #80a1c1;color:#80a1c1;font-size:1.16666666667em;padding:7px;margin-bottom:5px;}
.text-input:focus{color:#666;}
.text-input{box-shadow:inset 0 1px 2px #d0d0d0;-moz-box-shadow:inset 0 1px 2px #d0d0d0;width:300px;-webkit-box-shadow:inset 0 1px 2px #d0d0d0;}

.btn{cursor:pointer;display:-moz-inline-stack;display:inline-block;*display:inline;font-weight:bold;font-size:0.95em;line-height:1.25em;overflow:visible;padding:7px;width:100%;zoom:1;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px;}
.btn:hover{text-decoration:none!important;box-shadow:0 1px 2px rgba(0,0,0,.2);-moz-box-shadow:0 1px 2px rgba(0,0,0,.2);-webkit-box-shadow:0 1px 2px rgba(0,0,0,.2);}
.btn:active{position:relative;top:1px;box-shadow:inset 0 0 10px rgba(0,0,0,.3);-moz-box-shadow:inset 0 0 10px rgba(0,0,0,.3);-webkit-box-shadow:inset 0 0 10px rgba(0,0,0,.3);}

.digg-it-large{background-position:-138px -22px;height:13px;width:9px;vertical-align:-2px;}

.btn-special{background:-webkit-gradient(linear,left top,left bottom,from(#fff),to(#e3ecf6));background:-moz-linear-gradient(top,#fff,#e3ecf6);background-color:#e3ecf6;border:1px solid #1b5790;color:#105cb6;padding-bottom:7px;padding-top:6px;text-shadow:#fff 0 1px 0;}
.btn-special:active{background:#e3ecf6;}

</style>
           
<!-- Footer Starts-->
<footer id="footer">
</footer>

</body>
</html>