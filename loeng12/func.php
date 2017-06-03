<?php

function baasi_yhendus(){
	//saab link muutujat kasutada
	global $link;
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
}

function fake_login(){
	if (!empty($_GET["roll"])) {
		if ($_GET["roll"]=="admin"){
			$_SESSION["user"]="Boss";
			$_SESSION["roll"]="admin";
			$_SESSION["user_id"]=1;
		} else {
			$_SESSION["user"]="Treener1";
			$_SESSION["roll"]="kasutaja";
			$_SESSION["user_id"]=2;
		}
		header("Location: ?mode=loomad");
	}
	include_once("vaated/login.html");
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_loomad(){
	//loomad selekteerimine baasist
	global $link;
	$loomad=array();
	$sql="SELECT id, nimi, pilt, treener_id from 0tsirkus";
	//vea teade, tasub panna or die
	$result=mysqli_query($link, $sql) or die ("sellest loomi poole");
	while($rida=mysqli_fetch_assoc($result)){
		$loomad[]=$rida;
	}
	include_once("vaated/loomad.html");
}



function kuva_loom(){
	global $link;
	if (empty($_SESSION["roll"])){ // info logitud kasutajatele, kas tava või admin
		header("Location: ?mode=loomad");
	}
	if(!empty($_GET["id"])){
		//ternary if: tingimus ? true : false
		$lisaks=$_SESSION["roll"]!="admin" ? " and treener_id="mysqli_real_escape_string($link, $_SESSION["user_id"]) :" ";
	$sql="SELECT * from 0tsirkus where id=".mysqli_real_escape_string($link, $_GET["id"]).$lisaks;
	$result=mysqli_query($link, $sql);
	$loom=mysqli_fetch_assoc($result));
	if($loom) include_once("vaated/loom.html");
	else header("Location:?mode=loomad");
}else{ //loom määramata
	header("Location:?mode=loomad");
}
}


function lisa(){
	global $link;
	if (!empty($_SESSION["roll"]) && $_SESSION["roll"]!="admin"){ // ainult admin
		header("Location: ?mode=loomad");
	}
	$errors=array();
	if (!empty($_POST)){
		if (empty($_POST["nimi"])) {
			$errors[]="nimi kohustuslik";
		}
		if (empty($_POST["oskused"])) {
			$errors[]="oskused kohustuslikud";
		}
		if (empty($_POST["treener_id"])) {
			$errors[]="treener kohustuslik";
		}
		if (empty($_POST["pilt"])) {
			$errors[]="liik kohustuslik";
		}
		if (empty($errors)){
				//siin sisestada andmed
				$nimi=mysqli_real_escape_string($link, $_POST["nimi"]);
				$pilt=mysqli_real_escape_string($link, $_POST["pilt"]);
				$treener=mysqli_real_escape_string($link, $_POST["treener_id"]);
				$oskused=mysqli_real_escape_string($link, $_POST["oskused"]);
				$sql="INSERT INTO 0tsirkus(nimi, pilt, treener_id, oskused) values
				('$nimi', '$pilt', $treener, '$oskused')"; //treener pole vaja ''
				//sest numbriline väärtus
				$result=mysqli_query($link, $sql);
				if($result){
					header("Location: ?mode=loomad");
				}

		}

	}
	include_once("vaated/lisa.html");

}

?>
