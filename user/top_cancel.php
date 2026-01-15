<?php
require_once 'php/header.php';
require_once 'php/auth.php';
$user = new Auth();
?>
<div class="section">
    <div class="container mt-5">
        <div class="col-md-12" style="text-align: center">
            <h3 class="primary-title clear-gap-vertical">
                Congratulations! Your Payment Process is successfully completed!
            </h3>
            <?php

            $topEmail = $_SESSION['topEmail'];
            $topUserName = $_SESSION['topFullName'];
            $topTrackingCode = $_SESSION['topCode'];
            $topPaymentMethod = $_SESSION['topMethode'];
            $topPaymentAmount = $_SESSION['myPrice'];
            $status = 'Failed';

            $user->update_topup_status($topTrackingCode, $status);

            try {
                $emailSubject = "Top Up Failed";

                $to = $topEmail;
                $subject = $emailSubject;

                $message = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top up Failed</title>
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
                                    <a class="o_text-primary" href="http://localhost/emailbigdata.com/" style="text-decoration: none;outline: none;color: #126de5;">
                                        <img src="http://localhost/emailbigdata.com/bundles/bydhome/img/mailerstation-logo.png" width="136" height="36" alt="Email Big Data" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
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
                                                <a class="o_text-light" href="http://localhost/emailbigdata.com/user/order" style="text-decoration: none;outline: none;color: #82899a;display: block;padding: 7px 8px;font-weight: bold;">

                                                    <span style="mso-text-raise: 6px;display: inline;color: #82899a;">
                          Hello ' . $topUserName . '
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
                <td class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-primary o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #0ec06e;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;">
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_sans o_text o_text-secondary o_bg-white o_px o_py o_br-max" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;"><img src="https://www.fiviral.com/images/email/bell.png" width="96" height="96" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 24px; line-height: 24px; height: 24px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 class="o_heading o_mb-xxs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">Topup Failed !</h2>
                                    <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">Your topup had failed and payment method is also failed.</p>
                                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="300" class="o_btn o_bg-white o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #ffffff;border-radius: 4px;"><a class="o_text-primary" href="http://localhost/emailbigdata.com/user/php/payment?retopup=' . $topTrackingCode . '" style="text-decoration: none;outline: none;color: #0ec06e;display: block;padding: 12px 24px;mso-text-raise: 3px;">Again try to Topup</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                    <h2 class="o_heading o_text-dark o_mb-xs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 15px;color: #242b3d;font-size: 30px;line-height: 23px;padding-top:15px;">Failed Topup Summery</h2>
                                    <h4 class="o_heading o_text-dark o_mb-xs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 8px;color: #242b3d;font-size: 18px;line-height: 23px;">Today Topup Failed at ' . $topPaymentMethod . '
                                    </h4>
                                    <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">Tracking ID : ' . $topTrackingCode . '<br> Total Amount: ' . $topPaymentAmount . '</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

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
                                        <p style="margin-top: 0px;margin-bottom: 0px;"><strong>Information.</strong> These are common reasons for orders to fail! <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Technical Issue. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.
                                            Declined transaction. <br>The solution: If you think this may be the case, please try another payment method.</p>
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
                                    Email Big Data
                                </p>

                            </div>
                        </div>
                        <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                            <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                            <div class="o_px-xs o_sans o_text-xs o_text-light o_right o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: right;padding-left: 8px;padding-right: 8px;">
                                <p style="margin-top: 0px;margin-bottom: 0px;">
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/facebook-light.png" width="36" height="36" alt="fb" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/twitter-light.png" width="36" height="36" alt="tw" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span></span>
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
                $headers .= 'From: <admin@emailbigdata.com>' . "\r\n";
                //$headers .= 'Cc: support@mailerstation.com' . "\r\n";

                mail($to, $subject, $message, $headers);
                echo $user->showMessage('info', 'We send a failed e-mail to your email address. Please, check this e-mail.');
            } catch (Exception $e) {
                echo $user->showMessage('danger', 'Something went to wrong... try later');
            }

            if (isset($_SESSION['PAYMENT_ERROR'])) {
                printf("<p style='margin-top:5px;
              '>%s</p>", $_SESSION['PAYMENT_ERROR']);
            }
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <h3>Please, Try again later!.</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'php/footer.php';
?>