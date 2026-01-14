<?php $name = basename($_SERVER['PHP_SELF'], ".php");
$seoUrl = $siteUrl;
if ($name === 'index') {
    echo '<div class="chat-demo">
        <div class="chat-live">
            <span style="--i:1;"></span>
        </div>
        <div class="chat-btn" id="chat-btn" onclick="myFunction()"><img class="closeBtn" src="' . $seoUrl . 'bundles/bydhome/img/chat/close.png" alt="messagebtn" ></div>
        <div id="chat-option">
            <a href="https://t.me/bookyourdata" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/telegram.png" alt="telegram"></a>
            <a href="https://www.instagram.com/emailbigdata/" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/instagram.png" alt="instagram"></a>
            <a href="https://api.whatsapp.com/send/?phone=447577321476&text&app_absent=0" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/whatsapp.png" alt="whatsapp"></a>
            <a href="https://www.messenger.com/t/emailbigdata" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/messenger.png" alt="messenger"></a>
            <a href="mailto:support@emailbigdata.com" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/email.png" alt="email"></a>
            <a href="tel: +44 7577321476" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/call.png" alt="call"></a>
        </div>
    </div>';
} else {
    echo '<div class="chat-demo">
        <div class="chat-live">
            <span style="--i:1;"></span>
        </div>
        <div class="chat-btn" id="chat-btn" onclick="myFunction()"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/messagebtn.png" alt="messagebtn" ></div>
        <div id="chat-option">
            <a href="https://t.me/mailerstation" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/telegram.png" alt="telegram"></a>
            <a href="https://api.whatsapp.com/send/?phone=19729050129&text&app_absent=0" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/whatsapp.png" alt="whatsapp"></a>
            <a href="https://www.messenger.com/t/mailerstation" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/messenger.png" alt="messenger"></a>
            <a href="mailto:support@mailerstation.com" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/email.png" alt="email"></a>
            <a href="tel: +44 7441442048" target="_blank"><img src="' . $seoUrl . 'bundles/bydhome/img/chat/call.png" alt="call"></a>
        </div>
    </div>';
}
?>

