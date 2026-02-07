<?php
require_once 'assets/php/Settings.php';
$settings = new Settings();
$data = $settings->getSettings();
echo "Current Site URL in DB: [" . $data['siteurl'] . "]";
