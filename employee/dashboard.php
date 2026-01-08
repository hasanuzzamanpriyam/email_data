<?php
require_once 'assets/php/header.php';
?>
<main>
    <h2 class="dashboard-title">Overview of Mailerstation in Employee</h2>
    <div class="dashboard-cards">
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
                    <a href="http://localhost/shahabuddin/mailerstation/ready-made-lists/job-levels">View All</a>
                </div>
            </div>
        </div>
        
        <div class="card-single mb-4">
            <div class="card">
                <div class="card-body text-success">
                    <span><i class="fas fa-baby"></i></span>
                    <div>
                        <h5>Coupon</h5>
                        <h4 id="coupon">No Record Found!</h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="">View All</a>
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
</script>