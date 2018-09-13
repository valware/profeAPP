<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="assets/materialicons">
    <link rel="stylesheet" href="assets/material.indigo-pink.min.css">
    <link rel="stylesheet" href="assets/my.css">
    <script defer src="assets/material.min.js"></script>
    <script defer src="assets/my.js"></script>
    <style>
    .demo-list-icon {
    width: 300px;
    }
    </style>
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
                  <div style="margin: 0 auto" class="mdl-cell mdl-cell--5-col">

                    <!-- TODO ESTO ES LO PRINCIPAL -->

                    <h1>RESULTADOS DE LA BUSQUEDA:</h1>

                    <?php
                        $prof_buscado = $_POST['prof_search'];
                        //Llamando datos del servidor
                        require_once 'login.php';
                        //Conectando al servidor
                        $db_server = mysqli_connect($db_hostname,$db_username,$db_password);
                            if (!$db_server) die("No se pudo conectar a MySQL: " . mysqli_error());
                        //Seleccionando la base de datos 'final_project'
                        mysqli_select_db($db_server,$db_database);
                        //Realizando la consulta del profesor buscado
                        $query = "SELECT nombre,id FROM profesor WHERE nombre LIKE '$prof_buscado%'";
                        $result = mysqli_query($db_server,$query);
                        //Numero de filas que coinciden con la consulta
                        $numRows = mysqli_num_rows($result);
                            echo "Se han encontrado $numRows coincidencias:";
                        //Imprimiendo tabla con las consultas encontradas como enlaces a 
                        //sus respectivas webs. 
                            echo '<ul style="width: 100%" class="demo-list-icon mdl-list">';
                        while($row = mysqli_fetch_array($result)) {
                            echo '<li class="mdl-list__item"><span class="mdl-list__item-primary-content"><i class="material-icons mdl-list__item-icon">person</i>';
                            echo $row['nombre'],"</span>";
                            echo '<span class="mdl-list__item-secondary-content">',$row['id'],"</span>";
                            echo "</span></li>";                            ;
                            }
                        echo "</ul>";
                    ?>
            
                    <form action="./prof_pagina.php" method="post" >
                      <div style="width: 100%;" class="mdl-cell mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" name="profCOD" id="sample1">
                        <label class="mdl-textfield__label" for="sample1">Ingrese el codigo del profesor ...</label>
                      </div>
                      <div class="mdl-cell">
                      <button style="width: 100%;"  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                        Buscar
                      </button>
                        </div>
                    </form>





















                  </div>
                </div>
            </div>
        </main>
    </div>



</body>
</html>