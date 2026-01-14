<?php

$requestUri = $_SERVER['REQUEST_URI'];

// Remove query string
$path = parse_url($requestUri, PHP_URL_PATH);

// Remove leading and trailing slashes
$path = trim($path, '/');

// Explode the path
$parts = explode('/', $path);

// Example URL: /ready-made/international/germany-email-list
// Adjust parts index if project is in a subdirectory (e.g. localhost/emailbigdata.com/)
// If $path is "emailbigdata.com/ready-made/...", then parts[0] is emailbigdata.com
// Let's normalize. 
// Assumption based on existing file: it expects parts[0] to be ready-made. 
// If specific setup requires checking parts, we stick to existing logic but maybe check if parts[0] is project folder?
// Existing logic: if (count($parts) === 3 && $parts[0] === 'ready-made')
// This implies the site is served from root or virtual host properly masking the folder?
// Wait, in previous turn I saw: `d:\laragon\www\emailbigdata.com\ready-made.php`
// If url is `localhost/emailbigdata.com/ready-made/...`, then parts[0] = 'emailbigdata.com', parts[1] = 'ready-made'.
// IMPORTANT: I should make this robust.

$startIndex = 0;
if (isset($parts[0]) && $parts[0] === 'emailbigdata.com') {
    $startIndex = 1;
}

if (count($parts) > $startIndex && $parts[$startIndex] === 'ready-made') {

    // Product Page: /ready-made/category/product-slug
    if (isset($parts[$startIndex + 2])) {
        $_GET['slug'] = $parts[$startIndex + 2];
        $_GET['cat'] = $parts[$startIndex + 2]; // For header.php compatibility if needed
        include('product-template.php');
        exit;
    }
    // Category Page: /ready-made/category
    elseif (isset($parts[$startIndex + 1])) {
        // Fallback for category page.
        // If category-template.php is broken, maybe we use product-template for listing too?
        // Or just fix category-template.php later. 
        // For now, let's just make it valid PHP.
        $_GET['cat'] = $parts[$startIndex + 1];
        include('category-template.php');
        exit;
    }
}

// Default/Error case
echo "404 - Page not found.";
exit;
