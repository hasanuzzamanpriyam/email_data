<?php
require_once 'php/header.php';
?>

<style>
    .payment-tile {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #fff;
    }

    .payment-tile:hover {
        border-color: #28a745;
        background-color: #f8fff9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    .form-check-input:checked+.payment-tile {
        border-color: #28a745;
        background-color: #f8fff9;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .payment-tile img {
        max-height: 30px;
        object-fit: contain;
    }

    .bank-details-box {
        border-left: 4px solid #28a745;
        background: #fdfdfd;
        margin-top: 10px;
    }

    .card {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border-radius: 12px;
    }

    .card-header {
        border-radius: 12px 12px 0 0 !important;
    }

    .font-xsmall {
        font-size: 0.75rem;
        color: #6c757d;
    }

    /* Hide default radio circle but keep it functional */
    .mybtn input[type="radio"] {
        position: absolute;
        opacity: 0;
    }
</style>

<div class="container pb-5">
    <div class="row">
        <div class="col-lg-12">
            <?php if ($verified == 'Not Verified!'): ?>
                <div class="alert alert-danger alert-dismissible fade show text-center mt-3 shadow-sm">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong><i class="fas fa-exclamation-triangle"></i> Your E-mail is not verified!</strong> Please check your inbox for the verification link.
                </div>
            <?php endif; ?>
            <h4 class="text-center text-primary mt-4 mb-4 font-weight-light">Create your new topup here & access anytime anywhere!</h4>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col-lg-10" id="topupDisplay" style="display: block;">
            <div class="card">
                <div class="card-header font-weight-bold text-center text-white bg-success py-3">
                    <h3 class="m-0">Insert Top Up Details</h3>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4 align-items-center">
                        <div class="col-sm-7">
                            <p class="text-muted mb-0">Please choose a payment method and provide details:</p>
                        </div>
                        <div class="col-sm-5 text-right">
                            <span class="font-xsmall mr-2 text-uppercase">Secured With</span>
                            <img class="mr-2" height="22" src="../bundles/bydhome/img/logos/norton.png" alt="Norton">
                            <img height="22" src="../bundles/bydhome/img/logos/mcafee.png" alt="Mcafee">
                        </div>
                    </div>

                    <form action="" id="rates" onchange="showRate()">
                        <div class="row">
                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="fastspring">
                                    <input class="form-check-input" type="radio" name="payment" id="fastspring" value="FastSpring" onclick="mySeleted(this.value)">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">FastSpring</span>
                                        <img src="php/images/fastspring.png" alt="FastSpring">
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="perfectusd">
                                    <input class="form-check-input" type="radio" name="payment" id="perfectusd" value="Perfectmoney(USD)" onclick="mySeleted(this.value)">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Perfectmoney (USD)</span>
                                        <img src="php/images/perfectmoney.png" alt="PM">
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="bitcoin">
                                    <input class="form-check-input" type="radio" name="payment" id="bitcoin" value="Bitcoin" onclick="mySeleted(this.value)">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Bitcoin</span>
                                        <img src="php/images/bitcoin.png" alt="BTC">
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="usdt">
                                    <input class="form-check-input" type="radio" name="payment" id="usdt" value="USDT/Tether" onclick="mySeleted(this.value)">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">USDT / Tether</span>
                                        <img src="php/images/theater.png" alt="USDT">
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="debitcard">
                                    <input class="form-check-input" type="radio" name="payment" id="debitcard" value="Debit-Credit" onclick="mySeleted(this.value)" checked="true">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Debit / Credit Card</span>
                                        <img src="php/images/picture.png" alt="Cards">
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="paypal">
                                    <input class="form-check-input" type="radio" name="payment" id="paypal" value="PayPal" onclick="mySeleted(this.value)">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">PayPal</span>
                                        <img src="php/images/paypal_reference.svg" alt="PayPal">
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="heleket">
                                    <input class="form-check-input" type="radio" name="payment" id="heleket" value="Heleket" onclick="mySeleted(this.value)">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Crypto (Heleket)</span>
                                        <img src="php/images/heleket.png" alt="Heleket">
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-6 payment-demo">
                                <label class="form-check mybtn w-100 p-0" for="bank">
                                    <input class="form-check-input" type="radio" name="payment" id="bank" value="bankDeposit" onclick="mySeleted(this.value)">
                                    <div class="payment-tile d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Bank Deposit</span>
                                        <img src="php/images/wire.svg" alt="Bank">
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="bankDeposit box mt-3" style="display:none;">
                            <div class="card bank-details-box card-body shadow-none border">
                                <div class="alert alert-info py-2 small">
                                    We offer direct bank deposit from more than 200 International banks.
                                </div>
                                <div class="form-group mb-2">
                                    <label class="small font-weight-bold">Bank account name you are depositing from:</label>
                                    <input class="form-control form-control-sm" type="text" id="myBankAccount" onkeyup="mySeleted();">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-2">
                                        <label class="small font-weight-bold">Date of deposit:</label>
                                        <input class="form-control form-control-sm" type="date" id="depositDate" onchange="mySeleted()">
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        <label class="small font-weight-bold">Product Code (Ref):</label>
                                        <input class="form-control form-control-sm" type="text" id="bankProductCode" onkeyup="mySeleted()">
                                    </div>
                                </div>
                                <div class="mt-2 small text-muted">
                                    Mailerstation Ltd uses Wise. Please check <a href="https://wi.se/usd-swift-countries" target="_blank">SWIFT countries</a> before sending.
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr class="my-4">

                    <form action="./php/payment" method="POST" id="payment-form">
                        <div class="form-group">
                            <label for="topupAmount" class="font-weight-bold">Enter Top Up Amount *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light text-primary font-weight-bold">$</span>
                                </div>
                                <input type="number" class="form-control form-control-lg" name="topupAmount" placeholder="0.00" required>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <input type="hidden" name="selectedPayment" value="Debit-Credit" id="seletedPaymnet">
                            <input type="hidden" name="cardNumber" value="0" id="card">
                            <input type="hidden" name="cardHolder" value="0" id="holder">
                            <input type="hidden" name="expiryDate" value="0" id="expiry">
                            <input type="hidden" name="ccv" value="0" id="myccv">
                            <input type="hidden" name="bankAccountNumber" value="0" id="bankAccountNumber">
                            <input type="hidden" name="bankDepositDate" value="0" id="bankDepositDate">
                            <input type="hidden" name="bankPayCode" value="0" id="bankPayCode">
                            <input type="hidden" name="topupUserID" value="<?= $cid; ?>">
                            <input type="hidden" name="topupFullName" value="<?= $cfull; ?>">
                            <input type="hidden" name="topupEmail" value="<?= $cemail; ?>">
                            <input type="hidden" name="topupCode" value="<?php echo ('TO' . rand(10, 99) . 'P' . rand(10, 99) . 'M' . rand(0, 9) . 'S'); ?>">

                            <input type="submit" class="btn btn-primary btn-lg px-5 shadow-sm" id="test2" name="payNow" value="Pay With Debit-Credit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 shadow-sm border-0">
        <h5 class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
            <span class="text-dark font-weight-bold">All Topup Details</span>
            <button type="button" class="btn btn-outline-primary btn-sm" id="topup-btn" onclick="myTest()">
                <i class="fas fa-plus-circle"></i> New Topup
            </button>
        </h5>
        <div class="card-body">
            <div class="table-responsive" id="showTopupDetails">
                <p class="text-center lead mt-5 text-muted">Please Wait...</p>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'php/footer.php';
