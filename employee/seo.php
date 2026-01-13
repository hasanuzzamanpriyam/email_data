<?php
require_once 'assets/php/header.php';
?>
<main>
    <div class="seo-details">
        <h3>Make your page and post SEO friendly</h3>
        <form action="#" method="POST" id="seo-form">
            <div class="form-floating mb-3" id="showPage">
                 <h3 class="text-center font-weight-bold">Please Wait....</h3>
            </div>
           <!-- <div class="form-floating mb-3">
                <input type="text" class="form-control" id="copytext" >
                <label for="copytext">Only Copy Test</label>
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoTitle" placeholder="Enter SEO Title" name="seoTitle" required>
                <label for="seoTitle">SEO Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUrl" placeholder="Enter SEO URL" name="seoUrl"required>
                <label for="seoUrl">SEO URL</label>
            </div>
            <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Write Key-word" id="seoKeyword" style="height: 100px" name="seoKeyword"required></textarea>
                  <label for="seoKeyword">Key-word</label>
            </div>
            <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Write short description" id="seoDescription" style="height: 100px" name="seoDescription"required></textarea>
                  <label for="seoDescription">Description</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="submit" id="seoBtn" class="btn btn-primary btn-block test" value="Save">
                </div>
            </div>
        </form>
    </div>
    <div class="seo-update-details" style="display:none">
        <h3>Make your page and post SEO friendly</h3>
        <form action="#" method="POST" id="seo-update-form">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdatePage" placeholder="Enter SEO Title" name="seoUpdatePage" readonly>
                <label for="seoTitle">Page Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdateTitle" placeholder="Enter SEO Title" name="seoUpdateTitle">
                <label for="seoUpdateTitle">SEO Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdateUrl" placeholder="Enter SEO URL" name="seoUpdateUrl">
                <label for="seoUpdateUrl">SEO URL</label>
            </div>
            <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Write Key-word" id="seoUpdateKeyword" style="height: 100px" name="seoUpdateKeyword"></textarea>
                  <label for="seoUpdateKeyword">Key-word</label>
            </div>
            <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Write short description" id="seoUpdateDescription" style="height: 100px" name="seoUpdateDescription"></textarea>
                  <label for="seoUpdateDescription">Description</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="updateSeoId" id="updateSeoId">
                    <input type="submit" id="seoUpdateBtn" class="btn btn-primary btn-block test" value="Update Now">
                </div>
            </div>
        </form>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>All SEO Friendly page and post</h3>
                <div class="table-responsive p-3" id="showSEOPage">
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
        $("#seoBtn").click(function (e) {
            if ($("#seo-form")[0].checkValidity()) {
                e.preventDefault();
                $("#seoBtn").val('Please Wait...');

                $.ajax({
                    url: 'assets/php/process',
                    type: 'post',
                    data: $("#seo-form").serialize() + '&action=seo',
                    success: function (response) {
                        $("#seoBtn").val('Save');
                        if (response === 'inserted') {
                            alert("SEO inserted successfully!");
                            $("#seo-form")[0].reset();
                        } else if (response === 'updated') {
                            alert("SEO updated successfully!");
                            $("#seo-form")[0].reset();
                        } else {
                            alert("Error: Failed to save SEO data.");
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#seoBtn").val('Save');
                        alert("Server Error: " + error);
                    }
                });
            }
        });
        
        $("body").on("click", ".editSEOBtn", function (e) {
            e.preventDefault();

            let editSEOId =  $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { editSEOId: editSEOId},
                success: function(response) {
                    $(".seo-update-details").attr('style', 'display:block');
                    $(".seo-details").attr('style', 'display:none');

                    data = JSON.parse(response);
                    $("#seoUpdatePage").val(data.page);
                    $("#seoUpdateTitle").val(data.title);
                    $("#seoUpdateUrl").val(data.url);
                    $("#seoUpdateKeyword").val(data.key_word);
                    $("#seoUpdateDescription").val(data.description);
                    $("#updateSeoId").val(data.id);
                }
            });  
        });

        $("#seo-update-form").submit(function (e) {
            e.preventDefault();

            $("#seoUpdateBtn").val("Please wait...");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: $("#seo-update-form").serialize() + '&action=update-seo',
                success: function (response) {
                    $("#seoUpdateBtn").val("Update Now");
                    swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'SEO Update successfully!',
                        showConfirmButton: true,
                        //timer: 1500
                    });
                    location.reload();
                }
            });
        });

        $("body").on("click", ".deleteSEOBtn", function (e) {
            e.preventDefault();

          let delete_seo_id =  $(this).attr("id");

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
                    data: { delete_seo_id: delete_seo_id},
                    success: function(response) {
                        if (response === 'success') {
                            Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                            )
                            location.reload();
                        } else if (response === 'not-found') {
                            Swal.fire(
                              'Not Found',
                              'SEO record not found or already deleted.',
                              'error'
                            )
                        } else if (response.startsWith('database-error')) {
                            Swal.fire(
                              'Error!',
                              response.replace('database-error: ', ''),
                              'error'
                            )
                        } else {
                            Swal.fire(
                              'Error!',
                              'Failed to delete SEO data.',
                              'error'
                            );
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
                    action: 'display-page'
                },
                success: function(response) {
                    $("#showPage").html(response);
                }
            });
        }
        displayAllSEOPage();
        function displayAllSEOPage() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-seo'
                },
                success: function(response) {
                    $("#showSEOPage").html(response);
                    $("table").DataTable();
                }
            });
        }

        $(document).on('input', '#seoTitle', function() {
            const title = $(this).val();
            if (title && $('#seoUrl').val() === '') {
                const url = title.toLowerCase().replace(/\s+/g, '-');
                $('#seoUrl').val(url);
            }
        });

        $(document).on('input', '#seoUpdateTitle', function() {
            const title = $(this).val();
            if (title && $('#seoUpdateUrl').val() === '') {
                const url = title.toLowerCase().replace(/\s+/g, '-');
                $('#seoUpdateUrl').val(url);
            }
        });
    });
</script>
<!--
<script>
function showSelected() {
        var selectedCountry = $('.pageTitle').children("option:selected").val();
        document.getElementById("copytext").value = selectedCountry;
        }
</script> -->