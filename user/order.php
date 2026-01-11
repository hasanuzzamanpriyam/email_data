<?php
require_once 'php/header.php';
?>

<div class="jumbotron jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($verified == 'Not Verified!'): ?>
                        <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
                            <button class="close" type="button" data-dismiss="alert">&times;</button>
                            <strong>Your E-mail is not verified! We've sent you an E-mail verification link on your e-mail, Please
                                check and verify now!</strong>
                        </div>
                    <?php endif; ?>
                    <div class="clearfix gap-bottom">
                        <h1 class="jumbotron__title">My Orders</h1>
                    </div>
                    <div class="card border-primary" style="background-color: #fff; padding: 20px; border-radius: 5px;">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-primary m-0">All Order Details</h5>
                            <a href="../" class="button button--primary button--small"><i
                                    class="fas fa-plus-circle"></i>&nbsp;Create New Order</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="showOrderDetails">
                                <p class="text-center lead mt-5">Please Wait...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'php/footer.php';
?>

<script>
    $(document).ready(function() {

        displayAllOrder();

        //Display all order details of an user
        function displayAllOrder() {
            $.ajax({
                url: 'php/process',
                type: 'post',
                data: {
                    action: 'display-order'
                },
                success: function(response) {
                    $("#showOrderDetails").html(response);
                    $("table").DataTable({
                        order: [0, 'desc'],
                        "language": {
                            "emptyTable": "No orders found"
                        }
                    });
                }
            });
        }
    });
</script>
<script>
    function clickAlert() {
        alert("Sorry! Please, You don't Complete your order !");
    }
</script>