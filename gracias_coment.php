<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gracias</title>
    <link rel="stylesheet" href="assets/materialicons">
    <link rel="stylesheet" href="assets/material.indigo-pink.min.css">
    <link rel="stylesheet" href="assets/my.css">
    <script defer src="assets/material.min.js"></script>
    <script defer src="assets/my.js"></script>
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
              <span class="mdl-layout-title"><a style="color:white;text-decoration: none" href="./">ProfeAPP</a></span>
              <div class="mdl-layout-spacer"></div>
              <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="./aportar.html">APORTAR</a>
                <a class="mdl-navigation__link" href="./main_menu.html">BUSCAR</a>
            </nav>
        </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title"><a style="color:black;text-decoration: none" href="./">ProfeAPP</a></span>
            <nav class="mdl-navigation">
              <a class="mdl-navigation__link" href="./aportar.html">APORTAR</a>
              <a class="mdl-navigation__link" href="./main_menu.html">BUSCAR</a>
          </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <div class="mdl-grid">
                  <div style="margin: 0 auto"  class="mdl-cell mdl-cell--5-col">






    <h2>Gracias por comentar</h2>
    <a href="http://localhost:8081/PROJECTS/CC3/index.html">Regresar</a>
<?php
    //Llamando datos del servidor
    require_once 'login.php';
    //Conectando al servidor
    $db_server = mysqli_connect($db_hostname,$db_username,$db_password);
    if (!$db_server) die("No se pudo conectar a MySQL: " . mysql_error());
    //Seleccionando la base de datos 'final_project'
    mysqli_select_db($db_server,$db_database);
    $newCom = $_POST['newComment'];
    $numID = $_POST['cod'];
    $query = "INSERT INTO comentarios (comentario, id)
    VALUES ('$newCom','$numID')";
    mysqli_query($db_server, $query);
?>



</div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
