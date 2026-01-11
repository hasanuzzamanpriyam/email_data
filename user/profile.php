<?php
require_once 'php/header.php';
?>
<style>
    .profile-container {
        max-width: 1200px;
        margin: 20px auto;
    }

    .profile-tabs {
        border: 1px solid #dee2e6;
        border-radius: 5px;
        overflow: hidden;
        background: white;
    }

    .tab-headers {
        display: flex;
        border-bottom: 2px solid #dee2e6;
        background: #f8f9fa;
    }

    .tab-headers a {
        flex: 1;
        padding: 15px 20px;
        text-decoration: none;
        text-align: center;
        font-weight: 600;
        color: #6c757d;
        border-right: 1px solid #dee2e6;
        transition: all 0.3s;
    }

    .tab-headers a:last-child {
        border-right: none;
    }

    .tab-headers a.active {
        color: #007bff;
        background: white;
        border-bottom: 3px solid #007bff;
    }

    .tab-headers a:hover:not(.active) {
        background: #e9ecef;
    }

    .tab-content-area {
        display: none;
        padding: 30px;
    }

    .tab-content-area.active {
        display: block;
    }

    /* Profile Tab Styles */
    .profile-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .profile-header {
        grid-column: 1 / -1;
        background: #007bff;
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 5px;
        font-size: 1.3rem;
        font-weight: 600;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .info-field {
        border: 2px solid #007bff;
        border-radius: 5px;
        padding: 12px 15px;
        background: white;
        display: flex;
        align-items: center;
    }

    .info-field label {
        font-weight: 600;
        margin-right: 10px;
        margin-bottom: 0;
        color: #333;
    }

    .info-field span {
        color: #666;
    }

    .profile-avatar-container {
        border: 2px solid #17a2b8;
        border-radius: 5px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        min-height: 400px;
    }

    .profile-avatar-container img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    /* Edit Profile Tab Styles */
    .edit-profile-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .edit-avatar-container {
        border: 2px solid #dc3545;
        border-radius: 5px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
    }

    .edit-avatar-container img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .edit-form-container {
        border: 2px solid #dc3545;
        border-radius: 5px;
        padding: 25px;
        background: white;
    }

    .edit-form-container .form-group {
        margin-bottom: 15px;
    }

    .edit-form-container label {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .edit-form-container input,
    .edit-form-container select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 14px;
    }

    .edit-form-container input:focus,
    .edit-form-container select:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    .btn-update {
        width: 100%;
        padding: 12px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-update:hover {
        background: #0056b3;
    }

    /* Change Password Tab Styles */
    .change-password-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .password-form-container {
        border: 2px solid #28a745;
        border-radius: 5px;
        overflow: hidden;
        background: white;
    }

    .password-header {
        background: #dc3545;
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .password-form {
        padding: 25px;
    }

    .password-form .form-group {
        margin-bottom: 15px;
    }

    .password-form label {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
        font-size: 14px;
    }

    .password-form input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 14px;
    }

    .password-form input:focus {
        outline: none;
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, .25);
    }

    .btn-change-password {
        width: 100%;
        padding: 12px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-change-password:hover {
        background: #218838;
    }

    .password-image-container {
        border: 2px solid #28a745;
        border-radius: 5px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
    }

    .password-image-container img {
        max-width: 100%;
        height: auto;
    }

    .error-text {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    .verify-link {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .verify-link:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {

        .profile-layout,
        .edit-profile-layout,
        .change-password-layout {
            grid-template-columns: 1fr;
        }

        .profile-header {
            grid-column: 1;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-tabs">
        <!-- Tab Headers -->
        <div class="tab-headers">
            <a href="#" class="tab-link active" data-tab="profile">Profile</a>
            <a href="#" class="tab-link" data-tab="edit-profile">Edit Profile</a>
            <a href="#" class="tab-link" data-tab="change-password">Change Password</a>
        </div>

        <!-- Profile Tab Content -->
        <div class="tab-content-area active" id="profile-tab">
            <div id="verifyEmailAlert"></div>
            <div class="profile-layout">
                <div class="profile-header">
                    User ID : <?= isset($cid) ? $cid : ''; ?>
                </div>

                <div class="profile-info">
                    <div class="info-field">
                        <label>Name :</label>
                        <span><?= isset($cfull) ? $cfull : ''; ?></span>
                    </div>

                    <div class="info-field">
                        <label>Gender :</label>
                        <span><?= isset($cgender) ? $cgender : ''; ?></span>
                    </div>

                    <div class="info-field">
                        <label>E-mail :</label>
                        <span><?= isset($cemail) ? $cemail : ''; ?></span>
                    </div>

                    <div class="info-field">
                        <label>Phone :</label>
                        <span><?= isset($cphone) ? $cphone : ''; ?></span>
                    </div>

                    <div class="info-field">
                        <label>Date Of Birth :</label>
                        <span><?= isset($cdob) ? $cdob : ''; ?></span>
                    </div>

                    <div class="info-field">
                        <label>Registered On :</label>
                        <span><?= isset($reg_on) ? $reg_on : ''; ?></span>
                    </div>

                    <div class="info-field">
                        <label>E-mail Verified :</label>
                        <span><?= isset($verified) ? $verified : ''; ?>
                            <?php if (isset($verified) && $verified == 'Not Verified!'): ?>
                                <a href="#" class="verify-link" id="verify-email">Verify Now</a>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>

                <div class="profile-avatar-container">
                    <?php if (isset($cphoto) && !empty($cphoto)): ?>
                        <img src="<?= 'https://mailerstation.com/assets/php/' . $cphoto; ?>" alt="Profile Photo">
                    <?php else: ?>
                        <img src="https://mailerstation.com/user/img/male.png" alt="Default Avatar">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Edit Profile Tab Content -->
        <div class="tab-content-area" id="edit-profile-tab">
            <div class="edit-profile-layout">
                <div class="edit-avatar-container">
                    <?php if (isset($cphoto) && !empty($cphoto)): ?>
                        <img src="<?= 'https://mailerstation.com/assets/php/' . $cphoto; ?>" alt="Profile Photo">
                    <?php else: ?>
                        <img src="https://mailerstation.com/user/img/male.png" alt="Default Avatar">
                    <?php endif; ?>
                </div>

                <div class="edit-form-container">
                    <form action="" method="post" enctype="multipart/form-data" id="profile-update-form">
                        <input type="hidden" name="oldimage" value="<?= isset($cphoto) ? $cphoto : ''; ?>">

                        <div class="form-group">
                            <label for="profilePhoto">Upload Profile Image</label>
                            <input type="file" name="image" id="profilePhoto" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" value="<?= isset($cfull) ? $cfull : ''; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" value="<?= isset($firstname) ? $firstname : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" value="<?= isset($cname) ? $cname : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender">
                                <option value="" disabled <?php if (!isset($cgender) || $cgender == null) {
                                                                echo 'selected';
                                                            } ?>>Select</option>
                                <option value="Male" <?php if (isset($cgender) && $cgender == 'Male') {
                                                            echo 'selected';
                                                        } ?>>Male</option>
                                <option value="Female" <?php if (isset($cgender) && $cgender == 'Female') {
                                                            echo 'selected';
                                                        } ?>>Female</option>
                                <option value="Other" <?php if (isset($cgender) && $cgender == 'Other') {
                                                            echo 'selected';
                                                        } ?>>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" id="dob" name="dob" value="<?= isset($cdob) ? $cdob : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" value="<?= isset($cphone) ? $cphone : ''; ?>" placeholder="Enter Phone Number">
                        </div>

                        <input type="hidden" name="profileId" value="<?= isset($cid) ? $cid : ''; ?>">
                        <button type="submit" class="btn-update" id="profileUpateBtn" name="profile_update">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Change Password Tab Content -->
        <div class="tab-content-area" id="change-password-tab">
            <div id="changepassAlert"></div>
            <div class="change-password-layout">
                <div class="password-form-container">
                    <div class="password-header">Change Your Password</div>
                    <div class="password-form">
                        <form action="#" method="post" id="change-pass-form">
                            <div class="form-group">
                                <label for="curpass">Enter Your Current Password</label>
                                <input type="password" name="curpass" id="curpass" placeholder="Current Password" required minlength="5">
                            </div>

                            <div class="form-group">
                                <label for="newpass">Enter Your New Password</label>
                                <input type="password" name="newpass" id="newpass" placeholder="New Password" required minlength="5">
                            </div>

                            <div class="form-group">
                                <label for="cnewpass">Confirm New Password</label>
                                <input type="password" name="cnewpass" id="cnewpass" placeholder="Confirm New Password" required minlength="5">
                            </div>

                            <p id="changepassError" class="error-text"></p>

                            <input type="hidden" name="profileId" value="<?= isset($cid) ? $cid : ''; ?>">
                            <button type="submit" name="changepass" class="btn-change-password" id="changePassBtn">Change Password</button>
                        </form>
                    </div>
                </div>

                <div class="password-image-container">
                    <img src="https://mailerstation.com/user/img/pass.png" alt="Security">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'php/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function() {
        // Tab switching functionality
        $('.tab-link').click(function(e) {
            e.preventDefault();

            // Remove active class from all tabs
            $('.tab-link').removeClass('active');
            $('.tab-content-area').removeClass('active');

            // Add active class to clicked tab
            $(this).addClass('active');
            var tabId = $(this).data('tab') + '-tab';
            $('#' + tabId).addClass('active');
        });

        //Profile update ajax request
        $("#profile-update-form").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: 'https://mailerstation.com/assets/php/action',
                type: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(response) {
                    location.reload();
                }
            });
        });

        //Change password ajax request
        $("#changePassBtn").click(function(e) {
            if ($("#change-pass-form")[0].checkValidity()) {
                e.preventDefault();

                $("#changePassBtn").text('Please wait...');

                if ($("#newpass").val() != $("#cnewpass").val()) {
                    $("#changepassError").text('* Password did not matched!');
                    $("#changePassBtn").text('Change Password');
                } else {
                    $.ajax({
                        url: 'https://mailerstation.com/assets/php/action',
                        type: 'post',
                        data: $("#change-pass-form").serialize() + '&action=change_pass',
                        success: function(response) {
                            $("#changepassAlert").html(response);
                            $("#changePassBtn").text('Change Password');
                            $("#changepassError").text('');
                            $("#change-pass-form")[0].reset();
                        }
                    });
                }
            }
        });

        //Verify Your E-mail of an user Ajax request
        $("#verify-email").click(function(e) {
            e.preventDefault();
            $(this).text('Please wait..');

            $.ajax({
                url: 'https://mailerstation.com/assets/php/action',
                type: 'post',
                data: {
                    action: 'verify_email'
                },
                success: function(response) {
                    $("#verifyEmailAlert").html(response);
                    $("#verify-email").text('Verify Now');
                }
            });
        });

        //Check Notification of an user
        checkNotification();

        function checkNotification() {
            $.ajax({
                url: 'assets/php/process.php',
                type: 'post',
                data: {
                    action: 'checkNotification'
                },
                success: function(response) {
                    $("#checkNotification").html(response);
                }
            });
        }
    });
</script>