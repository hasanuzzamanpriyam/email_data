<?php

require_once 'auth.php';
require_once 'session.php';
$user = new Auth();

if (isset($_POST['action']) && ($_POST['action'] == 'register')) {

    $fname = $user->test_input($_POST['fname']);
    $lname = $user->test_input($_POST['lname']);
    $email = $user->test_input($_POST['email']);
    $company = $user->test_input($_POST['company']);
    $pass = $user->test_input($_POST['rpassword']);
    $hpass = password_hash($pass, PASSWORD_DEFAULT);
    if ($user->user_exit($email)) {
        echo $user->showMessage('danger', 'This E-mail is already registered!');
    } else {
        if ($user->register($fname, $lname, $email, $company, $hpass)) {
            $_SESSION['user'] = $email;
            try {
                $emailSubject = "Account Verification";
                $userName = $fname . ' ' . $lname;

                $to = $email . ',support@emailbigdata.com';
                $subject = $emailSubject;

                $message = '<!DOCTYPE html>
                <html lang="en">
                
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Account Verification</title>
                </head>
                
                <body>
                    <!-- header-start -->
                    <div class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-bottom: 1px;padding-top: 15px;">
                        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td class="o_re o_bg-white o_px o_pb-md o_br-t" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-radius: 4px 4px 0px 0px;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                        <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                                            <div style="font-size: 24px; line-height: 24px; height: 24px;"> </div>
                                            <div class="o_px-xs o_sans o_text o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                                <p style="margin-top: 0px;margin-bottom: 0px;">
                                                    <a class="o_text-primary" href="https://mailerstation.com/" style="text-decoration: none;outline: none;color: #126de5;">
                                                        <img src="https://mailerstation.com/bundles/bydhome/img/mailerstation-logo.png" width="136" height="36" alt="Mailerstation" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                            <div style="font-size: 22px; line-height: 22px; height: 22px;"> </div>
                                            <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                                <table class="o_right o_xs-center" cellspacing="0" cellpadding="0" border="0" role="presentation" style="text-align: right;margin-left: auto;margin-right: 0;">
                                                    <tbody>
                                                        <tr>
                                                            <td class="o_btn-b o_heading o_text-xs" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">
                                                                <a class="o_text-light" href="https://mailerstation.com/login" style="text-decoration: none;outline: none;color: #82899a;display: block;padding: 7px 8px;font-weight: bold;">
                
                                                                    <span style="mso-text-raise: 6px;display: inline;color: #82899a;">
                                          Hello ' . $userName . ' 
                                          </span>
                
                                                                    <img src="https://www.fiviral.com/images/email/person.png" width="24" height="24" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- header-end -->
                    <!-- hero-primary-button -->
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                        <tbody>
                            <tr>
                                <td class="o_bg-light o_px-xs" align="center" style="background-color: #E8F2E8; padding-left: 8px; padding-right: 8px;">
                                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                        <tbody>
                                            <tr>
                                                <td class="o_bg-primary o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #0ec06e;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 34px;padding-bottom: 34px;">
                                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                        <tbody>
                                                            <tr>
                                                                <td class="o_sans o_text o_text-secondary o_bg-white o_px o_py o_br-max" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                                    <img src="https://www.fiviral.com/images/email/security.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-size: 24px; line-height: 24px; height: 24px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h2 class="o_heading o_mb-xxs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">Verify Your E-mail !</h2>
                                                    <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">To verified your e-mail click the below button and confirmation you e-mail.</p>
                                                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                        <tbody>
                                                            <tr>
                                                                <td width="300" class="o_btn o_bg-white o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #ffffff;border-radius: 4px;">
                                                                    <a class="o_text-primary" href="https://mailerstation.com/verify-email?email=' . $email . '" target="_blank" style="text-decoration: none; outline: none; color: #0EC06E; display: block; padding: 12px 24px; mso-text-raise: 3px;">Verify Now</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- content -->
                
                    <!-- label-xs -->
                
                    <div class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
                        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td class="o_bg-white o_px-md o_py o_sans o_text-xs o_text-light" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #ffffff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                        <p class="o_mb" style="margin-top: 0px;margin-bottom: 16px;"><strong>If the button doesn&apos;t work, copy that link</strong></p>
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="284" class="o_bg-ultra_light o_br o_text-xs o_sans o_px-xs o_py" align="center" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 14px; line-height: 21px; background-color: #e8f2e8; border-radius: 4px; padding-left: 8px; padding-right: 8px; padding-top: 16px; padding-bottom: 16px;">
                
                                                        <p class="o_text-dark" style="color: #242b3d;margin-top: 0px;margin-bottom: 0px;">
                                                            https://mailerstation.com/verify-email?email=' . $email . '
                                                        </p>
                
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                    <!-- label -->
                
                    <!-- alert-dark -->
                    <div class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
                        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td class="o_bg-white o_px-md o_py" align="left" style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                            <tbody>
                                                <tr>
                                                    <td width="40" class="o_bg-dark o_br-l o_text-md o_text-white o_sans o_py-xs" align="right" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #242b3d;color: #ffffff;border-radius: 4px 0px 0px 4px;padding-top: 8px;padding-bottom: 8px;">
                                                        <img src="https://www.fiviral.com/images/email/warning.png" width="24" height="24" alt="" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                    </td>
                                                    <td class="o_bg-dark o_br-r o_text-xs o_text-white o_sans o_px o_py-xs" align="left" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #242b3d;color: #ffffff;border-radius: 0px 4px 4px 0px;padding-left: 16px;padding-right: 16px;padding-top: 8px;padding-bottom: 8px;">
                                                        <p style="margin-top: 0px;margin-bottom: 0px;"><strong>Information.</strong> Always keep your account and e-mail in a safe place. If you don&apos;t verify your account you have missing some feature.</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- alert-primary -->
                
                    <!-- footer-start -->
                    <div class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-bottom: 32px;">
                        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                
                            <tbody>
                                <tr>
                                    <td class="o_re o_bg-white o_px o_pb-lg o_bt-light o_br-b" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-top: 1px solid #d3dce0;border-radius: 0px 0px 4px 4px;padding-left: 16px;padding-right: 16px;padding-bottom: 30px;">
                                        <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                            <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                                            <div class="o_px-xs o_sans o_text-xs o_text-light o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: left;padding-left: 8px;padding-right: 8px;">
                
                                                <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">©2021. All rights reserved.</p>
                                                <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 0px;">
                                                    Mailerstation
                                                </p>
                
                                            </div>
                                        </div>
                                        <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                                            <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                                            <div class="o_px-xs o_sans o_text-xs o_text-light o_right o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: right;padding-left: 8px;padding-right: 8px;">
                                                <p style="margin-top: 0px;margin-bottom: 0px;">
                                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/facebook-light.png" width="36" height="36" alt="fb" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/twitter-light.png" width="36" height="36" alt="tw" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/instagram-light.png" width="36" height="36" alt="ig" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/snapchat-light.png" width="36" height="36" alt="sc" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;"> </div>
                    </div>
                    <!-- footer-end -->
                </body>
                
                </html>';

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <admin@mailerstation.com>' . "\r\n";
                //$headers .= 'Cc: support@mailerstation.com' . "\r\n";

                mail($to, $subject, $message, $headers);
                echo $user->showMessage('info', 'We send an e-mail to your email address for verify your account. Please, check this e-mail and verify now!');
            } catch (Exception $e) {
                echo $user->showMessage('danger', 'Something went to wrong... try later');
            }
        } else {
            echo $user->showMessage('danger', 'Something went wrong! Please, try again later..');
        }
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'login')) {

    $email = $user->test_input($_POST['username']);
    $pass = $user->test_input($_POST['password']);
    $loggedInUser = $user->login($email);
    if ($loggedInUser != null) {
        if (password_verify($pass, $loggedInUser['password'])) {
            if (!empty($_POST['remember'])) {
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $pass, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }
            echo 'login';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Password is Incorrect!');
        }
    } else {
        echo $user->showMessage('danger', 'User not found!');
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'coupon_lost')) {
    $coupon = $user->test_input($_POST['coupon']);
    $oldPrice = $_POST['price'];
    $available = $user->coupon_avai($coupon);

    $copId = $available['id'];
    $copLim = $available['limitation'];
    $copType = $available['coupon_type'];
    $copAm = $available['amount'];

    if ($copLim > 0) {
        if ($copType === 'Percentage') {
            $presentP = $oldPrice - (($oldPrice * $copAm) / 100);
        } else {
            $presentP = $oldPrice - $copAm;
        }
    } else {
        $presentP = $oldPrice;
    }
    $details = array('old' => $oldPrice, 'price' => $presentP, 'copId' => $copId);
    echo json_encode($details);
}
if (isset($_POST['action']) && ($_POST['action'] == 'login2')) {
    $email = $user->test_input($_POST['username']);
    $pass = $user->test_input($_POST['password']);
    $order_code = $_POST['ordercode'];
    $copId = $_POST['cupId'];
    $emailType = $_POST['emailType'];
    $category = $_POST['emailCategory'];
    $selectItem = $_POST['selectItem'];
    $total_email = $_POST['totalemail'];
    $deliveryDays = $_POST['deliveryDays'];
    $total_price = $_POST['price'];

    $loggedInUser = $user->login($email);
    $logged = $user->currentUser($email);

    $uid = $logged['id'];
    $fullName = $logged['first_name'] . ' ' . $logged['last_name'];

    if ($loggedInUser != null) {
        if (password_verify($pass, $loggedInUser['password'])) {
            if (!empty($_POST['remember'])) {
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $pass, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }

            echo 'login2';

            $_SESSION['fullName'] = $fullName;
            $_SESSION['user'] = $email;
            $_SESSION['orderCode'] = $order_code;
            $_SESSION['emailType'] = $emailType;
            $_SESSION['category'] = $category;
            $_SESSION['items'] = $selectItem;
            $_SESSION['totalEmail'] = $total_email;
            $_SESSION['totalPrice'] = $total_price;
            $_SESSION['deliveryDays'] = $deliveryDays;
            $_SESSION['cupId'] = $copId;
        } else {
            echo $user->showMessage('danger', 'Password is Incorrect!');
        }
    } else {
        echo $user->showMessage('danger', 'User not found!');
    }
}
if (isset($_POST['userLogin'])) {

    $id = $_POST['userLogin'];

    $adminLogin = $user->userLogin($id);

    $_SESSION['user'] = $adminLogin['email'];
    $_SESSION['adminUser'] = 'Admin';
}

