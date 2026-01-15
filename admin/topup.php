<?php
require_once 'assets/php/header.php';
?>
<main>
    <div class="update-details">
        <h3>Update Topup Status By Admin</h3>
        <form id="topup-form" method="POST" action="#">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="email" name="email" placeholder="Top Email" readonly>
                <label for="email">Topup Email address</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="topUpStatus" name="topUpStatus" aria-label="Select Topup Status">
                    <option selected disabled>-Select Options-</option>
                    <option>Completed</option>
                    <option>Cancel</option>
                    <option>Failed</option>
                    <option>Processing</option>
                </select>
                <label for="topUpStatus">Select Topup Status</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="topId" id="topId">
                    <input type="hidden" name="topUid" id="topUid">
                    <input type="hidden" name="amount" id="amount">
                    <button type="submit" class="btn btn-primary btn-block" id="topup-btn">Update Now</button>
                </div>
            </div>
        </form>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card p-3">
                <h3>All Order Details</h3>
                <div class="table-responsive" id="showTopup">
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
    $(document).ready(function() {

        $("body").on("click", ".editTopBtn", function(e) {
            e.preventDefault();

            editTopId = $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    editTopId: editTopId
                },
                success: function(response) {
                    data = JSON.parse(response);
                    $("#email").val(data.email);
                    $("#topId").val(data.id);
                    $("#topUid").val(data.uid);
                    $("#amount").val(data.amount);
                    $("#topUpStatus").val(data.status);
                }
            });
        });
        $("#topup-form").submit(function(e) {
            e.preventDefault();

            $("#topup-btn").val("Please wait...");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: $("#topup-form").serialize() + '&action=update_topup',
                success: function(response) {
                    $("#topup-btn").val("Update Now");
                    swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Topup Updated successfully!',
                        showConfirmButton: true,
                        //timer: 1500
                    });
                    location.reload();
                }
            });
        });
        $("body").on("click", ".deleteTopBtn", function(e) {
            e.preventDefault();

            let delete_top_id = $(this).attr("id");
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
                        data: {
                            delete_top_id: delete_top_id
                        },
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
    displayAllTopup();

    function displayAllTopup() {
        $.ajax({
            url: 'assets/php/process',
            type: 'post',
            data: {
                action: 'display-topup'
            },
            success: function(response) {
                $("#showTopup").html(response);
                $("table").DataTable();
            }
        });
    }
</script>