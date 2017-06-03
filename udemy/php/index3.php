<?php


$i=5;
while($i<=50){
    echo $i."<br>";
    $i=$i+5;
}
//going through array
$myArray=array("pisja", "sisja", "zopa", "dqrka");
$i=0;
while($i<sizeof($myArray)){
    echo $myArray[$i]."<br>";
    $i++;
}

?>