<?php 
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();
    if(isset($_POST['USER_ID'])){
        $USER_ID = $crudapi->escape_string($_POST['USER_ID']);
        $result = $crudapi->getData("SELECT * FROM `jobs` WHERE jobs_id=$USER_ID");
        echo json_encode($result);
    }
    if(isset($_POST['USER_IDsss'])){
        $empval = $_POST['USER_IDsss'];
        $query = "SELECT * FROM `jobs` left join users on users.user_id = jobs.jobs_user_id where jobs.jobs_user_id=user_id AND jobs.jobs_id = $empval";
        $result = $crudapi->getData($query);
        echo json_encode($result);
    }
?>