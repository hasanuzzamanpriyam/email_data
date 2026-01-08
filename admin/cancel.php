<?php
require_once 'assets/php/header.php';
?>
<main>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card  p-3">
                <h3 class="text-dark">All Cancel Order Details</h3>
                <div class="table-responsive" id="showCancel">
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

        $("body").on("click", ".deleteCancelBtn", function (e) {
            e.preventDefault();

          let delete_cancel_id =  $(this).attr("id");
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
                    data: { delete_cancel_id:delete_cancel_id},
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
    displayAllCancel();
        function displayAllCancel() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-cancel'
                },
                success: function(response) {
                    $("#showCancel").html(response);
                    $("table").DataTable();
                }
            });
        }
</script>

