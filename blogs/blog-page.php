<?php
require_once '../assets/php/auth.php';
$user = new Auth();
$siteUrl = 'https://emailbigdata.com/';

// Safe slug function with null fix and fallback
function slugify($text, string $divider = '-') {
    $text = (string) $text; // Fix: Prevent null warning
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, $divider);
    $text = preg_replace('~-+~', $divider, $text);
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

$record_per_page = 5;
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$start_from = ($page - 1) * $record_per_page;

$output = '';

// Get paginated blog data
$result = $user->get_blogs_records($start_from, $record_per_page);

if (!empty($result)) {
    foreach ($result as $row) {
        $day = date("d", strtotime($row['created_at']));
        $month = date("M", strtotime($row['created_at']));
        $title = slugify($row['title']);
        if ($title === 'n-a') {
            $title = 'post-' . $row['id'];
        }

        $output .= '<li class="iconic-content iconic-content--blog-post">
            <div class="iconic-content__icon-area iconic-content__icon-area--medium">
                <time class="blog-post-date" datetime="' . $row['created_at'] . '">
                    <span class="blog-post-date__day">' . $day . '</span>
                    <span class="blog-post-date__month">' . $month . '</span>
                </time>
            </div>
            <div class="iconic-content__content">
                <h4 class="iconic-content__title iconic-content__title--primary mb-3">
                <a class="link-tertiary" href="' . $siteUrl . 'blog/' . $row['seo_url'] . '">' . htmlspecialchars($row['title'] ?? '') . '</a>

                </h4>
                <hr class="hr-small">
                <p class="gap-bottom-small">' . substr(strip_tags($row['description']), 0, 350) . '..</p>
<a class="button button--tertiary" href="' . $siteUrl . 'blog/' . $row['seo_url'] . '">

    Read More <i class="icon icon-arrow-forward button--tertiary__icon"></i>
</a>


                <hr class="hr-large">
            </div>
        </li>';
    }

    // Pagination logic
    $output .= "<div class='pad-vertical-small container'>
        <h6 class='pagination-title'>Page</h6>
        <div class='pagination inline-block align-middle'>";

    $all_blogs = $user->get_blogs();
    $total_records = count($all_blogs);
    $total_pages = ceil($total_records / $record_per_page);

    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page) ? "is-active" : "";
        $output .= "<button class='pagination__item $active' id='$i' style='background: none;'>$i</button>";
    }

    $output .= '</div></div>';
    echo $output;
} else {
    echo '<h3 class="text-center text-secondary">No record Found!</h3>';
    exit;
}
?>