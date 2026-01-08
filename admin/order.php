<?php
require_once 'assets/php/header.php';
?>
<main>
    <div class="update-details">
        <h3>Complete Your Order</h3>
        <form id="delivery-form"  method="POST" action="#" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="email" name="email">
                <label for="email">Delivery Email address</label>
            </div>
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Insert File For Delivery</label>
              <input class="form-control" type="file" id="formFileMultiple" name="deliveryData" multiple>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="deliveryId" id="deliveryId">
                    <button type="submit" class="btn btn-primary btn-block" id="delivery-btn">Delivery Now</button>
                </div>
            </div>
        </form>
    </div>
    <div class="edit-details" style="display: none;">
        <h3>Edit Order Details</h3>
        <form id="edit-form"  method="POST" action="#">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editEmail" name="editEmail" readonly>
                <label for="editEmail">Edit Email address</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="paymentStatus" name="paymentStatus" aria-label="Select Payment Status">
                    <option selected disabled>-Select Options-</option>
                    <option>Refund</option>
                    <option>Cancel</option>
                </select>
                <label for="paymentStatus">Select Payment Status</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="editDeliveryId" id="editDeliveryId">
                    <button type="submit" class="btn btn-primary btn-block" id="edit-delivery-btn">Edit Now</button>
                </div>
            </div>
        </form>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card p-3">
                <h3>All Order Details</h3>
                <div class="table-responsive" id="showOrder">
                    <h3>Please Wait...</h3>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once 'assets/php/footer.php';

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("body").on("click", ".deliveryOrderBtn", function (e) {
            e.preventDefault();

            editOrderId =  $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { editOrderId: editOrderId},
                success: function(response) {
                    $(".edit-details").attr('style', 'display:none');
                    $(".update-details").attr('style', 'display:block');
                    data = JSON.parse(response);
                    $("#email").val(data.email);
                    $("#deliveryId").val(data.id);
                }
            });  
        });
        $("#delivery-form").submit(function (e) {
            e.preventDefault();

            $("#delivery-btn").val("Please wait...");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function (response) {
                    $("#delivery-btn").val("Delivery Now");
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Product Delivery successfully!',
                        showConfirmButton: true,
                        //timer: 1500
                    });
                    location.reload();
                }
            });
        });
        
        $("body").on("click", ".editOrderBtn", function (e) {
            e.preventDefault();

            editOrderId =  $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { editOrderId: editOrderId},
                success: function(response) {
                    $(".edit-details").attr('style', 'display:block');
                    $(".update-details").attr('style', 'display:none');
                    
                    data = JSON.parse(response);
                    $("#editEmail").val(data.email);
                    $("#editDeliveryId").val(data.id);
                }
            });  
        });
        
        $("#edit-form").submit(function (e) {
            e.preventDefault();

            $("#edit-delivery-btn").val("Please wait...");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: $("#edit-form").serialize() + '&action=edit-order',
                success: function (response) {
                    $("#edit-delivery-btn").val("Edit Now");
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Order is Updated Successfully!',
                        showConfirmButton: true,
                        //timer: 1500
                    });
                    location.reload();
                }
            });
        });
        
        $("body").on("click", ".deleteOrderBtn", function (e) {
            e.preventDefault();

          let delete_id =  $(this).attr("id");
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    url: 'assets/php/process',
                    type: 'post',
                    data: { delete_id:delete_id},
                    success: function(response) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                        location.reload();
                    }
                });  
              }
            })
        });
    });
    displayAllOrder();
        function displayAllOrder() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-order'
                },
                success: function(response) {
                    $("#showOrder").html(response);
                    $("table").DataTable();
                }
            });
        }

</script>