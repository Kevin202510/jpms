<?php 
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();
    $USER_ID = $crudapi->escape_string($_POST['USER_ID']);
    $result = $crudapi->getData("SELECT * FROM `applicant_educationbg` WHERE aebg_id=$USER_ID");
    echo json_encode($result);
?>