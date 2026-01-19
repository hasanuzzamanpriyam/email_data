<?php
include_once '../assets/php/header.php';

if (isset($_POST['businessBtn'])) {
    if (!empty($_POST['businessTechno'])) {
        if (!isset($_SESSION['selectItem']) || !is_array($_SESSION['selectItem'])) {
            $_SESSION['selectItem'] = [];
        }
        foreach ($_POST['businessTechno'] as $selected) {
            $_SESSION['selectItem'][] = array(
                'id' => rand(100, 10000),
                'emailCategory' => $_POST['business'],
                'itemname' => $selected
            );
        }
    }
}

if (isset($_SESSION['selectItem'])) {
    if (isset($_GET['remove'])) {
        $id = $_GET['id'];
        foreach ($_SESSION['selectItem'] as $key => $del) {
            if ($id == $del['id']) {
                unset($_SESSION['selectItem'][$key]);
            }
        }
    }
}

?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-v1.11.1.min.js"></script>
<style>
    .modal .modal-body {
        max-height: 300px;
        overflow-y: auto;
    }

    .row .col-sm-6 button {
        width: 100%;
    }

    .close {
        text-align: right;
    }

    .row .col-sm-3 input {
        background-color: green;
        color: white;
        font-weight: 600;
        text-align: center;
        border: none;
        border-radius: 5px;
        font-size: 15px;
        padding: 7px 20px;
    }

    .form-group {
        margin-bottom: 0 !important;
    }

    .form-group input[type=checkbox] {
        border: none;
        border: 1px solid red !important;
    }

    .form-group label {
        font-weight: 600;
        font-size: 15px;
    }

    .labelStyle {
        background-color: green;
        color: #ffffff;
        width: 300px;
        margin: auto;
        margin-bottom: 10px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .itemStyle {
        margin-bottom: 10px;
        margin-left: 3px;
        float: left;
        font-size: 16px;
        font-weight: 600;
        border: 1px solid #AEB6BF;
        background: #F2F3F4;
        border-radius: 5px;
        padding: 3px 5px;
    }

    .itemStyle:hover {
        background-color: #EB3D32;
        color: #ffffff;
    }

    .orderStyle {
        width: 300px;
        margin: auto;
    }

    .categoryStyle {
        background-color: #FD000D;
        color: #ffffff;
        border-radius: 8px;
    }

    .subtabStyle {
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .mybtn {
        border: none;
        background-color: transparent;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
        padding: 0;
    }

    .mySelectBtn {
        border-radius: 5px;
    }

    #myDiv,
    #myDiv-2,
    #myDiv-3,
    #myDiv-4,
    #myDiv-5,
    #myDiv-6,
    #myDiv-7,
    #myDiv-8,
    #myDiv-9,
    #myDiv-10,
    #myDiv-11,
    #myDiv-12,
    #myDiv-13,
    #myDiv-14,
    #myDiv-15,
    #myDiv-16,
    #myDiv-17,
    #myDiv-18,
    #myDiv-19,
    #myDiv-20,
    #myDiv-21,
    #myDiv-22,
    #myDiv-23,
    #myDiv-24,
    #myDiv-25,
    #myDiv-26,
    #myDiv-27,
    #myDiv-28,
    #myDiv-29,
    #myDiv-30,
    #myDiv-31 {
        margin-left: 25px;
        display: none;
    }

    @media screen and (max-width: 768px) {
        .main-title h1 {
            text-align: center;
        }

        .row .col-sm-2 button {
            margin-bottom: 8px;
        }
    }

    .editable:empty:before {
        content: attr(data-placeholder);
        color: red;
    }

    .tab--btn-md-3>.tab__nav>a {
        width: 25%;
    }
</style>
<div class="container" style="height: 0auto;">
    <div class="main-title text-center" style="margin: 40px 0px;">
        <h2 style="font-weight: 600; color: #EB3D32;">Please add more filters to your search</h2>
    </div>
    <main class="pad-bottom">
        <div class="container regular-page-content regular-page-content--pull-top">
            <div class="tab tab--primary tab--btn-md-3 tab--responsive-sm subtabStyle">
                <div class="tab__nav js-tabs">
                    <a class="is-active" href="<?= $siteUrl; ?>custom-order/business-contacts">Business Contacts</a>
                    <a href="<?= $siteUrl; ?>custom-order/healthcare-professionals">Healthcare Professionals</a>
                    <a href="<?= $siteUrl; ?>custom-order/real-estate-agents">Real Estate Agents</a>
                    <a href="<?= $siteUrl; ?>custom-order/office-365">Office 365</a>
                    <button id="tab-toggle-btn" class="tab__toggle-btn" type="button"></button>
                </div>
            </div>
            <div class="box box--info gap-bottom categoryStyle">
                <div class="row" style="text-align: center;">
                    <div class="col-lg-12 gap-bottom-small-tlnd">
                        <h2 class="secondary-title clear-gap-vertical font-medium">Complete Your Order Specific Category for Business Contacts</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="main-title">
                    <h1 style="font-weight: 600; font-size: 25px; color: green;">BUSINESS CONTACTS</h1>
                </div>
                <hr>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="business">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#industires">
                                    Industry
                                </button>
                                <!----Industries modal starts here--->
                                <div id="industires" class="modal fade" role='dialog'>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title text-success" style="margin-bottom: 10px; font-size: 20px; font-weight: 700;">Make
                                                    Your Custom Order</h4>
                                                <div class='form-group'>
                                                    <textarea name="" rows="4" class="form-control output"
                                                        style="font-size: 16px; font-weight: 600;" readonly
                                                        placeholder="You are not selected any item yet!"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="main-order-item">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="business" value="Industry">
                                                            <input type="hidden" name="businessCategory" value="Business">
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Accounting">
                                                                    <label for="">Accounting</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Airlines/Aviation">
                                                                    <label for="">Airlines/Aviation</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Alternative Dispute Resolution">
                                                                    <label for="">Alternative Dispute Resolution</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Alternative Medicine">
                                                                    <label for="">Alternative Medicine</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Animation">
                                                                    <label for="">Animation</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Apparel & Fashion">
                                                                    <label for="">Apparel & Fashion</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Architecture & Planning">
                                                                    <label for="">Architecture & Planning</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Arts & Crafts">
                                                                    <label for="">Arts & Crafts</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Automotive">
                                                                    <label for="">Automotive</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Aviation & Aerospace">
                                                                    <label for="">Aviation & Aerospace</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Banking">
                                                                    <label for="">Banking</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Biotechnology">
                                                                    <label for="">Biotechnology</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Broadcast Media">
                                                                    <label for="">Broadcast Media</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Building Materials">
                                                                    <label for="">Building Materials</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Business Supplies & Equipment">
                                                                    <label for="">Business Supplies & Equipment</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Capital Markets">
                                                                    <label for="">Capital Markets</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Chemicals">
                                                                    <label for="">Chemicals</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Civic & Social Organization">
                                                                    <label for="">Civic & Social Organization</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Civil Engineering">
                                                                    <label for="">Civil Engineering</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Commercial Real Estate">
                                                                    <label for="">Commercial Real Estate</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Computer & Network Security">
                                                                    <label for="">Computer & Network Security</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Computer Games">
                                                                    <label for="">Computer Games</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Computer Hardware">
                                                                    <label for="">Computer Hardware</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Computer Networking">
                                                                    <label for="">Computer Networking</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Computer Software">
                                                                    <label for="">Computer Software</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Construction">
                                                                    <label for="">Construction</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Consumer Electronics">
                                                                    <label for="">Consumer Electronics</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Consumer Goods">
                                                                    <label for="">Consumer Goods</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Consumer Services">
                                                                    <label for="">Consumer Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Cosmetics">
                                                                    <label for="">Cosmetics</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Dairy">
                                                                    <label for="">Dairy</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Defense & Space">
                                                                    <label for="">Defense & Space</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Design">
                                                                    <label for="">Design</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Education Management">
                                                                    <label for="">Education Management</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="E-learning">
                                                                    <label for="">E-learning</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Electrical & Electronic Manufacturing">
                                                                    <label for="">Electrical & Electronic Manufacturing</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Entertainment">
                                                                    <label for="">Entertainment</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Environmental Services">
                                                                    <label for="">Environmental Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Events Services">
                                                                    <label for="">Events Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Executive Office">
                                                                    <label for="">Executive Office</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Facilities Services">
                                                                    <label for="">Facilities Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Farming">
                                                                    <label for="">Farming</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Financial Services">
                                                                    <label for="">Financial Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Fine Art">
                                                                    <label for="">Fine Art</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Fishery">
                                                                    <label for="">Fishery</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Food & Beverages">
                                                                    <label for="">Food & Beverages</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Food Production">
                                                                    <label for="">Food Production</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Fundraising">
                                                                    <label for="">Fundraising</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Furniture">
                                                                    <label for="">Furniture</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Gambling & Casinos">
                                                                    <label for="">Gambling & Casinos</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Glass, Ceramics & Concrete">
                                                                    <label for="">Glass, Ceramics & Concrete</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Government Administration">
                                                                    <label for="">Government Administration</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Government Relations">
                                                                    <label for="">Government Relations</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Graphic Design">
                                                                    <label for="">Graphic Design</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Health, Wellness & Fitness">
                                                                    <label for="">Health, Wellness & Fitness</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Higher Education">
                                                                    <label for="">Higher Education</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Hospital & Health Care">
                                                                    <label for="">Hospital & Health Care</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Hospitality">
                                                                    <label for="">Hospitality</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Human Resources">
                                                                    <label for="">Human Resources</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Import & Export">
                                                                    <label for="">Import & Export</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Individual & Family Services">
                                                                    <label for="">Individual & Family Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Industrial Automation">
                                                                    <label for="">Industrial Automation</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Information Services">
                                                                    <label for="">Information Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Information Technology & Services">
                                                                    <label for="">Information Technology & Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Insurance">
                                                                    <label for="">Insurance</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="International Affairs">
                                                                    <label for="">International Affairs</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="International Trade & Development">
                                                                    <label for="">International Trade & Development</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Internet">
                                                                    <label for="">Internet</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Investment Banking/Venture">
                                                                    <label for="">Investment Banking/Venture</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Investment Management">
                                                                    <label for="">Investment Management</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Judiciary">
                                                                    <label for="">Judiciary</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Law Enforcement">
                                                                    <label for="">Law Enforcement</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Law Practice">
                                                                    <label for="">Law Practice</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="" value="Legal Services">
                                                                    <label for="">Legal Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Legislative Office">
                                                                    <label for="">Legislative Office</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Leisure & Travel">
                                                                    <label for="">Leisure & Travel</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Libraries">
                                                                    <label for="">Libraries</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Logistics & Supply Chain">
                                                                    <label for="">Logistics & Supply Chain</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Luxury Goods & Jewelry">
                                                                    <label for="">Luxury Goods & Jewelry</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Machinery">
                                                                    <label for="">Machinery</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Management Consulting">
                                                                    <label for="">Management Consulting</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Maritime">
                                                                    <label for="">Maritime</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Marketing & Advertising">
                                                                    <label for="">Marketing & Advertising</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Market Research">
                                                                    <label for="">Market Research</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Mechanical or Industrial Engineering">
                                                                    <label for="">Mechanical or Industrial Engineering</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Media Production">
                                                                    <label for="">Media Production</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Medical Device">
                                                                    <label for="">Medical Device</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Medical Practice">
                                                                    <label for="">Medical Practice</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Mental Health Care">
                                                                    <label for="">Mental Health Care</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Military">
                                                                    <label for="">Military</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Mining & Metals">
                                                                    <label for="">Mining & Metals</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Motion Pictures & Film">
                                                                    <label for="">Motion Pictures & Film</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Museums & Institutions">
                                                                    <label for="">Museums & Institutions</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Music">
                                                                    <label for="">Music</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Nanotechnology">
                                                                    <label for="">Nanotechnology</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Newspapers">
                                                                    <label for="">Newspapers</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Nonprofit Organization Management">
                                                                    <label for="">Nonprofit Organization Management</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Oil & Energy">
                                                                    <label for="">Oil & Energy</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Online Publishing">
                                                                    <label for="">Online Publishing</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Outsourcing/Offshoring">
                                                                    <label for="">Outsourcing/Offshoring</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Package/Freight Delivery">
                                                                    <label for="">Package/Freight Delivery</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Packaging & Containers">
                                                                    <label for="">Packaging & Containers</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Paper & Forest Products">
                                                                    <label for="">Paper & Forest Products</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Performing Arts">
                                                                    <label for="">Performing Arts</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Pharmaceuticals">
                                                                    <label for="">Pharmaceuticals</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Philanthropy">
                                                                    <label for="">Philanthropy</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Photography">
                                                                    <label for="">Photography</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Plastics">
                                                                    <label for="">Plastics</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Political Organization">
                                                                    <label for="">Political Organization</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Primary/Secondary Education">
                                                                    <label for="">Primary/Secondary Education</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Printing">
                                                                    <label for="">Printing</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Professional Training">
                                                                    <label for="">Professional Training</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Program Development">
                                                                    <label for="">Program Development</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Public Policy">
                                                                    <label for="">Public Policy</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Public Relations">
                                                                    <label for="">Public Relations</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Public Safety">
                                                                    <label for="">Public Safety</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Publishing">
                                                                    <label for="">Publishing</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Railroad Manufacture">
                                                                    <label for="">Railroad Manufacture</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Ranching">
                                                                    <label for="">Ranching</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Real Estate">
                                                                    <label for="">Real Estate</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Recreational">
                                                                    <label for="">Recreational</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Facilities & Services">
                                                                    <label for="">Facilities & Services</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Religious Institutions">
                                                                    <label for="">Religious Institutions</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Renewables & Environment">
                                                                    <label for="">Renewables & Environment</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Research">
                                                                    <label for="">Research</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Restaurants">
                                                                    <label for="">Restaurants</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Retail">
                                                                    <label for="">Retail</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Security & Investigations">
                                                                    <label for="">Security & Investigations</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Semiconductors">
                                                                    <label for="">Semiconductors</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Shipbuilding">
                                                                    <label for="">Shipbuilding</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Sporting Goods">
                                                                    <label for="">Sporting Goods</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Sports">
                                                                    <label for="">Sports</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Staffing & Recruiting">
                                                                    <label for="">Staffing & Recruiting</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Supermarkets">
                                                                    <label for="">Supermarkets</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Telecommunications">
                                                                    <label for="">Telecommunications</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Textiles">
                                                                    <label for="">Textiles</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Think Tanks">
                                                                    <label for="">Think Tanks</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Tobacco">
                                                                    <label for="">Tobacco</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Translation & Localization">
                                                                    <label for="">Translation & Localization</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Transportation/Trucking/Railroad">
                                                                    <label for="">Transportation/Trucking/Railroad</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Utilities">
                                                                    <label for="">Utilities</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Venture Capital">
                                                                    <label for="">Venture Capital</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Veterinary">
                                                                    <label for="">Veterinary</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Warehousing">
                                                                    <label for="">Warehousing</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Wholesale">
                                                                    <label for="">Wholesale</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Wine & Spirits">
                                                                    <label for="">Wine & Spirits</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Wireless">
                                                                    <label for="">Wireless</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Writing & Editing">
                                                                    <label for="">Writing & Editing</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Submit" class="btn btn-primary" name="businessBtn">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Industries Modal ends here--->
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="business">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#company">
                                    Company
                                </button>
                                <!-- The modal -->
                                <div class="modal fade" id="company" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="modalLabel">Write Your Targeted Company Name</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="business" value="Company">
                                                    <input type="hidden" name="businessCategory" value="Business">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-11">
                                                            <div class="form-group">
                                                                <label for="searchCity">Insert Companies Name</label>
                                                                <input type="text" name="businessTechno[]" placeholder="Please, Type companies name max 2000 entries" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-9"></div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <input type="submit" name="businessBtn" value="Submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="business">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#jobLevel">
                                    Job Level
                                </button>
                                <!----Job Level modal starts here--->
                                <div id="jobLevel" class="modal fade" role='dialog'>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title text-success" style="margin-bottom: 10px; font-size: 20px; font-weight: 700;">Make
                                                    Your Custom Order</h4>
                                                <div class='form-group'>
                                                    <textarea name="" rows="4" class="form-control output"
                                                        style="font-size: 16px; font-weight: 600;" readonly
                                                        placeholder="You are not selected any item yet!"></textarea>
                                                </div>
                                            </div>

                                            <form action="" method="POST">
                                                <input type="hidden" name="business" value="Job-Level">
                                                <input type="hidden" name="businessCategory" value="Business">
                                                <div class="modal-body">
                                                    <div class="main-order-item">
                                                        <div class="row">
                                                            <div class="col-sm-1"></div>
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="C-Level">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change(this);" />
                                                                    <label for="" id="myLabel">C-Level</label>
                                                                    <div id="myDiv">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='Board Member'>
                                                                            <label for='clevel-1'>Board
                                                                                Member</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='Board of Director'>
                                                                            <label for='clevel-2'>Board
                                                                                of Director</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='CEO'>
                                                                            <label for='clevel-3'>CEO</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='CFO'>
                                                                            <label for='clevel-4'>CFO</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='CIO'>
                                                                            <label for='clevel-5'>CIO</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='CMO'>
                                                                            <label for='clevel-6'>CMO</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='COO'>
                                                                            <label for='clevel-7'>COO</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='CTO'>
                                                                            <label for='clevel-8'>CTO</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='Chairman'>
                                                                            <label for='clevel-9'>Chairman</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='Executive Director'>
                                                                            <label for='clevel-10'>Executive
                                                                                Director</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='Executive Officer'>
                                                                            <label for='clevel-11'>Executive
                                                                                Officer</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='Founder'>
                                                                            <label for='clevel-12'>Founder</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='General Counsel'>
                                                                            <label for='clevel-13'>General
                                                                                Counsel</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='General Manager'>
                                                                            <label for='clevel-14'>General
                                                                                Manager</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='Investor'>
                                                                            <label for='clevel-15'>Investor</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='Managing  Director'>
                                                                            <label for='clevel-16'>Managing
                                                                                Director</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='Owner'>
                                                                            <label for='clevel-17'>Owner</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' value='Partner'>
                                                                            <label for='clevel-18'>Partner</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='President'>
                                                                            <label for='clevel-19'>President</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='Shareholder'>
                                                                            <label for='clevel-20'>Shareholder</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]'
                                                                                value='Other C-Levels'>
                                                                            <label for='clevel-21'>Other
                                                                                C-Levels</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="VP-Level">
                                                                    <label for="">VP-Level</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Director">
                                                                    <label for="">Director</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Manager">
                                                                    <label for="">Manager</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Non-Manager">
                                                                    <label for="">Non-Manager</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Top-Management">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_2(this);" />
                                                                    <label for="" id="myLabel-2">Top-Management</label>
                                                                    <div id="myDiv-2">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='top-1' value='Top Management'>
                                                                            <label for='top-1'>Top Management</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='top-2' value='Deputy'>
                                                                            <label for='top-2'>Deputy</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Business">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_3(this);" />
                                                                    <label for="" id="myLabel-3">Business Development</label>
                                                                    <div id="myDiv-3">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='business-1'
                                                                                value='Business Development'>
                                                                            <label for='business-1'>Business Development</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='business-2'
                                                                                value='Marketing'>
                                                                            <label for='business-2'>Marketing</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='business-3' value='Sales'>
                                                                            <label for='business-3'>Sales</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='business-4'
                                                                                value='Sales Marketing'>
                                                                            <label for='business-4'>Sales Marketing</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='business-5'
                                                                                value='Commercial'>
                                                                            <label for='business-5'>Commercial</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='business-6'
                                                                                value='Wholesale-Retail'>
                                                                            <label for='business-6'>Wholesale-Retail</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='business-7'
                                                                                value='Strategy'>
                                                                            <label for='business-7'>Strategy</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Engineering">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_4(this);" />
                                                                    <label for="" id="myLabel-4">Engineering</label>
                                                                    <div id="myDiv-4">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='engineering-1'
                                                                                value='Engineering'>
                                                                            <label for='engineering-1'>Engineering</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='engineering-2'
                                                                                value='Design'>
                                                                            <label for='engineering-2'>Design</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='engineering-3'
                                                                                value='Research and Development'>
                                                                            <label for='engineering-3'>Research and Development</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='engineering-4'
                                                                                value='Project'>
                                                                            <label for='engineering-4'>Project</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='engineering-5'
                                                                                value='Technical'>
                                                                            <label for='engineering-5'>Technical</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='engineering-6'
                                                                                value='Test'>
                                                                            <label for='engineering-6'>Test</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='engineering-7'
                                                                                value='Chemical'>
                                                                            <label for='engineering-7'>Chemical</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class='form-group'>
                                                                        <input type='checkbox' name='businessTechno[]' id='engineering-8'
                                                                            value='Chemist'>
                                                                        <label for='engineering-8'>Chemist</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Government">
                                                                    <label for="">Government</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Accountant">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_5(this);" />
                                                                    <label for="" id="myLabel-5">Accountant</label>
                                                                    <div id="myDiv-5">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='accountant-1'
                                                                                value='Accountant'>
                                                                            <label for='accountant-1'>Accountant</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='accountant-2'
                                                                                value='CPA'>
                                                                            <label for='accountant-2'>CPA</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='accountant-3'
                                                                                value='Bookkeeper'>
                                                                            <label for='accountant-3'>Bookkeeper</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Architect">
                                                                    <label for="">Architect</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Attorney">
                                                                    <label for="">Attorney</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Audit">
                                                                    <label for="">Audit</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Facilities">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_6(this);" />
                                                                    <label for="" id="myLabel-6">Facilities</label>
                                                                    <div id="myDiv-6">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='facilities-1'
                                                                                value='Facilities'>
                                                                            <label for='facilities-1'>Facilities</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='facilities-2'
                                                                                value='Maintenance'>
                                                                            <label for='facilities-2'>Maintenance</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='facilities-3'
                                                                                value='Safety'>
                                                                            <label for='facilities-3'>Safety</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='facilities-4'
                                                                                value='Transportation'>
                                                                            <label for='facilities-4'>Transportation</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='facilities-5'
                                                                                value='Security'>
                                                                            <label for='facilities-5'>Security</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='facilities-6'
                                                                                value='Real Estate'>
                                                                            <label for='facilities-6'>Real Estate</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Financing">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_7(this);" />
                                                                    <label for="" id="myLabel-7">Financing</label>
                                                                    <div id="myDiv-7">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-1'
                                                                                value='Financing'>
                                                                            <label for='financing-1'>Financing</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-2'
                                                                                value='Controlling'>
                                                                            <label for='financing-2'>Controlling</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-3'
                                                                                value='Credit'>
                                                                            <label for='financing-3'>Credit</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-4'
                                                                                value='Accounting'>
                                                                            <label for='financing-4'>Accounting</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-5' value='Risk'>
                                                                            <label for='financing-5'>Risk</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-6'
                                                                                value='Treasurer'>
                                                                            <label for='financing-6'>Treasurer</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-7'
                                                                                value='Controller'>
                                                                            <label for='financing-7'>Controller</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='financing-8'
                                                                                value='Comptroller'>
                                                                            <label for='financing-8'>Comptroller</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Creative">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_8(this);" />
                                                                    <label for="" id="myLabel-8">Creative</label>
                                                                    <div id="myDiv-8">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='creative-1'
                                                                                value='Creative'>
                                                                            <label for='creative-1'>Creative</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='creative-2'
                                                                                value='Art Director'>
                                                                            <label for='creative-2'>Art Director</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='creative-3'
                                                                                value='Creative Director'>
                                                                            <label for='creative-3'>Creative Director</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='creative-4'
                                                                                value='Photographer'>
                                                                            <label for='creative-4'>Photographer</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='creative-5'
                                                                                value='Content'>
                                                                            <label for='creative-5'>Content</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='creative-6'
                                                                                value='Graphic Designer'>
                                                                            <label for='creative-6'>Graphic Designer</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Education">
                                                                    <input type="button" class="mybtn" value="+" onclick="return change_9(this);" />
                                                                    <label for="" id="myLabel-9">Education</label>
                                                                    <div id="myDiv-9">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-1'
                                                                                value='Education'>
                                                                            <label for='education-1'>Education</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-2'
                                                                                value='Teacher'>
                                                                            <label for='education-2'>Teacher</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-3'
                                                                                value='Elementary Teacher'>
                                                                            <label for='education-3'>Elementary Teacher</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-4'
                                                                                value='Math Teacher'>
                                                                            <label for='education-4'>Math Teacher</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-5'
                                                                                value='English Teacher'>
                                                                            <label for='education-5'>English Teacher</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-6'
                                                                                value='K12 Teacher'>
                                                                            <label for='education-6'>K12 Teacher</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-7'
                                                                                value='Instructor'>
                                                                            <label for='education-7'>Instructor</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-8'
                                                                                value='Lecturer'>
                                                                            <label for='education-8'>Lecturer</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-9' value='Dean'>
                                                                            <label for='education-9'>Dean</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-10'
                                                                                value='Academic'>
                                                                            <label for='education-10'>Academic</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-11'
                                                                                value='Alumni'>
                                                                            <label for='education-11'>Alumni</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='education-12'
                                                                                value='Student'>
                                                                            <label for='education-12'>Student</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="HR">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_10(this);" />
                                                                    <label for="" id="myLabel-10">HR</label>
                                                                    <div id="myDiv-10">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='hr-1' value='HR'>
                                                                            <label for='hr-1'>HR</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='hr-2' value='Administration'>
                                                                            <label for='hr-2'>Administration</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='hr-3' value='Payroll'>
                                                                            <label for='hr-3'>Payroll</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='hr-4' value='Training'>
                                                                            <label for='hr-4'>Training</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='hr-5' value='Personnel'>
                                                                            <label for='hr-5'>Personnel</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Principal">
                                                                    <label for="">Principal</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Production">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_11(this);" />
                                                                    <label for="" id="myLabel-11">Production</label>
                                                                    <div id="myDiv-11">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='production-1'
                                                                                value='Production'>
                                                                            <label for='production-1'>Production</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='production-2'
                                                                                value='Manufacture'>
                                                                            <label for='production-2'>Manufacture</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='production-3'
                                                                                value='Operation'>
                                                                            <label for='production-3'>Operation</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='production-4'
                                                                                value='Construction'>
                                                                            <label for='production-4'>Construction</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='production-5'
                                                                                value='Plant'>
                                                                            <label for='production-5'>Plant</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='production-6'
                                                                                value='Logistics'>
                                                                            <label for='production-6'>Logistics</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='production-7'
                                                                                value='Warehouse'>
                                                                            <label for='production-7'>Warehouse</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Professor">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_12(this);" />
                                                                    <label for="" id="myLabel-12">Professor</label>
                                                                    <div id="myDiv-12">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-1'
                                                                                value='Public Relation'>
                                                                            <label for='professor-1'>Public Relation</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-2'
                                                                                value='Public Relation'>
                                                                            <label for='professor-2'>Public Relation</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-3'
                                                                                value='Admission'>
                                                                            <label for='professor-3'>Admission</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-4'
                                                                                value='Customer Service'>
                                                                            <label for='professor-4'>Customer Service</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-5'
                                                                                value='Communication'>
                                                                            <label for='professor-5'>Communication</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-6'
                                                                                value='Media'>
                                                                            <label for='professor-6'>Media</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-7'
                                                                                value='Publishing'>
                                                                            <label for='professor-7'>Publishing</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='professor-8'
                                                                                value='Social Media'>
                                                                            <label for='professor-8'>Social Media</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Purchasing">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_13(this);" />
                                                                    <label for="" id="myLabel-13">Purchasing</label>
                                                                    <div id="myDiv-13">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='purchasing-1'
                                                                                value='Purchasing'>
                                                                            <label for='purchasing-1'>Purchasing</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='purchasing-2'
                                                                                value='Supply Chain'>
                                                                            <label for='purchasing-2'>Supply Chain</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Quality">
                                                                    <label for="">Quality</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Religious">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_14(this);" />
                                                                    <label for="" id="myLabel-14">Religious</label>
                                                                    <div id="myDiv-14">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='religious-1'
                                                                                value='Religious'>
                                                                            <label for='religious-1'>Religious</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='religious-2'
                                                                                value='Bishop'>
                                                                            <label for='religious-2'>Bishop</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='religious-3'
                                                                                value='Deacon'>
                                                                            <label for='religious-3'>Deacon</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='religious-4'
                                                                                value='Cardinal'>
                                                                            <label for='religious-4'>Cardinal</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='religious-5'
                                                                                value='Pastor'>
                                                                            <label for='religious-5'>Pastor</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='religious-6'
                                                                                value='Priest'>
                                                                            <label for='religious-6'>Priest</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='religious-7'
                                                                                value='Religious Leader'>
                                                                            <label for='religious-7'>Religious Leader</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Superintendent">
                                                                    <label for="">Superintendent</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Support">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_15(this);" />
                                                                    <label for="" id="myLabel-15">Support</label>
                                                                    <div id="myDiv-15">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='support-1' value='Support'>
                                                                            <label for='support-1'>Support</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='support-2'
                                                                                value='Other Officer'>
                                                                            <label for='support-2'>Other Officer</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Planning">
                                                                    <label for="">Planning</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="IT">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_16(this);" />
                                                                    <label for="" id="myLabel-16">IT</label>
                                                                    <div id="myDiv-16">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='it-1' value='IT'>
                                                                            <label for='it-1'>IT</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='it-2' value='Software'>
                                                                            <label for='it-2'>Software</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='it-3' value='Digital'>
                                                                            <label for='it-3'>Digital</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='it-4' value='Web'>
                                                                            <label for='it-4'>Web</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Import/Export">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_17(this);" />
                                                                    <label for="" id="myLabel-17">Import/Export</label>
                                                                    <div id="myDiv-17">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='import-1' value='Import'>
                                                                            <label for='import-1'>Import</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='import-2' value='Export'>
                                                                            <label for='import-2'>Export</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Insurance">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_18(this);" />
                                                                    <label for="" id="myLabel-18">Insurance</label>
                                                                    <div id="myDiv-18">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='insurance-1'
                                                                                value='Insurance Agent'>
                                                                            <label for='insurance-1'>Insurance Agent</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='insurance-2'
                                                                                value='Insurance Broker'>
                                                                            <label for='insurance-2'>Insurance Broker</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Legal">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_19(this);" />
                                                                    <label for="" id="myLabel-19">Legal</label>
                                                                    <div id="myDiv-19">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='legal-1' value='Legal'>
                                                                            <label for='legal-1'>Legal</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='legal-2' value='Policy'>
                                                                            <label for='legal-2'>Policy</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='legal-3' value='Complianc'>
                                                                            <label for='legal-3'>Complianc</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Medical">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_20(this);" />
                                                                    <label for="" id="myLabel-20">Medical</label>
                                                                    <div id="myDiv-20">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='medical-1' value='Medical'>
                                                                            <label for='medical-1'>Medical</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='medical-2' value='Clinical'>
                                                                            <label for='medical-2'>Clinical</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='medical-3' value='Dental'>
                                                                            <label for='medical-3'>Dental</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class='form-group'>
                                                                        <input type='checkbox' name='businessTechno[]' id='medical-4' value='Laboratory'>
                                                                        <label for='medical-4'>Laboratory</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Others">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_21(this);" />
                                                                    <label for="" id="myLabel-21">Others</label>
                                                                    <div id="myDiv-21">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-1' value='Coach'>
                                                                            <label for='others-1'>Coach</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-2' value='Contractor'>
                                                                            <label for='others-2'>Contractor</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-3' value='Journalist'>
                                                                            <label for='others-3'>Journalist</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-4' value='Economist'>
                                                                            <label for='others-4'>Economist</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-5' value='Surveyor'>
                                                                            <label for='others-5'>Surveyor</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-6' value='Musician'>
                                                                            <label for='others-6'>Musician</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-7' value='Producer'>
                                                                            <label for='others-7'>Producer</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-8' value='Singer'>
                                                                            <label for='others-8'>Singer</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-9' value='Songwriter'>
                                                                            <label for='others-9'>Songwriter</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-10' value='DJ'>
                                                                            <label for='others-10'>DJ</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-11'
                                                                                value='Personal Trainer'>
                                                                            <label for='others-11'>Personal Trainer</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-12'
                                                                                value='Stockbroker'>
                                                                            <label for='others-12'>Stockbroker</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-13'
                                                                                value='Registrar'>
                                                                            <label for='others-13'>Registrar</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-14'
                                                                                value='Electrician'>
                                                                            <label for='others-14'>Electrician</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-15'
                                                                                value='Librarian'>
                                                                            <label for='others-15'>Librarian</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='others-16'
                                                                                value='Agricultural'>
                                                                            <label for='others-16'>Agricultural</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" value="Submit" class="btn btn-primary" name="businessBtn">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Job Level Modal ends here--->
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="country">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#country">
                                    Country
                                </button>
                                <!----Country modal starts here--->
                                <div id="country" class="modal fade" role='dialog'>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title text-success" style="margin-bottom: 10px; font-size: 20px; font-weight: 700;">Make
                                                    Your Custom Order</h4>
                                                <div class='form-group'>
                                                    <textarea name="" rows="4" class="form-control output"
                                                        style="font-size: 16px; font-weight: 600;" readonly
                                                        placeholder="You are not selected any item yet!"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="main-order-item">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="business" value="Country">
                                                            <input type="hidden" name="businessCategory" value="Business">
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="United States">
                                                                    <label for="">United States</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Canada">
                                                                    <label for="">Canada</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="United Kingdom">
                                                                    <label for="">United Kingdom</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="namerica">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_22(this);" />
                                                                    <label for="" id="myLabel-22">N. America (Others)</label>
                                                                    <div id="myDiv-22">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-1' value='Bahamas'>
                                                                            <label for='namerica-1'>Bahamas</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-2' value='Barbados'>
                                                                            <label for='namerica-2'>Barbados</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-3' value='Belize'>
                                                                            <label for='namerica-3'>Belize</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-4' value='Bermuda'>
                                                                            <label for='namerica-4'>Bermuda</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-5' value='Cayman Islands'>
                                                                            <label for='namerica-5'>Cayman Islands</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-6' value='Costa Rica'>
                                                                            <label for='namerica-6'>Costa Rica</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-7' value='Dominican Republic'>
                                                                            <label for='namerica-7'>Dominican Republic</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-8' value='El Salvador'>
                                                                            <label for='namerica-8'>El Salvador</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-9' value='Greenland'>
                                                                            <label for='namerica-9'>Greenland</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-10' value='Grenada'>
                                                                            <label for='namerica-10'>Grenada</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-11' value='Guatemala'>
                                                                            <label for='namerica-11'>Guatemala</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-12' value='Honduras'>
                                                                            <label for='namerica-12'>Honduras</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-13' value='Jamaica'>
                                                                            <label for='namerica-13'>Jamaica</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-14' value='Mexico'>
                                                                            <label for='namerica-14'>Mexico</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-15' value='Netherlands Antilles'>
                                                                            <label for='namerica-15'>Netherlands Antilles</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-16' value='Nicaragua'>
                                                                            <label for='namerica-16'>Nicaragua</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-17' value='Puerto Rico'>
                                                                            <label for='namerica-17'>Puerto Rico</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='namerica-18' value='Trinidad And Tobago'>
                                                                            <label for='namerica-18'>Trinidad And Tobago</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="South America">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_23(this);" />
                                                                    <label for="" id="myLabel-23">South America</label>
                                                                    <div id="myDiv-23">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-1' value='Argentina'>
                                                                            <label for='samerica-1'>Argentina</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-2' value='Bolivia'>
                                                                            <label for='samerica-2'>Bolivia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-3' value='Brazil'>
                                                                            <label for='samerica-3'>Brazil</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-4' value='Chile'>
                                                                            <label for='samerica-4'>Chile</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-5' value='Colombia'>
                                                                            <label for='samerica-5'>Colombia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-6' value='Ecuador'>
                                                                            <label for='samerica-6'>Ecuador</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-7' value='Paraguay'>
                                                                            <label for='samerica-7'>Paraguay</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-8' value='Peru'>
                                                                            <label for='samerica-8'>Peru</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-9' value='Suriname'>
                                                                            <label for='samerica-9'>Suriname</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-10' value='Uruguay'>
                                                                            <label for='samerica-10'>Uruguay</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='samerica-11' value='Venezuela'>
                                                                            <label for='samerica-11'>Venezuela</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Asia">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_24(this);" />
                                                                    <label for="" id="myLabel-24">Asia</label>
                                                                    <div id="myDiv-24">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-1' value='Armenia'>
                                                                            <label for='asia-1'>Armenia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-2' value='Azerbaijan'>
                                                                            <label for='asia-2'>Azerbaijan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-3' value='Bangladesh'>
                                                                            <label for='asia-3'>Bangladesh</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-4' value='China'>
                                                                            <label for='asia-4'>China</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-5' value='Hong Kong'>
                                                                            <label for='asia-5'>Hong Kong</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-6' value='India'>
                                                                            <label for='asia-6'>India</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-7' value='Indonesia'>
                                                                            <label for='asia-7'>Indonesia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-8' value='Japan'>
                                                                            <label for='asia-8'>Japan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-9' value='Kazakhstan'>
                                                                            <label for='asia-9'>Kazakhstan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-10' value='Korea'>
                                                                            <label for='asia-10'>Korea</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-11' value='Malaysia'>
                                                                            <label for='asia-11'>Malaysia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-12' value='Maldives'>
                                                                            <label for='asia-12'>Maldives</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-13' value='Nepal'>
                                                                            <label for='asia-13'>Nepal</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-14' value='Pakistan'>
                                                                            <label for='asia-14'>Pakistan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-15' value='Philippines'>
                                                                            <label for='asia-15'>Philippines</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-16' value='Singapore'>
                                                                            <label for='asia-16'>Singapore</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-17' value='Sri Lanka'>
                                                                            <label for='asia-17'>Sri Lanka</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-18' value='Taiwan'>
                                                                            <label for='asia-18'>Taiwan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-19' value='Thailand'>
                                                                            <label for='asia-19'>Thailand</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='asia-20' value='Vietnam'>
                                                                            <label for='asia-20'>Vietnam</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Europe">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_25(this);" />
                                                                    <label for="" id="myLabel-25">Europe</label>
                                                                    <div id="myDiv-25">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-1' value='Albania'>
                                                                            <label for='europe-1'>Albania</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-2' value='Austria'>
                                                                            <label for='europe-2'>Austria</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-3' value='Belarus'>
                                                                            <label for='europe-3'>Belarus</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-4' value='Belgium'>
                                                                            <label for='europe-4'>Belgium</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-5' value='Bosnia And Herzegovina'>
                                                                            <label for='europe-5'>Bosnia And Herzegovina</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-6' value='Bulgaria'>
                                                                            <label for='europe-6'>Bulgaria</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-7' value='Croatia'>
                                                                            <label for='europe-7'>Croatia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-8' value='Cyprus'>
                                                                            <label for='europe-8'>Cyprus</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-8' value='Czech Republic'>
                                                                            <label for='europe-8'>Czech Republic</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-9' value='Denmark'>
                                                                            <label for='europe-9'>Denmark</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-10' value='Estonia'>
                                                                            <label for='europe-10'>Estonia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-11' value='Finland'>
                                                                            <label for='europe-11'>Finland</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-12' value='France'>
                                                                            <label for='europe-12'>France</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-13' value='Georgia'>
                                                                            <label for='europe-13'>Georgia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-14' value='Germany'>
                                                                            <label for='europe-14'>Germany</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-15' value='Gibraltar'>
                                                                            <label for='europe-15'>Gibraltar</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-16' value='Greece'>
                                                                            <label for='europe-16'>Greece</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-17' value='Hungary'>
                                                                            <label for='europe-17'>Hungary</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-18' value='Iceland'>
                                                                            <label for='europe-18'>Iceland</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-19' value='Ireland'>
                                                                            <label for='europe-19'>Ireland</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-20' value='Isle Of Man'>
                                                                            <label for='europe-20'>Isle Of Man</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-21' value='Italy'>
                                                                            <label for='europe-21'>Italy</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-22' value='Jersey'>
                                                                            <label for='europe-22'>Jersey</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-23' value='Latvia'>
                                                                            <label for='europe-23'>Latvia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-24' value='Lithuania'>
                                                                            <label for='europe-24'>Lithuania</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-25' value='Luxembourg'>
                                                                            <label for='europe-25'>Luxembourg</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-26' value='Macedonia'>
                                                                            <label for='europe-26'>Macedonia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-27' value='Malta'>
                                                                            <label for='europe-27'>Malta</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-28' value='Moldova'>
                                                                            <label for='europe-28'>Moldova</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-29' value='Monaco'>
                                                                            <label for='europe-29'>Monaco</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-30' value='Netherlands'>
                                                                            <label for='europe-30'>Netherlands</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-31' value='Norway'>
                                                                            <label for='europe-31'>Norway</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-32' value='Poland'>
                                                                            <label for='europe-32'>Poland</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-33' value='Portugal'>
                                                                            <label for='europe-33'>Portugal</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-34' value='Romania'>
                                                                            <label for='europe-34'>Romania</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-35' value='Serbia'>
                                                                            <label for='europe-35'>Serbia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-36' value='Slovak Republic'>
                                                                            <label for='europe-36'>Slovak Republic</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-37' value='Slovenia'>
                                                                            <label for='europe-37'>Slovenia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-38' value='Spain'>
                                                                            <label for='europe-38'>Spain</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-39' value='Sweden'>
                                                                            <label for='europe-39'>Sweden</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-40' value='Switzerland'>
                                                                            <label for='europe-40'>Switzerland</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-41' value='Turkey'>
                                                                            <label for='europe-41'>Turkey</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='europe-42' value='Ukraine'>
                                                                            <label for='europe-42'>Ukraine</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Middle East">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_26(this);" />
                                                                    <label for="" id="myLabel-26">Middle East</label>
                                                                    <div id="myDiv-26">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-1' value='Afghanistan'>
                                                                            <label for='middleeast-1'>Afghanistan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-2' value='Bahrain'>
                                                                            <label for='middleeast-2'>Bahrain</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-3' value='Egypt'>
                                                                            <label for='middleeast-3'>Egypt</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-4' value='Iran'>
                                                                            <label for='middleeast-4'>Iran</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-5' value='Israel'>
                                                                            <label for='middleeast-5'>Israel</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-6' value='Jordan'>
                                                                            <label for='middleeast-6'>Jordan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-7' value='Kuwait'>
                                                                            <label for='middleeast-7'>Kuwait</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-8' value='Lebanon'>
                                                                            <label for='middleeast-8'>Lebanon</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-9' value='Palestinian Territory'>
                                                                            <label for='middleeast-9'>Palestinian Territory</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-10' value='Qatar'>
                                                                            <label for='middleeast-10'>Qatar</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-11' value='Saudi Arabia'>
                                                                            <label for='middleeast-11'>Saudi Arabia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-12' value='Sultanate Of Oman'>
                                                                            <label for='middleeast-12'>Sultanate Of Oman</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-13' value='Syria'>
                                                                            <label for='middleeast-13'>Syria</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-14' value='United Arab Emirates'>
                                                                            <label for='middleeast-14'>United Arab Emirates</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='middleeast-15' value='Yemen'>
                                                                            <label for='middleeast-15'>Yemen</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Oceania">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_27(this);" />
                                                                    <label for="" id="myLabel-27">Oceania</label>
                                                                    <div id="myDiv-27">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='oceania-1' value='Australia'>
                                                                            <label for='oceania-1'>Australia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='oceania-2' value='New Zealand'>
                                                                            <label for='oceania-2'>New Zealand</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Africa">
                                                                    <input type="button" class="mybtn" value="+"
                                                                        onclick="return change_28(this);" />
                                                                    <label for="" id="myLabel-28">Africa</label>
                                                                    <div id="myDiv-28">
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-1' value='Algeria'>
                                                                            <label for='africa-1'>Algeria</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-2' value='Angola'>
                                                                            <label for='africa-2'>Angola</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-3' value='Botswana'>
                                                                            <label for='africa-3'>Botswana</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-4' value="Cote D'ivoire">
                                                                            <label for='africa-4'>Cote D'ivoire</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-5' value='Ghana'>
                                                                            <label for='africa-5'>Ghana</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-6' value='Kenya'>
                                                                            <label for='africa-6'>Kenya</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-7' value='Malawi'>
                                                                            <label for='africa-7'>Malawi</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-8' value='Mauritius'>
                                                                            <label for='africa-8'>Mauritius</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-9' value='Morocco'>
                                                                            <label for='africa-9'>Morocco</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-10' value='Mozambique'>
                                                                            <label for='africa-10'>Mozambique</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-11' value='Namibia'>
                                                                            <label for='africa-11'>Namibia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-12' value='Nigeria'>
                                                                            <label for='africa-12'>Nigeria</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-13' value='Rwanda'>
                                                                            <label for='africa-13'>Rwanda</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-14' value='South Africa'>
                                                                            <label for='africa-14'>South Africa</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-15' value='Sudan'>
                                                                            <label for='africa-15'>Sudan</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-16' value='Tanzania'>
                                                                            <label for='africa-16'>Tanzania</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-17' value='Uganda'>
                                                                            <label for='africa-17'>Uganda</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-18' value='Zambia'>
                                                                            <label for='africa-18'>Zambia</label>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <input type='checkbox' name='businessTechno[]' id='africa-19' value='Zimbabwe'>
                                                                            <label for='africa-19'>Zimbabwe</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Russian Federation">
                                                                    <label for="">Russian Federation</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Submit" class="btn btn-primary" name="businessBtn">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Country Modal ends here--->
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="business">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#state">
                                    State
                                </button>
                                <!----State modal starts here--->
                                <div id="state" class="modal fade" role='dialog'>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title text-success" style="margin-bottom: 10px; font-size: 20px; font-weight: 700;">Make
                                                    Your Custom Order</h4>
                                                <div class='form-group'>
                                                    <textarea name="" rows="4" class="form-control output"
                                                        style="font-size: 16px; font-weight: 600;" readonly
                                                        placeholder="You are not selected any item yet!"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="main-order-item">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="business" value="State">
                                                            <input type="hidden" name="businessCategory" value="Business">
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Alabama - AL">
                                                                    <label for="">Alabama - AL</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Alaska - AK">
                                                                    <label for="">Alaska - AK</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Arizona - AZ">
                                                                    <label for="">Arizona - AZ</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Arkansas - AR">
                                                                    <label for="">Arkansas - AR</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="California - CA">
                                                                    <label for="">California - CA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Colorado - CO">
                                                                    <label for="">Colorado - CO</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Connecticut - CT">
                                                                    <label for="">Connecticut - CT</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Delaware - DE">
                                                                    <label for="">Delaware - DE</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="District of Columbia - D">
                                                                    <label for="">District of Columbia - D</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Florida - FL">
                                                                    <label for="">Florida - FL</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Georgia - GA">
                                                                    <label for="">Georgia - GA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Hawaii - HI">
                                                                    <label for="">Hawaii - HI</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Idaho - ID">
                                                                    <label for="">Idaho - ID</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Illinois - IL">
                                                                    <label for="">Illinois - IL</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Indiana - IN">
                                                                    <label for="">Indiana - IN</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Iowa - IA">
                                                                    <label for="">Iowa - IA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Kansas - KS">
                                                                    <label for="">Kansas - KS</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Kentucky - KY">
                                                                    <label for="">Kentucky - KY</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Louisiana - LA">
                                                                    <label for="">Louisiana - LA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Maine - ME">
                                                                    <label for="">Maine - ME</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Maryland - MD">
                                                                    <label for="">Maryland - MD</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Massachusetts - MA">
                                                                    <label for="">Massachusetts - MA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Michigan - MI">
                                                                    <label for="">Michigan - MI</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Minnesota - MN">
                                                                    <label for="">Minnesota - MN</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Mississippi - MS">
                                                                    <label for="">Mississippi - MS</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Missouri - MO">
                                                                    <label for="">Missouri - MO</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Montana - MT">
                                                                    <label for="">Montana - MT</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Nebraska - NE">
                                                                    <label for="">Nebraska - NE</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Nevada - NV">
                                                                    <label for="">Nevada - NV</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="New Hampshire - NH">
                                                                    <label for="">New Hampshire - NH</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="New Jersey - NJ">
                                                                    <label for="">New Jersey - NJ</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="New Mexico - NM">
                                                                    <label for="">New Mexico - NM</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="New York - NY">
                                                                    <label for="">New York - NY</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="North Carolina - NC">
                                                                    <label for="">North Carolina - NC</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="North Dakota - ND">
                                                                    <label for="">North Dakota - ND</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Ohio - OH">
                                                                    <label for="">Ohio - OH</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Oklahoma - OK">
                                                                    <label for="">Oklahoma - OK</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Oregon - OR">
                                                                    <label for="">Oregon - OR</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Pennsylvania - PA">
                                                                    <label for="">Pennsylvania - PA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Puerto Rico - PR">
                                                                    <label for="">Puerto Rico - PR</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Rhode Island - RI">
                                                                    <label for="">Rhode Island - RI</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="South Carolina - SC">
                                                                    <label for="">South Carolina - SC</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="South Dakota - SD">
                                                                    <label for="">South Dakota - SD</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Tennessee - TN">
                                                                    <label for="">Tennessee - TN</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Texas - TX">
                                                                    <label for="">Texas - TX</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Utah - UT">
                                                                    <label for="">Utah - UT</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Vermont - VT">
                                                                    <label for="">Vermont - VT</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Virginia - VA">
                                                                    <label for="">Virginia - VA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Washington - WA">
                                                                    <label for="">Washington - WA</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="West Virginia - WV">
                                                                    <label for="">West Virginia - WV</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Wisconsin - WI">
                                                                    <label for="">Wisconsin - WI</label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="businessTechno[]" value="Wyoming - WY">
                                                                    <label for="">Wyoming - WY</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Submit" class="btn btn-primary" name="businessBtn">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--State Modal ends here--->
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="business">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#city">
                                    City
                                </button>
                                <!-- The modal -->
                                <div class="modal fade" id="city" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="modalLabel">Select Your Targeted City</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="business" value="City">
                                                    <input type="hidden" name="businessCategory" value="Business">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-11">
                                                            <div class="form-group">
                                                                <label for="searchCity">Please, Search your targeted city</label>
                                                                <input type="text" name="businessTechno[]" placeholder="Enter Your Targeted City" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-9"></div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <input type="submit" name="businessBtn" value="Submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="business">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#range">
                                    Employee Range
                                </button>
                                <!-- The modal -->
                                <div class="modal fade" id="range" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="modalLabel">Write Your Targeted Employee Range</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="business" value="Employee-Range">
                                                    <input type="hidden" name="businessCategory" value="Business">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="searchCity">Min Employee Range</label>
                                                                <input type="text" name="businessTechno[]" placeholder="Enter Min Employee Range" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="searchCity">Max Employee Range</label>
                                                                <input type="text" name="businessTechno[]" placeholder="Enter Max Employee Range" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1"></div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-9"></div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <input type="submit" name="businessBtn" value="Submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="margin-top: 8px;">
                            <div class="business">
                                <button type="button" class="button button--primary full-width mySelectBtn" data-toggle="modal" data-target="#revenue">
                                    Revenue Range
                                </button>
                                <!-- The modal -->
                                <div class="modal fade" id="revenue" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="modalLabel">Write Your Targeted Revenue Range</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="business" value="Revenue-Range">
                                                    <input type="hidden" name="businessCategory" value="Business">
                                                    <div class="row">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="searchCity">Min Revenue Range</label>
                                                                <input type="text" name="businessTechno[]" placeholder="Enter Min Revenue Range" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="searchCity">Max Revenue Range</label>
                                                                <input type="text" name="businessTechno[]" placeholder="Enter Max Revenue Range" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1"></div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-9"></div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <input type="submit" name="businessBtn" value="Submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="main-title text-center" style="margin-top: 10px;">
                        <div class='form-group'>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    $allcustomitems = '';
                                    $allemailCategory = '';
                                    if (isset($_SESSION['selectItem']) && is_array($_SESSION['selectItem'])) {
                                        foreach ($_SESSION['selectItem'] as $key => $item) {
                                            $id = $item['id'];
                                            $emailCate = $item['emailCategory'];
                                            $item = $item['itemname'];
                                            $allcustomitems .= preg_replace('/\s+/', '-', $item) . ', ';
                                            $allemailCategory .= $emailCate . ', ';
                                            echo '<form action="" method="GET">
                                                        <input type="hidden" name="id" value="' . $id . '" >
                                                        <input type="submit" value="' . $item . ' X" name="remove" class="itemStyle">
                                                        </form>';
                                        }
                                    } else {
                                        echo '<h3 style="color: red;">You aren&apos;t select any item yet!</h3>';
                                    }
                                    ?>
                                    <form action="../checkout/step1.php" method="POST">
                                        <div class="row" style="margin-top:10px; clear: left;">
                                            <?php
                                            $raw = $allemailCategory;
                                            $raw2 = $allcustomitems;
                                            $allemailCategory = implode(',', array_unique(str_word_count($raw, 1)));
                                            $allcustomitems = implode(',', array_unique(str_word_count($raw2, 1)));
                                            ?>
                                            <div class="col-sm-4 gap-bottom">
                                                <input type="text" class="form__control" placeholder="Enter Total Leads" name="totalemail" id="totalemail" required
                                                    onkeyup="totalEmail(value.this)">
                                            </div>
                                            <div class="col-sm-4 gap-bottom">
                                                <input type="text" class="form__control" placeholder="Delivery Days" name="deliveryDays" id="deliveryDays" readonly required>
                                            </div>
                                            <div class="col-sm-4 gap-bottom">
                                                <input type="text" class="form__control" placeholder="E-mail Price" name="price" id="totalprice" onkeyup="totalPrice(value.this)" required>
                                            </div>
                                        </div>
                                </div>

                                <div class="row">
                                    <input type="hidden" name="ordercode" value="<?php echo ('CU' . rand(10, 99) . 'S' . rand(10, 99) . 'TO' . rand(0, 9) . 'M'); ?>">
                                    <input type="hidden" name="emailType" value="Business">
                                    <input type="hidden" name="emailCategory" value="<?= $allemailCategory; ?>">
                                    <input type="hidden" name="selectItem" value="<?= $allcustomitems; ?>">
                                    <input type="submit" name="orderBtn" value="Order Now" class="button button--primary full-width orderStyle">
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </main>
</div>
<?php include_once '../assets/php/footer.php'; ?>


