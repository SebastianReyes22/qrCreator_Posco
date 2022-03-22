<?php   
    require '../server/tasks/session_validate.php'; 
    session_validate("admin");    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("../components/header_view.php");
    ?>

<body class="body-menu">
    <?php
        include("../server/tasks/select_menu.php");
    ?>
    <div class="home-newUser">
        <h1 class="title text-center">Registrar Usuario</h1>
        <div class="div-center">
            <div class="div-msg" id="server_answer"></div>
        </div>
        <div class="div-center">
            <form class="form-user" id="new_user_form" autocomplete="off">
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Usuario: </label>
                        <input type="text" class="form-control" id="user" aria-describedby="emailHelp" minlength='3'
                            maxlength='50'>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="exampleInputEmail1" class="form-label">Correo electrónico: </label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" maxlength='50'>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" id="pass">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="exampleInputPassword1" class="form-label">Confirmar contraseña: </label>
                        <input type="password" class="form-control" id="confirm">
                    </div>
                    <div class="mb-4 col-sm-6">
                        Tipo:
                        <div class="div-union mt5">
                            <input type="radio" name="type" id="tuser" value="0">Usuario estándar
                        </div>
                        <div class="div-union">
                            <input type="radio" name="type" value="1"> Administrador
                        </div>
                    </div>
                    <div class="mb-4 col-sm-1">
                        <button class="btn btn-primary" id="btn-login" type="submit">Registrar</button>
                    </div>
                    <div class="mb-4 col-sm-3">
                        <button class="btn btn-danger" id="clean_all">Limpiar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
    window.jQuery || document.write(unescape('%3Cscript src="../js/libraries/jquery-3.4.1.min.js"%3E%3C/script%3E'))
    </script>
    <!--js-->
    <script src="../js/login.js"></script>
    <script src="../js/new_user.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/quitMsg.js"></script>
</body>

</html>