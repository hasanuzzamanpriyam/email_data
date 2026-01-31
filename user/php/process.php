<?php
require_once 'session.php';

require_once 'auth.php';
$siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/emailbigdata.com/';
$cuserOrder = new Auth();

if (isset($_POST['action']) && ($_POST['action'] == 'display-order')) {
    $output = '';
    $uid = $cid;
    $orders = $cuserOrder->get_orders($uid);
    if ($orders) {
        $output .= ' <table class="table table-striped text-center">
           <thead>
               <tr>
                   <th>S. No</th>
                   <th>Tracking ID</th>
                   <th>E-mail</th>
                   <th>Category</th>
                   <th>Total E-mail</th>
                   <th>Total Price</th>
                   <th>Order Status</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>';
        $sno = 1;
        foreach ($orders as $row) {
            $output .= '
               <td>' . $sno++ . '</td>
               <td>' . $row['tracking_id'] . '</td>
               <td>' . $row['email'] . '</td>
               <td>' . $row['email_category'] . '</td>
               <td>' . $row['total_email'] . '</td>
               <td>' . $row['total_price'] . '</td>
               <td>' . $row['status'] . '</td>';
            if ($row['status'] === 'Completed') {
                $output .= '<td>
                  <a href="' . $siteUrl . 'admin/assets/php/' . $row['delivery_file'] . '" title="Download File" class="btn btn-success download">Download</a>
               </td></tr>';
            } else if ($row['status'] === 'Processing') {
                $output .= '<td>
                  <a href="#" title="Processing File" class="btn btn-primary">Processing</a>
               </td></tr>';
            } else if ($row['status'] === 'Payment Failed') {
                $output .= '<td>
                  <a href="' . $siteUrl . 'checkout/step1?reorder=' . $row['tracking_id'] . '" title="Payment Failed File" class="btn btn-warning">Re-order</a>
               </td></tr>';
            } else if ($row['status'] === 'Refund') {
                $output .= '<td>
                  <a href="#" title="Refund File" class="btn btn-info">Refund</a>
               </td></tr>';
            } else {
                $output .= '<td>
                  <button type="button" class="btn btn-danger" title="Must Have to Complete Order" onclick="clickAlert()">Cancel</button>
               </td></tr>';
            }
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not created any order yet! Create your first order now!</h3>';
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'display-topup')) {
    $output = '';
    $uid = $cid;
    $topup = $cuserOrder->get_topup($uid);

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
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>';
        $sno = 1;
        foreach ($topup as $row) {
            $retopCode = $row['top_code'];
            $output .= '<tr>
               <td>' . $sno++ . '</td>
               <td>' . $retopCode . '</td>
               <td>' . $row['full_name'] . '</td>
               <td>' . $row['email'] . '</td>
               <td>' . $row['amount'] . '</td>
               <td>' . $row['status'] . '</td>';
            if ($row['status'] === 'Completed') {
                $output .= '<td>
                  <a href="#" id="' . $row['id'] . '" title="Delete Topup" class="btn btn-primary deleteTopupBtn">Delete</a>
               </td></tr>';
            } else if ($row['status'] === 'Processing') {
                $output .= '<td>
                  <a href="#" title="Top up processing" class="btn btn-success">Processing</a>
               </td></tr>';
            } else if ($row['status'] === 'Failed') {
                $output .= '<td>
                  <a href="' . $siteUrl . 'user/php/payment?retopup=' . $retopCode . '" title="Top up Failed" class="btn btn-warning">Re-try</a>
               </td></tr>';
            } else if ($row['status'] === 'Cancel') {
                $output .= '<td>
                  <a href="#" title="Top up Cancel" class="btn btn-danger">Cancel</a>
               </td></tr>';
            } else {
                $output .= '<td>
                  <button type="button" class="btn btn-danger" title="Must Have to Complete Topup" onclick="clickAlert()">Delete</button>
               </td></tr>';
            }
        }
        $output .= '</tbody></table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( You have not created any order yet! Create your first order now!</h3>';
    }
}
if (isset($_POST['delete_id'])) {

    $id = $_POST['delete_id'];

    $cuserOrder->delete_topup($id);
}
