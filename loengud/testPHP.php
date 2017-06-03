<!doctype html>
<html>
<head>
<title>PHP</title>
</head>
<body>
<h1>PHP</h1>
<code>
<?php
$muutuja="444";
$muutuja2="123";
echo $muutuja + $muutuja2;
?>
</code>
<?php
//dollar ees, kuna tegemist muutujaga ja php-s peb dollar olema
function loenda_lambad($n){
  $l="lammas";
  for($i=1; $i<$n; $i=$i+1){
    echo "$i. $l<br/>\n"; // \n new line
  }
}
loenda_lambad(10);
 ?>
</body>
</html>
