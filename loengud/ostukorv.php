<?php

session_start();
if(!isset($_SESSION["korv"])){ //tagame, et korv on olemas
  $_SESSION["korv"]=array();
}
$kaubad=array("kampsun", "müts", "püksid", "saapad");
<pre><?php  print_r($_SESSION)?></pre>

?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Pood</title>
</head>
<body>
  <?php foreach ($$_SESSION["korv"] as $id=>$kogus):?>
    <p><?php echo $kaubad[$id]; ?> <?php echo $kogus;?>tk.</p>
  <?php endforeach;?>
  <p>mine vaata <a href="pood.php">poodi</a></p>
  <p><a href="seslog.php">tühjenda korv!</a></p>
</body>
</html>
