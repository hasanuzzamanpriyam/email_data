<?php
require_once 'assets/php/header.php';
?>
<main>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>All Ban User Details</h3>
                <div class="table-responsive p-3" id="showBandUser">
                    <h3>Please Wait</h3>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once 'assets/php/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function () {
        $("body").on("click", ".deleteUser", function (e) {
            e.preventDefault();

            let deleteUser =  $(this).attr("id");

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
                    data: { deleteUser: deleteUser },
                    success: function(response) {
                        Swal.fire(
                            'Delete!',
                            'User has been deleted successfully.',
                            'success'
                          )
                        location.reload();
                    }
                });  
            }
        });
      });
      $("body").on("click", ".returnUser", function (e) {
            e.preventDefault();

            let returnUser =  $(this).attr("id");

            Swal.fire({
              title: 'Are you sure?',
              text: "You would be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, return it!'
          }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    url: 'assets/php/process',
                    type: 'post',
                    data: { returnUser: returnUser },
                    success: function(response) {
                        Swal.fire(
                            'Return!',
                            'User has been returned successfully.',
                            'success'
                          )
                        location.reload();
                    }
                });  
            }
        });
      });
        displayAllUser();
        function displayAllUser() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-band-user'
                },
                success: function(response) {
                    $("#showBandUser").html(response);
                    $("table").DataTable();
                }
            });
        }
    });
</script>
