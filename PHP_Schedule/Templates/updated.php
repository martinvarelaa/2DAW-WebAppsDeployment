<?php
require('../Modules/mysqli/connection.php');

$conn = new connection();
$execute = $conn->connect();

$option = $_GET['option'];
$newName = $_POST['newName'];
$newSurname = $_POST['newSurname'];
$newEmail = $_POST['newEmail'];
$newTelephone = $_POST['newTelephone'];
$oldTelephone = $_GET['oldTelephone'];



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Info</title>
    <link rel="stylesheet" href="../Public/assests/message/message.css">
    <link rel="stylesheet" href="../Public/assests/common.css">
</head>
<body>
<div class="container">
    <div class="navBar">
        <nav>
            <h1>Actualizar Contacto</h1>
            <ul class="navList">
                <li><a href="../Public/static/form.html">Agregar</a></li>
                <li><a href="../index.html">Volver</a></li>
            </ul>


        </nav>
    </div>
    <div class="content">

        <?php
        if ($conn->updateUser($option, $oldTelephone, $execute, $newName, $newSurname, $newEmail, $newTelephone) === TRUE) {
            echo '<div class="message"> <p>Usuario modificado con éxito! <a href="./schema.php?option='.$option.'">Agenda '.$option.'</a></p></div>';
        }else{
            echo '<div class="message"><p>No se ha podclasso modificar el usuario!<a href="./schema.php?option='.$option.'">Agenda '.$option.'</a></p></div>';
        }
        ?>

    </div>
    <div class="footer">
        <footer>Martin Varela martinvarelaa@gmail.com</footer>
        <ul class="iconList">
            <li><a href="https://www.instagram.com/"><img class="icons" src="../Public/assests/img/logotipo-de-instagram.svg"></a></li>
            <li><a href="https://twitter.com/?lang=es"><img class="icons" src="../Public/assests/img/twitter.svg"></a></li>
            <li><a href="https://es-es.facebook.com/"><img class="icons" src="../Public/assests/img/facebook.svg"></a></li>
            <li><a href="https://www.linkedin.com/feed/"><img class="icons" src="../Public/assests/img/linkedin.svg"></a></li>
        </ul>
    </div>
</div>
</body>
</html>



