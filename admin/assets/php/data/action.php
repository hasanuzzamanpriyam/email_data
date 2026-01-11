<?php
    session_start();

    require_once 'auth.php';
    require_once '../PHPMailer/PHPMailerAutoload.php';

    $user = new Auth();

   
    //Handle Login Ajax reques
    if(isset($_POST['action']) && ($_POST['action'] == 'login')){
        
        $email = $user->test_input($_POST['email']);
        $inputPass = $user->test_input($_POST['password']);

        $loggedInUser = $user->login($email);
        $loginPass = $loggedInUser['password'];
        
        if($loggedInUser != null){
            if($inputPass === $loginPass ){
                if(!empty($_POST['rem'])){
                    setcookie("email", $email, time()+(30*24*60*60), '/');
                    setcookie("password", $inputPass, time()+(30*24*60*60), '/');
                }else{
                    setcookie("email","",1,'/');
                    setcookie("password","",1,'/');
                }
                echo 'login';
                $_SESSION['admin'] = $email;
            }else{
                echo $user->showMessage('danger','Password is Incorrect!');
            }
        }else{
            echo $user->showMessage('danger','User not found!');
        }
    }

    //Handle forgot password ajax request
    if(isset($_POST['action']) && ($_POST['action'] == 'forgot')){
        $email = $user->test_input($_POST['femail']);

        $user_fount = $user->currentUser($email);

        if($user_fount != null){
            $token = uniqid();
            $token = str_shuffle($token);

            $user->forgot_password($token, $email);

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = Database::USERNAME;
                $mail->Password   = Database::PASSWORD;
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                
                $mail->setFrom(Database::USERNAME,'User Management System');
                $mail->addAddress($email);
                $mail->addReplyTo(Database::USERNAME);
                
                $mail->isHTML(true);
                $mail->Subject = 'Reset Password';
                $mail->Body ='<h3>Click the below link to reset your password..<br><a href="http://localhost/shahab/datacenter/admin/reset-pass.php?email='.$email.'&token='.$token.'">http://localhost/shahab/datacenter/admin/reset-pass.php?email='.$email.'&token='.$token.'</a><br>Regards<br>User Management<h3>';

                
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
?>