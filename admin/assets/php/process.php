<?php

require_once 'auth.php';
$adminPanel = new Auth();


if (isset($_POST['action']) && ($_POST['action'] == 'display-emails')) {
    $output = '';
    $emails = $adminPanel->get_emails();


    if ($emails) {
        $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Type</th>
     <th>Category</th>
     <th>SEO_Title</th>
     <th>SEO_URL</th>
     <th>SEO_Des.</th>
     <th>Short_Des.</th>
     <th>E-mail</th>
     <th>Price</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($emails as $row) {
            $output .= ' <tr>
            <td>' . $sno++ . '</td>
            <td>' . $row['title'] . '</td>
            <td>' . $row['category'] . '</td>
            <td>' . substr($row['seo_title'] ?? '', 0, 30) . '-</td>
            <td>' . substr($row['seo_url'] ?? '', 0, 30) . '-</td>
            <td>' . substr($row['seo_desc'] ?? '', 0, 30) . '-</td>
            <td>' . substr($row['short_description'], 0, 30) . '..</td>
            <td>' . $row['total_email'] . '</td>
            <td>' . $row['price'] . '</td>
            <td>
            <a href="#" id="' . $row['id'] . '" title="Edit Emails" class="text-primary editEmailBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
            <a href="#" id="' . $row['id'] . '" title="Delete Email" class="text-danger deleteEmailBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not insert any email yet! Insert your first Emails now!</h3>';
    }
}
//Handle Display All page
if (isset($_POST['action']) && ($_POST['action'] == 'display-page')) {
    $output = '';
    $page = $adminPanel->get_page();


    if ($page) {
        $output .= '<select class="form-select pageTitle" id="pageName" name="page" aria-label="Select Page Name" onChange="showSelected()">
     <option selected disabled>-Select Options-</option>
     
     <option>About</option>
     <option>Attorney</option>
     <option>Business Contacts</option>
     <option>Blog</option>
     <option>Case Study</option>
     <option>Careers</option>
     <option>CEO</option>
     <option>Colleges Universities</option>
     <option>Community Relations</option>
     <option>Contact</option>
     <option>Events</option>
     <option>Event Info</option>
     <option>FAQ</option>
     <option>Healthcare Professionals</option>
     <option>HR</option>
     <option>Home</option>
     <option>How To Build List</option>
     <option>Industries</option>
     <option>International</option>
     <option>Info</option>
     <option>Job Levels</option>
     <option>Job Titles</option>
     <option>Job Functions</option>
     <option>Legal Notice</option>
     <option>Leadership</option>
     <option>Login</option>
     <option>Office 365</option>
     <option>Our Guarantees</option>
     <option>Pricing</option>
     <option>Pharmaceutical</option>
     <option>Privacy Policy</option>
     <option>Real Estate</option>
     <option>Real Estate Agents</option>
     <option>Resources</option>
     <option>Signup</option>
     <option>Terms of Use</option>
     <option>Zoominfo</option>';
        $output .= '</select>
        <label for="pageName">Select Page Name</label>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not insert any page yet! Insert your first page now!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-coupon-post')) {
    $output = '';
    $page = $adminPanel->get_emails();


    if ($page) {
        $output .= '<select class="form-select pageTitle" id="pageName" name="page" aria-label="Select Post Name" >
     <option selected disabled>-Select Options-</option>';
        foreach ($page as $row) {
            $output .= '<option>' . $row['category'] . '</option>';
        }
        $output .= '</select>
        <label for="pageName">Select Post Name</label>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not insert any post yet! Insert your first post now!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'coupon')) {
    $postName = $_POST['page'];
    $couponTitle = $_POST['couponTitle'];
    $trackingID = $_POST['couponKeyword'];
    $limitation = $_POST['couponLimit'];
    $couponType = $_POST['couponType'];
    $amount = $_POST['couponAmount'];

    $adminPanel->inert_coupon($postName, $couponTitle, $trackingID, $limitation, $couponType, $amount);
}
if (isset($_POST['action']) && ($_POST['action'] == 'seo')) {
    $page = $adminPanel->test_input($_POST['page']);
    $seoTitle = $adminPanel->test_input($_POST['seoTitle']);
    $seoUrl = $adminPanel->test_input($_POST['seoUrl']);
    $seoKey = $adminPanel->test_input($_POST['seoKeyword']);
    $seoDes = $adminPanel->test_input($_POST['seoDescription']);

    echo $adminPanel->inert_seo($page, $seoTitle, $seoUrl, $seoKey, $seoDes);
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-coupon')) {
    $output = '';
    $coupon = $adminPanel->get_coupon();


    if ($coupon) {
        $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Track_ID</th>
     <th>Title</th>
     <th>Coupon_Title</th>
     <th>Type</th>
     <th>Limit</th>
     <th>Amount</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($coupon as $row) {
            $output .= ' <tr>
            <td>' . $sno++ . '</td>
            <td>' . $row['tacking_id'] . '</td>
            <td>' . $row['post_title'] . '</td>
            <td>' . $row['coupon_title'] . '</td>
            <td>' . $row['coupon_type'] . '</td>
            <td>' . $row['limitation'] . '</td>
            <td>' . $row['amount'] . '</td>
            <td>
            <a href="#" id="' . $row['id'] . '" title="Edit Coupon" class="text-primary editCouponBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
            <a href="#" id="' . $row['id'] . '" title="Delete Coupon" class="text-danger deleteCouponBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not insert any SEO details yet! Insert your first SEO now!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-seo')) {
    $output = '';
    $seoPage = $adminPanel->get_seo_page();


    if ($seoPage) {
        $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Page</th>
     <th>SEO_Title</th>
     <th>SEO_URL</th>
     <th>Description</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($seoPage as $row) {
            $output .= ' <tr>
            <td>' . $sno++ . '</td>
            <td>' . $row['page'] . '</td>
            <td>' . $row['title'] . '</td>
            <td>' . $row['url'] . '</td>
            <td>' . substr($row['description'], 0, 60) . '..</td>
            <td>
            <a href="#" id="' . $row['id'] . '" title="Edit SEO" class="text-primary editSEOBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
            <a href="#" id="' . $row['id'] . '" title="Delete SEO" class="text-danger deleteSEOBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not insert any SEO details yet! Insert your first SEO now!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-user')) {
    $output = '';
    $users = $adminPanel->get_all_user();


    if ($users) {
        $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Full Name</th>
     <th>E-mail</th>
     <th>Phone</th>
     <th>Country</th>
     <th>Company</th>
     <th>Topup</th>
     <th>Joined</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($users as $row) {
            $joinedDate = date('d-M-Y', strtotime($row['created_at']));
            $fullNmae = $row['first_name'] . ' ' . $row['last_name'];
            $output .= ' <tr>
            <td>' . $sno++ . '</td>
            <td>' . $fullNmae . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['phone'] . '</td>
            <td>' . $row['country'] . '</td>
            <td>' . $row['company'] . '</td>
            <td>' . $row['topup'] . '</td>
            <td>' . $joinedDate . '</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold bandUser" href="#"><i class="fas fa-user-slash"></i>&nbsp;&nbsp;&nbsp;Ban</a></li>
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold userLogin" href="#"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp;Login</a></li>
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold userTopup" href="#"><i class="fas fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp;Topup</a></li>
                    </ul>
                </div>
            </td>
            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not register any user yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-band-user')) {
    $output = '';
    $users = $adminPanel->get_all_band_user();


    if ($users) {
        $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Full Name</th>
     <th>E-mail</th>
     <th>Phone</th>
     <th>Country</th>
     <th>Company</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($users as $row) {
            $fullNmae = $row['first_name'] . ' ' . $row['last_name'];
            $output .= ' <tr>
            <td>' . $sno++ . '</td>
            <td>' . $fullNmae . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['phone'] . '</td>
            <td>' . $row['country'] . '</td>
            <td>' . $row['company'] . '</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold returnUser" href="#"><i class="fas fa-user-check"></i>&nbsp;&nbsp;&nbsp;Return</a></li>
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold deleteUser" href="#"><i class="fas fa-user-times"></i>&nbsp;&nbsp;&nbsp;Delete</a></li>
                    </ul>
                </div>
            </td>
            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not register any user yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-order')) {
    $output = '';

    $orders = $adminPanel->get_orders();

    if ($orders) {
        $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Tracking ID</th>
     <th>Name</th>
     <th>E-mail</th>
     <th>Type</th>
     <th>Category</th>
     <th>Item</th>
     <th>Amount</th>
     <th>Price</th>
     <th>Days</th>
     <th>Method</th>
     <th>Date</th>
     <th>Status</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($orders as $row) {
            $orderDate = date('d-m', strtotime($row['created_at']));
            $orderTime = date('g:i A', strtotime($row['created_at']));
            $okDate = '(' . $orderDate . ')<br>' . $orderTime;
            $output .= '
         <td>' . $sno++ . '</td>
         <td>' . $row['tracking_id'] . '</td>
         <td>' . substr($row['username'], 0, 10) . '..</td>
         <td>' . substr($row['email'], 0, 10) . '..</td>
         <td>' . substr($row['email_type'], 0, 5) . '..</td>
         <td>' . $row['email_category'] . '</td>
         <td>' . $row['email_item'] . '</td>
         <td>' . substr($row['total_email'], 0, 6) . '</td>
         <td>' . substr($row['total_price'] ?? 0, 0, 6) . '</td>
         <td>' . substr($row['days'], 6, 10) . '-</td>
         <td>' . substr($row['payment_way'], 0, 10) . '-</td>
         <td>' . $okDate . '</td>
         <td>' . substr($row['status'], 0, 10) . '..</td>
         <td>
         <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold deliveryOrderBtn" href="#"><i class="fas fa-reply-all"></i>&nbsp;&nbsp;&nbsp;Delivery</a></li>
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold editOrderBtn" href="#"><i class="fas fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit</a></li>
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold deleteOrderBtn" href="#"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;Delete</a></li>
                    </ul>
                </div>
         </td>
         </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-failed')) {
    $output = '';

    $orders = $adminPanel->get_failed_orders();

    if ($orders) {
        $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Tracking ID</th>
     <th>Name</th>
     <th>E-mail</th>
     <th>Type</th>
     <th>Category</th>
     <th>Item</th>
     <th>Amount</th>
     <th>Price</th>
     <th>Days</th>
     <th>Method</th>
     <th>Date</th>
     <th>Status</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($orders as $row) {
            $orderDate = date('d-m', strtotime($row['created_at']));
            $orderTime = date('g:i A', strtotime($row['created_at']));
            $okDate = '(' . $orderDate . ')<br>' . $orderTime;
            $output .= '
         <td>' . $sno++ . '</td>
         <td>' . $row['tracking_id'] . '</td>
         <td>' . substr($row['username'], 0, 10) . '..</td>
         <td>' . substr($row['email'], 0, 10) . '..</td>
         <td>' . substr($row['email_type'], 0, 5) . '..</td>
         <td>' . $row['email_category'] . '</td>
         <td>' . $row['email_item'] . '</td>
         <td>' . substr($row['total_email'], 0, 6) . '</td>
         <td>' . substr($row['total_price'], 0, 6) . '</td>
         <td>' . substr($row['days'], 6, 10) . '-</td>
         <td>' . substr($row['payment_way'], 0, 10) . '-</td>
         <td>' . $okDate . '</td>
         <td>' . substr($row['status'], 0, 10) . '..</td>
         <td>
         <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold deleteFailedBtn" href="#"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;Delete</a></li>
                    </ul>
                </div>
         </td>
         </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-cancel')) {
    $output = '';

    $orders = $adminPanel->get_cancel_orders();

    if ($orders) {
        $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Tracking ID</th>
     <th>Name</th>
     <th>E-mail</th>
     <th>Type</th>
     <th>Category</th>
     <th>Item</th>
     <th>Amount</th>
     <th>Price</th>
     <th>Days</th>
     <th>Method</th>
     <th>Date</th>
     <th>Status</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($orders as $row) {
            $orderDate = date('d-m', strtotime($row['created_at']));
            $orderTime = date('g:i A', strtotime($row['created_at']));
            $okDate = '(' . $orderDate . ')<br>' . $orderTime;
            $output .= '
         <td>' . $sno++ . '</td>
         <td>' . $row['tracking_id'] . '</td>
         <td>' . substr($row['username'], 0, 10) . '..</td>
         <td>' . substr($row['email'], 0, 10) . '..</td>
         <td>' . substr($row['email_type'], 0, 5) . '..</td>
         <td>' . $row['email_category'] . '</td>
         <td>' . $row['email_item'] . '</td>
         <td>' . substr($row['total_email'], 0, 6) . '</td>
         <td>' . substr($row['total_price'], 0, 6) . '</td>
         <td>' . substr($row['days'], 6, 10) . '-</td>
         <td>' . substr($row['payment_way'], 0, 10) . '-</td>
         <td>' . $okDate . '</td>
         <td>' . substr($row['status'], 0, 10) . '..</td>
         <td>
         <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold deleteCancelBtn" href="#"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;Delete</a></li>
                    </ul>
                </div>
         </td>
         </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-refund')) {
    $output = '';

    $orders = $adminPanel->get_refund_orders();

    if ($orders) {
        $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Tracking ID</th>
     <th>Name</th>
     <th>E-mail</th>
     <th>Type</th>
     <th>Category</th>
     <th>Item</th>
     <th>Amount</th>
     <th>Price</th>
     <th>Days</th>
     <th>Method</th>
     <th>Date</th>
     <th>Status</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($orders as $row) {
            $orderDate = date('d-m', strtotime($row['created_at']));
            $orderTime = date('g:i A', strtotime($row['created_at']));
            $okDate = '(' . $orderDate . ')<br>' . $orderTime;
            $output .= '
         <td>' . $sno++ . '</td>
         <td>' . $row['tracking_id'] . '</td>
         <td>' . substr($row['username'], 0, 10) . '..</td>
         <td>' . substr($row['email'], 0, 10) . '..</td>
         <td>' . substr($row['email_type'], 0, 5) . '..</td>
         <td>' . $row['email_category'] . '</td>
         <td>' . $row['email_item'] . '</td>
         <td>' . substr($row['total_email'], 0, 6) . '</td>
         <td>' . substr($row['total_price'], 0, 6) . '</td>
         <td>' . substr($row['days'], 6, 10) . '-</td>
         <td>' . substr($row['payment_way'], 0, 10) . '-</td>
         <td>' . $okDate . '</td>
         <td>' . substr($row['status'], 0, 10) . '..</td>
         <td>
         <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="' . $row['id'] . '" class="dropdown-item font-weight-bold deleteRefundBtn" href="#"><i class="fas fa-trash-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;Delete</a></li>
                    </ul>
                </div>
         </td>
         </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-sales')) {
    $output = '';

    $sales = $adminPanel->get_sales();


    if ($sales) {
        $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Tracking ID</th>
     <th>Name</th>
     <th>E-mail</th>
     <th>Type</th>
     <th>Category</th>
     <th>Item</th>
     <th>Amount</th>
     <th>Price</th>
     <th>Days</th>
     <th>Method</th>
     <th>Status</th>
     <th>Files</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($sales as $row) {
            $output .= '
         <td>' . $sno++ . '</td>
         <td>' . $row['tracking_id'] . '</td>
         <td>' . $row['username'] . '</td>
         <td>' . $row['email'] . '</td>
         <td>' . $row['email_type'] . '</td>
         <td>' . $row['email_category'] . '</td>
         <td>' . $row['email_item'] . '</td>
         <td>' . $row['total_email'] . '</td>
         <td>' . $row['total_price'] . '</td>
         <td>' . $row['days'] . '</td>
         <td>' . $row['payment_way'] . '</td>
         <td>' . $row['status'] . '</td>
         <td>' . $row['delivery_file'] . '</td>
         <td>
         <a href="#" id="' . $row['id'] . '" title="Edit Sale" class="text-primary editSaleBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
         <a href="#" id="' . $row['id'] . '" title="Delete Sale" class="text-danger deleteSaleBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
         </td>
         </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any sales yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-subscription')) {
    $output = '';

    $subscription = $adminPanel->get_subscription();


    if ($subscription) {
        $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>E-mail</th>
     <th>Joined</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($subscription as $row) {
            $joinedDate = date('d-M-Y [g:i A]', strtotime($row['created_at']));
            $output .= '
         <td>' . $sno++ . '</td>
         <td>' . $row['email'] . '</td>
         <td>' . $joinedDate . '</td>
         </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any subscription yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-feedback')) {
    $output = '';

    $feedback = $adminPanel->get_feedback();


    if ($feedback) {
        $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Full Name</th>
     <th>E-mail</th>
     <th>Feedback</th>
     <th>Date</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($feedback as $row) {
            $feedDate = date('d-M-Y [g:i A]', strtotime($row['created_at']));
            $fullNmae = $row['first_name'] . ' ' . $row['last_name'];
            $output .= '
         <td>' . $sno++ . '</td>
         <td>' . $fullNmae . '</td>
         <td>' . $row['email'] . '</td>
         <td>' . $row['message'] . '</td>
         <td>' . $feedDate . '</td>
         <td>
            <a href="#" id="' . $row['id'] . '" title="Reply" class="text-primary replyFeedbackBtn" data-bs-toggle="modal" data-bs-target="#replyModal"><i class="fas fa-reply fa-lg"></i></a>&nbsp;
            <a href="#" id="' . $row['id'] . '" title="Delete Feedback" class="text-danger deleteFeedbackBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
         </td>
         </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any feedback yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-user-number')) {

    $users = $adminPanel->get_all_user();

    if ($users) {
        $count = 0;
        foreach ($users as $row) {
            $count++;
        }
        echo number_format($count);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any user yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-order-number')) {

    $orders = $adminPanel->get_orders();

    if ($orders) {
        $count = 0;
        $orderAmount = 0;
        foreach ($orders as $row) {
            $count++;
            $orderAmount += (int)$row['total_price'];
        }
        echo 'Totla Orders ' . number_format($count) . '  &nbsp;&nbsp;&nbsp; Amount $ ' . number_format($orderAmount);
    } else {
        echo '<h5 class="text-center text-light">No recourds found!</h5>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-failed-number')) {

    $orders = $adminPanel->get_failed_orders();

    if ($orders) {
        $count = 0;
        $orderAmount = 0;
        foreach ($orders as $row) {
            $count++;
            $orderAmount += (int)$row['total_price'];
        }
        echo 'Total ' . number_format($count) . ' Orders &nbsp;&nbsp;&nbsp; Order Amount $ ' . number_format($orderAmount);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-cancel-number')) {

    $orders = $adminPanel->get_cancel_orders();

    if ($orders) {
        $count = 0;
        $orderAmount = 0;
        foreach ($orders as $row) {
            $count++;
            $orderAmount += (int)$row['total_price'];
        }
        echo 'Total Clanceled ' . number_format($count) . '&nbsp;&nbsp;&nbsp;Amount $ ' . number_format($orderAmount);
    } else {
        echo '<h5 class="text-center text-light">No recourds found!</h5>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-refund-number')) {

    $orders = $adminPanel->get_refund_orders();

    if ($orders) {
        $count = 0;
        $orderAmount = 0;
        foreach ($orders as $row) {
            $count++;
            $orderAmount += (int)$row['total_price'];
        }
        echo 'Total ' . number_format($count) . ' &nbsp;&nbsp;&nbsp; Amount $ ' . number_format($orderAmount);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-topup-number')) {

    $topup = $adminPanel->get_all_user();

    if ($topup) {
        $count = 0;
        $topupAmount = 0;
        foreach ($topup as $row) {
            if ($row['topup'] > 0) {
                $count++;
                $topupAmount += (int)$row['topup'];
            }
        }
        echo '( ' . number_format($count) . ' )&nbsp;&nbsp;&nbsp;$ ' . number_format($topupAmount);
    } else {
        echo '<h3 class="text-center text-secondary">You have not any topup yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-sales-number')) {

    $sales = $adminPanel->get_sales();

    if ($sales) {
        $count = 0;
        $orderAmount = 0;
        foreach ($sales as $row) {
            $count++;
            $orderAmount += (int)$row['total_price'];
        }
        echo 'Total Sales ' . number_format($count) . '&nbsp;&nbsp;&nbsp; Amount $ ' . number_format($orderAmount);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any sales yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-coupon-number')) {

    $sales = $adminPanel->get_coupon();

    if ($sales) {
        $count = 0;
        $orderAmount = 0;
        foreach ($sales as $row) {
            $count++;
            $orderAmount += (int)$row['coupon_amount'];
        }
        echo 'Total ' . number_format($count) . ' Coupons';
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any sales yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-email-number')) {

    $email = $adminPanel->get_emails();

    if ($email) {
        $count = 0;
        foreach ($email as $row) {
            $count += (int)$row['total_email'];
        }
        echo number_format($count);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any email yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-feedback-number')) {

    $feedback = $adminPanel->get_feedback();

    if ($feedback) {
        $count = 0;
        foreach ($feedback as $row) {
            $count++;
        }
        echo number_format($count);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any feedback yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-subscription-number')) {

    $subscription = $adminPanel->get_subscription();

    if ($subscription) {
        $count = 0;
        foreach ($subscription as $row) {
            $count++;
        }
        echo number_format($count);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any subscription yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'total-income-number')) {

    $income = $adminPanel->get_sales();
    $coupons = $adminPanel->get_coupon();
    if ($coupons) {
        $couponAmount = 0;
        foreach ($coupons as $row) {
            $couponAmount += (int)$row['coupon_amount'];
        }
    }
    $totalIncome = 0;
    if ($income) {
        foreach ($income as $row) {
            $totalIncome += (int)$row['total_price'];
        }
        $totalIncome = $totalIncome - $couponAmount;
        echo '$ ' . number_format($totalIncome);
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not any subscription yet!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-order-email')) {
    $output = '';
    $customerEmail = $adminPanel->get_orders();


    if ($customerEmail) {
        $output .= '<select class="form-select pageTitle" id="pageName" name="page" aria-label="Select Page Name">
     <option selected disabled>-Select Options-</option>';
        foreach ($customerEmail as $row) {
            $output .= '<option>' . $row['email'] . '</option>';
        }
        $output .= '</select>
        <label for="pageName">Select Customer Email</label>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not insert any page yet! Insert your first page now!</h3>';
    }
}
if (isset($_POST['editOrderId'])) {

    $id = $_POST['editOrderId'];

    $row = $adminPanel->edit_order($id);

    echo json_encode($row);
}
if (isset($_POST['userTopup'])) {

    $id = $_POST['userTopup'];

    $row = $adminPanel->get_top_user($id);

    echo json_encode($row);
}
if (isset($_POST['action']) && ($_POST['action'] == 'topup')) {

    $id = $_POST['topId'];
    $topupType = $_POST['topupType'];
    $amount = $_POST['amount'];
    $row = $adminPanel->get_top_user($id);
    if ($topupType === 'Add') {
        $total = $amount + $row['topup'];
    } else if ($topupType === 'Minus') {
        $total = $row['topup'] - $amount;
    } else {
        $total = $row['topup'];
    }

    $adminPanel->topup($id, $total);
}
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    $adminPanel->delete_order($id);
}
if (isset($_POST['deleteFeedbackBtn'])) {
    $id = $_POST['deleteFeedbackBtn'];

    $adminPanel->delete_feedback($id);
}
if (isset($_POST['action']) && ($_POST['action'] == 'reply_feedback_admin')) {
    $id = $_POST['feedbackId'];
    $message = $_POST['message'];
    $result = $adminPanel->reply_feedback($id, $message);
    if ($result === true) {
        echo 'success';
    } else {
        echo $result;
    }
}
if (isset($_POST['delete_failed_id'])) {
    $id = $_POST['delete_failed_id'];

    $adminPanel->delete_failed_order($id);
}
if (isset($_POST['delete_cancel_id'])) {
    $id = $_POST['delete_cancel_id'];

    $adminPanel->delete_cancel_order($id);
}
if (isset($_POST['delete_refund_id'])) {
    $id = $_POST['delete_refund_id'];

    $adminPanel->delete_refund_order($id);
}
if (isset($_POST['editCouponBtn'])) {

    $id = $_POST['editCouponBtn'];

    $row = $adminPanel->edit_coupon($id);

    echo json_encode($row);
}
if (isset($_POST['deleteCouponBtn'])) {
    $id = $_POST['deleteCouponBtn'];

    $adminPanel->delete_coupon($id);
}
if (isset($_FILES['deliveryData'])) {
    $file = $_FILES['deliveryData'];
    $fileName = $_FILES['deliveryData']['name'];
    $fileTmpName = $_FILES['deliveryData']['tmp_name'];
    $fileSize = $_FILES['deliveryData']['size'];
    $fileError = $_FILES['deliveryData']['error'];
    $fileType = $_FILES['deliveryData']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if ($fileError === 0) {
        if ($fileSize < 1000000) { //500MB
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'deliveryFiles/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo 'Your File is too Large!';
        }
    } else {
        echo 'There was an error uploading your file!';
    }

    $deliveryId = $_POST['deliveryId'];
    $status = "Completed";
    $deliveryData = $fileDestination;
    $delEmail = $_POST['email'];

    $adminPanel->update_order($deliveryId, $status, $deliveryData);
    $id = $deliveryId;
    $getCoupon = $adminPanel->edit_order($id);

    // Send delivery email (Background Queue)
    $to = $delEmail;
    $name = $getCoupon['name'];
    $title = $getCoupon['title'];

    try {
        // Insert into Mail Queue
        $qSql = "INSERT INTO mail_queue (to_email, name, title, file_path, status) VALUES (:to, :name, :title, :file, 'pending')";
        $qStmt = $adminPanel->conn->prepare($qSql);
        $qStmt->execute(['to' => $to, 'name' => $name, 'title' => $title, 'file' => $deliveryData]);

        // Spawn Background Worker (Fire & Forget)
        if (defined('PHP_BINARY') && PHP_BINARY) {
            $phpPath = PHP_BINARY;
        } else {
            $phpPath = 'php';
        }
        $scriptPath = __DIR__ . '/background_mailer.php';

        // Windows-specific background spawn
        pclose(popen("start /B $phpPath $scriptPath", "r"));
    } catch (Exception $e) {
        // If queue fails, logic continues (email might not send but order completes)
    }

    $emailFile = $getCoupon['delivery_file'];
    $id = $getCoupon['cop_id'];
    $presentPrice = $getCoupon['total_price'];
    $couponDetails = $adminPanel->edit_coupon($id);
    $copId = $couponDetails['id'];
    $copLim = $couponDetails['limitation'];
    $copType = $couponDetails['coupon_type'];
    $copAm = $couponDetails['amount'];
    $copCost = $couponDetails['coupon_amount'];

    if ($copType === 'Percentage') {
        $copLim = $copLim - 1;
        $temp = ($presentPrice * 100) / (100 - $copAm);
        $copCost = $copCost + ($temp - $presentPrice);
    } else {
        $copLim = $copLim - 1;
        $copCost = $copCost + $copAm;
    }
    $copCost = round($copCost);
    $adminPanel->update_coupon_avai($copId, $copLim, $copCost);

    try {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $delName = $getCoupon['username'];
        $delTack = $getCoupon['tracking_id'];
        $delType = $getCoupon['email_type'];
        $delItem =  $getCoupon['email_item'];
        $delEmailNumber =  $getCoupon['total_email'];
        $delPrice =  $getCoupon['total_price'];
        $delFile =  $emailFile;


        $email = $delEmail;
        $emailSubject = "Order Delivery";
        $to = $email . ',shahabahammed37@gmail.com,support@mailerstation.com';
        $subject = $emailSubject;
        $message = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Delivered</title>
</head>

<body>
    <!-- header-start -->
    <div class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto; border-bottom: 1px solid #d3dce0;">
            <tbody>
                <tr>
                    <td class="o_re o_bg-white o_px o_pb-md o_br-t" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-radius: 4px 4px 0px 0px;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                        <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                            <div style="font-size: 24px; line-height: 24px; height: 24px;"> </div>
                            <div class="o_px-xs o_sans o_text o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                <p style="margin-top: 0px;margin-bottom: 0px;">
                                    <a class="o_text-primary" href="http://localhost/emailbigdata.com/" style="text-decoration: none;outline: none;color: #126de5;">
                                        <img src="http://localhost/emailbigdata.com/bundles/bydhome/img/mailerstation-logo.png" width="136" height="36" alt="Mailerstation" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                            <div style="font-size: 22px; line-height: 22px; height: 22px;"> </div>
                            <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                <table class="o_right o_xs-center" cellspacing="0" cellpadding="0" border="0" role="presentation" style="text-align: right;margin-left: auto;margin-right: 0;">
                                    <tbody>
                                        <tr>
                                            <td class="o_btn-b o_heading o_text-xs" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">
                                                <a class="o_text-light" href="http://localhost/emailbigdata.com/user/order" style="text-decoration: none;outline: none;color: #82899a;display: block;padding: 7px 8px;font-weight: bold;">

                                                    <span style="mso-text-raise: 6px;display: inline;color: #82899a;">
                          Hello ' . $delName . ' 
                          </span>

                                                    <img src="https://www.fiviral.com/images/email/person.png" width="24" height="24" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">

                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- header-end -->

    <!-- hero-primary-button -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-primary o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #0ec06e;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;">
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_sans o_text o_text-secondary o_bg-white o_px o_py o_br-max" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;"><img src="https://www.fiviral.com/images/email/check.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 24px; line-height: 24px; height: 24px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 class="o_heading o_mb-xxs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">Order Delivered Successfully !</h2>
                                    <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">Your order has been delivered and you can download this files.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- order-intro -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center" style="background-color: #E8F2E8;padding-left: 8px;padding-right: 8px;">
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                    <h2 class="o_heading o_text-dark o_mb-xs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 15px;color: #242b3d;font-size: 30px;line-height: 23px;padding-top:15px;">Delivered Summery</h2>
                                    <h4 class="o_heading o_text-dark o_mb-xs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 8px;color: #242b3d;font-size: 18px;line-height: 23px;">
                                    
                                    Your Tracking ID : ' . $delTack . '<br>Order Item : ' . $delType . ' ' . $delItem . ' Email List
                                    
                                    </h4>
                                    <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">
                                    
                                    Total Email: ' . $delEmailNumber . '<br>Total Price: ' . $delPrice . '
                                    
                                    
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                        <tbody>
                            <tr>
                                <td class="o_bg-light o_px-xs" align="center" style="background-color: #E8F2E8;padding-left: 8px;padding-right: 8px;">
                                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                        <tbody>
                                            <tr>
                                                <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">

                                                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                        <tbody>
                                                            <tr>
                                                                <td width="300" class="o_btn o_bg-success o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #0ec06e;border-radius: 4px;"><a class="o_text-white" href="http://localhost/emailbigdata.com/admin/assets/php/' . $delFile . '" style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">Download Now</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <p class="o_mb" style="margin-top: 16px;margin-bottom: 16px;">
                                                        If the button doesn&apos;t work, copy that link
                                                    </p>

                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="284" class="o_bg-ultra_light o_br o_text-xs o_sans o_px-xs o_py" align="center" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 14px; line-height: 21px; background-color: #e8f2e8; border-radius: 4px; padding-left: 8px; padding-right: 8px; padding-top: 16px; padding-bottom: 16px;">

                                                                    <p class="o_text-dark" style="color: #242b3d;margin-top: 0px;margin-bottom: 0px;">
                                                                        http://localhost/emailbigdata.com/admin/assets/php/' . $delFile . '
                                                                    </p>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- hero-white -->
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                        <tbody>
                            <tr>
                                <td class="o_bg-light o_px-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;">
                                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
                                        <tbody>
                                            <tr>
                                                <td class="o_bg-white o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-light" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #ffffff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;">
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="o_bb-primary" height="40" width="32" style="border-bottom: 1px solid #0ec06e;"></td>
                                                                <td rowspan="2" class="o_sans o_text o_text-secondary o_px o_py" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;"><img src="https://www.fiviral.com/images/email/feedback.png" width="96" height="96" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></td>
                                                                <td class="o_bb-primary" height="40" width="32" style="border-bottom: 1px solid #0ec06e;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="40"></td>
                                                                <td height="40"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-size: 8px; line-height: 8px; height: 8px;"></td>
                                                                <td style="font-size: 8px; line-height: 8px; height: 8px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h2 class="o_heading o_text-dark o_mb-xxs" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;color: #242b3d;font-size: 30px;line-height: 39px;">Re-order Request </h2>
                                                    <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">Hello ' . $delName . ', You may complete your next order with 10% off with coupon code.</p>
                                                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                                        <tbody>
                                                            <tr>
                                                                <td width="300" class="o_btn o_bg-primary o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #0ec06e;border-radius: 4px;"><a class="o_text-white" href="http://localhost/emailbigdata.com/" style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">Next Order Now</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="margin-top: 20px;">
                                                        <tbody>
                                                            <tr>
                                                                <td width="40" class="o_bg-dark o_br-l o_text-md o_text-white o_sans o_py-xs" align="right" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #242b3d;color: #ffffff;border-radius: 4px 0px 0px 4px;padding-top: 8px;padding-bottom: 8px;">
                                                                    <img src="https://www.fiviral.com/images/email/warning.png" width="24" height="24" alt="" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                                </td>
                                                                <td class="o_bg-dark o_br-r o_text-xs o_text-white o_sans o_px o_py-xs" align="left" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #242b3d;color: #ffffff;border-radius: 0px 4px 4px 0px;padding-left: 16px;padding-right: 16px;padding-top: 8px;padding-bottom: 8px;">
                                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong>Information.</strong> Build your list with our list-builder tool, or buy one of our pre-built contact lists of managers and stakeholders in several industries. Market
                                                                        to your target audience, whether it&apos;s doctors or CFOs. We have more than 100 lists to choose from!</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- hero-white -->
                    </td>
            </tr>
        </tbody>
    </table>

    <!-- hero-white -->

    <!-- footer-start -->
    <div class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #e8f2e8;padding-left: 8px;padding-right: 8px;padding-bottom: 32px;">
        <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">

            <tbody>
                <tr>
                    <td class="o_re o_bg-white o_px o_pb-lg o_bt-light o_br-b" align="center" style="font-size: 0;vertical-align: top;background-color: #ffffff;border-top: 1px solid #d3dce0;border-radius: 0px 0px 4px 4px;padding-left: 16px;padding-right: 16px;padding-bottom: 30px;">
                        <div class="o_col o_col-4" style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                            <div style="font-size: 32px; line-height: 32px; height: 32px;"> </div>
                            <div class="o_px-xs o_sans o_text-xs o_text-light o_left o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: left;padding-left: 8px;padding-right: 8px;">

                                <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">©2021. All rights reserved.</p>
                                <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 0px;">
                                    Mailerstation
                                </p>

                            </div>
                        </div>
                        <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                            <div style="font-size: 32px; line-height: 32px; height: 32px;"></div>
                            <div class="o_px-xs o_sans o_text-xs o_text-light o_right o_xs-center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #82899a;text-align: right;padding-left: 8px;padding-right: 8px;">
                                <p style="margin-top: 0px;margin-bottom: 0px;">
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/facebook-light.png" width="36" height="36" alt="fb" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/twitter-light.png" width="36" height="36" alt="tw" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/instagram-light.png" width="36" height="36" alt="ig" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a><span> </span>
                                    <a class="o_text-light" href="#" style="text-decoration: none;outline: none;color: #82899a;"><img src="https://www.fiviral.com/images/email/snapchat-light.png" width="36" height="36" alt="sc" style="max-width: 36px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a>
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;"> </div>
    </div>
    <!-- footer-end -->
</body>

</html>';


        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <admin@mailerstation.com>' . "\r\n";

        mail($to, $subject, $message, $headers);
        echo $user->showMessage('info', 'Product delivery successfully!');
    } catch (Exception $e) {
        echo $user->showMessage('danger', 'Something went to wrong... try later');
    }
}
if (isset($_POST['editSaleId'])) {

    $id = $_POST['editSaleId'];

    $row = $adminPanel->edit_order($id);

    echo json_encode($row);
}
if (isset($_POST['delete_sale_id'])) {
    $id = $_POST['delete_sale_id'];

    $adminPanel->delete_order($id);
}

if (isset($_FILES['deliveryUpdateData'])) {
    $file = $_FILES['deliveryUpdateData'];
    $fileName = $_FILES['deliveryUpdateData']['name'];
    $fileTmpName = $_FILES['deliveryUpdateData']['tmp_name'];
    $fileSize = $_FILES['deliveryUpdateData']['size'];
    $fileError = $_FILES['deliveryUpdateData']['error'];
    $fileType = $_FILES['deliveryUpdateData']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if ($fileError === 0) {
        if ($fileSize < 1000000) { //500MB
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'deliveryFiles/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo 'Your File is too Large!';
        }
    } else {
        echo 'There was an error uploading your file!';
    }

    $saleId = $_POST['saleId'];
    $days = $_POST['day'];
    $deliveryData = $fileDestination;

    $adminPanel->update_sale($saleId, $days, $deliveryData);
}
if (isset($_POST['editSEOId'])) {

    $id = $_POST['editSEOId'];

    $row = $adminPanel->edit_seo($id);

    echo json_encode($row);
}
if (isset($_POST['delete_seo_id'])) {

    $id = $_POST['delete_seo_id'];

    echo $adminPanel->delete_seo($id);
}
if (isset($_POST['action']) && ($_POST['action'] == 'update-seo')) {
    $id = $adminPanel->test_input($_POST['updateSeoId']);
    $seoTitle = $adminPanel->test_input($_POST['seoUpdateTitle']);
    $seoUrl = $adminPanel->test_input(preg_replace('/\s+/', '-', strtolower($_POST['seoUpdateUrl'])));
    $seoKey = $adminPanel->test_input($_POST['seoUpdateKeyword']);
    $seoDes = $adminPanel->test_input($_POST['seoUpdateDescription']);

    echo $adminPanel->update_seo($id, $seoTitle, $seoUrl, $seoKey, $seoDes);
}
if (isset($_POST['action']) && ($_POST['action'] == 'update-coupon')) {

    $id = $adminPanel->test_input($_POST['updateCouponId']);
    $couponTitle = $adminPanel->test_input($_POST['updatecouponTitle']);
    $track = $adminPanel->test_input($_POST['updatecouponKeyword']);
    $limit = $adminPanel->test_input($_POST['updatecouponLimit']);
    $type = $adminPanel->test_input($_POST['updatecouponType']);
    $amount = $adminPanel->test_input($_POST['updatecouponAmount']);

    $adminPanel->update_coupon($id, $couponTitle, $track, $limit, $type, $amount);
}
if (isset($_POST['editEmailId'])) {

    $id = $_POST['editEmailId'];

    $row = $adminPanel->edit_email($id);

    echo json_encode($row);
}
if (isset($_POST['deleteEmailBtn'])) {
    $id = $_POST['deleteEmailBtn'];

    $adminPanel->delete_email($id);
}
if (isset($_POST['bandUser'])) {

    $id = $_POST['bandUser'];

    $adminPanel->bandUser($id);
}
if (isset($_POST['returnUser'])) {

    $id = $_POST['returnUser'];

    $adminPanel->returnUser($id);
}
if (isset($_POST['deleteUser'])) {

    $id = $_POST['deleteUser'];

    $adminPanel->deleteUser($id);
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-topup')) {
    $output = '';
    $topup = $adminPanel->get_topup();

    if ($topup) {
        $output .= ' <table class="table table-striped text-center">
       <thead>
           <tr>
               <th>S. No</th>
               <th>Tracking ID</th>
               <th>Name</th>
               <th>E-mail</th>
               <th>Amount</th>
               <th>Status</th>
               <th>Method</th>
               <th>Date</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>';
        $sno = 1;
        foreach ($topup as $row) {
            $topupDate = date('d-M-y', strtotime($row['created_at']));
            $topupTime = date('g:i A', strtotime($row['created_at']));
            $okDate =  $topupDate . '<br>' . $topupTime;
            $output .= '<tr>
               <td>' . $sno++ . '</td>
               <td>' . $row['top_code'] . '</td>
               <td>' . $row['full_name'] . '</td>
               <td style="font-size: 12px;">' . substr($row['email'], 0, 20) . '..</td>
               <td>' . $row['amount'] . '</td>
               <td>' . $row['status'] . '</td>
               <td>' . $row['payment_way'] . '</td>
               <td style="font-size: 12px;">' . $okDate . '</td>
               <td>
                   <a href="#" id="' . $row['id'] . '" title="Edit Top" class="text-primary editTopBtn" style="font-size: 25px;"><i class="fas fa-reply-all"></i></a>&nbsp;
                    <a href="#" id="' . $row['id'] . '" title="Delete Top" class="text-danger deleteTopBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
               </td>
           </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not created any order yet! Create your first order now!</h3>';
    }
}
if (isset($_POST['editTopId'])) {

    $id = $_POST['editTopId'];

    $row = $adminPanel->editTop($id);

    echo json_encode($row);
}
if (isset($_POST['delete_top_id'])) {

    $id = $_POST['delete_top_id'];

    $adminPanel->delete_top($id);
}
if (isset($_POST['action']) && ($_POST['action'] == 'update_topup')) {
    $topId = $adminPanel->test_input($_POST['topId']);
    $topUid = $adminPanel->test_input($_POST['topUid']);
    $topAmount = $adminPanel->test_input($_POST['amount']);
    $topStatus = $adminPanel->test_input($_POST['topUpStatus']);

    $row = $adminPanel->get_top_amount($topUid);
    $preTop = $row['topup'];
    $total = $topAmount + $preTop;

    $adminPanel->update_top($topId, $topStatus);

    if ($topStatus === 'Completed') {
        $adminPanel->topup($topUid, $total);
    }
}
//Handle profile update ajax request
if (isset($_FILES['image'])) {
    $name = $cuser->test_input($_POST['name']);
    $gender = $cuser->test_input($_POST['gender']);
    $dob = $cuser->test_input($_POST['dob']);
    $phone = $cuser->test_input($_POST['phone']);

    $oldImage = $_POST['oldimage'];

    $folder = 'uploads/';

    if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
        $newImage = $folder . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

        if ($oldImage != null) {
            unlink($oldImage);
        }
    } else {
        $newImage = $oldImage;
    }
    $cuser->update_profile($name, $gender, $dob, $phone, $newImage, $cid);
    $cuser->user_notification($cid, 'Admin', 'Profile Updated');
}
//Handle Change password profile ajax request
if (isset($_POST['action']) && ($_POST['action'] == 'change_pass')) {
    $currentPass = $cuser->test_input($_POST['curpass']);
    $newPass = $cuser->test_input($_POST['newpass']);
    $cnewPass = $cuser->test_input($_POST['cnewpass']);

    $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

    if ($newPass != $cnewPass) {
        echo $cuser->showMessage('danger', 'Password did not Matched!');
    } else {
        if (password_verify($currentPass, $cpass)) {
            $cuser->change_password($hnewPass, $cid);
            echo $cuser->showMessage('success', 'Password Changed Successfully!');
            $cuser->user_notification($cid, 'Admin', 'Password Change');
        } else {
            echo $cuser->showMessage('danger', 'Current Password is Wrong!');
        }
    }
}
//Handle Verify e-mail ajax request
if (isset($_POST['action']) && ($_POST['action'] == 'verify_email')) {
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = Database::USERNAME;
        $mail->Password   = Database::PASSWORD;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom(Database::USERNAME, 'UserManagementSystem');
        $mail->addAddress($cemail);
        $mail->addReplyTo(Database::USERNAME);

        $mail->isHTML(true);
        $mail->Subject = 'E-Mail Verification';
        $mail->Body = '<h3>Click the below link to verify Your E-mail..<br><br><a class="btn btn-primary btn-lg bg-primary" href="http://localhost/shahab/usermanagement/verify-email.php?email=' . $cemail . '" role="button">Verify E-mail</a><br><br>Regards<br>User Management<h3>';


        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo $cuser->showMessage('Success', 'We have send you the verification link in your e-mail ID, Please check your e-mail!');
        }
    } catch (Exception $e) {
        echo $user->showMessage('danger', 'Something went to wrong... try later');
    }
}
//Handle Send Feedback from user to admin ajax request
if (isset($_POST['action']) && ($_POST['action'] == 'feedback')) {
    $subject = $cuser->test_input($_POST['subject']);
    $feedback = $cuser->test_input($_POST['feedback']);

    $cuser->send_feedback($subject, $feedback, $cid);
    $cuser->user_notification($cid, 'Admin', 'Feedback written');
}
//Handle Fetch of an user Notification
if (isset($_POST['action']) && ($_POST['action'] == 'fetchNotification')) {
    $notification = $cuser->fetchNotification($cid);
    $output = '';

    if ($notification) {
        foreach ($notification as $row) {
            $output .= '<div class="alert alert-danger" role="alert">
            <button type="button" id="' . $row['id'] . '" class="close delete_notification" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">New Notification</h4>
            <hr class="my-2">
            <div class="clearfix"></div>
            <p class="mb-0 lead">' . $row['message'] . '</p>
            <hr class="my-2">
            <p class="mb-0 float-left">Reply of feedback from Admin</p>
            <p class="mb-0 float-right">' . $cuser->timeInAgo($row['created_at']) . '</p>
            <div class="clearfix"></div>
            </div>';
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary mt-5">No any new notification!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-blog')) {
    $output = '';
    $blogs = $adminPanel->get_blogs();


    if ($blogs) {
        $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Category</th>
     <th>Title</th>
     <th>SEO.Title</th>
      <th>SEO.URL</th>
     <th>Keyword</th>
     <th>SEO.Desc</th>
     <th>Description</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
        $sno = 1;
        foreach ($blogs as $row) {
            $output .= ' <tr>
            <td>' . $sno++ . '</td>
            <td>' . $row['category'] . '</td>
            <td>' . $row['title'] . '</td>
            <td>' . $row['seo_title'] . '</td>
            <td>' . $row['seo_url'] . '</td>
            <td>' . $row['seo_key'] . '</td>
            <td>' . substr($row['seo_desc'], 0, 40) . '..</td>
            <td>' . substr(strip_tags($row['description']), 0, 70) . '..</td>
            <td>
            <a href="#" id="' . $row['id'] . '" title="Edit Blog" class="text-primary editBlogBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
            <a href="#" id="' . $row['id'] . '" title="Delete Blog" class="text-danger deleteBlogBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not insert any blog yet! Insert your first blog now!</h3>';
    }
}
if (isset($_POST['editBlogId'])) {

    $id = $_POST['editBlogId'];

    $row = $adminPanel->edit_blog($id);

    echo json_encode($row);
}
if (isset($_POST['deleteBlogBtn'])) {
    $id = $_POST['deleteBlogBtn'];

    $adminPanel->delete_blog($id);
}

if (isset($_POST['action']) && ($_POST['action'] == 'edit-order')) {
    $id = $adminPanel->test_input($_POST['editDeliveryId']);
    $status = $adminPanel->test_input($_POST['paymentStatus']);

    $adminPanel->update_order_status($id, $status);
}

// Fetch Admin Notifications
if (isset($_POST['action']) && ($_POST['action'] == 'fetchAdminNotification')) {
    $notifications = $adminPanel->fetchAdminNotifications();
    $output = '';

    if ($notifications) {
        foreach ($notifications as $row) {
            $icon = ($row['type'] == 'order') ? 'fa-shopping-cart text-primary' : 'fa-info-circle text-info';
            $time = $adminPanel->timeInAgo($row['created_at']);

            $output .= '
             <a class="dropdown-item d-flex align-items-center" href="' . ($row['type'] == 'order' ? 'order' : '#') . '" style="padding: 10px 15px; border-bottom: 1px solid #e3e6f0;">
                <div class="mr-3" style="margin-right: 1rem;">
                    <div class="icon-circle bg-light" style="height: 2.5rem; width: 2.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; background-color: #f8f9fc;">
                        <i class="fas ' . $icon . '"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500" style="color: #b7b9cc; font-size: 80%;">' . $time . '</div>
                    <span class="font-weight-bold" style="white-space: normal; display: block;">' . $row['message'] . '</span>
                </div>
             </a>';
        }
        echo $output;
    } else {
        echo '<a class="dropdown-item text-center small text-gray-500" href="#">No New Alerts</a>';
    }
}
