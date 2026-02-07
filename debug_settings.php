<?php
require_once 'assets/php/config.php';
require_once 'assets/php/Settings.php';
$settings = new Settings();
$data = $settings->getSettings();
echo "<pre>";
print_r($data);
echo "</pre>";
