<?php
    require '../server/tasks/session_validate.php'; 
    session_validate("ignore"); 
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include("../components/header_view.php");
    ?>
<body class="body-menu">
    <?php
        include("../server/tasks/select_menu.php");
    ?>
    <div class="text-center home-etiquetas">
        <h1 class="title">Generador de Etiquetas COMPAS</h1>
        <div class="div-center">
            <div class="div-msg" id="server_answer"></div>
        </div>
        <div class="div-center">
            <form enctype="multipart/form-data" id="load-file">
                <div class="input-group-lg input-examinar">
                    <input type="file" class="form-control input-examinar" id="file-1" name="file-1" acept="xlsx" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-primary" id="btn-submit" type="submit">Generar</button>
                    <button class="btn btn-danger" id="clean-all">Limpiar</button>
                </div>
                <h5>Nota: Sólo se permiten archivos de excel</h5>                
            </form>
        </div>
        <iframe frameborder="0" id="pdfFrame"></iframe>
    </div>
    <!--librerias-->
    <script src="../js/libraries/jquery-3.4.1.min.js"></script>
    <script src="../js/libraries/jspdf.min.js"></script>
    <!--js-->
    <script src="../js/compas.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/quitMsg.js"></script>
</body>
</html>
