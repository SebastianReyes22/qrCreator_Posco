<?php
    if(isset($_POST['no-parte'],$_POST['desc'],$_POST['esp'],$_POST['kgpc'])){
        include "session_modules.php";
        require_once "../queries/insert_part.php";
        $result = insert_part(trim($_POST['no-parte']),trim($_POST['desc']),trim($_POST['esp']),trim($_POST['kgpc']));
        echo $result;
    }
?>