<?php
include_once '../assets/php/header.php';
require_once '../assets/php/auth.php';
require_once '../assets/php/session.php';
$user = new Auth();

?>
<style>
.pagination {
    margin-top: 30px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
.pagination a, .pagination strong {
    padding: 8px 14px;
    margin: 3px;
    border: 1px solid #ccc;
    text-decoration: none;
    color: #333;
    border-radius: 4px;
    transition: background 0.3s;
}
.pagination a:hover {
    background-color: #f0f0f0;
}
.pagination strong {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}
.page-item.disabled .page-link {
    color: #999;
    pointer-events: none;
    cursor: default;
    background-color: #f9f9f9;
}
.page-item.active .page-link {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}
.more-button {
    display: inline-block;
    padding: 6px 12px;
    background-color: red;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
}
.more-button:hover {
    background-color: #0056b3;
}
</style>

<div class="jumbotron jumbotron--regular jumbotron--regular-bg">
    <div class="container jumbotron__container">
        <div class="jumbotron__inner">
            <div class="row">
                <div class="col-md-6 gap-bottom-tld">
                    <h1 class="jumbotron__title">Email Lists</h1>
                    <div class="breadbrumb">
                        <a href="<?= $siteUrl; ?>" class="breadbrumb__item">Home</a>
                        <a href="<?= $siteUrl; ?>ready-made" class="breadbrumb__item">Ready Made Lists</a>
                        <span class="breadbrumb__item">All Categories</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>Browse our verified email lists. Filter by industry, job title, job function and more. Clean, accurate and ready to boost your sales!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="pad-bottom-medium">
    <div class="container regular-page-content regular-page-content--pull-top">
        <div class="box box--ready-made">
            <div class="row">
                <div class="col-md-6 col-lg-7 gap-bottom-small-tpnd">
                    <h2 class="secondary-title clear-gap-vertical font-medium">Business Contacts</h2>
                    <span>You can select a ready-made list below or create your own list.</span>
                </div>
                <div class="col-md-6 col-lg-5">
                    <a class="button button--septenary button--small text-uppercase gap-bottom-small-tld full-width"
                       href="<?= $siteUrl; ?>custom-order/business-contacts">
                        Build your own business contacts list
                    </a>
                </div>
            </div>
        </div>

        <div class="premade-lists gap-bottom-small">
        <?php
        function slugify($text, string $divider = '-') {
            $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            $text = preg_replace('~[^-\w]+~', '', $text);
            $text = trim($text, $divider);
            $text = preg_replace('~-+~', $divider, $text);
            $text = strtolower($text);
            return empty($text) ? 'n-a' : $text;
        }

        function deslugify($slug) {
            return ucwords(str_replace('-', ' ', $slug));
        }

        $filterTitle = isset($_GET['title']) ? deslugify($_GET['title']) : null;
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = 20;
        $offset = ($page - 1) * $limit;

        $totalItems = $user->count_email_short_info($filterTitle);
        $totalPages = ceil($totalItems / $limit);
        $allData = $user->get_email_short_info_paginated($offset, $limit, $filterTitle);

        if ($allData) {
            foreach ($allData as $row) {
                $titleSlug = slugify($row['title']);
                $id = $row['id'];

                echo '<div class="premade-lists__item"><div class="premade-lists__item__row">';

                // Column 1: Category
                echo '<div class="premade-lists__item__col">';
                echo '<h2 class="premade-lists__item__title h4">' . $row['category'] . '</h2>';
                echo '</div>';
                
// Column 2: Contacts + Price
echo '<div class="premade-lists__item__col">';
echo '<span style="font-weight:900;">' . number_format($row['total_email']) . ' Contacts / $' . number_format($row['price']) . '</span>';
echo '</div>';




                // Column 3: Short Description
                echo '<div class="premade-lists__item__col">' . $row['short_description'] . '</div>';

                // Column 4: More Button
                echo '<div class="premade-lists__item__col text-right">';
                echo '<a href="'.$siteUrl.'ready-made/single-product?id='.$id.'" class="more-button premade-lists__item__price">View Details</a>';
                echo '</div>';

                echo '</div></div>';
            }
        } else {
            echo '<h3 class="text-center text-secondary">No Records Found!</h3>';
        }

        if ($totalPages > 1) {
            echo '<nav aria-label="Page navigation" class="gap-top">';
            echo '<ul class="pagination">';

            $prev = $page - 1;
            $baseUrl = '?'.($filterTitle ? 'title='.slugify($filterTitle).'&' : '');
            echo '<li class="page-item '.($page <= 1 ? 'disabled' : '').'">
                    <a class="page-link" href="'.$baseUrl.'page='.$prev.'">Previous</a>
                  </li>';

            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item '.($i == $page ? 'active' : '').'">
                        <a class="page-link" href="'.$baseUrl.'page='.$i.'">'.$i.'</a>
                      </li>';
            }

            $next = $page + 1;
            echo '<li class="page-item '.($page >= $totalPages ? 'disabled' : '').'">
                    <a class="page-link" href="'.$baseUrl.'page='.$next.'">Next</a>
                  </li>';

            echo '</ul>';
            echo '</nav>';
        }
        ?>
        </div>
    </div>
</main>

<hr class="hr-line">

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="list">
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon icon-coins"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Affordable Pricing</h3>
                            <p>Quality email lists enable businesses to make B2B connections for an amazingly low price.</p>
                        </div>
                    </li>
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon icon-search"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Search, Order, Download!</h3>
                            <p>Within minutes, you can download a database of contacts and start connecting with your audience.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list">
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon icon-identification"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">Unmatched Accuracy</h3>
                            <p>Both automated and manual processes ensure the accuracy of our human-verified lists.</p>
                        </div>
                    </li>
                    <li class="iconic-content gap-bottom">
                        <div class="iconic-content__icon-area">
                            <i class="iconic-content__icon icon icon-crm-ready"></i>
                        </div>
                        <div class="iconic-content__content">
                            <h3 class="iconic-content__title">CRM-Ready Files</h3>
                            <p>Download your list as a .csv file, integrate it into your CRM, and start networking.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="lead hidden-dd">
    <div class="container lead__container">
        <div class="lead__col lead__col--left">
            <h5 class="lead__text gap-bottom-tld">Ready To Boost Your Sales Like Your Competitors? Try Our Tool For Free.</h5>
        </div>
        <div class="lead__col lead__col--right">
            <a class="button button--quaternary full-width" href="<?= $siteUrl; ?>custom-order/business-contacts">
                Custom Order <i class="icon icon-arrow-forward button--quaternary__icon"></i>
            </a>
        </div>
    </div>
</div>

<?php include_once '../assets/php/footer.php'; ?>
