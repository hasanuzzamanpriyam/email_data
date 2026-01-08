<?php
require_once 'assets/php/header.php';
?>
<main>
    <h2 class="dashboard-title">Admin Overview</h2>
    <div class="dashboard-cards">
        <div class="card-single mb-4">
            <div class="card" id="totalUsers">
                <div class="card-body">
                    <span><i class="fas fa-users"></i></span>
                    <div>
                        <h5>Total Users</h5>
                        <h4 id="totalUser">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="user" >View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-envelope-open-text"></i></span>
                    <div>
                        <h5>Total E-mails</h5>
                        <h4 id="totalEmail">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= $site_url . '/admin/ready-made-lists/job-levels' ?>">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-cart-plus"></i></span>
                    <div>
                        <h5>Orders</h5>
                        <h4 id="totalOrder">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="order">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-cart-arrow-down"></i></span>
                    <div>
                        <h5>Failed</h5>
                        <h4 id="totalFail">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="failed">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-cart-arrow-down"></i></span>
                    <div>
                        <h5>Cancel</h5>
                        <h4 id="totalCancel">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="cancel">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-exchange-alt"></i></span>
                    <div>
                        <h5>Refund</h5>
                        <h4 id="totalRefund">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="refund">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-baby"></i></span>
                    <div>
                        <h5>Coupon</h5>
                        <h4 id="totalCoupon">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="coupon">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-comment-dots"></i></span>
                    <div>
                        <h5>Total Feedback</h5>
                        <h4 id="totalFeedback">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="feedback">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-user-plus"></i></span>
                    <div>
                        <h5>Subscriber</h5>
                        <h4 id="totalSubscription">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="subscription">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-baby"></i></span>
                    <div>
                        <h5>Topup</h5>
                        <h4 id="totalTopup">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="topup">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-cart-arrow-down"></i></span>
                    <div>
                        <h5>Total Sales</h5>
                        <h4 id="totalSales">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="sales">View All</a>
                </div>
            </div>
        </div>
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-briefcase"></i></span>
                    <div>
                        <h5>Net Income</h5>
                        <h4 id="totalIncome">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="sales">View All</a>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<?php
require_once 'assets/php/footer.php';
?>
<script type="text/javascript">
    displayTotalUser();
        function displayTotalUser() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-user-number'
                },
                success: function(response) {
                    $("#totalUser").html(response);
                }
            });
        }
        displayTotalEmail();
        function displayTotalEmail() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-email-number'
                },
                success: function(response) {
                    $("#totalEmail").html(response);
                }
            });
        }
        displayTotalOrder();
        function displayTotalOrder() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-order-number'
                },
                success: function(response) {
                    $("#totalOrder").html(response);
                }
            });
        }
        displayTotalFail();
        function displayTotalFail() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-failed-number'
                },
                success: function(response) {
                    $("#totalFail").html(response);
                }
            });
        }
        displayTotalCancel();
        function displayTotalCancel() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-cancel-number'
                },
                success: function(response) {
                    $("#totalCancel").html(response);
                }
            });
        }
        displayTotalRefund();
        function displayTotalRefund() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-refund-number'
                },
                success: function(response) {
                    $("#totalRefund").html(response);
                }
            });
        }
        displayTotalCoupon();
        function displayTotalCoupon() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-coupon-number'
                },
                success: function(response) {
                    $("#totalCoupon").html(response);
                }
            });
        }
        displayTotalTopup();
        function displayTotalTopup() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-topup-number'
                },
                success: function(response) {
                    $("#totalTopup").html(response);
                }
            });
        }
        displayTotalSales();
        function displayTotalSales() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-sales-number'
                },
                success: function(response) {
                    $("#totalSales").html(response);
                }
            });
        }
        displayTotalFeedback();
        function displayTotalFeedback() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-feedback-number'
                },
                success: function(response) {
                    $("#totalFeedback").html(response);
                }
            });
        }
        displayTotalSubscription();
        function displayTotalSubscription() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-subscription-number'
                },
                success: function(response) {
                    $("#totalSubscription").html(response);
                }
            });
        }
        displayNetIncome();
        function displayNetIncome() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'total-income-number'
                },
                success: function(response) {
                    $("#totalIncome").html(response);
                }
            });
        }

</script>