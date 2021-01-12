<?php
require('../Modules/mysqli/connection.php');

$conn = new connection();
$execute = $conn->connect();

$option = $_GET['option'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];

if ($name !== null && $surname !== null && $email !== null && $telephone !== null) {
    if (isset($conn)) {
        if ($conn->addContact($option, $execute, $name, $surname, $email, $telephone) === true) {
            $redirection = 'Usuario añadido con éxito! ';

        }else{
           $redirection = 'No se ha podido añadir el usuario! ' ;
        }
        if ($option === 'Personal') {

           $redirection .= "<a href='schema.php?option=Personal'>Ir a la agenda</a>";

        } else {

          $redirection .= "<a href='./schema.php?option=Profesional'>Ir a la agenda</a>";

        }
    }
} else {
    echo 'Empty fields rejected';
}

$execute->close();

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


            <h1>Añadir contacto</h1>
            <ul class="navList">
                <li><a href="../Public/static/form.html">Agregar</a></li>
                <li><a href="../index.html">Volver</a></li>
            </ul>


        </nav>
    </div>
    <div class="content">
        <?php
        if (isset($redirection)) {
            echo '<div class="message">'. $redirection .' </div>';
        } else {
            echo '<div class="message"><p>No se ha podido crear el contacto! Asegúrate de que no estás introduciendo un número duplicado!</p></div>';
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

