<?php
    if(isset($_POST['no-lote'])){
        require "session_modules.php";
        require_once "../queries/delete_lot.php";
        $result = delete_part($_POST['no-lote']);
        echo $result;
        exit;
    }
?>
