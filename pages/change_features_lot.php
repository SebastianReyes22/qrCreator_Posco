<?php   
    include '../server/tasks/session_validate.php'; 
    session_validate("ignore");    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización Lotes</title>

    <!--css-->
    <link rel="stylesheet" href="../styles/basics.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <link rel="stylesheet" href="../styles/suggest_list.css">
    <link rel="stylesheet" href="../styles/lot.css">
</head>
<body class="f14">
    <nav class="menu-main">
        <?php
            echo ($_SESSION['user_role']==="admin") ? "<a class='w150' href='menu_admin.php'>Volver</a>" : "<a class='w150' href='menu_user.php'>Volver</a>";
        ?>
        <a class='w150' href="../server/tasks/close_session.php">Cerrar sesión</a>
    </nav>
    <h1>Actualizar Lote</h1>
    <div class="div-msg" id="server_answer"></div>
    <div class="div-center">
        <form id="form_lot" autocomplete="off">
            <div class="div-left">
                <span>Ingrese No. Lote para buscar</span>
                <input type="text" id="buscar-lote">
                <ul id="sug-lote"></ul>
            </div>
            <div class="div-union" id="datos-lote"></div>
        </form>
    </div>

    <!--js-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>window.jQuery || document.write(unescape('%3Cscript src="../js/jquery-3.4.1.js"%3E%3C/script%3E'))</script>
    <script src="../js/suggest_list.js"></script>
    <script src="../js/lot.js"></script>
    <script src="../js/features_lot.js"></script>
</body>
</html>