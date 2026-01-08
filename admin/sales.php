<?php
require_once 'assets/php/header.php';
?>
<main>
    <div class="update-sale-details">
        <h3>Edit Your Sales Details</h3>
        <form id="sale-form"  method="POST" action="#" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="day" name="day">
                <label for="day">Delivery Dates</label>
            </div>
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Insert New File For Delivery Update</label>
              <input class="form-control" type="file" id="formFileMultiple" name="deliveryUpdateData" multiple>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="saleId" id="saleId">
                    <button type="submit" class="btn btn-primary btn-block" id="sale-btn">Update Now</button>
                </div>
            </div>
        </form>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card  p-3">
                <h3>All Order Details</h3>
                <div class="table-responsive" id="showSales">
                    <h3>Please Wait...</h3>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once 'assets/php/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){

        $("body").on("click", ".editSaleBtn", function (e) {
            e.preventDefault();

            editSaleId =  $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { editSaleId: editSaleId},
                success: function(response) {
                    data = JSON.parse(response);
                    $("#day").val(data.days);
                    $("#saleId").val(data.id);
                }
            });  
        });
        $("#sale-form").submit(function (e) {
            e.preventDefault();

            $("#sale-btn").val("Please wait...");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function (response) {
                    $("#sale-btn").val("Update Now");
                    swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Delivery Updated successfully!',
                        showConfirmButton: true,
                        //timer: 1500
                    });
                    location.reload();
                }
            });
        });
        $("body").on("click", ".deleteSaleBtn", function (e) {
            e.preventDefault();

          let delete_sale_id =  $(this).attr("id");
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
                    data: { delete_sale_id:delete_sale_id},
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
                    action: 'display-sales'
                },
                success: function(response) {
                    $("#showSales").html(response);
                    $("table").DataTable();
                }
            });
        }
</script>

