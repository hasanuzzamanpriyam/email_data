<?php
    require_once 'php/header.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-3">
            <?php if($verified == 'Verified!'): ?>
            <div class="card border-primary">
                <div class="card-header lead text-center bg-primary text-white">Send Your Message to Mailerstation</div>
                <div class="card-body">
                    <form action="#" method="post" class="px-4" id="feedback-form">
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Write Your Subject" class="form-control form-control-lg rounded-0" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="8" name="feedback" placeholder="Write Your message Here..." class="form-control form-control-lg rounded-0" required></textarea> 
                        </div>
                        <div class="form-group">
                            <input type="submit" name="feedbackBtn" id="feedbackBtn" value="Send Feedback" class="btn btn-primary btn-block btn-lg rounded-0">
                        </div>
                    </form>
                </div>
            </div>
            <?php else: ?>
            <h1 class="text-center text-secondary mt-5">Verify Your E-mail First to Send Message to Mailerstation!</h1>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
    require_once 'php/footer.php';
?>
<script>
    $(document).ready(function(){
        //Send feedback to admin ajax request
        $("#feedbackBtn").click(function(e){
            if($("#feedback-form")[0].checkValidity()){
                e.preventDefault();

                $(this).val('Please wait..');

                $.ajax({
                    url: 'assets/php/process.php',
                    type: 'post',
                    data: $("#feedback-form").serialize()+'&action=feedback',
                    success: function(response){
                        $("#feedbackBtn").val('Send Feedback');
                        $("#feedback-form")[0].reset();
                        swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Send Feedback successfully!',
                            showConfirmButton: true,
                            //timer: 1500
                        });
                    }
                });
            }
        });
        //Check Notification of an user
        checkNotification();

        function checkNotification(){
            $.ajax({
                url: 'assets/php/process.php',
                type: 'post',
                data: { action: 'checkNotification' },
                success: function(response){
                    $("#checkNotification").html(response);
                }
            });
        }
    });
</script>


