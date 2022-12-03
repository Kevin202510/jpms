<?php 
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();
    if(isset($_POST['USER_ID'])){
        $USER_ID = $crudapi->escape_string($_POST['USER_ID']);
        $result = $crudapi->getData("SELECT * FROM `users` WHERE user_id =$USER_ID");
        echo json_encode($result);
    }
    if(isset($_POST['USER_IDsss'])){
        $empval = $_POST['USER_IDsss'];
        $query = "SELECT * FROM `users` LEFT JOIN roles ON roles.id = users.user_role_id where users.user_role_id=29 AND users.user_id =$empval";
       
        $result = $crudapi->getData($query);
        echo json_encode($result);
    }
?>