<script type="text/javascript">
    function change(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv").style.display = 'block';
            document.getElementById("myLabel").innerHTML = "<label style='color: red;'>C-Level</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel").innerHTML = "<label style='color: black;'>C-Level</label>";
            document.getElementById("myDiv").style.display = 'none';
        }
    }

    function change_2(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-2").style.display = 'block';
            document.getElementById("myLabel-2").innerHTML = "<label style='color: red;'>Top-Management</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-2").innerHTML = "<label style='color: black;'>Top-Management</label>";
            document.getElementById("myDiv-2").style.display = 'none';
        }
    }

    function change_3(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-3").style.display = 'block';
            document.getElementById("myLabel-3").innerHTML = "<label style='color: red;'>Business Development</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-3").innerHTML = "<label style='color: black;'>Business Development</label>";
            document.getElementById("myDiv-3").style.display = 'none';
        }
    }

    function change_4(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-4").style.display = 'block';
            document.getElementById("myLabel-4").innerHTML = "<label style='color: red;'>Engineering</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-4").innerHTML = "<label style='color: black;'>Engineering</label>";
            document.getElementById("myDiv-4").style.display = 'none';
        }
    }

    function change_5(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-5").style.display = 'block';
            document.getElementById("myLabel-5").innerHTML = "<label style='color: red;'>Accountant</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-5").innerHTML = "<label style='color: black;'>Accountant</label>";
            document.getElementById("myDiv-5").style.display = 'none';
        }
    }

    function change_6(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-6").style.display = 'block';
            document.getElementById("myLabel-6").innerHTML = "<label style='color: red;'>Facilities</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-6").innerHTML = "<label style='color: black;'>Facilities</label>";
            document.getElementById("myDiv-6").style.display = 'none';
        }
    }

    function change_7(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-7").style.display = 'block';
            document.getElementById("myLabel-7").innerHTML = "<label style='color: red;'>Financing</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-7").innerHTML = "<label style='color: black;'>Financing</label>";
            document.getElementById("myDiv-7").style.display = 'none';
        }
    }

    function change_8(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-8").style.display = 'block';
            document.getElementById("myLabel-8").innerHTML = "<label style='color: red;'>Creative</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-8").innerHTML = "<label style='color: black;'>Creative</label>";
            document.getElementById("myDiv-8").style.display = 'none';
        }
    }

    function change_9(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-9").style.display = 'block';
            document.getElementById("myLabel-9").innerHTML = "<label style='color: red;'>Education</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-9").innerHTML = "<label style='color: black;'>Education</label>";
            document.getElementById("myDiv-9").style.display = 'none';
        }
    }

    function change_10(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-10").style.display = 'block';
            document.getElementById("myLabel-10").innerHTML = "<label style='color: red;'>HR</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-10").innerHTML = "<label style='color: black;'>HR</label>";
            document.getElementById("myDiv-10").style.display = 'none';
        }
    }

    function change_11(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-11").style.display = 'block';
            document.getElementById("myLabel-11").innerHTML = "<label style='color: red;'>Production</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-11").innerHTML = "<label style='color: black;'>Production</label>";
            document.getElementById("myDiv-11").style.display = 'none';
        }
    }

    function change_12(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-12").style.display = 'block';
            document.getElementById("myLabel-12").innerHTML = "<label style='color: red;'>Professor</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-12").innerHTML = "<label style='color: black;'>Professor</label>";
            document.getElementById("myDiv-12").style.display = 'none';
        }
    }

    function change_13(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-13").style.display = 'block';
            document.getElementById("myLabel-13").innerHTML = "<label style='color: red;'>Purchasing</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-13").innerHTML = "<label style='color: black;'>Purchasing</label>";
            document.getElementById("myDiv-13").style.display = 'none';
        }
    }

    function change_14(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-14").style.display = 'block';
            document.getElementById("myLabel-14").innerHTML = "<label style='color: red;'>Religious</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-14").innerHTML = "<label style='color: black;'>Religious</label>";
            document.getElementById("myDiv-14").style.display = 'none';
        }
    }

    function change_15(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-15").style.display = 'block';
            document.getElementById("myLabel-15").innerHTML = "<label style='color: red;'>Support</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-15").innerHTML = "<label style='color: black;'>Support</label>";
            document.getElementById("myDiv-15").style.display = 'none';
        }
    }

    function change_16(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-16").style.display = 'block';
            document.getElementById("myLabel-16").innerHTML = "<label style='color: red;'>IT</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-16").innerHTML = "<label style='color: black;'>IT</label>";
            document.getElementById("myDiv-16").style.display = 'none';
        }
    }

    function change_17(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-17").style.display = 'block';
            document.getElementById("myLabel-17").innerHTML = "<label style='color: red;'>Import/Export</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-17").innerHTML = "<label style='color: black;'>Import/Export</label>";
            document.getElementById("myDiv-17").style.display = 'none';
        }
    }

    function change_18(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-18").style.display = 'block';
            document.getElementById("myLabel-18").innerHTML = "<label style='color: red;'>Insurance</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-18").innerHTML = "<label style='color: black;'>Insurance</label>";
            document.getElementById("myDiv-18").style.display = 'none';
        }
    }

    function change_19(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-19").style.display = 'block';
            document.getElementById("myLabel-19").innerHTML = "<label style='color: red;'>Legal</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-19").innerHTML = "<label style='color: black;'>Legal</label>";
            document.getElementById("myDiv-19").style.display = 'none';
        }
    }

    function change_20(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-20").style.display = 'block';
            document.getElementById("myLabel-20").innerHTML = "<label style='color: red;'>Medical</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-20").innerHTML = "<label style='color: black;'>Medical</label>";
            document.getElementById("myDiv-20").style.display = 'none';
        }
    }

    function change_21(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-21").style.display = 'block';
            document.getElementById("myLabel-21").innerHTML = "<label style='color: red;'>Others</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-21").innerHTML = "<label style='color: black;'>Others</label>";
            document.getElementById("myDiv-21").style.display = 'none';
        }
    }

    function change_22(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-22").style.display = 'block';
            document.getElementById("myLabel-22").innerHTML = "<label style='color: red;'>N. America (Others)</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-22").innerHTML = "<label style='color: black;'>N. America (Others)</label>";
            document.getElementById("myDiv-22").style.display = 'none';
        }
    }

    function change_23(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-23").style.display = 'block';
            document.getElementById("myLabel-23").innerHTML = "<label style='color: red;'>South America</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-23").innerHTML = "<label style='color: black;'>South America</label>";
            document.getElementById("myDiv-23").style.display = 'none';
        }
    }

    function change_24(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-24").style.display = 'block';
            document.getElementById("myLabel-24").innerHTML = "<label style='color: red;'>Asia</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-24").innerHTML = "<label style='color: black;'>Asia</label>";
            document.getElementById("myDiv-24").style.display = 'none';
        }
    }

    function change_25(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-25").style.display = 'block';
            document.getElementById("myLabel-25").innerHTML = "<label style='color: red;'>Europe</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-25").innerHTML = "<label style='color: black;'>Europe</label>";
            document.getElementById("myDiv-25").style.display = 'none';
        }
    }

    function change_26(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-26").style.display = 'block';
            document.getElementById("myLabel-26").innerHTML = "<label style='color: red;'>Middle East</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-26").innerHTML = "<label style='color: black;'>Middle East</label>";
            document.getElementById("myDiv-26").style.display = 'none';
        }
    }

    function change_27(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-27").style.display = 'block';
            document.getElementById("myLabel-27").innerHTML = "<label style='color: red;'>Oceania</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-27").innerHTML = "<label style='color: black;'>Oceania</label>";
            document.getElementById("myDiv-27").style.display = 'none';
        }
    }

    function change_28(el) {

        if (el.value === "+") {
            el.value = "-";
            el.style.color = "red";
            el.style.width = "18px";
            document.getElementById("myDiv-28").style.display = 'block';
            document.getElementById("myLabel-28").innerHTML = "<label style='color: red;'>Africa</label>";
        } else {
            el.value = "+";
            el.style.color = "black";
            document.getElementById("myLabel-28").innerHTML = "<label style='color: black;'>Africa</label>";
            document.getElementById("myDiv-28").style.display = 'none';
        }
    }
