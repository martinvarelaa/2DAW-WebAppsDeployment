<?php
$message = null;
if(isset($_POST["message"])){
    $message = $_POST["message"];
}else{
   echo "Escribe un mensaje!";
}



 for( $i = 0 ; $i < 15; $i ++){
     echo $message . "<br>";
 }
