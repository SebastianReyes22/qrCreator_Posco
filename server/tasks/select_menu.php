<?php
    if(!isset($_SESSION['user_name'],$_SESSION['user_role'])){
        header('location:../../pages/error.html');
    }
    if(isset($_SESSION['user_name'],$_SESSION['user_role'])){
        if($_SESSION['user_role']==='user'){
            include("../components/navbar_user.php");
        }else if($_SESSION['user_role']==='admin'){
            include("../components/navbar.php");
        }
    }
?>
