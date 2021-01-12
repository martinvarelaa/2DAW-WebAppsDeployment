<?php

require('../Modules/mysqli/connection.php');

$conn = new connection();
$execute = $conn -> connect();

$option = $_GET["option"];
$usersArray = $conn-> listUsers($option, $execute);

$execute -> close();

?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php
    echo "<title>Agenda " . $option . "</title>";
    ?>
    <link rel="stylesheet" href="../Public/assests/common.css">
    <link rel="stylesheet" href="../Public/assests/schedule/schedules.css">
    
</head>
<body>
<div class="container">
    <div class="navBar">
        <nav>
            <?php
            echo '<h1>Agenda '.$option.'</h1>';
            ?>
            <ul class="navList">
                <li><a href="../Public/static/form.html" >Agregar</a></li>
                <li><a href="../index.html">Volver</a></li>
            </ul>


        </nav>
    </div>
    <div class="content">
            <table id="schedule">

                <tr class="first">
                    <td class="element">Nombre</td>
                    <td class="element">Apellidos</td>
                    <td class="element">Email</td>
                    <td class="element">Teléfono</td>
                    <td class="element">Opciones</td>
                </tr>
                <?php

                 while($user = $usersArray->fetch_assoc()) {
                    echo "<tr>
                        <td class='element'>".$user['name']."</td>
                        <td class='element'>".$user['surname']."</td>
                        <td class='element'>".$user['email']."</td>
                        <td class='element'>
                            ".$user['telephone']."
                        </td>
                        <td>
                            <a href='./userInfo.php?name=${user['name']}&surname=${user['surname']}&email=${user['email']}&telephone=${user['telephone']}&option=${option}'><button type='button'>Editar</button></a>
                            <a href='./removed.php?option=${option}&telephone=${user['telephone']}'><button type='button'>Borrar</button></a>
                        </td>
                        
                    </tr>";
                }

                ?>

           </table>

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