<?php
$siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/emailbigdata.com/';
header('Location:' . $siteUrl . 'email-list-database/ceo');
