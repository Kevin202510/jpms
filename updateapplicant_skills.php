<?php 
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();
    $USER_ID = $crudapi->escape_string($_POST['USER_ID']);
    $result = $crudapi->getData("SELECT * FROM `applicant_skills` WHERE as_id=$USER_ID");
    echo json_encode($result);
?>