<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

<script src="https://mailerstation.com/admin/assets/css/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        // Check notifications on click
        $("#notificationDropdown").on('click', function() {
            $.ajax({
                url: 'assets/php/process.php',
                type: 'post',
                data: {
                    action: 'fetchAdminNotification'
                },
                success: function(response) {
                    $("#notificationList").html(response);
                }
            });
        });
    });
</script>
</body>

</html>