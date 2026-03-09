<?php
require_once 'assets/php/config.php';

$database = new Database();
$pdo = $database->conn;

try {
    // Get all slugs from the database
    $stmt = $pdo->prepare("SELECT id, title, seo_url FROM email_short_info WHERE seo_url IS NOT NULL AND seo_url != ''");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $updated = 0;
    $slugMap = [];

    // Words to remove for cleaner slugs
    $stopWords = ['and', 'the', 'a', 'an', 'or', 'of', 'in', 'at', 'by', 'for', 'to', 'from', 'with', 'email', 'list', 'lists', 'mailing', 'database', 'buy', 'download'];

    foreach ($rows as $row) {
        $id = $row['id'];
        $title = $row['title'];
        $oldSlug = $row['seo_url'];

        // Parse the slug into words
        $parts = explode('-', $oldSlug);

        // Filter out stop words and duplicates
        $filtered = [];
        foreach ($parts as $part) {
            $part = strtolower(trim($part));
            if (!empty($part) && !in_array($part, $stopWords) && !in_array($part, $filtered)) {
                $filtered[] = $part;
            }
        }

        // Keep only first 3 meaningful words
        $filtered = array_slice($filtered, 0, 3);

        // If less than 2 words, use all meaningful words
        if (count($filtered) < 2) {
            $filtered = [];
            foreach ($parts as $part) {
                $part = strtolower(trim($part));
                if (!empty($part) && !in_array($part, $filtered)) {
                    $filtered[] = $part;
                }
            }
            $filtered = array_slice($filtered, 0, 3);
        }

        $newSlug = implode('-', $filtered);
        $newSlug = strtolower(trim($newSlug));

        // If still empty, generate from title
        if (empty($newSlug) && !empty($title)) {
            $titleParts = explode(' ', strtolower($title));
            $filtered = [];
            foreach ($titleParts as $part) {
                $part = preg_replace('/[^a-z0-9]+/', '', $part);
                if (!empty($part) && !in_array($part, $stopWords) && !in_array($part, $filtered)) {
                    $filtered[] = $part;
                }
            }
            $newSlug = implode('-', array_slice($filtered, 0, 3));
        }

        // Check for duplicates
        if (!isset($slugMap[$newSlug])) {
            $slugMap[$newSlug] = $id;
        } else {
            // If duplicate, append ID to make unique
            $newSlug = $newSlug . '-' . $id;
            $slugMap[$newSlug] = $id;
        }

        // Only update if the slug has changed
        if ($newSlug !== $oldSlug && !empty($newSlug)) {
            $updateStmt = $pdo->prepare("UPDATE email_short_info SET seo_url = ? WHERE id = ?");
            $updateStmt->execute([$newSlug, $id]);
            $updated++;
            echo "✓ ID $id: '$oldSlug' → '$newSlug'\n";
        }
    }

    echo "\n✓ Total slugs shortened: $updated\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
