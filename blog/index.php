<?php
require_once '../assets/php/auth.php';
$user = new Auth();
include_once '../assets/php/header.php';

// Check if this is a category listing or single post
$type = $_GET['type'] ?? '';
$slug = $_GET['slug'] ?? '';
$category = $_GET['category'] ?? '';

// Handle category listing
if ($type === 'category' && $category) {
    // Pagination setup
    $record_per_page = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start_from = ($page - 1) * $record_per_page;

    // Fetch blogs by category
    $blogs = $user->get_blogs_by_category($category, $start_from, $record_per_page);
    $total_blogs = $user->count_blogs_by_category($category);
    $total_pages = ceil($total_blogs / $record_per_page);

    if (empty($blogs)) {
        echo "<h3 class='text-center text-danger'>No blogs found in this category</h3>";
        exit;
    }
?>

    <div class="jumbotron jumbotron--regular jumbotron--regular-bg">
        <div class="container jumbotron__container">
            <div class="jumbotron__inner">
                <div class="row">
                    <div class="col-md-5">
                        <h1 class="jumbotron__title">Category: <?= htmlspecialchars($category) ?></h1>
                        <div class="breadbrumb">
                            <a href="<?= $siteUrl ?>" class="breadbrumb__item">Home</a>
                            <a href="<?= $siteUrl ?>blogs" class="breadbrumb__item">Blogs</a>
                            <span class="breadbrumb__item"><?= htmlspecialchars($category) ?></span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p class="clear-gap-bottom">Browse articles in the <?= htmlspecialchars($category) ?> category.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="container section">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list">
                        <?php foreach ($blogs as $blog):
                            $day = date("d", strtotime($blog['created_at']));
                            $month = date("M", strtotime($blog['created_at']));
                        ?>
                            <li class="iconic-content iconic-content--blog-post">
                                <div class="iconic-content__icon-area iconic-content__icon-area--medium">
                                    <time class="blog-post-date" datetime="<?= $blog['created_at'] ?>">
                                        <span class="blog-post-date__day"><?= $day ?></span>
                                        <span class="blog-post-date__month"><?= $month ?></span>
                                    </time>
                                </div>
                                <div class="iconic-content__content">
                                    <h4 class="iconic-content__title iconic-content__title--primary mb-3">
                                        <a class="link-tertiary" href="<?= $siteUrl . 'blog/' . $blog['seo_url'] ?>">
                                            <?= htmlspecialchars($blog['title'] ?? '') ?>
                                        </a>
                                    </h4>
                                    <hr class="hr-small">
                                    <p class="gap-bottom-small"><?= substr(strip_tags($blog['description']), 0, 350) ?>..</p>
                                    <a class="button button--tertiary" href="<?= $siteUrl . 'blog/' . $blog['seo_url'] ?>">
                                        Read More <i class="icon icon-arrow-forward button--tertiary__icon"></i>
                                    </a>
                                    <hr class="hr-large">
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <?php if ($total_pages > 1): ?>
                        <div class="pad-vertical-small container">
                            <h6 class="pagination-title">Page</h6>
                            <div class="pagination inline-block align-middle">
                                <?php for ($i = 1; $i <= $total_pages; $i++):
                                    $active = ($i == $page) ? "is-active" : "";
                                ?>
                                    <a href="<?= $siteUrl . 'blog/category/' . urlencode($category) . '?page=' . $i ?>"
                                        class="pagination__item <?= $active ?>"><?= $i ?></a>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 pad-top-tld">
                    <?php
                    $categories = $seo->get_blog_categories();
                    ?>
                    <ul class="list list--tertiary shadow-primary gap-bottom">
                        <li class="list__item">
                            <h6 class="secondary-title font-xsmall">Categories</h6>
                        </li>
                        <li class="list__item list--tertiary__item--no-pad">
                            <div class="sidebar-nav sidebar-nav--without-icon">
                                <?php foreach ($categories as $cat): ?>
                                    <a class="sidebar-nav__item" href="<?= $siteUrl . 'blog/category/' . urlencode($cat['category']); ?>">
                                        <?= htmlspecialchars($cat['category']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    </ul>

                    <?php
                    $recentPosts = $seo->get_recent_blogs(5);
                    ?>
                    <ul class="list list--tertiary shadow-primary gap-bottom">
                        <li class="list__item">
                            <h6 class="secondary-title font-xsmall">Recent Posts</h6>
                        </li>
                        <li class="list__item list--tertiary__item--no-pad">
                            <div class="sidebar-nav">
                                <?php foreach ($recentPosts as $post): ?>
                                    <a class="sidebar-nav__item" href="<?= $siteUrl . 'blog/' . htmlspecialchars($post['seo_url']); ?>">
                                        <?= htmlspecialchars($post['title']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    </ul>

                    <ul class="list list--tertiary shadow-primary gap-bottom">
                        <li class="list__item">
                            <h6 class="secondary-title font-xsmall">Newsletter</h6>
                            <p class="clear-gap-bottom">Subscribe to our email newsletter for useful articles and valuable resources.</p>
                        </li>
                        <li class="list__item">
                            <form class="form form-single-line ajaxRequest" data-input="newsletter_input" action="/newsletter/save" method="POST">
                                <input class="form-single-line__input form__control" id="newsletter_input" type="email" name="email" placeholder="name@email.com">
                                <button class="form-single-line__submit" type="submit"><i class="icon icon-arrow-forward"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="hr-line">

        <div class="lead hidden-dd">
            <div class="container lead__container">
                <div class="lead__col lead__col--left">
                    <h5 class="lead__text gap-bottom-tld">Ready To Boost Your Sales Like Your Competitors? Try Our Tool For Free.</h5>
                </div>
                <div class="lead__col lead__col--right">
                    <a class="button button--quaternary full-width" href="<?= $siteUrl ?>tool/business">
                        Custom Order <i class="icon icon-arrow-forward button--quaternary__icon"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <?php include_once '../assets/php/footer.php'; ?>

<?php
    exit; // Exit after rendering category page
}

// Handle single post view (original logic)
if (!$slug) {
    echo "<h3 class='text-center text-danger'>Invalid blog URL</h3>";
    exit;
}

$post = $user->getBlogBySlug($slug);

if (!$post) {
    echo "<h3 class='text-center text-danger'>Blog not found Please check the url or contact support</h3>";
    exit;
}
// Default image
$default_image = '../assets/images/default-image.PNG';

// Function to extract first image
function getFirstImageRegex($html)
{
    if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $html, $matches)) {
        return $matches[1];
    }
    return null;
}