</script>

<script>
    $("input").on("click", function(e) {
        var val = [];
        var wasChecked = $(this).attr("wasChecked") == "true";
        if (wasChecked) {
            $(this).prop("checked", false);
        } else {
            $(this).prop("checked", true);
        }
        $(this).attr("wasChecked", $(this).prop("checked"));
        $("input:checked").each(function() {
            val.push($(this).val());
        });
        $(".output").html(val.join(", "));
    });
</script>
<script>
    function totalEmail() {
        let totalEmail = document.getElementById("totalemail").value;
        let price = 0;
        let days = '';
        if (1000 <= totalEmail && totalEmail <= 5000) {
            price = (totalEmail * 0.05625);
            days = 'Within 2 Days';
        } else if (5001 <= totalEmail && totalEmail <= 10000) {
            price = (totalEmail * 0.0525);
            days = 'Within 3 Days';
        } else if (10001 <= totalEmail && totalEmail <= 25000) {
            price = (totalEmail * 0.04875);
            days = 'Within 7 Days';
        } else if (25001 <= totalEmail && totalEmail <= 50000) {
            price = (totalEmail * 0.045);
            days = 'Within 10 Days';
        } else if (50001 <= totalEmail && totalEmail <= 75000) {
            price = (totalEmail * 0.04125);
            days = 'Within 15 Days';
        } else if (75001 <= totalEmail && totalEmail <= 100000) {
            price = (totalEmail * 0.0375);
            days = 'Within 25 Days';
        }
        document.getElementById("totalprice").value = Math.ceil(price);
        document.getElementById("deliveryDays").value = days;
    }

    function totalPrice() {
        let totalPrice = document.getElementById("totalprice").value;
        let email = 0;
        let days = '';
        if (56.25 <= totalPrice && totalPrice <= 281.25) {
            email = totalPrice / 0.05625;
            days = 'Within 2 Days';
        } else if (315 <= totalPrice && totalPrice <= 525) {
            email = totalPrice / 0.0525;
            days = 'Within 3 Days';
        } else if (535.75 <= totalPrice && totalPrice <= 1218.75) {
            email = totalPrice / 0.04875;
            days = 'Within 7 Days';
        } else if (1125 <= totalPrice && totalPrice <= 2250) {
            email = totalPrice / 0.045;
            days = 'Within 10 Days';
        } else if (2062.5 <= totalPrice && totalPrice <= 3093.75) {
            email = totalPrice / 0.04125;
            days = 'Within 15 Days';
        } else if (2812.5 <= totalPrice && totalPrice <= 3750) {
            email = totalPrice / 0.0375;
            days = 'Within 25 Days';
        } else {
            alert("Please, We can't received your custom order due to limit cross!<br>Please, Try Agiain, According Our Pricing Plane...");
        }
        document.getElementById("totalemail").value = Math.ceil(email);
        document.getElementById("deliveryDays").value = days;
    }
</script>