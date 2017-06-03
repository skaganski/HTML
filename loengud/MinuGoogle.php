
<?php
//teeme kontrolli, kas info on saadetud, ehk kas
//reaalselt on midagi sissestatud
if(!empty($_POST)){
  if(!empty($_POST["q"])){
    //lähme googlesse, kui ei, siis tuleb message
    //funktsion header
    //kasutame $_POST ehk seda infot, mis oli sisestatud
    $q=urlencode($_POST['q']);
    header("Location:
    https://www.google.ee/?#q={$q}");
    exit(0); //lõpetab programmi, 0 et rahulikult
  }else{
    echo "Palun sisesta otsingus6na!";
  }
}

?>
<!--teeme formi ja kuna post, siis saadatakse sama failisse-->
<!-- nii tehakse kommintaarid html-is-->
<form action="MinuGoogle.php" method="POST">
  <input type="text" name="q"/>
  <input type="submit" name="s" value="otsi Googlest"/>
</form>
