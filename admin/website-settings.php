<?php
require_once 'assets/php/header.php';
require_once dirname(__DIR__) . '/assets/php/config.php';
require_once dirname(__DIR__) . '/assets/php/Settings.php';

$db = new Database();
$conn = $db->conn;
$settings = new Settings();

// Fetch current settings
$currentSettings = $settings->getSettings();
$currentSiteUrl = $currentSettings['siteurl'] ?? '';
$currentAdminEmail = $currentSettings['adminemail'] ?? '';
$currentSiteName = $currentSettings['site_name'] ?? 'Email Big Data';
$currentLogoPath = $currentSettings['logo_path'] ?? 'bundles/bydhome/img/bookyourdata-logo.svg';
$currentFaviconPath = $currentSettings['favicon_path'] ?? 'web-logo.ico';

$successMessage = $errorMessage = '';

if (isset($_POST['update_profile'])) {
    $adminname = trim($_POST['adminname']);
    $oldimage = $_POST['oldimage'];
    $adminphoto = $oldimage;

    if (isset($_FILES['adminphoto']['name']) && $_FILES['adminphoto']['name'] != '') {
        $newImageName = uniqid() . '_' . $_FILES['adminphoto']['name'];
        $target = 'assets/uploads/' . $newImageName;
        if (move_uploaded_file($_FILES['adminphoto']['tmp_name'], $target)) {
            $adminphoto = $target;
        }
    }

    if ($cuser->update_admin_profile($adminname, $adminphoto, $cid)) {
        $successMessage = "Profile updated successfully!";
        echo "<meta http-equiv='refresh' content='0'>";
        exit;
    } else {
        $errorMessage = "Error updating profile.";
    }
}

if (isset($_POST['websitesettings'])) {
    $siteurl = trim($_POST['siteurl']);
    $adminemail = trim($_POST['adminemail']);
    $site_name = trim($_POST['site_name']);

    // Handle logo upload
    $logo_path = $currentLogoPath;
    if (isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != '') {
        $allowed_logo_types = ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml'];
        $logo_file_type = $_FILES['logo']['type'];
        $logo_file_size = $_FILES['logo']['size'];

        if (in_array($logo_file_type, $allowed_logo_types) && $logo_file_size <= 2097152) { // 2MB limit
            $logo_extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $newLogoName = 'logo_' . uniqid() . '.' . $logo_extension;
            $logo_target = '../assets/uploads/' . $newLogoName;

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $logo_target)) {
                $logo_path = 'assets/uploads/' . $newLogoName;
            } else {
                $errorMessage = "Failed to upload logo file.";
            }
        } else {
            $errorMessage = "Invalid logo file. Use PNG, JPG, or SVG (max 2MB).";
        }
    }

    // Handle favicon upload
    $favicon_path = $currentFaviconPath;
    if (isset($_FILES['favicon']['name']) && $_FILES['favicon']['name'] != '') {
        $allowed_favicon_types = ['image/x-icon', 'image/vnd.microsoft.icon', 'image/png'];
        $favicon_file_type = $_FILES['favicon']['type'];
        $favicon_file_size = $_FILES['favicon']['size'];

        if (in_array($favicon_file_type, $allowed_favicon_types) && $favicon_file_size <= 1048576) { // 1MB limit
            $favicon_extension = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
            $newFaviconName = 'favicon_' . uniqid() . '.' . $favicon_extension;
            $favicon_target = '../assets/uploads/' . $newFaviconName;

            if (move_uploaded_file($_FILES['favicon']['tmp_name'], $favicon_target)) {
                $favicon_path = 'assets/uploads/' . $newFaviconName;
            } else {
                $errorMessage = "Failed to upload favicon file.";
            }
        } else {
            $errorMessage = "Invalid favicon file. Use ICO or PNG (max 1MB).";
        }
    }

    if (!empty($siteurl) && !empty($adminemail) && !empty($site_name) && empty($errorMessage)) {
        if ($settings->updateSettings($site_name, $logo_path, $favicon_path, $siteurl, $adminemail)) {
            $successMessage = "Settings updated successfully!";
            $currentSiteUrl = $siteurl;
            $currentAdminEmail = $adminemail;
            $currentSiteName = $site_name;
            $currentLogoPath = $logo_path;
            $currentFaviconPath = $favicon_path;
        } else {
            $errorMessage = "Error updating settings. Please try again.";
        }
    } elseif (empty($errorMessage)) {
        $errorMessage = "Please fill all required fields.";
    }
}
?>
<main>
    <h2 class="dashboard-title">Website Settings</h2>
    <div class="col-md-10">

        <!-- Show Success / Error Messages -->
        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $successMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMessage; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Settings Form -->
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-6 mb-4">
                    <label for="site_name">Site Name</label>
                    <input type="text" class="form-control" id="site_name" name="site_name"
                        placeholder="Ex: Email Big Data"
                        value="<?php echo htmlspecialchars($currentSiteName); ?>" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="siteurl">Site URL</label>
                    <input type="text" class="form-control" id="siteurl" name="siteurl"
                        placeholder="Ex: https://yourdomain.com/"
                        value="<?php echo htmlspecialchars($currentSiteUrl); ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-4">
                    <label for="adminemail">Admin Email</label>
                    <input type="email" class="form-control" id="adminemail" placeholder="Admin Email"
                        name="adminemail" value="<?php echo htmlspecialchars($currentAdminEmail); ?>" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="logo">Website Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept=".png,.jpg,.jpeg,.svg">
                    <small class="form-text text-muted">PNG, JPG, or SVG (max 2MB)</small>
                    <?php if ($currentLogoPath): ?>
                        <div class="mt-2">
                            <strong>Current Logo:</strong><br>
                            <img src="<?php echo '../' . $currentLogoPath; ?>" alt="Current Logo" style="max-width: 200px; max-height: 100px;">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-4">
                    <label for="favicon">Website Favicon</label>
                    <input type="file" class="form-control" id="favicon" name="favicon" accept=".ico,.png">
                    <small class="form-text text-muted">ICO or PNG (max 1MB, recommended 16x16 or 32x32)</small>
                    <?php if ($currentFaviconPath): ?>
                        <div class="mt-2">
                            <strong>Current Favicon:</strong><br>
                            <img src="<?php echo '../' . $currentFaviconPath; ?>" alt="Current Favicon" style="width: 32px; height: 32px;">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <button class="btn btn-secondary" name="websitesettings" type="submit">Update Settings</button>
        </form>

        <hr>

        <h3 class="mt-5">Admin Profile Settings</h3>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="oldimage" value="<?php echo $cphoto; ?>">
            <div class="form-row">
                <div class="col-md-6 mb-4">
                    <label for="adminname">Admin Name</label>
                    <input type="text" class="form-control" id="adminname" name="adminname"
                        placeholder="Enter Name"
                        value="<?php echo htmlspecialchars($cname); ?>" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="adminphoto">Profile Photo</label>
                    <input type="file" class="form-control" id="adminphoto" name="adminphoto">
                    <?php if ($cphoto): ?>
                        <div class="mt-2">
                            <img src="<?php echo $cphoto; ?>" alt="Current Photo" width="100">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <button class="btn btn-primary" name="update_profile" type="submit">Update Profile</button>
        </form>
    </div>
</main>
<?php
require_once 'assets/php/footer.php';
?>