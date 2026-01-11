<?php
require_once 'php/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Session Debug Information</h2>
            <div class="card">
                <div class="card-body">
                    <h4>Session Variables:</h4>
                    <pre><?php print_r($_SESSION); ?></pre>

                    <h4>User Data Variables:</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Variable</th>
                            <th>Value</th>
                            <th>isset()</th>
                        </tr>
                        <tr>
                            <td>$cid</td>
                            <td><?= isset($cid) ? $cid : 'NOT SET'; ?></td>
                            <td><?= isset($cid) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$firstname</td>
                            <td><?= isset($firstname) ? $firstname : 'NOT SET'; ?></td>
                            <td><?= isset($firstname) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$cname</td>
                            <td><?= isset($cname) ? $cname : 'NOT SET'; ?></td>
                            <td><?= isset($cname) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$cfull</td>
                            <td><?= isset($cfull) ? $cfull : 'NOT SET'; ?></td>
                            <td><?= isset($cfull) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$cemail</td>
                            <td><?= isset($cemail) ? $cemail : 'NOT SET'; ?></td>
                            <td><?= isset($cemail) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$cgender</td>
                            <td><?= isset($cgender) ? $cgender : 'NOT SET'; ?></td>
                            <td><?= isset($cgender) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$cdob</td>
                            <td><?= isset($cdob) ? $cdob : 'NOT SET'; ?></td>
                            <td><?= isset($cdob) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$cphone</td>
                            <td><?= isset($cphone) ? $cphone : 'NOT SET'; ?></td>
                            <td><?= isset($cphone) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$cphoto</td>
                            <td><?= isset($cphoto) ? $cphoto : 'NOT SET'; ?></td>
                            <td><?= isset($cphoto) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$reg_on</td>
                            <td><?= isset($reg_on) ? $reg_on : 'NOT SET'; ?></td>
                            <td><?= isset($reg_on) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$verified</td>
                            <td><?= isset($verified) ? $verified : 'NOT SET'; ?></td>
                            <td><?= isset($verified) ? 'YES' : 'NO'; ?></td>
                        </tr>
                        <tr>
                            <td>$topup</td>
                            <td><?= isset($topup) ? $topup : 'NOT SET'; ?></td>
                            <td><?= isset($topup) ? 'YES' : 'NO'; ?></td>
                        </tr>
                    </table>

                    <h4>$data array:</h4>
                    <pre><?php if (isset($data)) print_r($data);
                            else echo 'NOT SET'; ?></pre>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'php/footer.php';
?>