?>

<script>
    // Existing logic for showing/hiding bank box
    function mySeleted(val) {
        var selectedVal = val || document.querySelector('input[name="payment"]:checked').value;
        document.getElementById("seletedPaymnet").value = selectedVal;
        document.getElementById("test2").value = 'Pay With ' + selectedVal;

        // Toggle Bank Deposit Box
        if (selectedVal === 'bankDeposit') {
            $(".bankDeposit").slideDown();
        } else {
            $(".bankDeposit").slideUp();
        }

        // Keep your existing hidden field syncing
        document.getElementById("bankAccountNumber").value = document.getElementById("myBankAccount").value;
        document.getElementById("bankDepositDate").value = document.getElementById("depositDate").value;
        document.getElementById("bankPayCode").value = document.getElementById("bankProductCode").value;
    }

    // Keep all your original jQuery and JS functions below as they were
    $(document).ready(function() {
        displayAllTop();

        function displayAllTop() {
            $.ajax({
                url: 'php/process',
                type: 'post',
                data: {
                    action: 'display-topup'
                },
                success: function(response) {
                    $("#showTopupDetails").html(response);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }
        $("body").on("click", ".deleteTopupBtn", function(e) {
            e.preventDefault();
            let delete_id = $(this).attr("id");
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'php/process',
                        type: 'post',
                        data: {
                            delete_id: delete_id
                        },
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
        });
    });

    function myTest() {
        $("#topupDisplay").toggle(400);
    }
</script>

<script>
    function clickAlert() {
        alert("Sorry! Please, Wait to Complete your Topup !");
    }
</script>