<?php

$arr = [];

if(isset($_POST["v1"])){
    array_push($arr,$_POST["v1"]);
}else{
    array_push($arr, 0);
}
if(isset($_POST["v2"])){
    array_push($arr, $_POST["v2"]);
}else{
    array_push($arr, 0);
}
if(isset($_POST["v3"])){
    array_push($arr, $_POST["v3"]);
}else{
    array_push($arr, 0);
}
if(isset($_POST["v4"])){
    array_push($arr,$_POST["v4"]);

}else{
    array_push($arr, 0);
}



$pMax = null;
if(isset($_POST["pMax"])){
    $pMax = $_POST["pMax"];
}else{
    echo "Introduce peso máximo!";
}



for ($i = 0; $i < count($arr); $i++){
    echo $arr[$i];
    if ($arr[$i] != 0) {
        if($arr[$i] > $pMax ){
            echo  "El vehiculo " . ($i+1) ." es muy pesado! <br>";
        }else{
            echo  "El vehiculo " . ($i+1) ." esta permitido! <br>";
        }
    }else{
        echo "El vehículo ". ($i+1) . " no ha sido definido (peso 0) <br>";
    }
}






