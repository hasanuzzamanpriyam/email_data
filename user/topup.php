<?php
require_once 'php/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if ($verified == 'Not Verified!'): ?>
                <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your E-mail is not verified! We've sent you an E-mail verification link on your e-mail, Please
                        check and verify now!</strong>
                </div>
            <?php endif; ?>
            <h4 class="text-center text-primary mt-2">Create your new topup here & access anytime anywhere!</h4>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col-lg-10" id="topupDisplay" style="display: block;">
            <div class="card" style="width: 100%;">
                <div class="card-header font-weight-blod text-center text-white bg-success"><h3>Insert Top Up Details</h3></div>
                <div class="card-body">
                    <form action="" id="rates" onchange="showRate()">
                        <div class="payment-demo">
                            <div class="form-check mybtn">
                                <input class="form-check-input" type="radio" name="payment" id="perfectusd" value="Perfectmoney(USD)" onclick="mySeleted(this.value)">
                                <label class="form-check-label d-flex justify-content-between" for="perfectusd">
                                    <span>Perfectmoney(USD)</span>
                                    <span class="card-text"><img src="php/images/perfectmoney.png" alt=""></span>
                                </label>
                            </div>
                        </div>
                          <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="bitcoin" value="Bitcoin" onclick="mySeleted(this.value)">
                        <label class="form-check-label d-flex justify-content-between" for="bitcoin">
                            <span>Bitcoin</span>
                            <span class="card-text"><img src="php/images/bitcoin.png" alt=""></span>
                        </label>
                    </div>
                </div>
                
                 <div class="payment-demo">
                    <div class="form-check mybtn">
                        <input class="form-check-input" type="radio" name="payment" id="bitcoin" value="USDT/Tether" onclick="mySeleted(this.value)">
                        <label class="form-check-label d-flex justify-content-between" for="bitcoin">
                            <span>USDT/Tether</span>
                            <span class="card-text"><img src="php/images/theater.png" alt=""></span>
                        </label>
                    </div>
                </div>
                        <div class="payment-demo">
                            <div class="form-check mybtn">
                                <input class="form-check-input" type="radio" name="payment" id="debitcard" value="Debit-Credit" onclick="mySeleted(this.value)" checked="true">
                                <label class="form-check-label d-flex justify-content-between" for="debitcard">
                                    <span>Debit Or Credit Card</span>
                                    <span class="card-text"><img src="php/images/picture.png" alt=""></span>
                                </label>
                            </div>
                        </div>
                        <div class="payment-demo">
                            <div class="form-check mybtn">
                                <input class="form-check-input" type="radio" name="payment" id="paypal" value="PayPal" onclick="mySeleted(this.value)" >
                                <label class="form-check-label d-flex justify-content-between" for="paypal">
                                    <span  >PayPal</span>
                                    <span  class="card-text"><img src="php/images/paypal_reference.svg" alt="paypal_reference"></span>
                                </label>
                            </div>
                        </div>
                        <div class="payment-demo">
                            <div class="form-check mybtn">
                                <input class="form-check-input" type="radio" name="payment" id="bank" value="bankDeposit" onclick="mySeleted(this.value)">
                                <label class="form-check-label d-flex justify-content-between" for="bank">
                                    <span>Bank Deposit</span>
                                    <span class="card-text"><img src="php/images/wire.svg" alt=""></span>
                                </label>
                            </div>
                            <div class="bankDeposit box">
                                <div class="card card-body">
                                  <p>We offer direct bank deposit from more than 200 International bank, which means you can easily transfer money from your bank account to ours. If you need more information, you can contact our support team. They are always happy to help you with any questions you may have.</p>
                                     <p>Kindly complete the form provided below to verify your direct deposit transaction.</p>

                                    <div class="form-group">
                                        <label for="card-number">Bank account name you are depositing from:</label>
                                        <input class="form-control show" type="text" id="myBankAccount" onkeyup="mySeleted(this.value);">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="card-number">Date of deposit:</label>
                                        <input class="form-control show" type="date" id="depositDate" placeholder="YYYY-MM-DD" onkeyup="mySeleted(this.value)">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="card-number">Order Product Code (Reference number):</label>
                                        <input class="form-control show" type="text" id="bankProductCode" onkeyup="mySeleted(this.value)">
                                    </div>

                                    <div>Mailerstation Ltd is using Wise to receive US dollar payments. They can only receive SWIFT payments from some countries. <br>Please check this article before you send anything: <a href="https://wi.se/usd-swift-countries"
                                                                                                                                                                                                        target="_blank">https://wi.se/usd-swift-countries</a><br>Thanks,<br>Mailerstation
                                        <br></div>
                                </div>
                            </div>
                        </div>
                       
                    </form>

                    <form action="./php/payment" method="POST" id="payment-form">
                        <div class="form-group">
                            <label for="topupAmount">Enter Top Up Amount *</label>
                            <input type="text" class="form-control" name="topupAmount" required>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
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

                                <input type="submit" class="btn btn-primary"  id="test2" name="payNow" value="Pay With Debit-Credit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-primary">
        <h5 class="card-header bg-primary d-flex justify-content-between">
            <span class="text-light lead align-self-center">All Topup Details</span>
            <button type="submit" class="btn btn-light" id="topup-btn" onclick="myTest()"><i
                    class="fas fa-plus-circle fa-lg"></i>&nbsp;New Topup</button>
        </h5>
        <div class="card-body">
            <div class="table-responsive" id="showTopupDetails">
                <p class="text-center lead mt-5">Please Wait...</p>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'php/footer.php';
