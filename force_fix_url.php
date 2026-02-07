<?php
require_once 'assets/php/config.php';

class FixUrl extends Database
{
    public function fix()
    {
        $sql = "UPDATE website_settings SET siteurl = :siteurl";
        $stmt = $this->conn->prepare($sql);
        // Correct URL without subfolder
        $stmt->execute(['siteurl' => 'http://emailbigdata.com.test/']);
        echo "Site URL updated to http://emailbigdata.com.test/";
    }
}

$fixer = new FixUrl();
$fixer->fix();
