<?php

require_once("function.php");
$mode="";
if(!empty($_GET["mode"])){
$mode=$_GET["mode"];
}

switch ($mode){
  case "ok":
  include("ok.php");
  break;
  case "kontroll":
  kontrolli_vormi();
  include("pealeht.php");
  break;
  default:
  include("pealeht.php");
  break;
}
?>
