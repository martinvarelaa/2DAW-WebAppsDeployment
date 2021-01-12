<?php

$arr1 =  Array(1,2,3,4);
$arr2 = Array(6,4,5,3);
$result = Array();
for($i = 0; $i < count($arr1); $i++ ){
    echo $arr1[$i] ." + ". $arr2[$i] . " = " . ($arr1[$i] + $arr2[$i]) . "<br>";
}
