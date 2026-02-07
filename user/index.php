<?php
require_once '../assets/php/Settings.php';
$settingsObj = new Settings();
$websiteSettings = $settingsObj->getSettings();
$siteUrl = rtrim($websiteSettings['siteurl'] ?? Settings::getDynamicSiteUrl(), '/') . '/';

header('Location:' . $siteUrl . 'user/order');
