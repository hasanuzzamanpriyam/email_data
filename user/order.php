<?php
    require_once 'php/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if($verified == 'Not Verified!'): ?>
            <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
                <button class="close" type="button" data-dismiss="alert">&times;</button>
                <strong>Your E-mail is not verified! We've sent you an E-mail verification link on your e-mail, Please
                    check and verify now!</strong>
            </div>
            <?php endif;?>
            <h4 class="text-center text-primary mt-2">Create your new order here & access anytime anywhere!</h4>
        </div>
    </div>
    <div class="card border-primary">
        <h5 class="card-header bg-primary d-flex justify-content-between">
            <span class="text-light lead align-self-center">All Order Details</span>
            <a href="https://mailerstation.com/" class="btn btn-light"><i
                    class="fas fa-plus-circle fa-lg"></i>&nbsp;Create new Order</a>
        </h5>
        <div class="card-body">
            <div class="table-responsive" id="showOrderDetails">
                <p class="text-center lead mt-5">Please Wait...</p>
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
                    order: [0, 'desc']
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