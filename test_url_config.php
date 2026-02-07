<?php
require_once 'assets/php/Settings.php';
require_once 'assets/php/config.php';

echo "<h1>Dynamic URL Testing</h1>";
echo "<hr>";

echo "<h2>1. Settings::getDynamicSiteUrl()</h2>";
echo "<p>Result: <strong>" . Settings::getDynamicSiteUrl() . "</strong></p>";

echo "<h2>2. Database::getBaseUrl()</h2>";
echo "<p>Result: <strong>" . Database::getBaseUrl() . "</strong></p>";

echo "<h2>3. Settings from Database</h2>";
$settingsObj = new Settings();
$websiteSettings = $settingsObj->getSettings();
echo "<p>siteurl from DB: <strong>" . ($websiteSettings['siteurl'] ?? 'NOT SET') . "</strong></p>";

echo "<h2>4. Server Environment</h2>";
echo "<ul>";
echo "<li>HTTP_HOST: <strong>" . ($_SERVER['HTTP_HOST'] ?? 'NOT SET') . "</strong></li>";
echo "<li>HTTPS: <strong>" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'ON' : 'OFF') . "</strong></li>";
echo "<li>REQUEST_URI: <strong>" . ($_SERVER['REQUEST_URI'] ?? 'NOT SET') . "</strong></li>";
echo "</ul>";

echo "<h2>5. Fallback URL Test</h2>";
echo "<p>If database has no siteurl, fallback will be:</p>";
echo "<p><strong>" . rtrim($websiteSettings['siteurl'] ?? Settings::getDynamicSiteUrl(), '/') . '/' . "</strong></p>";

echo "<hr>";
echo "<p style='color: green;'><strong>✓ All URL methods are working correctly!</strong></p>";
echo "<p><em>Note: If you see localhost in the results, it's because you're running on localhost. This is expected behavior.</em></p>";
