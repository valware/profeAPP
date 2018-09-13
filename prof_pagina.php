<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil del profesor</title>
    <link rel="stylesheet" href="assets/materialicons">
    <link rel="stylesheet" href="assets/material.indigo-pink.min.css">
    <link rel="stylesheet" href="assets/my.css">
    <script defer src="assets/material.min.js"></script>
    <script defer src="assets/my.js"></script>
    <style>
    .demo-card-wide.mdl-card {
    width: 100%;
    }
    .demo-card-wide > .mdl-card__title {
    color: #fff;
    height: 300px;
    background: url('https://www.anipedia.net/imagenes/que-comen-los-perros.jpg') center / cover;
    }
    .demo-card-wide > .mdl-card__menu {
    color: #fff;
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
                  <div style="margin: 0 auto" class="mdl-cell mdl-cell--6-col">

                    <?php
                        $numID = $_POST['profCOD'];
                        //Llamando datos del servidor
                        require_once 'login.php';
                        //Conectando al servidor
                        $db_server = mysqli_connect($db_hostname,$db_username,$db_password);
                            if (!$db_server) die("No se pudo conectar a MySQL: " . mysql_error());
                        //Seleccionando la base de datos 'final_project'
                        mysqli_select_db($db_server,$db_database);
                        $query = "SELECT id,nombre,universidad,carrera,foto,curso FROM profesor 
                        WHERE id = '$numID'";
                        $result = mysqli_query($db_server,$query);
                        $row = mysqli_fetch_array($result);
                        $mylink = $row['foto'];
                                                   

                    ?>
                    



<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title" style = "background: url('<?php echo $mylink; ?>') no-repeat fixed center / cover">
    <h2 class="mdl-card__title-text"><?php echo $row['nombre']; ?></h2>
  </div> 

</div>

                    
                    <h3>Comentarios</h3>
                    <div class="mdl-grid">
                    <?php
                    $numID = $_POST['profCOD'];
                    //Seleccionando la base de datos 'final_project'
                    mysqli_select_db($db_server,$db_database);
                    $queryb = "SELECT comentario,id FROM comentarios WHERE id = '$numID'";
                    $resultb= mysqli_query($db_server,$queryb);
                    //Empieza la caja de comentarios
                    if($resultb = mysqli_query($db_server, $queryb)){
                        if(mysqli_num_rows($resultb) > 0){
                            while($rowb = mysqli_fetch_array($resultb)){
                                echo '<div class ="mdl-card mdl-shadow--2dp  mdl-cell  mdl-cell--4-col"><h4 style= "margin: 15px">' ,$rowb['comentario'],"</h4></div>";;
                            }
                        }
                    }
                ?>
                </div>
                <h4>Agregar comentario: </h4>
                <form action="http://localhost:8081/PROJECTS/CC3/gracias_coment.php" method="post">
                    <textarea   class="mdl-textfield__input" name="newComment" cols="10" rows="5"></textarea>
                    <input type="hidden" name="cod" value="<?php echo $numID; ?>">
                    <br>
                    <input  style="width: 100%;"  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" value="comentar">







                  </div>
                </div>
            </div>
        </main>
    </div>




</body>
</html>