<?php
    session_start();

    require '../PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    require_once 'auth.php';
    $user = new Auth();

    //Handle forgot password ajax request
    if(isset($_POST['action']) && ($_POST['action'] == 'forgot')){
        $email = $user->test_input($_POST['femail']);

        $user_fount = $user->currentUser($email);

        if($user_fount != null){
            $token = uniqid();
            $token = str_shuffle($token);

            $user->forgot_password($token, $email);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = Databases::USERNAME;
                $mail->Password   = Databases::PASSWORD;
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                
                $mail->setFrom(Databases::USERNAME,'User Management System');
                $mail->addAddress($email);
                $mail->addReplyTo(Databases::USERNAME);
                
                $mail->isHTML(true);
                $mail->Subject = 'Reset Password';
                $mail->Body ='<h3>Click the below link to reset your password..<br><a href="http://localhost/shahab/eventmanagement/admin/reset-pass.php?email='.$email.'&token='.$token.'">http://localhost/shahab/eventmanagement/admin/reset-pass.php?email='.$email.'&token='.$token.'</a><br>Regards<br>User Management<h3>';

                
                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo $user->showMessage('Success','We have send you the reset link in your e-mail ID, Please check your e-mail!');
                }
            }catch(Exception $e){
                echo $user->showMessage('danger','Something went to wrong... try later');
            }
        }else{
            echo $user->showMessage('info','This e-mail is not registered.');
        }
    }
    //Checking User is logged in or not
    if(isset($_POST['action']) && $_POST['action'] == 'checkUser'){
        if(!$user->currentUser($_SESSION['user'])){
            echo 'bye';
        }
    }
?>