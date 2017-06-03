<?php


$family=array("Rob", "Kristan", "Tommy", "Ralphie");

//key is index, value is the result, here its name
foreach($family as $key => $value){
    //changing the key
    $family[$key]=$value."Percival";
    echo "Array item".$key "is".$value."<br>";
}

for($i=0; $i<sizeof($family); $i++){
    
    echo $family[$i]."<br>";
}

for ($i=2; $i<30; $i=$i+2){
    
    echo $i."<br>";
    
}


?>