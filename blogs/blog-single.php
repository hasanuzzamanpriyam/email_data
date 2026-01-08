<?php
require_once '../assets/php/auth.php';
$user = new Auth();

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    echo "<h3 class='text-center text-danger'>Invalid blog ID</h3>";
    exit;
}

$post = $user->getBlogById($id);

if (!$post) {
    echo "<h3 class='text-center text-danger'>Blog not found!</h3>";
    exit;
}

echo '<div class="iconic-content iconic-content--blog-post">';
echo '<h2>' . htmlspecialchars($post['title'] ?? '') . '</h2>';
echo '<div class="blog-description">' . ($post['description'] ?? '') . '</div>';
echo '<hr>';
echo '<button class="button button--secondary" id="backToList">← Back to All Blogs</button>';
echo '</div>';
?>