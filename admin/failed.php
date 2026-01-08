<?php
require_once 'assets/php/header.php';
?>
<main>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card  p-3">
                <h3 class="text-dark">All Failed Order Details</h3>
                <div class="table-responsive" id="showFailed">
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
        $("body").on("click", ".deleteFailedBtn", function (e) {
            e.preventDefault();

          let delete_failed_id =  $(this).attr("id");
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
                    data: { delete_failed_id:delete_failed_id},
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
    displayAllFailed();
        function displayAllFailed() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-failed'
                },
                success: function(response) {
                    $("#showFailed").html(response);
                    $("table").DataTable();
                }
            });
        }
</script>

