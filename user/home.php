<?php
    require_once 'php/header.php';
?>



<?php
    require_once 'php/footer.php';
?>
<script>
$(document).ready(function() {

    displayAllEvents();

    //Display all note of an user
    function displayAllEvents() {
        $.ajax({
            url: 'assets/php/process.php',
            type: 'post',
            data: {
                action: 'display-events'
            },
            success: function(response) {
                $("#showEvent").html(response);
                $("table").DataTable({
                    order: [0, 'desc']
                });
            }
        });
    }
});
</script>