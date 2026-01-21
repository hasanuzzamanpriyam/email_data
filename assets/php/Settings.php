<?php

class Settings extends Database
{
    /**
     * Get all website settings
     */
    public function getSettings()
    {
        try {
            $sql = "SELECT * FROM website_settings WHERE id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Return defaults if no settings found
            if (!$result) {
                return [
                    'site_name' => 'Email Big Data',
                    'logo_path' => 'bundles/bydhome/img/bookyourdata-logo.svg',
                    'favicon_path' => 'web-logo.ico',
                    'siteurl' => 'http://localhost/emailbigdata.com/',
                    'adminemail' => 'admin@emailbigdata.com'
                ];
            }

            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Update website settings
     */
    public function updateSettings($site_name, $logo_path, $favicon_path, $siteurl, $adminemail)
    {
        try {
            $sql = "UPDATE website_settings 
                    SET site_name = :site_name,
                        logo_path = :logo_path,
                        favicon_path = :favicon_path,
                        siteurl = :siteurl,
                        adminemail = :adminemail
                    WHERE id = 1";

            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([
                'site_name' => $site_name,
                'logo_path' => $logo_path,
                'favicon_path' => $favicon_path,
                'siteurl' => $siteurl,
                'adminemail' => $adminemail
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
