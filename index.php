<?php
session_start();
require_once ('config.php');
require_once ('functions.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="de">  
  <head>    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script src="check.js" type="text/javascript"></script>
    <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<title>Rising-Gods TBC</title>
    <script language="JavaScript">
		function registerOn(){
    		  document.getElementById('register').style.visibility="visible";
    			document.getElementById('login').style.visibility="hidden";
    	}
    	function registerOff(){
    		  document.getElementById('register').style.visibility="hidden";
    			document.getElementById('login').style.visibility="visible";
    	}
  </script>
        
</head>
    
  <body align="center">
    <div id="page">
      <div id="wrapper">
      
      	<div id="menu">
            <table id="Tabelle_01" width="700" height="85" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <a href="index.php"
                            onmouseover="window.status='Home'; home.src='images/menu_light_01.jpg';  return true;"
                            onmouseout="window.status=''; home.src='images/menu_01.jpg';  return true;">
                            <img src="images/menu_01.jpg" width="125" height="85" border="0" alt="Home" name="home"></a></td>
                    <td>
                        <a href="#login"
                            onmouseover="window.status='Login'; login.src='images/menu_light_02.jpg';  return true;"
                            onmouseout="window.status=''; login.src='images/menu_02.jpg';  return true;">
                            <img src="images/menu_02.jpg" width="112" height="85" border="0" alt="Login" name="login"></a></td>
                    <td>
                        <a href="#register"
                            onmouseover="window.status='Register'; register.src='images/menu_light_03.jpg';  return true;"
                            onmouseout="window.status=''; register.src='images/menu_03.jpg';  return true;">
                            <img src="images/menu_03.jpg" width="113" height="85" border="0" alt="Register" name="register"></a></td>
                    <td>
                        <a href="#tracker"
                            onmouseover="window.status='Tracker'; tracker.src='images/menu_light_04.jpg';  return true;"
                            onmouseout="window.status=''; tracker.src='images/menu_04.jpg';  return true;">
                            <img src="images/menu_04.jpg" width="114" height="85" border="0" alt="Tracker" name="tracker"></a></td>
                    <td>
                        <a href="#forum"
                            onmouseover="window.status='Forum'; forum.src='images/menu_light_05.jpg';  return true;"
                            onmouseout="window.status=''; forum.src='images/menu_05.jpg';  return true;">
                            <img src="images/menu_05.jpg" width="112" height="85" border="0" alt="Forum" name="forum"></a></td>
                    <td>
                        <a href="#tools"
                            onmouseover="window.status='Tools'; tools.src='images/menu_light_06.jpg';  return true;"
                            onmouseout="window.status=''; tools.src='images/menu_06.jpg';  return true;">
                            <img src="images/menu_06.jpg" width="124" height="85" border="0" alt="Tools" name="tools"></a></td>
                </tr>
            </table>
            <div id="menulinks">
                <div id="Tabelle_02">
                    <div id="menulinks-01">
                        <img src="images/menulinks_01.png" width="170" height="143" alt="">
                    </div>
                    <div id="menulinks-02">
                        <img src="images/menulinks_02.png" width="7" height="155" alt="">
                    </div>
                    <div id="menulinks-01003">
<a onmouseover="menulinks01.src='images/menulinks-01_light.jpg';" onmouseout="menulinks01.src='images/menulinks-01.jpg';" href="#01">
                            <img src="images/menulinks-01.jpg" width="151" height="24" border="0" alt="" name="menulinks01"></a>
                    </div>
                    <div id="menulinks-04">
                        <img src="images/menulinks_04.png" width="12" height="155" alt="">
                    </div>
                    <div id="menulinks-02005">
<a onmouseover="menulinks02.src='images/menulinks-02_light.jpg';" onmouseout="menulinks02.src='images/menulinks-02.jpg';" href="#02">
                            <img src="images/menulinks-02.jpg" width="151" height="22" border="0" alt="" name="menulinks02"></a>
                    </div>
                    <div id="menulinks-03">
<a onmouseover="menulinks03.src='images/menulinks-03_light.jpg';" onmouseout="menulinks03.src='images/menulinks-03.jpg';" href="#03">
                            <img src="images/menulinks-03.jpg" width="151" height="22" border="0" alt="" name="menulinks03"></a>
                    </div>
                    <div id="menulinks-04007">
<a onmouseover="menulinks04.src='images/menulinks-04_light.jpg';" onmouseout="menulinks04.src='images/menulinks-04.jpg';" href="#04">
                            <img src="images/menulinks-04.jpg" width="151" height="22" border="0" alt="" name="menulinks04"></a>
                    </div>
                    <div id="menulinks-05">
<a onmouseover="menulinks05.src='images/menulinks-05_light.jpg';" onmouseout="menulinks05.src='images/menulinks-05.jpg';" href="#05">
                            <img src="images/menulinks-05.jpg" width="151" height="22" border="0" alt="" name="menulinks05"></a>
                    </div>
                    <div id="menulinks-06">
<a onmouseover="menulinks06.src='images/menulinks-06_light.jpg';" onmouseout="menulinks06.src='images/menulinks-06.jpg';" href="#06">
                            <img src="images/menulinks-06.jpg" width="151" height="22" border="0" alt="" name="menulinks06"></a>
                    </div>
                    <div id="menulinks-07">
<a onmouseover="menulinks07.src='images/menulinks-07_light.jpg';" onmouseout="menulinks07.src='images/menulinks-07.jpg';" href="#07">
                            <img src="images/menulinks-07.jpg" width="151" height="21" border="0" alt="" name="menulinks07"></a>
                    </div>
                    <div id="menulinks-11">
                        <img src="images/menulinks_11.png" width="170" height="51" alt="">
                    </div>
                    <div id="menulinks-12">
                        <img src="images/menulinks_12.png" width="7" height="109" alt="">
                    </div>
                    <div id="menulinks-08">
<a onmouseover="menulinks08.src='images/menulinks-08_light.jpg';" onmouseout="menulinks08.src='images/menulinks-08.jpg';" href="#08">
                            <img src="images/menulinks-08.jpg" width="151" height="23" border="0" alt="" name="menulinks08"></a>
                    </div>
                    <div id="menulinks-14">
                        <img src="images/menulinks_14.png" width="12" height="109" alt="">
                    </div>
                    <div id="menulinks-09">
<a onmouseover="menulinks09.src='images/menulinks-09_light.jpg';" onmouseout="menulinks09.src='images/menulinks-09.jpg';" href="#09">
                            <img src="images/menulinks-09.jpg" width="151" height="20" border="0" alt="" name="menulinks09"></a>
                    </div>
                    <div id="menulinks-10">
<a onmouseover="menulinks10.src='images/menulinks-10_light.jpg';" onmouseout="menulinks10.src='images/menulinks-10.jpg';" href="#10">
                            <img src="images/menulinks-10.jpg" width="151" height="22" border="0" alt="" name="menulinks10"></a>
                    </div>
                    <div id="menulinks-11017">
<a onmouseover="menulinks11.src='images/menulinks-11_light.jpg';" onmouseout="menulinks11.src='images/menulinks-11.jpg';" href="#11">
                            <img src="images/menulinks-11.jpg" width="151" height="22" border="0" alt="" name="menulinks11"></a>
                    </div>
                    <div id="menulinks-12018">
                        <a href="#12" onmouseover="menulinks12.src='images/menulinks-12_light.jpg';" onmouseout="menulinks12.src='images/menulinks-12.jpg';">
                            <img src="images/menulinks-12.jpg" width="151" height="22" border="0" alt="" name="menulinks12"></a>
                    </div>
                    <div id="menulinks-19">
                    <img src="images/menulinks_19.png" width="170" height="9" />
                    </div>
                </div>  
            </div>
            
            <div id="menurechts">
                <div id="Tabelle_03">
                    <div id="menurechts-01">
                        <img src="images/menurechts_01.png" width="193" height="124" alt="">
                    </div>
                    <div id="menurechts-02">
                        <img src="images/menurechts_02.png" width="42" height="61" alt="">
                    </div>
                    <div id="menurechts-data" width="117" height="48">
                    	<?php getServerStatus($ip, $port); ?>
                        <div id="menurechts-data-tiny">
							<?php getPlayersOnlineCount($host, $user, $pass, $mangoscharacters); ?>
                            <br />
                            <?php getServerUptime($host, $user, $pass, $mangosrealm); ?>
                        </div>
                    </div>
                    <div id="menurechts-04">
                        <img src="images/menurechts_04.png" width="34" height="61" alt="">
                    </div>
                    <div id="menurechts-05">
                        <img src="images/menurechts_05.png" width="117" height="13" alt="">
                    </div>
                </div>
            </div>
            
        </div>
        
        <div id="header">
<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="700" height="364">
  <param name="movie" value="images/cataclysm.swf" />
  <param name="quality" value="high" />
  <param name="wmode" value="opaque" />
  <param name="swfversion" value="8.0.35.0" />
  <!-- Dieses param-Tag fordert Benutzer von Flash Player 6.0 r65 und höher auf, die aktuelle Version von Flash Player herunterzuladen. Wenn Sie nicht wünschen, dass die Benutzer diese Aufforderung sehen, löschen Sie dieses Tag. -->
  <param name="expressinstall" value="Scripts/expressInstall.swf" />
  <!-- Das nächste Objekt-Tag ist für Nicht-IE-Browser vorgesehen. Blenden Sie es daher mit IECC in IE aus. -->
  <!--[if !IE]>-->
  <object type="application/x-shockwave-flash" data="images/cataclysm.swf" width="700" height="364">
    <!--<![endif]-->
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="8.0.35.0" />
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Im Browser wird für Benutzer von Flash Player 6.0 und älteren Versionen der folgende alternative Inhalt angezeigt. -->
    <div>
      <h4>Für den Inhalt dieser Seite ist eine neuere Version von Adobe Flash Player erforderlich.</h4>
      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Adobe Flash Player herunterladen" width="112" height="33" /></a></p>
    </div>
    <!--[if !IE]>-->
  </object>
  <!--<![endif]-->
</object>
<!--<div id="news">
              
              <textarea id="newstext" readonly="readonly" style=" font-family:Verdana, Geneva, sans-serif; width:183px; height:213px; background:none; font-size:8pt; line-height:13px; border:0px; margin:0px; padding:0px; color:#CCC; resize:none; overflow:hidden;"
><?php //getNews($host, $user, $pass, $website); ?></textarea>

          </div>-->
          <?php
           /* if(isset($_REQUEST['submit'])||isset($_REQUEST['b'])){ */
		  ?>
             
              <!--<div id="register" style="visibility:visible;">
              <?php  /* getRegistrationForm($self); */?>
              </div>-->
              
          <?php
		  //}else{
		  ?>
                
		<div id="login">
        <form method="post" id="form2" name="form2" onSubmit="return checkForm2();" action="login.php">
        	<div id="loginbutton"><input id="submit" type="submit" name="submit2" value=""></div>
            
              <table border="0" cellspacing="0" cellpadding="0">
                <tr><td width="80">Username</td><td><input class="logininputs" type="text" name="username"></td></tr>
                <tr><td width="80">Passwort</td><td><input class="logininputs" type="password" name="password"></td></tr>
                
                <tr>
                  <td colspan="2">
					<?php 
                        if ($_REQUEST["fehler"] == 1){
                            ?>
                                <div id="fehlercodeLogin">
                                <?php echo "Benutzername/Passwort nicht existent oder inkorrekt!"; ?>
                                </div>
                            <?php
                        }
                        if ($_REQUEST["fehler"] == 2){
                            ?>
                                <div id="fehlercodeLogin">
                                <?php echo "Name oder Passwort wurden nicht angegeben!"; ?>
                                </div>
                            <?php
                        }
                    ?>
                  </td>
                </tr>
              </table>
        </form>        
		</div>
                    
              
              <!-- INFO BOX -->
			  <?php
              	if(isset($_REQUEST['l'])){
                  echo "<div id=\"infobox\">logout erfolgreich!</div>";
              	}
			  ?>
              
		  <?php
          //}
          ?>
    </div>
    <!-- END OF HEADER -->
    
	<div id="seperator"></div>
            
    <div id="container">
              
          <div id="register" style="visibility:visible;">
          	<?php  getRegistrationForm($self); ?>
          </div>
          
          <div id="newstext" style="width:390px; margin-left:10px;">
		  	<?php getNews($host, $user, $pass, $website); ?>
          </div>
          
      <?php 
          if(getPlayersOnline($host, $user, $pass, $mangoscharacters) > 0 ){
          ?>
              
          <?php
          }else{
              echo '<h3>No players that are currently playing in ChronosWoW!</h3>';
          }
        ?>
      </div>
      
      <div id="footer">
          <font size="-1">CopyRight Rising-Gods</font>    
      </div>
       
      </div>
    </div>
  <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
    </script>
</body>
  
</html>