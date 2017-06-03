<?php

$myArray=array("Rob", "Kristijan" , "Tommy" , "Ralphie");

//adding to the end of array
$myArray[]="Katie";

print_r($myArray);

echo $myArray[1];

echo "<br><br>";

$anotherArray[0]="pizza";
$anotherArray[1]="yoghurt";
$anotherArray[5]="coffer";
$anotherArray["myFavouriteFood"]="ice cream";


print_r($anotherarray);
//applying names to indexes
$thirdArray=array(
    
    "France"=>"French",
    "USA"=>"English",
    "Germany"=>"German");

//remove the variable from array or index
unset($thirdArray["France"]);

print_r($thirdArray);

//length of array
echo sizeof($thirdArray);

?>