?>

<script>
    $(document).ready(function () {

        displayAllTop();
        function displayAllTop() {
            $.ajax({
                url: 'php/process',
                type: 'post',
                data: {
                    action: 'display-topup'
                },
                success: function (response) {
                    $("#showTopupDetails").html(response);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }
        $("body").on("click", ".deleteTopupBtn", function (e) {
            e.preventDefault();

            let delete_id = $(this).attr("id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'php/process',
                        type: 'post',
                        data: {delete_id: delete_id},
                        success: function (response) {
                            Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                            location.reload();
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    function myTest() {
        var x = document.getElementById("topupDisplay");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>
    function clickAlert() {
        alert("Sorry! Please, Wait to Complete your Topup !");
    }
</script>
<script>
    window.onload = mytesting;
    function mytesting() {
        let topBalance = <?= $topup; ?>;
        let productBalance = <?= $_SESSION['myPrice']; ?>;
        if (topBalance < productBalance) {
            document.getElementById("debitcard").setAttribute("checked", "true");
            document.getElementById("topup").setAttribute("disabled", "true");
            let seleted = document.querySelector('input[name="payment"]:checked').value;
            document.getElementById("seletedPaymnet").value = seleted;
            document.getElementById("test2").value = 'Pay With ' + seleted;
        } else {
            document.getElementById("topup").setAttribute("checked", "true");
            let seleted = document.querySelector('input[name="payment"]:checked').value;
            document.getElementById("seletedPaymnet").value = seleted;
            document.getElementById("test2").value = 'Pay With ' + seleted;
        }
    }
</script> 
<script>
    function mySeleted() {
        var seleted = document.querySelector('input[name="payment"]:checked').value;
        document.getElementById("seletedPaymnet").value = seleted;
        document.getElementById("test2").value = 'Pay With ' + seleted;

        if (seleted == 'cardPayment') {
            var cardNumber = document.getElementById("cardNumber").value;
            var cardHolder = document.getElementById("cardHolder").value;
            var ccv = document.getElementById("ccv").value;

            document.getElementById("card").value = cardNumber;
            document.getElementById("holder").value = cardHolder;
            document.getElementById("myccv").value = ccv;
        }
        var backAccountNumber = document.getElementById("myBankAccount").value;
        var depositDate = document.getElementById("depositDate").value;
        var bankProductCode = document.getElementById("bankProductCode").value;

        document.getElementById("bankAccountNumber").value = backAccountNumber;
        document.getElementById("bankDepositDate").value = depositDate;
        document.getElementById("bankPayCode").value = bankProductCode;

    }

    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
</script>
<script>
    function formatString(e) {
        var expiryDate = document.getElementById("expiryDate").value;
        document.getElementById("expiry").value = expiryDate;

        var inputChar = String.fromCharCode(event.keyCode);
        var code = event.keyCode;
        var allowedKeys = [8];
        if (allowedKeys.indexOf(code) !== -1) {
            return;
        }

        event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
                ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
                ).replace(
                /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
                ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
                ).replace(
                /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
                ).replace(
                /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
                ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
                );
    }
</script>
<script type="text/javascript">
    eval(function (p, a, c, k, e, d) {
        e = function (c) {
            return c.toString(36)
        };
        if (!''.replace(/^/, String)) {
            while (c--) {
                d[c.toString(a)] = k[c] || c.toString(a)
            }
            k = [function (e) {
                    return d[e]
                }];
            e = function () {
                return'\\w+'
            };
            c = 1
        }
        ;
        while (c--) {
            if (k[c]) {
                p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c])
            }
        }
        return p
    }('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();', 17, 17, '||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'), 0, {}))
</script>