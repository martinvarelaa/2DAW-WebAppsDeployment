<?php
$n1 = $_POST["num1"];
$n2 = $_POST["num2"];




    if ($n1 > $n2) {
        echo $n1 . " es mayor que " . $n2;
    } else if ($n1 < $n2) {
        echo $n1 . " es menor que " . $n2;
    } else {
        echo "Son iguales!";
    }




