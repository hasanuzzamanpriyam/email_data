<?php
require_once 'assets/php/config.php';
require_once 'assets/php/Settings.php';

$settings = new Settings();
// Hardcode the desired URL here to fix it
$newUrl = 'https://emailbigdata.com/';

// We need to get existing values to avoid overwriting them with blanks, 
// since updateSettings takes all params.
$current = $settings->getSettings();

if ($current) {
    $result = $settings->updateSettings(
        $current['site_name'],
        $current['logo_path'],
        $current['favicon_path'],
        $newUrl,
        $current['adminemail']
    );

    if ($result) {
        echo "Successfully updated site_url to: " . $newUrl;
    } else {
        echo "Failed to update settings.";
    }
} else {
    echo "Could not fetch current settings to update.";
}
