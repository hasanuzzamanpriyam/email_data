<?php
include_once 'assets/php/header.php';
$token =  $_GET['token'];
$email =  $_GET['email'];
?>
<div class="jumbotron jumbotron--signup jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="gap-bottom">
                <h1 class="jumbotron__title">Reset Your Password</h1>
                <div>
                    <span>I don't change my password?</span>
                    <a class="link-primary link-underline" href="login">Login</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 pad-top-tlnu">
                    <form id="change-form" class="form form--soft no-loading" method="POST" action="#">
                        <input type="hidden" name="email" value="<?= $email; ?>">
                        <input type="hidden" name="token" value="<?= $token; ?>">

                </div>
                <div class="row">
                    <div class="col-sm-8 gap-bottom">
                        <input type="password" class="form__control" placeholder="Password" name="rchangepassword" id="rchangepassword" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 gap-bottom">
                        <input type="password" class="form__control" placeholder="Password Control" name="cchangepassword" id="cchangepassword" required>
                    </div>
                </div>
                <div class="alert alert-danger" id="passwordtAlert" style="color: orange; margin-bottom: 10px; font-size: 24px; font-weight:600;"></div>
                <div class="row">
                    <div class="col-sm-8">
                        <button type="submit" class="button button--primary full-width" id="change-btn">Change Password</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-5"></div>
        </div>
    </div>
</div>
</div>

<?php
include_once 'assets/php/footer.php';
?>

</body>

<script>
    $(document).ready(function() {
        $("#change-btn").click(function(e) {
            if ($("#change-form")[0].checkValidity()) {
                e.preventDefault();
                $("#change-btn").val('Please Wait...');
                if ($("#rchangepassword").val() != $("#cchangepassword").val()) {
                    $("#passwordtAlert").html('* Password did not match!');
                    $("#change-btn").val('Change Password');
                } else {
                    $("#change-form-errors").html('');
                    $.ajax({
                        url: 'assets/php/action',
                        type: 'post',
                        data: $("#change-form").serialize() + '&action=change-password',
                        success: function(response) {
                            $("#register-btn").val('Change Password');
                            if (response === 'change-password') {

                                window.location = '<?= $siteUrl; ?>login';
                            } else {
                                $("#passwordtAlert").html(response);
                            }

                        }
                    });
                }
            }
        });
    });
</script>

</html>