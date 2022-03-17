<?php
/*Se elimina la sesión si existía una*/
    session_start();
    if(isset($_SESSION['user_name'],$_SESSION['user_role'])){
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include("components/header.php");
    ?>
    <body class="body-login">
        <form id="login_form" class="form-login">
            <h1 class="text">Generador de Etiquetas</h1>
            <div class="image-login">
                <img src="./src/images/poscoLogo.png" alt="POSCO">
            </div>
            <div class="div-center">
                <div class="div-msg" id="server_answer"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label input-text">Usuario</label>
                <input type="text" class="form-control" id="user" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label input-text">Contraseña</label>
                <input type="password" class="form-control" id="pass">
            </div>
            <button type="submit" class="btn-color" id="btn-login">Ingresar</button>
        </form>
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script>window.jQuery || document.write(unescape('%3Cscript src="./js/libraries/jquery-3.4.1.min.js"%3E%3C/script%3E'))</script>
        <!--js-->
        <script src="./js/login.js"></script>
        <script src="./js/quitMsg.js"></script>
    </body>
</html>