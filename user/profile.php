<?php
    require_once 'php/header.php';
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card rounded-0 mt-3 border-primary">
                    <div class="card-header border-primary">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active font-weight-bold" data-toggle="tab">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a href="#editProfile" class="nav-link font-weight-bold" data-toggle="tab">Edit Profile</a>
                            </li>

                            <li class="nav-item">
                                <a href="#changePass" class="nav-link font-weight-bold" data-toggle="tab">Change Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                        <!-- Profile Tab Content Start -->
                            <div class="tab-pane container active" id="profile">
                                <div id="verifyEmailAlert"></div>
                                <div class="card-deck">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-light text-center lead">
                                            User ID : <?= $cid;?>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text p-2 m-1 rounded"style="border: 1px solid #0275d8;"><b>Name : </b><?= $cfull;?></p>

                                            <p class="card-text p-2 m-1 rounded"style="border: 1px solid #0275d8;"><b>E-mail : </b><?= $cemail;?></p>

                                            <p class="card-text p-2 m-1 rounded"style="border: 1px solid #0275d8;"><b>Gender : </b><?= $cgender;?></p>

                                            <p class="card-text p-2 m-1 rounded"style="border: 1px solid #0275d8;"><b>Date Of Birth : </b><?= $cdob;?></p>

                                            <p class="card-text p-2 m-1 rounded"style="border: 1px solid #0275d8;"><b>Phone : </b><?= $cphone;?></p>

                                            <p class="card-text p-2 m-1 rounded"style="border: 1px solid #0275d8;"><b>Registered On : </b><?= $reg_on;?></p>

                                            <p class="card-text p-2 m-1 rounded"style="border: 1px solid #0275d8;"><b>E-mail Verified : </b><?= $verified;?>
                                            <?php if($verified == 'Not Verified!'): ?>
                                            <a href="#" class="float-right" id="verify-email">Verify Now</a>
                                            <?php endif;?>
                                            </p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="card border-primary align-self-center">
                                        <?php if(!$cphoto):?>
                                        <img src="https://mailerstation.com/user/img/male.png" alt="" class="img-thumbnail img-fluid align-self-center" width="408px">
                                        <?php else:?>
                                            <img src="<?= 'https://mailerstation.com/assets/php/'.$cphoto; ?>" alt="" class="img-thumbnail img-fluid align-self-center" width="408px" >
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile Tab Content End -->
                            <!-- Edit Profile Tab Content Start -->
                            <div class="tab-pane container fade" id="editProfile">
                                <div class="card-deck">
                                    <div class="card border-danger align-self-center">
                                        <?php if(!$cphoto):?>
                                        <img src="https://mailerstation.com/user/img/male.png" alt="" class="img-thumbnail img-fluid align-self-center" width="408px">
                                        <?php else:?>
                                            <img src="<?= 'https://mailerstation.com/assets/php/'.$cphoto; ?>" alt="" class="img-thumbnail img-fluid align-self-center" width="408px" >
                                        <?php endif;?>
                                    </div>
                                    <div class="card border-danger">
                                        <form action="" method="post" class="px-3 mt-2" enctype="multipart/form-data" id="profile-update-form">
                                            <input type="hidden" name="oldimage" value="<?= $cphoto; ?>">
                                            <div class="form-group m-0">
                                                <label for="profilePhoto" class="m-1">Upload Profile Image</label>
                                                <input type="file" name="image" id="profilePhoto">
                                            </div>

                                            <div class="form-group m-0">
                                                <label for="name" class="m-1">Full Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="<?= $cfull; ?>" readonly>
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="name" class="m-1">First Name</label>
                                                <input type="text" name="fname" id="fname" class="form-control" value="<?= $firstname; ?>">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="name" class="m-1">Last Name</label>
                                                <input type="text" name="lname" id="lname" class="form-control" value="<?= $cname; ?>">
                                            </div>

                                            <div class="form-group m-0">
                                                <label for="gender" class="m-1">Genger</label>
                                                <select name="gender" id="gender" class="form-control">
                                                <option value="" disabled <?php if($cgender == null){echo 'selected';}?>>Select</option>
                                                <option value="Male"  <?php if($cgender == 'Male'){echo 'selected';}?>>Male</option>
                                                <option value="Female"  <?php if($cgender == 'Female'){echo 'selected';}?>>Female</option>
                                                <option value="Other"  <?php if($cgender == 'Other'){echo 'selected';}?>>Other</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="dob" class="m-1">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob" value="<?= $cdob; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="m-1">Phone</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $cphone; ?>" placeholder ="Enter Phone Number">
                                            </div>

                                            <div class="form-group mt-2">
                                                <input type="hidden" name="profileId" value="<?= $cid;?>" >
                                                <input type="submit" class="btn btn-primary btn-block" id="profileUpateBtn" name="profile_update" value="Update Profile">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Profile Tab Content End -->
                            <!-- Change Password Profile Tab Content Start --> 
                            <div class="tab-pane container fade" id="changePass">
                                <div id="changepassAlert"></div>
                                <div class="card-deck">
                                    <div class="card border-success">
                                        <div class="card-header bg-danger text-white text-center lead">Change Your Password</div>
                                        <form action="#" method="post" class="px-3 mt-2" id="change-pass-form">
                                            <div class="form-group">
                                                <label for="curpass">Enter Your Current Password</label>
                                                <input type="password" name="curpass" id="curpass" class="form-control form-control-lg" placeholder="Current Password" required minlength="5">
                                            </div>

                                            <div class="form-group">
                                                <label for="curpass">Enter Your New Password</label>
                                                <input type="password" name="newpass" id="newpass" class="form-control form-control-lg" placeholder="New Password" required minlength="5">
                                            </div>

                                            <div class="form-group">
                                                <label for="curpass">Confirm New Password</label>
                                                <input type="password" name="cnewpass" id="cnewpass" class="form-control form-control-lg" placeholder="Confirm New Password" required minlength="5">
                                            </div>
                                            <div class="form-group">
                                            <p id="changepassError" class="text-danger text-center"></p>
                                            </div>
                                            <div class="form-group">
                                            <input type="hidden" name="profileId" value="<?= $cid;?>" >
                                            <input type="submit" name="changepass" value="Change Password" class="btn btn-success btn-block btn-lg" id="changePassBtn">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card border-success align-self-center">
                                    <img src="https://mailerstation.com/user/img/pass.png" alt="" class="img-thumbnail img-fluid align-self-center" width="408px">
                                    </div>
                                </div>
                            </div>
                            <!-- Change Password Profile Tab Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once 'php/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function(){

        //Profile update ajax request
        $("#profile-update-form").submit(function(e){
            e.preventDefault();

            $.ajax({
                url: 'https://mailerstation.com/assets/php/action',
                type: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(response){
                    location.reload();
                }
            });
        });
        //Change password ajax request
        $("#changePassBtn").click(function(e){
            if($("#change-pass-form")[0].checkValidity()){
                e.preventDefault();

                $("#changePassBtn").val('Please wait...');

                if($("#newpass").val() != $("#cnewpass").val()){
                    $("#changepassError").text('* Password did not matched!');
                    $("#changePassBtn").val('Change Password');
                }else{
                    $.ajax({
                        url: 'https://mailerstation.com/assets/php/action',
                        type: 'post',
                        data: $("#change-pass-form").serialize()+'&action=change_pass',
                        success: function(response){
                            $("#changepassAlert").html(response);
                            $("#changePassBtn").val('Change Password');
                            $("#changepassError").text('');
                            $("#change-pass-form")[0].reset();
                        }
                    });
                }
            }
        });
        //Verify Your E-mail of an user Ajax request
        $("#verify-email").click(function(e){
            e.preventDefault();
            $(this).text('Please wait..');

            $.ajax({
                url: 'https://mailerstation.com/assets/php/action',
                type: 'post',
                data: { action: 'verify_email'},
                success: function(response){
                    $("#verifyEmailAlert").html(response);
                    $("#verify-email").text('Verify Now');
                }
            });
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