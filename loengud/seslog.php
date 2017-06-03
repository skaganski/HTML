<?php
session_start(); // ei saa lõpetada, kui pole alustanud
//muuda sessiooni küpsis kehtetuks
if (isset($_COOKIE[session_name()])){
setcookie(session_name(),'',time()-42000, '/');
}
//tühjenda sessiooni massiiv
$SESSION=array();
//lõpeta sessioon
session_destroy();

header("Location: pood.php");


?>
