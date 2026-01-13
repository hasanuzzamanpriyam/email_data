<?php

require_once 'auth.php';
$adminPanel = new Auth();

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


if(isset($_POST['action']) && ($_POST['action']=='display-emails')){
    $output = '';
    $emails = $adminPanel->get_emails();


    if($emails){
     $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Title</th>
     <th>Category</th>
     <th>Short_Des.</th>
     <th>Long_Des.</th>
     <th>E-mail</th>
     <th>Price</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
     $sno = 1;
        foreach ($emails as $row) {
            $output .= ' <tr>
            <td>'.$sno++.'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['category'].'</td>
            <td>'.substr($row['short_description'],0,60).'..</td>
            <td>'.substr($row['description'],0,100).'..</td>
            <td>'.$row['total_email'].'</td>
            <td>'.$row['price'].'</td>
            <td>
            <a href="#" id="'.$row['id'].'" title="Edit Emails" class="text-primary editEmailBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
            <a href="#" id="'.$row['id'].'" title="Delete Email" class="text-danger deleteEmailBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
            </tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not insert any email yet! Insert your first Emails now!</h3>';
    }
}
//Handle Display All page
if(isset($_POST['action']) && ($_POST['action']=='display-page')){
    $output = '';
    $page = $adminPanel->get_page();


    if($page){
     $output .= '<select class="form-select pageTitle" id="pageName" name="page" aria-label="Select Page Name" onChange="showSelected()">
     <option selected disabled>-Select Options-</option>
     <option>Home</option>
     <option>Custom Business</option>
     <option>Custom Health Care</option>
     <option>Custom Real Estate</option>
     <option>Custom Office 365</option>
     <option>Ready made list</option>
     <option>Job Level</option>
     <option>Job Title</option>
     <option>Job Function</option>
     <option>Real Estate</option>
     <option>Office 365</option>
     <option>Industries</option>
     <option>Health Care</option>
     <option>International</option>
     <option>Pricing</option>';
        foreach ($page as $row) {
            $output .= '<option>'.$row['category'].'</option>';
        }
        $output .='</select>
        <label for="pageName">Select Page Name</label>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not insert any page yet! Insert your first page now!</h3>';
    }
}
if(isset($_POST['action']) && ($_POST['action']=='display-coupon-post')){
    $output = '';
    $page = $adminPanel->get_page();


    if($page){
     $output .= '<select class="form-select pageTitle" id="pageName" name="page" aria-label="Select Post Name" >
     <option selected disabled>-Select Options-</option>';
        foreach ($page as $row) {
            $output .= '<option>'.$row['category'].'</option>';
        }
        $output .='</select>
        <label for="pageName">Select Post Name</label>';
        echo $output;
    }else{
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
    $seoUrl = $adminPanel->test_input(preg_replace('/\s+/', '-', strtolower($_POST['seoUrl'])));
    $seoKey = $adminPanel->test_input($_POST['seoKeyword']);
    $seoDes = $adminPanel->test_input($_POST['seoDescription']);

    echo $adminPanel->inert_seo($page, $seoTitle, $seoUrl, $seoKey, $seoDes);
}
if(isset($_POST['action']) && ($_POST['action']=='display-coupon')){
    $output = '';
    $coupon = $adminPanel->get_coupon();


    if($coupon){
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
            <td>'.$sno++.'</td>
            <td>'.$row['tacking_id'].'</td>
            <td>'.$row['post_title'].'</td>
            <td>'.$row['coupon_title'].'</td>
            <td>'.$row['coupon_type'].'</td>
            <td>'.$row['limitation'].'</td>
            <td>'.$row['amount'].'</td>
            <td>
            <a href="#" id="'.$row['id'].'" title="Edit SEO" class="text-primary editCouponBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
            <a href="#" id="'.$row['id'].'" title="Delete SEO" class="text-danger deleteCouponBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
            </tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not insert any SEO details yet! Insert your first SEO now!</h3>';
    }
}
if(isset($_POST['action']) && ($_POST['action']=='display-seo')){
    $output = '';
    $seoPage = $adminPanel->get_seo_page();


    if($seoPage){
     $output .= '<table class="table table-striped table-hover" style="width:100%">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Page</th>
     <th>SEO_Title</th>
     <th>SEO_URL</th>
     <th>Key_word</th>
     <th>Description</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
     $sno = 1;
        foreach ($seoPage as $row) {
            $output .= ' <tr>
            <td>'.$sno++.'</td>
            <td>'.$row['page'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['url'].'</td>
            <td>'.$row['key_word'].'</td>
            <td>'.substr($row['description'],0,60).'..</td>
            <td>
            <a href="#" id="'.$row['id'].'" title="Edit SEO" class="text-primary editSEOBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
            <a href="#" id="'.$row['id'].'" title="Delete SEO" class="text-danger deleteSEOBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
            </td>
            </tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not insert any SEO details yet! Insert your first SEO now!</h3>';
    }
}
if(isset($_POST['action']) && ($_POST['action']=='display-user')){
    $output = '';
    $users = $adminPanel->get_all_user();


    if($users){
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
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
     $sno = 1;
        foreach ($users as $row) {
            $fullNmae = $row['first_name'].' '.$row['last_name'];
            $output .= ' <tr>
            <td>'.$sno++.'</td>
            <td>'.$fullNmae.'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
            <td>'.$row['country'].'</td>
            <td>'.$row['company'].'</td>
            <td>'.$row['topup'].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="'.$row['id'].'" class="dropdown-item font-weight-bold bandUser" href="#"><i class="fas fa-user-slash"></i>&nbsp;&nbsp;&nbsp;Ban</a></li>
                        <li class="text-center"><a id="'.$row['id'].'" class="dropdown-item font-weight-bold userLogin" href="#"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp;Login</a></li>
                        <li class="text-center"><a id="'.$row['id'].'" class="dropdown-item font-weight-bold userTopup" href="#"><i class="fas fa-cart-arrow-down"></i>&nbsp;&nbsp;&nbsp;Topup</a></li>
                    </ul>
                </div>
            </td>
            </tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not register any user yet!</h3>';
    }
}
if(isset($_POST['action']) && ($_POST['action']=='display-band-user')){
    $output = '';
    $users = $adminPanel->get_all_band_user();


    if($users){
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
            $fullNmae = $row['first_name'].' '.$row['last_name'];
            $output .= ' <tr>
            <td>'.$sno++.'</td>
            <td>'.$fullNmae.'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
            <td>'.$row['country'].'</td>
            <td>'.$row['company'].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="padding: 0 0!important; min-width: 7rem!important;">
                        <li class="text-center"><a id="'.$row['id'].'" class="dropdown-item font-weight-bold returnUser" href="#"><i class="fas fa-user-check"></i>&nbsp;&nbsp;&nbsp;Return</a></li>
                        <li class="text-center"><a id="'.$row['id'].'" class="dropdown-item font-weight-bold deleteUser" href="#"><i class="fas fa-user-times"></i>&nbsp;&nbsp;&nbsp;Delete</a></li>
                    </ul>
                </div>
            </td>
            </tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not register any user yet!</h3>';
    }
}
if(isset($_POST['action']) && ($_POST['action']=='display-order')){
    $output = '';

    $orders = $adminPanel->get_orders();


    if($orders){
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
     <th>Action</th>
     </tr>
     </thead>
     <tbody>';
     $sno =1;
     foreach ($orders as $row) {
         $output .= '
         <td>'.$sno++.'</td>
         <td>'.$row['tracking_id'].'</td>
         <td>'.$row['username'].'</td>
         <td>'.$row['email'].'</td>
         <td>'.$row['email_type'].'</td>
         <td>'.$row['email_category'].'</td>
         <td>'.$row['email_item'].'</td>
         <td>'.$row['total_email'].'</td>
         <td>'.$row['total_price'].'</td>
         <td>'.$row['days'].'</td>
         <td>'.$row['payment_way'].'</td>
         <td>'.$row['status'].'</td>
         <td>
         <a href="#" id="'.$row['id'].'" title="Delivery Order" class="text-primary editOrderBtn" style="font-size: 25px;"><i class="fas fa-reply-all"></i></a>&nbsp;
         <a href="#" id="'.$row['id'].'" title="Delete Order" class="text-danger deleteOrderBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
         </td>
         </tr>';
     }
     $output .='</tbody></table>';
     echo $output;
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='display-sales')){
    $output = '';

    $sales = $adminPanel->get_sales();


    if($sales){
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
     $sno =1;
     foreach ($sales as $row) {
         $output .= '
         <td>'.$sno++.'</td>
         <td>'.$row['tracking_id'].'</td>
         <td>'.$row['username'].'</td>
         <td>'.$row['email'].'</td>
         <td>'.$row['email_type'].'</td>
         <td>'.$row['email_category'].'</td>
         <td>'.$row['email_item'].'</td>
         <td>'.$row['total_email'].'</td>
         <td>'.$row['total_price'].'</td>
         <td>'.$row['days'].'</td>
         <td>'.$row['payment_way'].'</td>
         <td>'.$row['status'].'</td>
         <td>'.$row['delivery_file'].'</td>
         <td>
         <a href="#" id="'.$row['id'].'" title="Edit Sale" class="text-primary editSaleBtn"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
         <a href="#" id="'.$row['id'].'" title="Delete Sale" class="text-danger deleteSaleBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
         </td>
         </tr>';
     }
     $output .='</tbody></table>';
     echo $output;
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any sales yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='display-subscription')){
    $output = '';

    $subscription = $adminPanel->get_subscription();


    if($subscription){
     $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>email</th>
     </tr>
     </thead>
     <tbody>';
     $sno =1;
     foreach ($subscription as $row) {
         $output .= '
         <td>'.$sno++.'</td>
         <td>'.$row['email'].'</td>
         </tr>';
     }
     $output .='</tbody></table>';
     echo $output;
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any subscription yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='display-feedback')){
    $output = '';

    $feedback = $adminPanel->get_feedback();


    if($feedback){
     $output .= ' <table class="table table-striped text-center">
     <thead>
     <tr>
     <th>S. No</th>
     <th>Full Name</th>
     <th>E-mail</th>
     <th>Feedback</th>
     </tr>
     </thead>
     <tbody>';
     $sno =1;
     foreach ($feedback as $row) {
        $fullNmae = $row['first_name'].' '.$row['last_name'];
         $output .= '
         <td>'.$sno++.'</td>
         <td>'.$fullNmae.'</td>
         <td>'.$row['email'].'</td>
         <td>'.$row['message'].'</td>
         </tr>';
     }
     $output .='</tbody></table>';
     echo $output;
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any feedback yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='total-user-number')){

    $users = $adminPanel->total_user_number();

    if($users){
     $count = 0;
     foreach ($users as $row) {
        $count++;
     }
     echo number_format($count);
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any user yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='total-order-number')){

    $orders = $adminPanel->total_order_number();

    if($orders){
     $count = 0;
     $orderAmount = 0;
     foreach ($orders as $row) {
        $count++;
        $orderAmount += $row['total_price'];
     }
     echo '<h5><span>Orders: '.number_format($count).'/-</span><br><span>Amount: $ '.number_format($orderAmount).'</span> </h5>';
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any order yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='total-sales-number')){

    $sales = $adminPanel->total_sales_number();

    if($sales){
     $count = 0;
     foreach ($sales as $row) {
        $count++;
     }
     echo number_format($count);
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any sales yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='total-email-number')){

    $email = $adminPanel->total_email_number();

    if($email){
     $count = 0;
     foreach ($email as $row) {
        $count += $row['total_email'];
     }
     echo number_format($count);
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any email yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='total-feedback-number')){

    $feedback = $adminPanel->total_feedback_number();

    if($feedback){
     $count = 0;
     foreach ($feedback as $row) {
        $count++;
     }
     echo number_format($count);
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any feedback yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='total-subscription-number')){

    $subscription = $adminPanel->total_subscription_number();

    if($subscription){
     $count = 0;
     foreach ($subscription as $row) {
        $count++;
     }
     echo number_format($count);
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any subscription yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='total-income-number')){

    $income = $adminPanel->total_sales_number();
    $totalIncome = 0;

    if($income){
     foreach ($income as $row) {
        $totalIncome += $row['total_price'];
     }
     echo number_format($totalIncome);
 }else{
    echo '<h3 class="text-center text-secondary">:( You have not any subscription yet!</h3>';
}
}
if(isset($_POST['action']) && ($_POST['action']=='display-order-email')){
    $output = '';
    $customerEmail = $adminPanel->get_orders();


    if($customerEmail){
     $output .= '<select class="form-select pageTitle" id="pageName" name="page" aria-label="Select Page Name">
     <option selected disabled>-Select Options-</option>';
        foreach ($customerEmail as $row) {
            $output .= '<option>'.$row['email'].'</option>';
        }
        $output .='</select>
        <label for="pageName">Select Customer Email</label>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not insert any page yet! Insert your first page now!</h3>';
    }
}
if(isset($_POST['editOrderId'])){

    $id = $_POST['editOrderId'];

    $row = $adminPanel->edit_order($id);

    echo json_encode($row);
}
if(isset($_POST['userTopup'])){

    $id = $_POST['userTopup'];

    $row = $adminPanel->get_top_user($id);

    echo json_encode($row);
}
if(isset($_POST['action']) && ($_POST['action'] == 'topup')){

    $id = $_POST['topId'];
    $amount = $_POST['amount'];
    $row = $adminPanel->get_top_user($id);
    $total = $amount + $row['topup'];

    $adminPanel->topup($id,$total);
    
}
if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];

    $adminPanel->delete_order($id);
}
if(isset($_POST['editCouponBtn'])){

    $id = $_POST['editCouponBtn'];

    $row = $adminPanel->edit_coupon($id);

    echo json_encode($row);
}
if(isset($_POST['deleteCouponBtn'])){
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
    $emailFile = $getCoupon['delivery_file'];
    $id = $getCoupon['cop_id'];
    $presentPrice = $getCoupon['total_price'];
    $couponDetails = $adminPanel->edit_coupon($id);
    $copId = $couponDetails['id'];
    $copLim = $couponDetails['limitation'];
    $copType = $couponDetails['coupon_type'];
    $copAm = $couponDetails['amount'];
    $copCost = $couponDetails['coupon_amount'];

    if($copType === 'Percentage'){
        $copLim = $copLim - 1;
        $temp = ($presentPrice * 100)/(100 - $copAm);
        $copCost = $copCost + ($temp - $presentPrice);
    }else{
        $copLim = $copLim - 1;
        $copCost = $copCost + $copAm;
    }
    $copCost = round($copCost);
    $adminPanel->update_coupon_avai($copId, $copLim, $copCost);

    try {
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        $from = 'admin@mailerstation.com';
        $to = $delEmail;
        $subject = "Delivery Email List";
        $message = "Your download link is given below.. Please click the below link and download your full package....
        https://mailerstation.com/admin/assets/php/'.$emailFile";

        $headers = "From:".$from;

        mail($to,$subject,$message,$headers);
        echo 'Message Send Successfully';
        
    }catch(Exception $e){
        echo $user->showMessage('danger','Something went to wrong... try later');
    }
}
if(isset($_POST['editSaleId'])){

    $id = $_POST['editSaleId'];

    $row = $adminPanel->edit_order($id);

    echo json_encode($row);
}
if(isset($_POST['delete_sale_id'])){
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
if(isset($_POST['editSEOId'])){

    $id = $_POST['editSEOId'];

    $row = $adminPanel->edit_seo($id);

    echo json_encode($row);
}
if(isset($_POST['delete_seo_id'])){

    $id = $_POST['delete_seo_id'];

    $result = $adminPanel->delete_seo($id);
    
    echo $result;
}
if(isset($_POST['action']) && ($_POST['action'] == 'update-seo')){
    $id = $adminPanel->test_input($_POST['updateSeoId']);
    $seoTitle = $adminPanel->test_input($_POST['seoUpdateTitle']);
    $seoUrl = $adminPanel->test_input(preg_replace('/\s+/', '-', strtolower($_POST['seoUpdateUrl'])));
    $seoKey = $adminPanel->test_input($_POST['seoUpdateKeyword']);
    $seoDes = $adminPanel->test_input($_POST['seoUpdateDescription']);

    $result = $adminPanel->update_seo($id, $seoTitle, $seoUrl, $seoKey, $seoDes);
    
    echo $result;
}
if(isset($_POST['action']) && ($_POST['action'] == 'update-coupon')){

    $id = $adminPanel->test_input($_POST['updateCouponId']);
    $couponTitle = $adminPanel->test_input($_POST['updatecouponTitle']);
    $track = $adminPanel->test_input($_POST['updatecouponKeyword']);
    $limit = $adminPanel->test_input($_POST['updatecouponLimit']);
    $type = $adminPanel->test_input($_POST['updatecouponType']);
    $amount = $adminPanel->test_input($_POST['updatecouponAmount']);

    $adminPanel->update_coupon($id, $couponTitle, $track, $limit, $type, $amount);
}
if(isset($_POST['editEmailId'])){

    $id = $_POST['editEmailId'];

    $row = $adminPanel->edit_email($id);

    echo json_encode($row);
}
if(isset($_POST['deleteEmailBtn'])){
    $id = $_POST['deleteEmailBtn'];

    $adminPanel->delete_email($id);
}
if(isset($_POST['bandUser'])){

    $id = $_POST['bandUser'];

    $adminPanel->bandUser($id);
}
if(isset($_POST['returnUser'])){

    $id = $_POST['returnUser'];

    $adminPanel->returnUser($id);
}
if(isset($_POST['deleteUser'])){

    $id = $_POST['deleteUser'];

    $adminPanel->deleteUser($id);
}
if(isset($_POST['action']) && ($_POST['action']=='display-topup')){
    $output = '';
    $topup = $adminPanel->get_topup();

    if($topup){
       $output .= ' <table class="table table-striped text-center">
       <thead>
           <tr>
               <th>S. No</th>
               <th>Tracking ID</th>
               <th>Name</th>
               <th>E-mail</th>
               <th>Amount</th>
               <th>Status</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>';
       $sno = 1;
       foreach ($topup as $row) {
           $output .= '<tr>
               <td>'.$sno++.'</td>
               <td>'.$row['top_code'].'</td>
               <td>'.$row['full_name'].'</td>
               <td>'.$row['email'].'</td>
               <td>'.$row['amount'].'</td>
               <td>'.$row['status'].'</td>
               <td>
                   <a href="#" id="'.$row['id'].'" title="Edit Top" class="text-primary editTopBtn" style="font-size: 25px;"><i class="fas fa-reply-all"></i></a>&nbsp;
                    <a href="#" id="'.$row['id'].'" title="Delete Top" class="text-danger deleteTopBtn"><i class="fas fa-trash-alt fa-lg"></i></a>
               </td>
           </tr>';
       }
       $output .='</tbody></table>';
       echo $output;
    }else{
        echo '<h3 class="text-center text-secondary">:( You have not created any order yet! Create your first order now!</h3>';
    }
}
if(isset($_POST['editTopId'])){

    $id = $_POST['editTopId'];

    $row = $adminPanel->editTop($id);

    echo json_encode($row);
}
if(isset($_POST['delete_top_id'])){

    $id = $_POST['delete_top_id'];

    $adminPanel->delete_top($id);
}
if(isset($_POST['action']) && ($_POST['action'] == 'update_topup')){
    $topId = $adminPanel->test_input($_POST['topId']);
    $topUid = $adminPanel->test_input($_POST['topUid']);
    $topAmount = $adminPanel->test_input($_POST['amount']);
    $topStatus = $adminPanel->test_input($_POST['topUpStatus']);

    $row = $adminPanel->get_top_amount($topUid);
    $preTop = $row['topup'];
    $total = $topAmount + $preTop;

    $adminPanel->update_top($topId, $topStatus);

    if($topStatus === 'Completed'){
        $adminPanel->topup($topUid,$total);
    }

}
    //Handle profile update ajax request
if(isset($_FILES['image'])){
    $name = $cuser->test_input($_POST['name']);
    $gender = $cuser->test_input($_POST['gender']);
    $dob = $cuser->test_input($_POST['dob']);
    $phone = $cuser->test_input($_POST['phone']);

    $oldImage = $_POST['oldimage'];

    $folder = 'uploads/';

    if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")){
        $newImage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

        if(oldImage != null){
            unlink($oldImage);
        }
    }else{
        $newImage = $oldImage;
    }
    $cuser->update_profile($name, $gender, $dob, $phone, $newImage, $cid);
    $cuser->user_notification($cid, 'Admin', 'Profile Updated');
}
    //Handle Change password profile ajax request
if(isset($_POST['action']) && ($_POST['action'] == 'change_pass')){
    $currentPass = $cuser->test_input($_POST['curpass']);
    $newPass = $cuser->test_input($_POST['newpass']);
    $cnewPass = $cuser->test_input($_POST['cnewpass']);

    $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

    if($newPass != $cnewPass){
        echo $cuser->showMessage('danger', 'Password did not Matched!');
    }else{
        if(password_verify($currentPass, $cpass)){
            $cuser->change_password($hnewPass, $cid);
            echo $cuser->showMessage('success','Password Changed Successfully!');
            $cuser->user_notification($cid, 'Admin', 'Password Change');
        }else{
            echo $cuser->showMessage('danger','Current Password is Wrong!');
        }
    }
}
    //Handle Verify e-mail ajax request
if(isset($_POST['action']) && ($_POST['action'] == 'verify_email')){
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = Database::USERNAME;
        $mail->Password   = Database::PASSWORD;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom(Database::USERNAME,'UserManagementSystem');
        $mail->addAddress($cemail);
        $mail->addReplyTo(Database::USERNAME);

        $mail->isHTML(true);
        $mail->Subject = 'E-Mail Verification';
        $mail->Body ='<h3>Click the below link to verify Your E-mail..<br><br><a class="btn btn-primary btn-lg bg-primary" href="http://localhost/shahab/usermanagement/verify-email.php?email='.$cemail.'" role="button">Verify E-mail</a><br><br>Regards<br>User Management<h3>';


        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo $cuser->showMessage('Success','We have send you the verification link in your e-mail ID, Please check your e-mail!');
        }
    }catch(Exception $e){
        echo $user->showMessage('danger','Something went to wrong... try later');
    }
}
    //Handle Send Feedback from user to admin ajax request
