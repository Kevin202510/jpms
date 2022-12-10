<?php 
    include_once("classes/CRUDAPI.php");
    $crudapi = new CRUDAPI();
    if(isset($_POST['USER_IDsss'])){
        $empval = $_POST['USER_IDsss'];
        $query = "SELECT * FROM `users` LEFT JOIN applicant_experience ON applicant_experience.ae_user_id  = users.user_id LEFT JOIN applicant_educationbg ON applicant_educationbg.aebg_user_id = users.user_id LEFT JOIN applicant_skills ON applicant_skills.as_user_id = users.user_id LEFT JOIN applicant_additional_info ON applicant_additional_info.aai_user_id = users.user_id left join education_attainment on education_attainment.ea_id = applicant_educationbg.aebg_education_attainment_id where users.user_role_id=4 AND users.user_id =$empval";
       
        $result = $crudapi->getData($query);
        echo json_encode($result);
    }
?>