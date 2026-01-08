<?php
$siteUrl = 'https://emailbigdata.com/';
include_once '../assets/php/header.php';
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
                <ul class="list" id="showBlog">
                    <h3>Please Wait...</h3>
                </ul>
                <!-- Pagination will be injected dynamically -->
                <div id="pagination-wrapper" class="pad-vertical-small container" style="display:none;">
               
                    <div class="pagination inline-block align-middle" id="paginationArea"></div>
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
    $(document).ready(function () {
        let lastPage = 1; // Remember the last page for "Back" button
        load_data(lastPage); // Load page 1 by default

        // Function to load paginated blog list
        function load_data(page) {
            lastPage = page; // Update current page
            $.ajax({
                url: 'blog-page',
                method: 'POST',
                data: { page: page },
                success: function (response) {
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
        $(document).on('click', '.pagination__item', function () {
            var page = $(this).attr("id");
            load_data(page);
        });

        // Read More click: load single blog post
        $(document).on('click', '.readMore', function () {
            var blogId = $(this).data('id');
            $.ajax({
                url: 'blog-single.php',
                method: 'POST',
                data: { id: blogId },
                success: function (response) {
                    $("#showBlog").html(response);
                    $('#pagination-wrapper').hide();
                }
            });
        });

        // Back to blog list
        $(document).on('click', '#backToList', function () {
            load_data(lastPage); // Go back to previously loaded page
        });
    });
</script>