if(isset($_POST['action']) && ($_POST['action']=='feedback')){
    $subject = $cuser->test_input($_POST['subject']);
    $feedback = $cuser->test_input($_POST['feedback']);

    $cuser->send_feedback($subject, $feedback, $cid);
    $cuser->user_notification($cid, 'Admin', 'Feedback written');
}
    //Handle Fetch of an user Notification
if(isset($_POST['action']) && ($_POST['action'] == 'fetchNotification')){
    $notification = $cuser->fetchNotification($cid);
    $output = '';

    if($notification){
        foreach ($notification as $row) {
            $output .= '<div class="alert alert-danger" role="alert">
            <button type="button" id="'.$row['id'].'" class="close delete_notification" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">New Notification</h4>
            <hr class="my-2">
            <div class="clearfix"></div>
            <p class="mb-0 lead">'.$row['message'].'</p>
            <hr class="my-2">
            <p class="mb-0 float-left">Reply of feedback from Admin</p>
            <p class="mb-0 float-right">'.$cuser->timeInAgo($row['created_at']).'</p>
            <div class="clearfix"></div>
            </div>';
        }
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">No any new notification!</h3>';
    }
}
    //Handle Check Notification of an user

/*
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

    //Handle add New Event ajax request
if(isset($_POST['submit']) && !empty($_FILES['image'])){

        //Picture validate and save folder
    $file = $_FILES['image'];

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

        //Extation of picture
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

        //picture allow to site
    $allowed = array('jpg','jpeg','png','gif');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
                if($fileSize< 1000000){ //500MB
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }else{
                    echo 'Your File is too Large!';
                }
            }else{
                echo 'There was an error uploading your file!';
            }
        }else{
            echo "You can't upload files of this type!";
        } 

        //Other data of this form
        $eventImage = $fileDestination;
        $eventName = $cuserEvent->test_input($_POST['event']);
        $location = $cuserEvent->test_input($_POST['location']);
        $description = $cuserEvent->test_input($_POST['description']);
        $startDate = $cuserEvent->test_input($_POST['startDate']);
        $startTime = $cuserEvent->test_input($_POST['startTime']);
        $endDate = $cuserEvent->test_input($_POST['endDate']);
        $endTime = $cuserEvent->test_input($_POST['endTime']);
        $eventType = $cuserEvent->test_input($_POST['eventType']);
        $eventCategory = $cuserEvent->test_input($_POST['eventCategory']);
        $organization = $cuserEvent->test_input($_POST['organization']);
        $ticketType = $cuserEvent->test_input($_POST['ticketType']);
        $price = $cuserEvent->test_input($_POST['price']);
        $quantity = $cuserEvent->test_input($_POST['quantity']);
        $tstartDate = $cuserEvent->test_input($_POST['tstartDate']);
        $tstartTime = $cuserEvent->test_input($_POST['tstartTime']);
        $tendDate = $cuserEvent->test_input($_POST['tendDate']);
        $tendTime = $cuserEvent->test_input($_POST['tendTime']);

        $adminPanel->add_new_event($eventImage,$eventName,$location,$description,$startDate,$startTime,$endDate,$endTime,$eventType,$eventCategory,$organization,$ticketType,$price,$quantity,$tstartDate,$tstartTime,$tendDate,$tendTime);


        header('location: ../../home.php'); 
    }*/

    ?>

