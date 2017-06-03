<!--ebaturvaline!-->
<?php
if(!empty($_POST["q"])){
  echo $_POST["q"];
}

?>
<hr/>
<!--turvaline variant !-->
<?php
//turvaline
if(!empty($_POST["q"])){
  //htmlspecialchars ei võimalda postida pilte jne
  //muutub ta kõik tekstiks
  echo htmlspecialchars($_POST["q"]);
}
?>

<form action="MinuGoogle.php" method="POST">
  <!--kirjutamise jaoks textarea!-->
  <textarea name="q"/></textarea>
  <input type="submit" name="s" value="otsi Googlest"/>
</form>
