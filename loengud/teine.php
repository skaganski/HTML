<?php

$user="test";
$pass="t3st3r123";
$db="test";
$host="localhost";
//ühendame baasiga
$link=mysqli_connect($host, $user,
$pass, $db) or die("ei saanud
ühendatud - " . mysqli_error());
//päring
mysqli_query($link, "SET CHARACTER SET UTF8") or die($sql. "-".
mysqli_error($link));
$v2ljad="nimi, vanus, puur";
$sql="SELECT  v2ljad from 0_loomaaed";
$result=mysqli_query($link, $sql) or die($sql. " -" .mysqli_error($link));
//kui rida ei panna, siis jättab ühe rida vahele alati
while ($rida=mysqli_fetch_assoc($result)){
//siin kasutan $rida muutujat
echo "looma nimi on: {$rida]['nimi']}, ta on {$rida['vanus']} aastat vana
  ja asub {$rida['puur']}. puuris<br/>";

}
//vabastame mälut
mysqli_free_result($result);
?>
