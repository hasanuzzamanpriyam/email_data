<?php
include_once 'assets/php/data/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/instyle.css">
    <title>User Management System</title>
</head>

<body>
    <div class="container">
        <!-- Login Form Start -->
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-6 my-auto">
                <div class="card-group myShadow">
                    <div class="card rounded-left p-4" style="flex-grow:1.4;">
                        <h1 class="text-center font-weight-bold text-primary">Employee Sign in to Account</h1>
                        <hr class="my-3">
                        <form action="#" method="post" class="px-3" id="login-form">
                            <div id="loginAlert"></div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email" placeholder="Enter E-mail" class="form-control" required value="<?php if (isset($_COOKIE['email'])) {
                                                                                                                                                echo $_COOKIE['email'];
                                                                                                                                            } ?>">
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                                                            echo $_COOKIE['password'];
                                                                                                                                                        } ?>">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox float-left">
                                    <input type="checkbox" name="rem" id="customCheck" class="custom-control-input" <?php if (isset($_COOKIE['email'])) { ?>checked <?php } ?>>
                                    <label for="customCheck" class="custom-control-label">Remember me</label>
                                </div>
                                <div class="forgot float-right">
                                    <a href="#" id="forgot-link">Forgot Password?</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign In" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Form End -->

        <!-- Forgot Password Form Start -->
        <div class="row justify-content-center wrapper" id="forgot-box" style="display:none;">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <div class="card justify-content-center rounded-right p-4 myColor">
                        <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
                        <hr class="my-3 bg-light myHr">
                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link">Back</button>
                    </div>
                    <div class="card rounded-left p-4" style="flex-grow:1.4;">
                        <h1 class="text-center font-weight-bold text-primary">Forgot your password</h1>
                        <hr class="my-3">
                        <p class="lead text-center text-secondary">
                            To reset your password, enter the registered e-mail address and we will sent you the reset instructions on your e-mail
                        </p>
                        <form action="#" method="post" class="px-3" id="forgot-form">
                            <div id="forgotAlert"></div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                                <input type="email" name="femail" id="emailForget" placeholder="Enter E-mail" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Reset Password" id="forgot-btn" class="btn btn-primary btn-lg btn-block myBtn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Forgot Password Form End -->

    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#login-link").click(function() {
                $("#login-box").show();
                $("#forgot-box").hide();
            });
            $("#forgot-link").click(function() {
                $("#login-box").hide();
                $("#forgot-box").show();
            });
            $("#back-link").click(function() {
                $("#login-box").show();
                $("#back-box").hide();
            });

            //Login Ajax request
            $("#login-btn").click(function(e) {
                if ($("#login-form")[0].checkValidity()) {
                    e.preventDefault();
                    $("#login-btn").val('Please wait...');
                    $.ajax({
                        url: 'assets/php/data/action',
                        type: 'post',
                        data: $("#login-form").serialize() + '&action=employee',
                        success: function(response) {

                            $("#login-btn").val('Sign In');
                            if (response === 'employee') {
                                window.location = 'http://localhost/emailbigdata.com/employee/dashboard';
                            } else {
                                $("#loginAlert").html(response);
                            }
                        }
                    });
                }
            });
            //Forgot Ajax request
            $("#forgot-btn").click(function(e) {
                if ($("#forgot-form")[0].checkValidity()) {
                    e.preventDefault();
                    $("#forgot-btn").val('Please wait...');

                    $.ajax({
                        url: 'assets/php/data/action',
                        type: 'post',
                        data: $("#forgot-form").serialize() + '&action=forgot',
                        success: function(response) {
                            $("#forgot-btn").val('Reset Password');
                            $("#forgot-form")[0].reset();
                            $("#forgotAlert").html(response);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>