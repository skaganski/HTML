<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Task8_1</title>
		<style>
		#results{
			width: 250px;
			height: 125px;
			text-align: center;
			padding:10px;
			}
		</style>
		</head>
		<body>
      <?php $bgcolor="#FFFFFF";
  			if (isset($_POST["background"]) && $_POST["background"]!="") {
     			 $bgcolor=htmlspecialchars($_POST["taust"]);
  			}

  			$content="tekst";
  			if (isset($_POST["content"]) && $_POST["content"]!="") {
     			 $content=htmlspecialchars($_POST["content"]);
     			 }

     			 $message="#000000";
  			if (isset($_POST["message"]) && $_POST["message"]!="") {
     			 $message=htmlspecialchars($_POST["message"]);
     			 }

     			$type="solid";
  			if (isset($_POST["type"]) && $_POST["type"]!="") {
     			$type=htmlspecialchars($_POST["type"]);
     			}

     			$width="2";
  			if (isset($_POST["width"]) && $_POST["width"]!="") {
     			$width=htmlspecialchars($_POST["width"]);
     			}

     			$borderLineColor="#FFFFFF";
  			if (isset($_POST["borderLineColor"]) && $_POST["borderLineColor"]!="") {
     			$borderLineColor=htmlspecialchars($_POST["borderLineColor"]);
     			}

     			$corner="50";
  			if (isset($_POST["corner="]) && $_POST["corner="]!="") {
     			$corner==htmlspecialchars($_POST["corner="]);
     			}

  		?>

  		<div id="tulemused" style="background: <?php echo $bgcolor ?>;
        color: <?php echo $message ?>;
        border: <?php echo $width ?>
        px <?php echo $type ?> <?php echo $borderLineColor ?>;
        border-radius: <?php echo $corner ?>px "><?php echo $content ?></div>

  		<hr>
  		<form action="yl8.php" method="post">

  		<textarea rows="3" cols="50" placeholder="Sisesta tekst" name="content"></textarea><br/>
  		<input type="color" name="taust" value="0000CC"> Taustavärvus<br/>
  		<input type="color" name="message" value="00CCFF"> Tekstivärvus<br/><br/>

    		Piirjoon<br>
    		<select name="type">
    		<option value="solid">solid</option>
    		<option value="double">double</option>
   		<option value="dotted">dotted</option>
  		</select><br>

  		<input type="number" name="width" min="1" max="20">Piirjoone laius (0-20px)<br/>
  		<input type="color" name="borderLineColor" value="0000CC"> Piirjoone värvus<br/>
  		<input type="number" name="corner=" min="1" max="100">Piirjoone nurga raadius (0-100px)<br/><br/>

   		 <input type="submit" value="Esita">
  		</form>

    </body>
</html>
