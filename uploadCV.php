<?php

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI(); 




     if(isset($_POST['uploadCV'])){

        $target_dir = "cvs/";
        $target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $id = $_POST['user_id'];
        $profile = $_FILES["filesToUpload"]["name"];

        $result = $crudapi->execute("INSERT INTO requirements(requirements_filename,requirements_user_id) VALUES('$profile','$id')");

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }else{
            if (move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file)) {
                // echo "The file ". htmlspecialchars( basename( $_FILES["filesToUpload"]["name"])). " has been uploaded.";
                header("location:applicantinformation.php");
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }

        // if($newAPIFunctions){
        //     header("location:applicantinformation.php");
        // }else{
        //     echo '<script>alert("May Error!");</script>';
        // }
    }


?>