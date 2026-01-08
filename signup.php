<?php include_once 'assets/php/header.php'; ?>
?>
<div class="jumbotron jumbotron--signup jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="gap-bottom">
                <h1 class="jumbotron__title">Sign up for free</h1>
                <div>
                    <span>Already a member?</span>
                    <a class="link-primary link-underline" href="<?= $siteUrl; ?>login">Login</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <p class="hidden-tld">Become a member for free to gain access to great tools and features:</p>
                    <ul class="list list--secondary hidden-tld">
                        <li class="list__item">Build your own direct business email list of valuable contacts within your targeted audience using our list-builder tool.</li>
                        <li class="list__item">Connect now by using accurate, 95% guaranteed information from our human verified custom and/or pre-made lists.</li>
                        <li class="list__item">Find direct business leads at an affordable price with then best rate guarantee!</li>
                    </ul>
                </div>
                <div class="col-lg-8 col-md-7 pad-top-tlnu">
                    <form id="signup-form" class="form form--soft no-loading" method="POST" action="#">
                        <div class="text-alert gap-bottom-small hide" id="signup-form-errors"></div>
                        <div class="row">
                            <div class="col-sm-6 gap-bottom">
                                <input type="text" class="form__control" placeholder="First Name" name="fname" required>
                            </div>
                            <div class="col-sm-6 gap-bottom">
                                <input type="text" class="form__control" placeholder="Last Name" name="lname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 gap-bottom">
                                <input type="email" class="form__control" placeholder="Business Email" name="email" required>
                            </div>
                            <div class="col-sm-6 gap-bottom">
                                <input type="text" class="form__control" placeholder="Company Name" name="company" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 gap-bottom">
                                <input type="password" class="form__control" placeholder="Password" name="rpassword" id="rpassword" required>
                            </div>
                            <div class="col-sm-6 gap-bottom">
                                <input type="password" class="form__control" placeholder="Password Control" name="cpassword" id="cpassword" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 font-small inline-align-fix-dnu gap-bottom-tld">
                                <div class="custom-checkbox custom-checkbox--secondary gap-right-small">
                                    <input class="custom-checkbox__inp" name="terms" type="checkbox" id="cb1" data-validetta="required" data-vd-parent-up="1" data-vd-message-required="You must accept Terms of Use and Privacy Policy to continue.">
                                    <label class="custom-checkbox__mask" for="cb1"></label>
                                </div>
                                <label class="align-middle" for="cb1">I’ve read and agreed</label>
                                <a class="link-primary link-underline" href="<?= $siteUrl; ?>terms-of-use" target="_blank">Terms of Use</a> and
                                <a class="link-primary link-underline" href="<?= $siteUrl; ?>privacy-policy" target="_blank">Privacy Policy</a>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="button button--primary full-width" id="register-btn">Create My Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'assets/php/footer.php';
?>


</body>






<script>
    $(document).ready(function () {
//Register Ajax Request
        $("#register-btn").click(function (e) {
            if ($("#signup-form")[0].checkValidity()) {
                e.preventDefault();
                $("#register-btn").val('Please Wait...');
                if ($("#rpassword").val() != $("#cpassword").val()) {
                    $("#signup-form-errors").text('* Password did not match!');
                    $("#register-btn").val('Submit Now');
                } else {
                    $("#signup-form-errors").text('');
                    $.ajax({
                        url: 'assets/php/action',
                        type: 'post',
                        data: $("#signup-form").serialize() + '&action=register',
                        success: function (response) {
                             $("#register-btn").val('Submit Now');
                             window.location = '<?= $siteUrl; ?>';
                             $("#signup-form-errors").html(response);
                        }
                    });
                }
            }
        });
    });
</script>
</html>
