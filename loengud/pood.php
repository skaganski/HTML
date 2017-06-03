<?php

session_start();
if(!isset($_SESSION["korv"])){ //tagame, et korv on olemas
  $_SESSION["korv"]=array();
}
$kaubad=array("kampsun", "müts", "püksid", "saapad");
 if(!empty($_GET["lisa"])){
   //kas kaup eksisteerib
   if(isset($kaubad[$_GET["lisa"]])){
     if(isset($_SESSION["korv"][$_GET["lisa"]])){
       $_SESSION["korv"][$_GET["lisa"]]++; //oli olemas, suurenda
     }else{
     //polnud veel, lisa korvi!
     $_SESSION["korv"][$_GET["lisa"]]=1;
   }
   }
 }

?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Pood</title>
</head>
<body>
  <?php foreach ($kaubad as $id=>$kaup):?>
    <p><?php echo $kaup; ?> <a href="?lisa=<?php echo $id;?>">lisa!</a></p>
  <?php endforeach;?>
  <p>mine vaata <a href="ostukorv.php"ostukorvi</p>
  <pre><?php  print_r($_SESSION)?></pre>
</body>
</html>
