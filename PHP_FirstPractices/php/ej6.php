<?php

for($j = 1 ; $j < 3; $j++){

    $i = 0;
    $p = 0;
    $a = 0;

    if ($j === 1 ){
        $fp = fopen("../fileToRead/test.txt", "r");
    }else {
        $fp = fopen("../fileToRead/test2.txt", "r");
    }
    while (!feof($fp)) {
        $linea = fgets($fp);
        $i += substr_count($linea , "i" );
        $p += substr_count( $linea, "p");
        $a += substr_count( $linea, "a");
    }
    fclose($fp);
    echo "Archivo " .$j. ": La i aparece:" . $i . " veces, la p aparece " . $p . " veces, la a aparece " .$a ." veces <br>";
}