if (isset($_POST['action']) && ($_POST['action'] == 'forgot')) {

    $email = $user->test_input($_POST['femail']);
    $user_fount = $user->currentUser($email);
    $fullName = $user_fount['first_name'] . ' ' . $user_fount['last_name'];

    if ($user_fount != null) {
        $token = uniqid();
        $token = str_shuffle($token);
        $user->forgot_password($token, $email);

        try {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            $emailSubject = "Reset Your Password";
            $to = $email . ',shahabahammed37@gmail.com,support@mailerstation.com';
            $subject = $emailSubject;
            $message = '<!DOCTYPE html>
                    <html lang="en">
                    
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Reset Your Password</title>
                    </head>
                    
                    <body>
                        <!-- header-start -->
                        <div class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
                            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                <tbody>
                                    <tr>
                                        <td class="o_re o_bg-white o_px o_pb-md o_br-t" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-radius: 4px 4px 0px 0px;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                            <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                                                <div style="font-size: 24px; line-height: 24px; height: 24px;"> </div>
                                                <div class="o_px-xs o_sans o_text o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;">
                                                        <a class="o_text-primary" href="https://mailerstation.com/" style="text-decoration: none;outline: none;color: #126de5;">
                                                            <img src="https://mailerstation.com/bundles/bydhome/img/mailerstation-logo.png" width="136" height="36" alt="Mailerstation" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                                <div style="font-size: 22px; line-height: 22px; height: 22px;"> </div>
                                                <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                                    <table class="o_right o_xs-center" cellspacing="0" cellpadding="0" border="0" role="presentation" style="text-align: right;margin-left: auto;margin-right: 0;">
                                                        <tbody>
                                                            <tr>
                                                                <td class="o_btn-b o_heading o_text-xs" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">
                                                                    <a class="o_text-light" href="https://mailerstation.com/user/order" style="text-decoration: none;outline: none;color: #82899a;display: block;padding: 7px 8px;font-weight: bold;">
                    
                                                                        <span style="mso-text-raise: 6px;display: inline;color: #82899a;">
                                              Hello ' . $fullName . ' 
                                              </span>
                    
                                                                        <img src="https://www.fiviral.com/images/email/person.png" width="24" height="24" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                    
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- header-end -->
                    
                        <!-- hero-primary-button -->
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                            <tbody>
                                <tr>
                                    <td class="o_bg-light o_px-xs" align="center" style="background-color: #E8F2E8; padding-left: 8px; padding-right: 8px;">
                                        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                            <tbody>
                                                <tr>
                                                    <td class="o_bg-primary o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #0ec06e;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 34px;padding-bottom: 34px;">
                                                        <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="o_sans o_text o_text-secondary o_bg-white o_px o_py o_br-max" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                                        <img src="https://www.fiviral.com/images/email/key.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="font-size: 24px; line-height: 24px; height: 24px;"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <h2 class="o_heading o_mb-xxs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">Password Reset</h2>
                                                        <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">You requested the password reset I put to chase</p>
                                                        <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="300" class="o_btn o_bg-white o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #ffffff;border-radius: 4px;">
                                                                        <a class="o_text-primary" href="https://mailerstation.com/change-password?email=' . $email . '&token=' . $token . '" style="text-decoration: none; outline: none; color: #0EC06E; display: block; padding: 12px 24px; mso-text-raise: 3px;">Change Password</a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- content -->
                    
                        <!-- hero-primary-icon -->
                        <!-- hero-primary-icon-outline -->
                        <!-- button-success -->
                        <!-- button-dark -->
                    
                        <!-- label-xs -->
                    
                        <div class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
                            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                <tbody>
                                    <tr>
                                        <td class="o_bg-white o_px-md o_py o_sans o_text-xs o_text-light" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #ffffff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                            <p class="o_mb" style="margin-top: 0px;margin-bottom: 16px;"><strong>If the button doesn&apos;t work, copy that link</strong></p>
                                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td width="284" class="o_bg-ultra_light o_br o_text-xs o_sans o_px-xs o_py" align="center" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 14px; line-height: 21px; background-color: #e8f2e8; border-radius: 4px; padding-left: 8px; padding-right: 8px; padding-top: 16px; padding-bottom: 16px;">
                    
                                                            <p class="o_text-dark" style="color: #242b3d;margin-top: 0px;margin-bottom: 0px;">
                                                                https://mailerstation.com/change-password?email=' . $email . '&token=' . $token . '
                                                            </p>
                    
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    
                        <!-- label -->
                    
                        <!-- alert-dark -->
                        <div class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
                            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                <tbody>
                                    <tr>
                                        <td class="o_bg-white o_px-md o_py" align="left" style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                            <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                <tbody>
                                                    <tr>
                                                        <td width="40" class="o_bg-dark o_br-l o_text-md o_text-white o_sans o_py-xs" align="right" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #242b3d;color: #ffffff;border-radius: 4px 0px 0px 4px;padding-top: 8px;padding-bottom: 8px;">
                                                            <img src="https://www.fiviral.com/images/email/warning.png" width="24" height="24" alt="" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        </td>
                                                        <td class="o_bg-dark o_br-r o_text-xs o_text-white o_sans o_px o_py-xs" align="left" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #242b3d;color: #ffffff;border-radius: 0px 4px 4px 0px;padding-left: 16px;padding-right: 16px;padding-top: 8px;padding-bottom: 8px;">
                                                            <p style="margin-top: 0px;margin-bottom: 0px;"><strong>Information.</strong> Always keep your password written down in a safe place. If you have not requested a password change, let us know immediately.</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- alert-primary -->
                    
                        <!-- footer-start -->
                        <div class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-bottom: 32px;">
                            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                    
                                <tbody>
                                    <tr>
                                        <td class="o_re o_bg-white o_px o_pb-lg o_bt-light o_br-b" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-top: 1px solid #d3dce0;border-radius: 0px 0px 4px 4px;padding-left: 16px;padding-right: 16px;padding-bottom: 30px;">
                                            <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                                <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                                                <div class="o_px-xs o_sans o_text-xs o_text-light o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: left;padding-left: 8px;padding-right: 8px;">
                    
                                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">©2021. All rights reserved.</p>
                                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 0px;">
                                                        Mailerstation
                                                    </p>
                    
                                                </div>
                                            </div>
                                            <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                                                <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                                                <div class="o_px-xs o_sans o_text-xs o_text-light o_right o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: right;padding-left: 8px;padding-right: 8px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;">
                                                        <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/facebook-light.png" width="36" height="36" alt="fb" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                                        <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/twitter-light.png" width="36" height="36" alt="tw" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                                        <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/instagram-light.png" width="36" height="36" alt="ig" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                                        <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/snapchat-light.png" width="36" height="36" alt="sc" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;"> </div>
                        </div>
                        <!-- footer-end -->
                    </body>
                    
                    </html>';


            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <admin@mailerstation.com>' . "\r\n";

            mail($to, $subject, $message, $headers);

            echo $user->showMessage('info', 'We will send an email to your email account. Please check this and reset your password');
        } catch (Exception $e) {
            echo $user->showMessage('danger', 'Something went to wrong... try later');
        }
    } else {
        echo $user->showMessage('info', 'This e-mail is not registered.');
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'change-password')) {
    $email = $user->test_input($_POST['email']);
    $token = $user->test_input($_POST['token']);
    $password = $user->test_input($_POST['rchangepassword']);
    $pass = password_hash($password, PASSWORD_DEFAULT);

    $testID = $user->reset_pass_auth($email, $token);
    $id = $testID['id'];

    if ($id != null) {
        $user->update_new_pass($pass, $email);
        echo 'change-password';
    } else {
        echo $user->showMessage('info', 'This e-mail is not registered.');
    }
}

