<?php
require_once 'assets/php/header.php';
?>
<main>
    <div class="update-details" style="display:none;">
        <h3>Top Up Your Client</h3>
        <form id="topup-form" method="POST" action="#">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="email" name="email" placeholder="Top Up Email address" disabled>
                <label for="email">Top Up Email address</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="topupType" name="topupType" aria-label="Floating label select example">
                    <option selected disabled>-Select Options-</option>
                    <option>Add</option>
                    <option>Minus</option>
                </select>
                <label for="topupType">Choice Topup Type</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Top Up Amount" required>
                <label for="amount">Top Up Amount</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="topId" id="topId">
                    <button type="submit" class="btn btn-primary btn-block" id="topup-btn">Top Up Now</button>
                </div>
            </div>
        </form>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3 class="text-dark">All User Details</h3>
                <div class="table-responsive p-3" id="showUser">
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
    $(document).ready(function() {
        $("body").on("click", ".bandUser", function(e) {
            e.preventDefault();

            let bandUser = $(this).attr("id");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, banded it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'assets/php/process',
                        type: 'post',
                        data: {
                            bandUser: bandUser
                        },
                        success: function(response) {
                            Swal.fire(
                                'Banded!',
                                'User has been banded successfully.',
                                'success'
                            )
                            location.reload();
                        }
                    });
                }
            });
        });
        $("body").on("click", ".userTopup", function(e) {
            e.preventDefault();

            let userTopup = $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    userTopup: userTopup
                },
                success: function(response) {

                    $(".update-details").attr('style', 'display:block');
                    data = JSON.parse(response);
                    $("#email").val(data.email);
                    $("#topId").val(data.id);
                }
            });
        });
        $("#topup-btn").click(function(e) {
            if ($("#topup-form")[0].checkValidity()) {
                e.preventDefault();
                $("#topup-btn").val('Please Wait...');

                $.ajax({
                    url: 'assets/php/process',
                    type: 'post',
                    data: $("#topup-form").serialize() + '&action=topup',
                    success: function(response) {
                        $("#topup-btn").val('Top Up Now');
                        alert("Top Up Successfully!");
                        $("#topup-form")[0].reset();
                        location.reload();
                    }
                });
            }
        });
        $("body").on("click", ".userLogin", function(e) {
            e.preventDefault();

            let userLogin = $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    userLogin: userLogin
                },
                success: function(response) {
                    window.location.href = "../user/order";
                }
            });
        });
        displayAllUser();

        function displayAllUser() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-user'
                },
                success: function(response) {
                    $("#showUser").html(response);
                    $("table").DataTable();
                }
            });
        }
    });
</script>