// Get first image or fallback to default
$firstImage = getFirstImageRegex($post['description']);
if (!$firstImage) {
    $firstImage = $default_image;
}

?>

<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="jumbotron__title">Blogs</h1>
                    <div class="breadbrumb">
                        <a href="<?= $siteUrl ?>" class="breadbrumb__item">Home</a>
                        <span class="breadbrumb__item">Blogs</span>
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="clear-gap-bottom">Learn about the latest tricks in marketing from data experts on
                        our blog. Uncover the secrets of finding the best business leads, gain insider knowledge,
                        and become a marketing master!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<main>
    <div class="container section">
        <div class="row">
            <div class="col-md-8">


                <?php if ($firstImage): ?>
                    <div class="blog-featured-image">
                        <img src="<?= htmlspecialchars($firstImage) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="img-fluid" width="766" height="380">
                    </div>
                <?php endif; ?>




                <h2 class="Blog-title" style="color:#fd000d;"><?= htmlspecialchars($post['title'] ?? '') ?></h2>

                <div class="blog-content">
                    <?= $post['description'] ?? '' ?>
                </div>

                <div class="pad-vertical">
                    <a class="button button--secondary" href="<?= $siteUrl; ?>blogs">← Back to All Blogs</a>
                </div>
            </div>

            <div class="col-md-4 pad-top-tld">
                <?php
                $categories = $seo->get_blog_categories();
                ?>
                <ul class="list list--tertiary shadow-primary gap-bottom">
                    <li class="list__item">
                        <h6 class="secondary-title font-xsmall">Categories</h6>
                    </li>
                    <li class="list__item list--tertiary__item--no-pad">
                        <div class="sidebar-nav sidebar-nav--without-icon">
                            <?php foreach ($categories as $cat): ?>
                                <a class="sidebar-nav__item" href="<?= $siteUrl . 'blog/category/' . urlencode($cat['category']); ?>">
                                    <?= htmlspecialchars($cat['category']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>


                <?php
                $recentPosts = $seo->get_recent_blogs(5);
                ?>
                <ul class="list list--tertiary shadow-primary gap-bottom">
                    <li class="list__item">
                        <h6 class="secondary-title font-xsmall">Recent Posts</h6>
                    </li>
                    <li class="list__item list--tertiary__item--no-pad">
                        <div class="sidebar-nav">
                            <?php foreach ($recentPosts as $post): ?>
                                <a class="sidebar-nav__item" href="<?= $siteUrl . 'blog/' . htmlspecialchars($post['seo_url']); ?>">
                                    <?= htmlspecialchars($post['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>


                <ul class="list list--tertiary shadow-primary gap-bottom">
                    <li class="list__item">
                        <h6 class="secondary-title font-xsmall">Newsletter</h6>
                        <p class="clear-gap-bottom">Subscribe to our email newsletter for useful articles and valuable resources.</p>
                    </li>
                    <li class="list__item">
                        <form class="form form-single-line ajaxRequest" data-input="newsletter_input" action="/newsletter/save" method="POST">
                            <input class="form-single-line__input form__control" id="newsletter_input" type="email" name="email" placeholder="name@email.com">
                            <button class="form-single-line__submit" type="submit"><i class="icon icon-arrow-forward"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr class="hr-line">

    <div class="lead hidden-dd">
        <div class="container lead__container">
            <div class="lead__col lead__col--left">
                <h5 class="lead__text gap-bottom-tld">Ready To Boost Your Sales Like Your Competitors? Try Our Tool For Free.</h5>
            </div>
            <div class="lead__col lead__col--right">
                <a class="button button--quaternary full-width" href="<?= $siteUrl ?>tool/business">
                    Custom Order <i class="icon icon-arrow-forward button--quaternary__icon"></i>
                </a>
            </div>
        </div>
    </div>
</main>

<?php include_once '../assets/php/footer.php'; ?>

<!-- Blog AJAX Load Script -->
<script>
    $(document).ready(function() {
        let lastPage = 1; // Remember the last page for "Back" button
        load_data(lastPage); // Load page 1 by default

        // Function to load paginated blog list
        function load_data(page) {
            lastPage = page; // Update current page
            $.ajax({
                url: 'blog-page',
                method: 'POST',
                data: {
                    page: page
                },
                success: function(response) {
                    if (response.includes('pagination__item')) {
                        $('#pagination-wrapper').show();
                    } else {
                        $('#pagination-wrapper').hide();
                    }

                    $("#showBlog").html(response);
                }
            });
        }

        // Pagination click handler
        $(document).on('click', '.pagination__item', function() {
            var page = $(this).attr("id");
            load_data(page);
        });

        // Read More click: load single blog post
        $(document).on('click', '.readMore', function() {
            var blogId = $(this).data('id');
            $.ajax({
                url: 'blog-single.php',
                method: 'POST',
                data: {
                    id: blogId
                },
                success: function(response) {
                    $("#showBlog").html(response);
                    $('#pagination-wrapper').hide();
                }
            });
        });

        // Back to blog list
        $(document).on('click', '#backToList', function() {
            load_data(lastPage); // Go back to previously loaded page
        });
    });
</script>