if (isset($_POST['action']) && ($_POST['action'] == 'insert_email')) {

    $title = $user->test_input($_POST['title']);
    $category = $user->test_input($_POST['category']);
    $total_email = $user->test_input($_POST['total_email']);
    $price = $user->test_input($_POST['price']);
    $short_description = $user->test_input($_POST['short_description']);
    $description = $user->test_input($_POST['description']);

    $user->inert_email($title, $category, $total_email, $short_description, $description, $price);
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-total-job-level')) {

    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    $output = '';
    $allJobLevel = $user->all_job_level();
    if ($allJobLevel) {
        foreach ($allJobLevel as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-total-job-title')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allJobTitle = $user->all_job_title();
    if ($allJobTitle) {
        foreach ($allJobTitle as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-total-job-function')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allJobTitle = $user->all_job_function();
    if ($allJobTitle) {
        foreach ($allJobTitle as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}

if (isset($_POST['action']) && ($_POST['action'] == 'display-total-industries')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allJobTitle = $user->all_industries();
    if ($allJobTitle) {
        foreach ($allJobTitle as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}


if (isset($_POST['action']) && ($_POST['action'] == 'display-total-health')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allJobTitle = $user->all_health();
    if ($allJobTitle) {
        foreach ($allJobTitle as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-total-international')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allJobTitle = $user->all_international();
    if ($allJobTitle) {
        foreach ($allJobTitle as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}

if (isset($_POST['action']) && ($_POST['action'] == 'display-total-real-state')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allJobTitle = $user->all_real_state();
    if ($allJobTitle) {
        foreach ($allJobTitle as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-total-zoom-info')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allZoomInfo = $user->all_zoom_info();
    if ($allZoomInfo) {
        foreach ($allZoomInfo as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-total-office-365')) {
    function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    $output = '';
    $allOffice365 = $user->all_office_365();
    if ($allOffice365) {
        foreach ($allOffice365 as $row) {
            $title = slugify($row['title']);
            $seoUrl = $row['seo_url'];

            $output .= '<div class="premade-lists__item"><div class="premade-lists__item__row">
                    <div class="premade-lists__item__col">
                        <h2 class="premade-lists__item__title h4">
                            ' . $row['category'] . '
                        </h2>
                        <span class="text-primary"></span>
                    </div>
                    <div class="premade-lists__item__col
                         gap-bottom-small-tpd">
                        <span class="premade-lists__item__contact-title h6">
                            ' . number_format($row['total_email']) . '
                        </span>
                        <small>Contacts</small>
                    </div>
                    <div class="premade-lists__item__col">
                        ' . $row['short_description'] . '
                    </div>
                    <div class="premade-lists__item__col text-right">';
            if ($seoUrl != '') {
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $seoUrl . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            } else {
                $category = slugify($row['category'] . '-email list');
                $output .= '<a href="' . $siteUrl . 'ready-made/' . $title . '/' . $category . '/' . $row['id'] . '" class="premade-lists__item__price" style="text-decoration:none;">$ ' . number_format($row['price']) . '</a></div>
                </div></div>';
            }
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">No Records Fount!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'message-register')) {
    $firstname = $user->test_input($_POST['fname']);
    $lastname = $user->test_input($_POST['lname']);
    $email = $user->test_input($_POST['email']);
    $message = $user->test_input($_POST['text']);

    $user->client_feedback($firstname, $lastname, $email, $message);
    $cfull = $firstname . ' ' . $lastname;
    echo "Feedback Send Successfully.";

    try {
        $emailSubject = "New Feedback";
        $useName = $cfull;


        $to = 'shahabahammed37@gmail.com,support@mailerstation.com';
        $subject = $emailSubject;

        $sendEmail = '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>New Feedback</title>
        </head>
        
        <body>
            <!-- header-start -->
            <div class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
                <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto; border-bottom: 1px solid #d3dce0;">
                    <tbody>
                        <tr>
                            <td class="o_re o_bg-white o_px o_pb-md o_br-t" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-radius: 4px 4px 0px 0px;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;"> </div>
                                    <div class="o_px-xs o_sans o_text o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                        <p style="margin-top: 0px;margin-bottom: 0px;">
                                            <a class="o_text-primary" href="https://mailerstation.com/" style="text-decoration: none;outline: none;color: #126de5;">
                                                <img src="https://mailerstation.com/bundles/bydhome/img/mailerstation-logo.png" width="136" height="36" alt="Mailerstation" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                    <div style="font-size: 22px; line-height: 22px; height: 22px;"> </div>
                                    <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                        <table class="o_right o_xs-center" cellspacing="0" cellpadding="0" border="0" role="presentation" style="text-align: right;margin-left: auto;margin-right: 0;">
                                            <tbody>
                                                <tr>
                                                    <td class="o_btn-b o_heading o_text-xs" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">
                                                        <a class="o_text-light" href="https://mailerstation.com/admin" style="text-decoration: none;outline: none;color: #82899a;display: block;padding: 7px 8px;font-weight: bold;">
        
                                                            <span style="mso-text-raise: 6px;display: inline;color: #82899a;">
                                  Hello ' . $useName . '
                                  </span>
        
                                                            <img src="https://www.fiviral.com/images/email/person.png" width="24" height="24" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
        
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- header-end -->
        
            <!-- hero-primary-button -->
            <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                <tbody>
                    <tr>
                        <td class="o_bg-light o_px-xs" align="center" style="background-color: #E8F2E8;padding-left: 8px;padding-right: 8px;">
                            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                <tbody>
                                    <tr>
                                        <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                            <h2 class="o_heading o_text-dark o_mb-xs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 15px;color: #242b3d;font-size: 30px;line-height: 23px;">New Feedback!
                                            </h2>
                                            <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                <tbody>
                                                    <tr>
                                                        <td class="o_sans o_text o_text-secondary o_b-primary o_px o_py o_br-max" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border: 2px solid #0EC06E;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;"><img src="https://www.fiviral.com/images/email/check.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 24px; line-height: 24px; height: 24px;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h4 class="o_heading o_text-dark o_mb-xs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 8px;color: #242b3d;font-size: 18px;line-height: 23px;">Hello, ' . $useName . '
                                            </h4>
                                            <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                <tbody>
                                                    <tr>
                                                        <td width="300" class="o_btn o_bg-success o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #0ec06e;border-radius: 4px;"><a class="o_text-white" href="https://mailerstation.com/admin" style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">View Feedback Details</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- hero-white -->
        
            <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                <tbody>
                    <tr>
                        <td class="o_bg-light o_px-xs" align="center" style="background-color: #E8F2E8;padding-left: 8px;padding-right: 8px;">
                            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                <tbody>
                                    <tr>
                                        <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                            <h2 class="o_heading o_text-dark o_mb-xs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 15px;color: #242b3d;font-size: 30px;line-height: 23px;border-top: 1px solid #d3dce0;padding-top:15px;">Feedback Message</h2>
                                            <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;text-align: justify;">
                                                ' . $message . '
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- hero-white -->
        
            <!-- footer-start -->
            <div class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-bottom: 32px;">
                <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
        
                    <tbody>
                        <tr>
                            <td class="o_re o_bg-white o_px o_pb-lg o_bt-light o_br-b" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-top: 1px solid #d3dce0;border-radius: 0px 0px 4px 4px;padding-left: 16px;padding-right: 16px;padding-bottom: 30px;">
                                <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                    <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                                    <div class="o_px-xs o_sans o_text-xs o_text-light o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: left;padding-left: 8px;padding-right: 8px;">
        
                                        <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">©2021. All rights reserved.</p>
                                        <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 0px;">
                                            Mailerstation
                                        </p>
        
                                    </div>
                                </div>
                                <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                                    <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                                    <div class="o_px-xs o_sans o_text-xs o_text-light o_right o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: right;padding-left: 8px;padding-right: 8px;">
                                        <p style="margin-top: 0px;margin-bottom: 0px;">
                                            <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/facebook-light.png" width="36" height="36" alt="fb" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                            <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/twitter-light.png" width="36" height="36" alt="tw" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                            <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/instagram-light.png" width="36" height="36" alt="ig" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span></span>
                                            <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/snapchat-light.png" width="36" height="36" alt="sc" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a>
                                        </p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;"> </div>
            </div>
            <!-- footer-end -->
        </body>
        
        </html>';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <admin@mailerstation.com>' . "\r\n";
        //$headers .= 'Cc: support@mailerstation.com' . "\r\n";

        mail($to, $subject, $sendEmail, $headers);
        //echo $user->showMessage('info','We send an e-mail to your email address for verify your account. Please, check this e-mail and verify now!');

    } catch (Exception $e) {
        echo $user->showMessage('danger', 'Something went to wrong... try later');
    }
}

if (isset($_POST['action']) && ($_POST['action'] == 'email-register')) {
    $email = $user->test_input($_POST['newsletter_email']);

    $user->client_email($email);

    echo "Subscription Successfully.";
}
if (isset($_POST['action']) && $_POST['action'] == 'update_profile') {
    $upid = $user->test_input($_POST['profileId']);
    $upfname = $user->test_input($_POST['fname']);
    $uplname = $user->test_input($_POST['lname']);
    $upgender = $user->test_input($_POST['gender']);
    $update = $user->test_input($_POST['dob']);
    $upphone = $user->test_input($_POST['phone']);
    $oldimage = $user->test_input($_POST['oldimage']);

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) { // 10MB
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    if ($oldimage != "" && file_exists('uploads/' . basename($oldimage))) {
                        unlink('uploads/' . basename($oldimage));
                    }
                } else {
                    echo "Your File is too Large!";
                    exit();
                }
            } else {
                echo "There was an error uploading your file!";
                exit();
            }
        } else {
            echo "You can't upload files of this type!";
            exit();
        }
        $upfile = $fileDestination;
    } else {
        $upfile = $oldimage;
    }

    $user->update_profile($upid, $upfile, $upfname, $uplname, $upgender, $update, $upphone);
    echo "Profile updated successfully!";
}
if (isset($_POST['action']) && ($_POST['action'] == 'change_pass')) {
    $upid = $user->test_input($_POST['profileId']);
    $curpass = $user->test_input($_POST['curpass']);
    $newpass = $user->test_input($_POST['newpass']);
    $cnewpass = $user->test_input($_POST['cnewpass']);

    $userData = $user->userLogin($upid);

    if (password_verify($curpass, $userData['password'])) {
        if ($newpass == $cnewpass) {
            $hnewpass = password_hash($newpass, PASSWORD_DEFAULT);
            $user->update_pass($upid, $hnewpass);
            echo $user->showMessage('success', 'Password Changed Successfully!');
        } else {
            echo $user->showMessage('danger', 'New Password did not matched!');
        }
    } else {
        echo $user->showMessage('danger', 'Current Password is Incorrect!');
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'verify_email')) {

    try {
        $emailSubject = "Account Verification";
        $useName = $cfull;


        $to = $cemail . ',shahabahammed37@gmail.com,support@mailerstation.com';
        $subject = $emailSubject;

        $message = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification</title>
</head>

<body>
    <!-- header-start -->
    <div class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-bottom: 1px;padding-top: 15px;">
        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
            <tbody>
                <tr>
                    <td class="o_re o_bg-white o_px o_pb-md o_br-t" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-radius: 4px 4px 0px 0px;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                        <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                            <div style="font-size: 24px; line-height: 24px; height: 24px;"> </div>
                            <div class="o_px-xs o_sans o_text o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                <p style="margin-top: 0px;margin-bottom: 0px;">
                                    <a class="o_text-primary" href="https://mailerstation.com/" style="text-decoration: none;outline: none;color: #126de5;">
                                        <img src="https://mailerstation.com/bundles/bydhome/img/mailerstation-logo.png" width="136" height="36" alt="Mailerstation" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                            <div style="font-size: 22px; line-height: 22px; height: 22px;"> </div>
                            <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                <table class="o_right o_xs-center" cellspacing="0" cellpadding="0" border="0" role="presentation" style="text-align: right;margin-left: auto;margin-right: 0;">
                                    <tbody>
                                        <tr>
                                            <td class="o_btn-b o_heading o_text-xs" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">
                                                <a class="o_text-light" href="https://mailerstation.com/login" style="text-decoration: none;outline: none;color: #82899a;display: block;padding: 7px 8px;font-weight: bold;">

                                                    <span style="mso-text-raise: 6px;display: inline;color: #82899a;">
                          Hello ' . $cfull . ' 
                          </span>

                                                    <img src="https://www.fiviral.com/images/email/person.png" width="24" height="24" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">

                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- header-end -->
    <!-- hero-primary-button -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center" style="background-color: #E8F2E8; padding-left: 8px; padding-right: 8px;">
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-primary o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #0ec06e;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 34px;padding-bottom: 34px;">
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_sans o_text o_text-secondary o_bg-white o_px o_py o_br-max" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <img src="https://www.fiviral.com/images/email/security.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 24px; line-height: 24px; height: 24px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 class="o_heading o_mb-xxs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">Verify Your E-mail !</h2>
                                    <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">To verified your e-mail click the below button and confirmation you e-mail.</p>
                                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="300" class="o_btn o_bg-white o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #ffffff;border-radius: 4px;">
                                                    <a class="o_text-primary" href="https://mailerstation.com/verify-email?email=' . $cemail . '" style="text-decoration: none; outline: none; color: #0EC06E; display: block; padding: 12px 24px; mso-text-raise: 3px;">Verify Now</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    <!-- content -->

    <!-- label-xs -->

    <div class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
            <tbody>
                <tr>
                    <td class="o_bg-white o_px-md o_py o_sans o_text-xs o_text-light" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #ffffff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                        <p class="o_mb" style="margin-top: 0px;margin-bottom: 16px;"><strong>If the button doesn&apos;t work, copy that link</strong></p>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="284" class="o_bg-ultra_light o_br o_text-xs o_sans o_px-xs o_py" align="center" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 14px; line-height: 21px; background-color: #e8f2e8; border-radius: 4px; padding-left: 8px; padding-right: 8px; padding-top: 16px; padding-bottom: 16px;">

                                        <p class="o_text-dark" style="color: #242b3d;margin-top: 0px;margin-bottom: 0px;">
                                            https://mailerstation.com/verify-email?email=' . $cemail . '
                                        </p>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- label -->

    <!-- alert-dark -->
    <div class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
            <tbody>
                <tr>
                    <td class="o_bg-white o_px-md o_py" align="left" style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                            <tbody>
                                <tr>
                                    <td width="40" class="o_bg-dark o_br-l o_text-md o_text-white o_sans o_py-xs" align="right" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #242b3d;color: #ffffff;border-radius: 4px 0px 0px 4px;padding-top: 8px;padding-bottom: 8px;">
                                        <img src="https://www.fiviral.com/images/email/warning.png" width="24" height="24" alt="" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                    </td>
                                    <td class="o_bg-dark o_br-r o_text-xs o_text-white o_sans o_px o_py-xs" align="left" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #242b3d;color: #ffffff;border-radius: 0px 4px 4px 0px;padding-left: 16px;padding-right: 16px;padding-top: 8px;padding-bottom: 8px;">
                                        <p style="margin-top: 0px;margin-bottom: 0px;"><strong>Information.</strong> Always keep your account and e-mail in a safe place. If you don&apos;t verify your account you have missing some feature.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- alert-primary -->

    <!-- footer-start -->
    <div class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-bottom: 32px;">
        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">

            <tbody>
                <tr>
                    <td class="o_re o_bg-white o_px o_pb-lg o_bt-light o_br-b" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-top: 1px solid #d3dce0;border-radius: 0px 0px 4px 4px;padding-left: 16px;padding-right: 16px;padding-bottom: 30px;">
                        <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                            <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                            <div class="o_px-xs o_sans o_text-xs o_text-light o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: left;padding-left: 8px;padding-right: 8px;">

                                <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">©2021. All rights reserved.</p>
                                <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 0px;">
                                    Mailerstation
                                </p>

                            </div>
                        </div>
                        <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                            <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                            <div class="o_px-xs o_sans o_text-xs o_text-light o_right o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: right;padding-left: 8px;padding-right: 8px;">
                                <p style="margin-top: 0px;margin-bottom: 0px;">
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/facebook-light.png" width="36" height="36" alt="fb" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/twitter-light.png" width="36" height="36" alt="tw" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/instagram-light.png" width="36" height="36" alt="ig" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/snapchat-light.png" width="36" height="36" alt="sc" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a>
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;"> </div>
    </div>
    <!-- footer-end -->
</body>

</html>';

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <admin@mailerstation.com>' . "\r\n";
        //$headers .= 'Cc: support@mailerstation.com' . "\r\n";

        mail($to, $subject, $message, $headers);
        echo $user->showMessage('info', 'We send an e-mail to your email address for verify your account. Please, check this e-mail and verify now!');
    } catch (Exception $e) {
        echo $user->showMessage('danger', 'Something went to wrong... try later');
    }
}
