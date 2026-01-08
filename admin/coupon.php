<?php
require_once 'assets/php/header.php';
?>
<main>
    <div class="seo-details">
        <h3>Set up coupon on your post!</h3>
        <form action="#" method="POST" id="coupon-form">
            <div class="form-floating mb-3" id="showPage">
                 <h3 class="text-center font-weight-bold">Please Wait....</h3>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="couponTitle" placeholder="Enter Coupon Title" name="couponTitle" required>
                <label for="couponTitle">Coupon Title</label>
            </div>
            <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="couponKeyword" placeholder="Enter Coupon Keyword" name="couponKeyword" required>
                  <label for="couponKeyword">Coupon Tracking ID</label>
            </div>
            <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="couponLimit" placeholder="Enter Coupon Limit" name="couponLimit" required>
                  <label for="couponLimit">Coupon Limitation Number</label>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="couponType" name="couponType" aria-label="Floating label select example">
                    <option selected disabled>-Select Options-</option>
                    <option>Amount</option>
                    <option>Percentage</option>
                  </select>
                  <label for="floatingSelectGrid">Choice Coupon Type</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input type="number" class="form-control" id="couponAmount" name="couponAmount" placeholder="couponAmount">
                  <label for="couponAmount">Coupon Amount</label>
                </div>
              </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <button type="submit" id="couponBtn" class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="seo-update-details" style="display:none;">
        <h3>Edit coupon on your post!</h3>
        <form action="#" method="POST" id="update-coupon-form">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updatepostTitle" placeholder="Enter Post Title" name="updatepostTitle" readonly>
                <label for="updatepostTitle">Post Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updatecouponTitle" placeholder="Enter Coupon Title" name="updatecouponTitle" required>
                <label for="updatecouponTitle">Coupon Title</label>
            </div>
            <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="updatecouponKeyword" placeholder="Enter Coupon Keyword" name="updatecouponKeyword" required>
                  <label for="updatecouponKeyword">Coupon Tracking ID</label>
            </div>
            <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="updatecouponLimit" placeholder="Enter Coupon Limit" name="updatecouponLimit" required>
                  <label for="updatecouponLimit">Coupon Limitation Number</label>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="updatecouponType" name="updatecouponType" aria-label="Floating label select example">
                    <option selected disabled>-Select Options-</option>
                    <option>Amount</option>
                    <option>Percentage</option>
                  </select>
                  <label for="floatingSelectGrid">Choice Coupon Type</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input type="number" class="form-control" id="updatecouponAmount" name="updatecouponAmount" placeholder="couponAmount">
                  <label for="updatecouponAmount">Coupon Amount</label>
                </div>
              </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="updateCouponId" id="updateCouponId">
                    <button type="submit" id="updatecouponBtn" class="btn btn-primary btn-block">Update</button>
                </div>
            </div>
        </form>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>All coupon setup post</h3>
                <div class="table-responsive p-3" id="showCoupon">
                    <h3 class="text-center font-weight-bold">Please Wait....</h3>
                </div>
            </div>
        </div>
    </section>
</main>
</div>
<?php
require_once 'assets/php/footer.php';
?>
<script>
    $(document).ready(function () {
        $("#couponBtn").click(function (e) {
            if ($("#coupon-form")[0].checkValidity()) {
                e.preventDefault();
                $("#couponBtn").val('Please Wait...');

                $.ajax({
                    url: 'assets/php/process',
                    type: 'post',
                    data: $("#coupon-form").serialize() + '&action=coupon',
                    success: function (response) {
                        $("#couponBtn").val('Save');
                        alert("Data Insert Successfully!");
                        $("#coupon-form")[0].reset(); 
                        location.reload();
                    }
                });
            }
        });
        $("#updatecouponBtn").click(function (e) {
            if ($("#update-coupon-form")[0].checkValidity()) {
                e.preventDefault();
                $("#updatecouponBtn").val('Please Wait...');

                $.ajax({
                    url: 'assets/php/process',
                    type: 'post',
                    data: $("#update-coupon-form").serialize() + '&action=update-coupon',
                    success: function (response) {
                        
                        $("#updatecouponBtn").val('Update');
                        alert("Data Update Successfully!");
                        $("#update-coupon-form")[0].reset();
                        location.reload();
                    }
                });
            }
        });
        $("body").on("click", ".editCouponBtn", function (e) {
            e.preventDefault();

            let editCouponBtn =  $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { editCouponBtn: editCouponBtn},
                success: function(response) {
                    $(".seo-update-details").attr('style', 'display:block');
                    $(".seo-details").attr('style', 'display:none');

                    data = JSON.parse(response);
                    $("#updatepostTitle").val(data.post_title);
                    $("#updatecouponTitle").val(data.coupon_title);
                    $("#updatecouponKeyword").val(data.tacking_id);
                    $("#updatecouponLimit").val(data.limitation);
                    $("#updatecouponType").val(data.coupon_type);
                    $("#updatecouponAmount").val(data.amount);
                    $("#updateCouponId").val(data.id);
                }
            });  
        });
        $("body").on("click", ".deleteCouponBtn", function (e) {
            e.preventDefault();

          let deleteCouponBtn =  $(this).attr("id");

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
                    data: { deleteCouponBtn: deleteCouponBtn},
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
        displayAllPage();
        function displayAllPage() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-coupon-post'
                },
                success: function(response) {
                    $("#showPage").html(response);
                }
            });
        }
        displayAllCoupon();
        function displayAllCoupon() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-coupon'
                },
                success: function(response) {
                    $("#showCoupon").html(response);
                    $("table").DataTable();
                }
            });
        }
    });
</script>
<script>
function showSelected() {
        var selectedCountry = $('.pageTitle').children("option:selected").val();
        document.getElementById("copytext").value = selectedCountry;
        }
</script>