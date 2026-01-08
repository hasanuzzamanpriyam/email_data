<?php
include_once 'assets/php/header.php';$siteUrl = 'https://emailbigdata.com/';
?>

<div class="jumbotron jumbotron--contact">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="jumbotron__title">Contact Us</h1>
                    <div class="breadbrumb gap-bottom">
                        <a href="<?= $siteUrl; ?>" class="breadbrumb__item">Home</a>
                        <span class="breadbrumb__item">Contact</span>
                    </div>
                    <p>Our international team works hard to create the
                        best data-pulling tools in the industry.
                        Our goal is to help you find the best business
                        contacts out there. Have questions? Feel
                        free to contact us today!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="gap-bottom-small">
                    <h4 class="secondary-title font-medium clear-gap-bottom">WASHINGTON</h4>
                    <h6 class="tertiary-title clear-gap-top font-xxsmall">UNITED STATES</h6>
                    <address>
                       1348 Florida Ave. NW, Washington, DC 20009
                    </address>
                </div>
                <div class="gap-bottom-medium">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3104.165569243284!2d-77.031249!3d38.920193!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b7e722bd1c3f%3A0x6ef761da7f56d987!2s1348%20Florida%20Ave%20NW%2C%20Washington%2C%20DC%2020009!5e0!3m2!1sen!2sus!4v1679217118071!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-5" style="background-color: #C9C9C7; padding: 5px;">
                <h4 class="secondary-title font-medium
                    clear-gap-bottom">Contact Sales & Service</h4>
                <p class="gap-bottom">
                    Send a message to our service team below:
                </p>
                <form id="message-signup-form" class="form form--soft no-loading" method="POST" action="#">
                        <div class="text-alert gap-bottom-small hide" id="signup-form-errors"></div>
                            <div class="col-sm-12 gap-bottom">
                                <input type="text" class="form__control" placeholder="First Name" name="fname" required>
                            </div>
                            <div class="col-sm-12 gap-bottom">
                                <input type="text" class="form__control" placeholder="Last Name" name="lname" required>
                            </div>
                            <div class="col-sm-12 gap-bottom">
                                <input type="email" class="form__control" placeholder="Business Email" name="email" required>
                            </div>
                            <div class="col-sm-12 gap-bottom">
                                <textarea class="form__control" placeholder="Write your message here.." name="text" required rows="5"></textarea>
                            </div>
                        <div class="col-sm-12" style="margin-bottom: 15px; text-align: center; color: green; font-weight: 600; font-size: 25px;" id="feedbackAlert"></div>
                        <div class="col-sm-12" style="margin-bottom: 15px;">
                            <button type="submit" class="button button--primary full-width" id="message-register-btn">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<div class="lead hidden-dd">
    <div class="container lead__container">
        <div class="lead__col lead__col--left">
            <h5 class="lead__text gap-bottom-tld">Ready To Boost Your
                Sales Like Your Competitors? Try Our Tool For Free.</h5>
        </div>
        <div class="lead__col lead__col--right">
            <a class="button button--quaternary full-width"
               href="<?= $siteUrl; ?>custom-order/business-contacts">
                Custom Order <i class="icon icon-arrow-forward
                                button--quaternary__icon"></i>
            </a>
        </div>
    </div>
</div>
<?php
include_once 'assets/php/footer.php';
?>

<script>
    $(document).ready(function () {
//Message Ajax Request
        $("#message-register-btn").click(function (e) {
            if ($("#message-signup-form")[0].checkValidity()) {
                e.preventDefault();
                $("#message-register-btn").val('Please Wait...');
                    $.ajax({
                        url: 'assets/php/action',
                        type: 'post',
                        data: $("#message-signup-form").serialize() + '&action=message-register',
                        success: function (response) {
                            $("#message-register-btn").val('Submit');
                            $("#message-signup-form")[0].reset();
                            $("#feedbackAlert").html(response);
                        }
                    });
                }
        });
    });
</script>