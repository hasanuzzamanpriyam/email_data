include('product-template.php');
exit;
if (file_exists('product-template.php')) {
    include('product-template.php');
    exit;
} else {
    echo "Product template not found.";
    exit;
}
