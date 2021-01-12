<?php


$name = $_GET['name'];
$surname = $_GET['surname'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];
$option = $_GET['option'];


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Info</title>
    <link rel="stylesheet" href="../Public/assests/contact/contact.css">
    <link rel="stylesheet" href="../Public/assests/common.css">
</head>
<body>
<div class="container">
    <div class="navBar">
        <nav>
            <h1>Editar contacto</h1>
            <ul class="navList">
                <li><a href="../Public/static/form.html">Agregar</a></li>
                <li><a href="../index.html">Volver</a></li>
            </ul>


        </nav>
    </div>
    <div class="content">

        <div id="infoDiv">
            <?php
            echo "<form class='userData' method='POST' action='./updated.php?oldTelephone=${telephone}&option=${option}'>
                <label>Nombre</label>
                <input type='text' name='newName' value='${name}' ></input>
                <label>Apellidos</label>
                <input type='text' name='newSurname' value='${surname}'></input>
                <label>Email</label>
                <input type='text' name='newEmail' value='${email}'></input>
                <label>Teléfono</label>
                <input type='text' name='newTelephone' value='${telephone}'></input>
                <input type='submit' value='Actualizar'>
            </form>"

            ?>

        </div>


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








