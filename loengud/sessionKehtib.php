<?php
//saab määrata kehtivust, ehk 30 sekundit
session_set_cookie_params(30);
session_start();

if(empty($_SESSION["esimene"])){
  $_SESSION["esimene"]=time();
  echo"session loodud!".time();
}else{
  echo"Session oli olemas, väärtus oli:".$_SESSION["esimene"];
  echo "<br/> Hetke aeg on ".time();
}

?>
