<?php
    require_once 'php/header.php';
?>

<div class="container">
    <div class="row justify-content-center my-2">
        <div class="col-lg-6 mt-4" id="showAllNotification">
            
        </div>
    </div>
</div>

<?php
    require_once 'php/footer.php';
?>
<script>
    $(document).ready(function(){

        //Fetch Notification of an user
        fetchNotification();

        function fetchNotification(){
            $.ajax({
                url: 'assets/php/process.php',
                type: 'post',
                data: { action: 'fetchNotification' },
                success: function(response){
                    $("#showAllNotification").html(response);
                }
            });
        }

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

        //Remove Notification of an user
        $("body").on("click", ".close",function(e){
            e.preventDefault();

            notification_id = $(this).attr('id');

            $.ajax({
                url: 'assets/php/process.php',
                type: 'post',
                data: { notification_id:notification_id },
                success: function(response){
                    checkNotification();
                    fetchNotification();
                }
            });
        });
    });
</script>