<footer class="footer" id="footer">
    <div class="pad-vertical bg-concrete">
        <div class="container">
            <div class="row">
                <div class="col-md-2 gap-bottom-tld">
                    <h6 class="text-uppercase">Products</h6>
                    <div class="menu menu--primary">
                        <a href="<?= $seoUrl; ?>custom-order/business-contacts" class="menu__item
                           hidden-dd">Online List Builder</a>
                        <a href="<?= $seoUrl; ?>ready-made/job-levels"
                            class="menu__item">Lists By Job Levels</a>
                        <a href="<?= $seoUrl; ?>ready-made/job-titles"
                            class="menu__item">Lists By Job Titles</a>
                        <a href="<?= $seoUrl; ?>ready-made/job-functions"
                            class="menu__item">Lists By Job Functions</a>
                        <a href="<?= $seoUrl; ?>ready-made/industries"
                            class="menu__item">Lists By Industries</a>
                        <a
                            href="<?= $seoUrl; ?>ready-made/healthcare-professionals"
                            class="menu__item">Healthcare Professionals</a>
                        <a href="<?= $seoUrl; ?>ready-made/international"
                            class="menu__item">International</a>
                        <a href="<?= $seoUrl; ?>ready-made/real-estate"
                            class="menu__item">Real Estate Lists</a>
                    </div>
                </div>
                <div class="col-md-3 gap-bottom-tld">
                    <h6 class="text-uppercase">Company</h6>
                    <div class="menu menu--primary">
                        <a href="<?= $seoUrl; ?>about" class="menu__item">About Us</a>
                        <a href="<?= $seoUrl; ?>contact" class="menu__item">Contact</a>
                        <a href="<?= $seoUrl; ?>pricing" class="menu__item">Pricing</a>
                        <a href="<?= $seoUrl; ?>our-guarantees"
                            class="menu__item">Our Guarantees</a>
                        <a href="<?= $seoUrl; ?>community-relations"
                            class="menu__item">Community Relations</a>
                        <a href="<?= $seoUrl; ?>careers" class="menu__item">Careers</a>
                        <a href="<?= $seoUrl; ?>leadership" class="menu__item">Leadership</a>
                        <a
                            href="<?= $seoUrl; ?>how-to-build-list"
                            class="menu__item">How To Build A List</a>
                    </div>
                </div>
                <div class="col-md-3 gap-bottom-tld">
                    <h6 class="text-uppercase">Community</h6>
                    <div class="menu menu--primary">
                        <a href="<?= $seoUrl; ?>events" class="menu__item">Events</a>
                        <a href="<?= $seoUrl; ?>resources" class="menu__item">Resources</a>
                        <a href="<?= $seoUrl; ?>blogs" class="menu__item">Blog</a>
                        <a href="<?= $seoUrl; ?>case-study" class="menu__item">Case Study</a>
                        <a href="<?= $seoUrl; ?>faq" class="menu__item">FAQ</a>
                        <a href="<?= $seoUrl; ?>sitemap.xml" class="menu__item">Sitemap</a>
                    </div>
                    <h6 class="text-uppercase">Popular</h6>
                    <div class="menu menu--primary">
                        <a href="<?= $seoUrl; ?>email-list-database/cfo"
                            class="menu__item">CFO</a>
                        <a
                            href="<?= $seoUrl; ?>email-list-database/ceo"
                            class="menu__item">CEO</a>
                        <a
                            href="<?= $seoUrl; ?>ready-made/real-estate"
                            class="menu__item">REAL ESTATE</a>
                        <a href="<?= $seoUrl; ?>custom-order/business-contacts"
                            class="menu__item">Business Contacts</a>
                        <a href="<?= $seoUrl; ?>email-list-database/engineering-1"
                            class="menu__item">Engineering</a>
                    </div>
                </div>
                <div class="col-md-3 gap-bottom-tld">
                    <div class="text-uppercase">EmailBigData</div>
                    <a href="<?php echo $seoUrl; ?>contact">Send Message</a>
                    <address>
                        <p><strong>Washington:</strong> 1348 Florida Ave. NW, Washington, DC, 20009, US</p>
                        <p><strong>New York:</strong> 2 Wall Street, New York, NY, 10005</p>
                        <p><strong>Istanbul:</strong> Arifipasa Sok. 4/4 Bebek, Istanbul, 34342, TR</p>
                        <p><strong>London:</strong> 2/8 Victoria Avenue, Bishopgate, London EC2M 4NS, UK</p>
                        <p>P: +44 7441442048</p>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__brands">
        <div class="container">
            <div class="footer-logos gap-bottom-small-tld">
                <span class="footer-logos__title">Secured <br>By</span>
                <a
                    href="https://trustsealinfo.websecurity.norton.com/splash?form_file=fdf%2Fsplash.fdf&amp;sap=&amp;dn=www.bookyourdata.com&amp;zoneoff=&amp;lang=en"
                    target="_blank" class="footer-logos__item"><img
                        src="<?= $siteUrl; ?>bundles/bydhome/img/logos/norton.png"
                        alt=""></a>
                <a
                    href="https://www.mcafeesecure.com/verify?host=bookyourdata.com"
                    target="_blank" class="footer-logos__item"><img
                        src="<?= $siteUrl; ?>bundles/bydhome/img/logos/mcafee.png"
                        alt=""></a><br />
                <a href="https://www.braintreegateway.com/merchants/2p2n3q74bfh5sq7c/verified" target="_blank" rel="noopener noreferrer">
                    <img src="https://s3.amazonaws.com/braintree-badges/braintree-badge-wide-dark.png" style="margin-top: 16px;" width="280px" height="44px" border="0" alt="braintree logo">
                </a>
            </div>
            <div class="footer-logos pull-right-tlnu">
                <span class="footer-logos__title">Proud <br>Member Of</span>
                <span class="footer-logos__item"><img
                        src="<?= $siteUrl; ?>bundles/bydhome/img/logos/ana-logo.png" alt=""></span>
                <span class="footer-logos__item"><img
                        src="<?= $siteUrl; ?>bundles/bydhome/img/logos/ama-logo.png" alt=""></span>
                <span class="footer-logos__item"><img
                        src="<?= $siteUrl; ?>bundles/bydhome/img/logos/dmfa-logo.png" alt=""></span>
                <span class="footer-logos__item"><img
                        src="<?= $siteUrl; ?>bundles/bydhome/img/logos/pma.png" alt=""></span>
            </div>
        </div>
    </div>
    <hr class="hr-line">
    <div class="footer__bottom text-gray-chateau">
        <div class="container font-small">
            <ul class="list list--primary footer__bottom-links">
                <li class="list__item">Copyright &copy; 2021
                    EmailBigData - All Rights Reserved</li>
                <li class="list__item"><a class="link-quaternary"
                        href="terms-of-use.php">Terms of Use</a></li>
                <li class="list__item"><a class="link-quaternary"
                        href="privacy-policy.php">Privacy Policy</a></li>
                <li class="list__item"><a class="link-quaternary"
                        href="legal-notice.php">Legal Notice</a></li>
            </ul>
            <div class="footer__social-menu">
                <a href="" target="_blank" rel="noopener noreferrer nofollow">
                    <img src="<?= $siteUrl; ?>bundles/bydhome/img/logos/blue-seal-200-42-bbb-87158178.png" style="border: 0;" width="170px" alt="Bookyourdata.com - BBB Rating and Accreditation: A+">
                </a>
                <a href="gdpr-ready.php">
                    <img src="<?= $siteUrl; ?>bundles/bydhome/img/logos/gdpr.svg"
                        alt="GDPR">
                </a>
                <span>Find us on</span>
                <div class="social-menu gap-left align-middle">
                    <a
                        href="https://www.facebook.com/emailbigdata.com/"
                        target="_blank" class="social-menu__item
                                icon-facebook"></a>
                    <a
                        href="https://www.linkedin.com/company/emailbigdata"
                        target="_blank" class="social-menu__item
                                icon-linkedin"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php $name = basename($_SERVER['PHP_SELF'], ".php");

