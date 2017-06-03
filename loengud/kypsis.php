<?php

if(empty($_COOKIE["teine"])){

setcookie("teine", time(), time()+60*10);
echo "Küpsis loodud!".time();
}else{
  echo "Küpsis oli: ".$COOKIE["teine"];
  echo "<br/>Hetke aeg on" .time();
}

?>
