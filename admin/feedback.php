<?php
require_once 'assets/php/header.php';
?>
<main>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>All Feedback Details</h3>
                <div class="table-responsive p-3" id="showFeedback">
                    <h3>Please Wait....</h3>
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
    $("body").on("click", ".deleteFeedbackBtn", function (e) {
        e.preventDefault();

        let deleteFeedbackBtn = $(this).attr("id");

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
                    data: {deleteFeedbackBtn: deleteFeedbackBtn},
                    success: function (response) {
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
    displayAllFeedback();
    function displayAllFeedback() {
        $.ajax({
            url: 'assets/php/process',
            type: 'post',
            data: {
                action: 'display-feedback'
            },
            success: function(response) {
                $("#showFeedback").html(response);
                $("table").DataTable();
            }
        });
    }
});
</script>
