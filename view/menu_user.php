<?php   
    require '../server/tasks/session_validate.php'; 
    session_validate("user");    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
        include("../components/header_view.php");
    ?>
<body class="body-menu">
    <?php
        include("../components/navbar_user.php");
    ?>
    <div class="home" id="user_name">
        <?php 
            echo "Bienvenido ".$_SESSION['user_name'];
        ?>
    </div>
    <div class="div-center">
        <div class="div-msg" id="val-msg"></div>
    </div>
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>window.jQuery || document.write(unescape('%3Cscript src="../js/libraries/jquery-3.4.1.min.js"%3E%3C/script%3E'))</script>
    <!--js-->
    <script src="../js/menu.js"></script>
    <script src="../js/show_labels.js"></script>
    <script src="../js/dateReview.js"></script>
    <script src="../js/quitMsg.js"></script>
</body>
</html>
