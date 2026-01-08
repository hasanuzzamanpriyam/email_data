<?php
require_once 'assets/php/header.php';
?>
<main>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>All Subscription Details</h3>
                <div class="table-responsive p-3" id="showSubscription">
                    <h3>Please Wait....</h3>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once 'assets/php/footer.php';
?>
<script type="text/javascript">
    displayAllSub();
        function displayAllSub() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-subscription'
                },
                success: function(response) {
                    $("#showSubscription").html(response);
                    $("table").DataTable();
                }
            });
        }
</script>
