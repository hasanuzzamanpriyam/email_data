<?php include_once 'assets/php/header.php'; ?>
?>
<div class="jumbotron jumbotron--login jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="clearfix gap-bottom">
                        <h1 class="jumbotron__title jumbotron--login__title">Login</h1>
                        <a class="jumbotron--login__member-link link-primary" href="signup">Not a member? Sign up</a>
                    </div>
                    <form action="#" method="post" class="form form--soft gap-bottom" id="login-form">
                        <input type="hidden" id="redirectUrl" value="<?php echo isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : './'; ?>">
                        <div class="alert alert-danger" id="loginAlert" style="color: orange; margin-bottom: 10px;"></div>
                        <div>
                            <input type="email" class="form__control" placeholder="Email" name="username" required>
                        </div>
                        <br>
                        <div class="gap-bottom">
                            <input type="password" class="form__control" placeholder="Password" name="password" required>
                        </div>
                        <div class="clearfix font-xsmall" style="margin-bottom: 10px;">
                            <div class="pull-left">
                                <div class="custom-checkbox custom-checkbox--secondary gap-right-small">
                                    <input class="custom-checkbox__inp" type="checkbox" name="remember" id="cb1">
                                    <label class="custom-checkbox__mask" for="cb1"></label>
                                </div>
                                <label class="align-middle" for="cb1">Keep me logged in</label>
                            </div>
                            <a href="forgot-password" class="link-primary pull-right">Password Recovery</a>
                        </div>
                        <button type="submit" class="button button--primary full-width" id="login-btn">Login To My Account</button>
                    </form>
                </div>
                <div class="col-sm-6 col-md-offset-1 hidden-tpd">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="lead hidden-dd">
    <div class="container lead__container">
        <div class="lead__col lead__col--left">
            <h5 class="lead__text gap-bottom-tld">Ready To Boost Your Sales Like Your Competitors? Try Our Tool For Free.</h5>
        </div>
        <div class="lead__col lead__col--right">
            <a class="button button--quaternary full-width" href="<?= $siteUrl; ?>custom-order/business-contacts">
                Custom Order <i class="icon icon-arrow-forward button--quaternary__icon"></i>
            </a>
        </div>
    </div>
</div>
<?php
include_once 'assets/php/footer.php';
?>

<script>
    $(document).ready(function () {
        //Login Ajax request
        $("#login-btn").click(function (e) {
            if ($("#login-form")[0].checkValidity()) {
                e.preventDefault();
                $("#login-btn").val('Please wait...');
                $.ajax({
                    url: 'assets/php/action',
                    type: 'post',
                    data: $("#login-form").serialize() + '&action=login',
                    success: function (response) {
                        
                        $("#login-btn").val('Sign In');
                        if (response === 'login') {
                            window.location = $("#redirectUrl").val();
                        } else {
                            $("#loginAlert").html(response);
                        }
                    }
                });
            }
        });
    });
</script>