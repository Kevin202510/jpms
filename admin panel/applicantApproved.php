<?php 

include_once("classes/CRUDAPI.php");
$crudapi = new CRUDAPI();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

if(isset($_POST["accepted"])){
    $applicant_id = $_POST["job_app_id"];
    $user_email = $_POST["user_email"];
    $jobs_vacancy_count = (int)$_POST["jobs_vacancy_count"] - 1;
    $jobs_id = $_POST["jobs_id"];

try {
    //Enable verbose debug output
    $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

    //Send using SMTP
    $mail->isSMTP();

    //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com';

    //Enable SMTP authentication
    $mail->SMTPAuth = true;

    //SMTP username
    $mail->Username = 'reyjohnpaullimbo18@gmail.com';

    //SMTP password
    $mail->Password = 'vybkifiixfuboytw';

    //Enable TLS encryption;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('reyjohnpaullimbo18@gmail.com', 'GT JOB HUNT');

    //Add a recipient
    $mail->addAddress($user_email, "Pangalan moto dito");

    //Set email format to HTML
    $mail->isHTML(true);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    $mail->Subject = 'Job Application Approved';
    $mail->Body    = '<p>Your job application in '.$_POST["job_company_name"].' is being approved please wait for the company to contact with you thank you.</p>';

    $mail->send();

    $result = $crudapi->execute("UPDATE job_applicants SET job_application_status=1 where job_app_id = $applicant_id");
    $result = $crudapi->execute("UPDATE jobs SET jobs_vacancy_count=$jobs_vacancy_count where jobs_id = $jobs_id");
    
    header("location: jobapplicant.php");

    exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}else if(isset($_POST["fetchApplicant"])){
    $jobapplicant_id = $crudapi->escape_string($_POST['fetchApplicant']);
    $result = $crudapi->getData("SELECT * FROM `job_applicants` LEFT JOIN users ON users.user_id = job_applicants.job_app_user_id LEFT JOIN jobs on jobs.jobs_id = job_applicants.job_app_job_id WHERE job_applicants.job_app_id =$jobapplicant_id");
    echo json_encode($result);
}

?>