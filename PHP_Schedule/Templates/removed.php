<?php
require('../Modules/mysqli/connection.php');

$conn = new connection();
$execute = $conn->connect();


$option = $_GET['option'];
$telephone = $_GET['telephone'];


$conn->deleteUser($option, $telephone, $execute);


?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php
    echo "<title>Agenda " . $option . "</title>";
    ?>
    <link rel="stylesheet" href="../Public/assests/common.css">
    <link rel="stylesheet" href="../Public/assests/message/message.css">




</head>
<body>
<div class="container">
    <div class="navBar">
        <nav>
           <h1>Eliminar usuario</h1>
            <ul class="navList">
                <li><a href="../Public/static/form.html" >Agregar</a></li>
                <li><a href="../index.html">Volver</a></li>
            </ul>


        </nav>
    </div>
    <div class="content">
        <?php
        echo '<div class="message"><p>Eliminado con éxito! Volver a la<a class="return" href="./schema.php?option='.$option.'"> agenda '. strtolower($option) .'</a></p></div>';
        ?>


    </div>
    <div class="footer">
        <footer>Martin Varela martinvarelaa@gmail.com </footer>
        <ul class="iconList" >
            <li><a href="https://www.instagram.com/"><img class="icons" src="../Public/assests/img/logotipo-de-instagram.svg"></a></li>
            <li><a href="https://twitter.com/?lang=es"><img class="icons" src="../Public/assests/img/twitter.svg"></a></li>
            <li><a href="https://es-es.facebook.com/"><img class="icons" src="../Public/assests/img/facebook.svg"></a></li>
            <li><a href="https://www.linkedin.com/feed/"><img class="icons" src="../Public/assests/img/linkedin.svg"></a></li>
        </ul>
    </div>
</div>
</body>
</html>





