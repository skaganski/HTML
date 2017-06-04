<?php
ini_set("display_errors", 1);

global $link;
$host="localhost";
$user="test";
$pass="t3st3r123";
$db="test";
	
$link = mysqli_connect($host, $user, $pass, $db) or die("Connection Failed - ".mysqli_error());
mysqli_query($link, "SET CHARACTER SET UTF8") or die("Error, try oncemore");

 

$name = $price = "";
	
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$dbNimi = mysqli_real_escape_string($link,htmlspecialchars($_POST['name']));
$dbPakk = mysqli_real_escape_string($link,htmlspecialchars($_POST['price']));
			
$sql= "INSERT INTO skaganski_eksam (nimi, pakk) VALUES ('$dbNimi', '$dbPakk')";
$result=mysqli_query($link, $sql);
	
	$name =  htmlspecialchars($_POST['name']);
	$price =  htmlspecialchars($_POST['price']);
	$sql = "SELECT nimi, pakk FROM `skaganski_eksam` order by pakk desc";
	$result = mysqli_query($link, $sql);
	$success = mysqli_num_rows($result);
	$r = mysqli_fetch_assoc($result);
	echo 'Korgem pakkumine <b>'.$r['pakk'].'</b> kasutajalt <b>'.$r['nimi'].'</b><br/>';
    
}
	 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    
	<title>Pakkumised</title>
    
</head>
<body>

<form action="" method="POST" >
	<label>Pakkuja:</label>
	<input type="text" name="name" value=" " ><br/>
	<label>Pakkumine:</label>
	<input type="number" name="price" min="0" step="100" value=" "><br/>
	<input type="submit" value="Tee Pakkumine" name="button" />
</form>
    


</body>
</html>