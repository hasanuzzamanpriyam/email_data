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
    $(document).ready(function() {
        $("body").on("click", ".deleteFeedbackBtn", function(e) {
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
                        data: {
                            deleteFeedbackBtn: deleteFeedbackBtn
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

        $("body").on("click", ".replyFeedbackBtn", function(e) {
            e.preventDefault();
            let feedbackId = $(this).attr("id");
            $("#feedbackId").val(feedbackId);
        });

        $("#replyFeedbackBtn").click(function(e) {
            if ($("#reply-form")[0].checkValidity()) {
                e.preventDefault();
                $("#replyFeedbackBtn").val('Please Wait...');
                $.ajax({
                    url: 'assets/php/process.php',
                    type: 'post',
                    data: $("#reply-form").serialize() + '&action=reply_feedback_admin',
                    success: function(response) {
                        if (response === 'success') {
                            $("#replyFeedbackBtn").val('Send Reply');
                            $("#replyModal").modal('hide');
                            $("#reply-form")[0].reset();
                            Swal.fire(
                                'Sent!',
                                'Reply sent successfully!',
                                'success'
                            );
                        } else {
                            $("#replyFeedbackBtn").val('Send Reply');
                            Swal.fire(
                                'Error!',
                                'Failed to send reply: ' + response,
                                'error'
                            );
                        }
                    }
                });
            }
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

<!-- Reply Feedback Modal -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reply to Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reply-form">
                    <input type="hidden" name="feedbackId" id="feedbackId">
                    <div class="mb-3">
                        <label for="message" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="replyFeedbackBtn">Send Reply</button>
            </div>
        </div>
    </div>
</div>