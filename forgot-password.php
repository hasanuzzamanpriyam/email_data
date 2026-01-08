<?php
include_once 'assets/php/header.php';$siteUrl = 'https://emailbigdata.com/';
?>
<div class="jumbotron jumbotron--login jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner text-white">
            <div class="row">
                <div class="col-md-4">
                    <div class="clearfix">
                        <h1 class="jumbotron__title gap-bottom-small">Password Reset</h1>
                        <p class="gap-bottom-small">To reset your password, fill out this form, then check your email.</p>
                    </div>
                    <form action="" method="post" class="form form--soft gap-bottom ajaxRequest" id="forgot-form">
                        <div class="alert alert-danger" id="forgotAlert" style="color: orange; margin-bottom: 10px;"></div>
                        <div class="gap-bottom-small">
                            <input type="email" name="femail" class="form__control" placeholder="Email" required>
                        </div>
                        <button type="submit" class="button button--primary full-width" id="forgot-btn">Reset My Password</button>
                    </form>
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
        
        $("#forgot-btn").click(function (e) {
            if ($("#forgot-form")[0].checkValidity()) {
                e.preventDefault();
                $("#forgot-btn").val('Please wait...');
                $.ajax({
                    url: 'assets/php/action',
                    type: 'post',
                    data: $("#forgot-form").serialize() + '&action=forgot',
                    success: function (response) {
                        console.log(response);
                        /*
                        $("#forgotAlert").html(response);*/
                    }
                });
            }
        });
    });
</script>
