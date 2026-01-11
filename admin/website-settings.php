<?php
require_once 'assets/php/header.php';
require_once dirname(__DIR__) . '/assets/php/config.php';


$db = new Database();
$conn = $db->conn;


// Fetch current settings
$currentSiteUrl = '';
$currentAdminEmail = '';
$stmt = $conn->prepare("SELECT siteurl, adminemail FROM website_settings WHERE id = 1");
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentSiteUrl = $row['siteurl'];
    $currentAdminEmail = $row['adminemail'];
}

$successMessage = $errorMessage = '';

if (isset($_POST['websitesettings'])) {
    $siteurl = trim($_POST['siteurl']);
    $adminemail = trim($_POST['adminemail']);

    if (!empty($siteurl) && !empty($adminemail)) {
        // Prepare statement for update
        $stmt = $conn->prepare("UPDATE website_settings SET siteurl = :siteurl, adminemail = :adminemail WHERE id = 1");
        $stmt->bindValue(':siteurl', $siteurl);
        $stmt->bindValue(':adminemail', $adminemail);

        if ($stmt->execute()) {
            $successMessage = "Settings updated successfully!";
            $currentSiteUrl = $siteurl;
            $currentAdminEmail = $adminemail;
        } else {
            $errorMessage = "Error updating settings. Please try again.";
        }
    } else {
        $errorMessage = "Please fill all fields.";
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
        <form method="POST" action="">
            <div class="form-row">
                <div class="col-md-6 mb-4">
                    <label for="siteurl">Site URL</label>
                    <input type="text" class="form-control" id="siteurl" name="siteurl" 
                           placeholder="Ex: https://yourdomain.com" 
                           value="<?php echo htmlspecialchars($currentSiteUrl); ?>" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="adminemail">Admin Email</label>
                    <input type="email" class="form-control" id="adminemail" placeholder="Admin Email" 
                           name="adminemail" value="<?php echo htmlspecialchars($currentAdminEmail); ?>" required>
                </div>
            </div>
            <button class="btn btn-secondary" name="websitesettings" type="submit">Update Settings</button>
        </form> 
    </div>
</main>
<?php
require_once 'assets/php/footer.php';
?>