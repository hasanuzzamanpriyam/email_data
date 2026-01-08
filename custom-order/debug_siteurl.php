<?php
include_once '../assets/php/header.php';
echo "Site URL: [" . $siteUrl . "]<br>";
echo "Doc Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "Project Root Path: " . dirname(dirname(__DIR__)) . "<br>";
?>