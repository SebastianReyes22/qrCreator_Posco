<?php
    if(isset($_SESSION['user_name'],$_SESSION['user_role'])){
        if($_SESSION['user_role']==='user'){
            echo "<button id='btn-menu' class='btn-menu'>Menú</button>
                    <ul class='nav' id='menu'>
                        <li><a href='menu_user.php'>Inicio</a></li>
                        <li><a href='label.php'>Nueva Etiqueta</a></li>
                        <li><a href='part.php'>Nueva Parte</a></li>
                        <li><a href='lot.php'>Nuevo Lote</a></li>
                        <li><a href='../server/tasks/close_session.php'>Cerrar sesión</a></li>
                    </ul>";
            //exit;
        }else if($_SESSION['user_role']==='admin'){
            echo "<button id='btn-menu' class='btn-menu'>Menú</button>
                    <ul id='menu' class='nav'>
                        <li><a href='menu_admin.php'>Inicio</a></li>
                        <li><a href='label.php'>Nueva Etiqueta</a></li>
                        <li><a>Partes<span class='flecha'>&#9660</span></a>
                            <ul>
                                <li><a href='part.php'>Nueva Parte</a></li>
                                <li><a href='change_features_part.php'>Actualizar Parte</a></li>
                                <li><a href='delete_part.php'>Eliminar Parte</a></li>
                            </ul>
                        </li>
                        <li><a>Lotes<span class='flecha'>&#9660</span></a>
                            <ul>
                                <li><a href='load_lots.php'>Cargar Lotes</a></li>
                                <li><a href='lot.php'>Nuevo Lote</a></li>
                                <li><a href='change_features_lot.php'>Actualizar Lote</a></li>
                                <li><a href='delete_lot.php'>Eliminar Lote</a></li>
                            </ul>
                        </li>
                        <li><a href='equal_data.php'>Datos Fijos</a></li>
                        <li><a href='new_user.php'>Nuevo Usuario</a></li>
                        <li><a href='../server/tasks/close_session.php'>Cerrar Sesion</a></li>
                    </ul>";
            //exit;
        }
    }
    //header('location:../pages/error.html');
?>