if ($name === 'index') { ?>
    <script>
        function myFunction() {
            var x = document.getElementById("chat-option");
            if (x.style.display === "none") {
                x.style.display = "block";
                document.getElementById("chat-btn").innerHTML = '<img class="closeBtn" src="<?= $seoUrl; ?>bundles/bydhome/img/chat/close.png" alt="messagebtn" >';
            } else {
                x.style.display = "none";
                document.getElementById("chat-btn").innerHTML = '<img src="<?= $seoUrl; ?>bundles/bydhome/img/chat/messagebtn.png" alt="messagebtn" >';
            }
        }
    </script>
<?php
} else { ?>
    <script>
        function myFunction() {
            var x = document.getElementById("chat-option");
            if (x.style.display === "block") {
                x.style.display = "none";
                document.getElementById("chat-btn").innerHTML = '<img src="<?= $seoUrl; ?>bundles/bydhome/img/chat/messagebtn.png" alt="messagebtn" >';
            } else {
                x.style.display = "block";
                document.getElementById("chat-btn").innerHTML = '<img class="closeBtn" src="<?= $seoUrl; ?>bundles/bydhome/img/chat/close.png" alt="messagebtn" >';

            }
        }
    </script>
<?php
}
?>


<!--<script src="../ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
    window.jQuery || document.write('<script src="<?= $seoUrl; ?>bundles/bydhome/libs/jquery.min8939.js"><\/script>');
</script>
<script src="<?= $seoUrl; ?>bundles/bydhome/js/app.min3860.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        //Message Ajax Request
        $("#email-collect-btn").click(function(e) {
            if ($("#email-collect-from")[0].checkValidity()) {
                e.preventDefault();
                $("#email-collect-btn").val('Please Wait...');
                $.ajax({
                    url: 'assets/php/action',
                    type: 'post',
                    data: $("#email-collect-from").serialize() + '&action=email-register',
                    success: function(response) {
                        $("#email-collect-btn").val('Submit');
                        $("#email-collect-from")[0].reset();
                        $("#emailAlert").html(response);
                    }
                });
            }
        });
    });
</script>

<!-- Histats.com  START  (aync)-->
<script type="text/javascript">
    var _Hasync = _Hasync || [];
    _Hasync.push(['Histats.start', '1,4592147,4,0,0,0,00010000']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function() {
        var hs = document.createElement('script');
        hs.type = 'text/javascript';
        hs.async = true;
        hs.src = ('//s10.histats.com/js15_as.js');
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();
</script>
<noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4592147&101" alt="site stats" border="0"></a></noscript>
<!-- Histats.com  END  -->

</body>

</html>