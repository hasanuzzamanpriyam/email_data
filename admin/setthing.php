<?php
require_once 'assets/php/header.php';
?>
<main>
    <h2 class="dashboard-title">Overview</h2>
    <div class="dashboard-cards">
        <div class="card-single">
            <div class="card-body">
                <span class="ti-briefcase"></span>
                <div>
                    <h5>Account Balance</h5>
                    <h4>$1234.99</h4>
                </div>
            </div>
            <div class="card-footer">
                <a href="">View All</a>
            </div>
        </div>
        <div class="card-single">
            <div class="card-body">
                <span class="ti-reload"></span>
                <div>
                    <h5>Pending</h5>
                    <h4>$1234.99</h4>
                </div>
            </div>
            <div class="card-footer">
                <a href="">View All</a>
            </div>
        </div>
        <div class="card-single">
            <div class="card-body">
                <span class="ti-check-box"></span>
                <div>
                    <h5>Processed</h5>
                    <h4>$1234.99</h4>
                </div>
            </div>
            <div class="card-footer">
                <a href="">View All</a>
            </div>
        </div>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Recent Activity</h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Team</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Html</td>
                                <td>12/12/21</td>
                                <td>12/12/21</td>
                                <td class="table-team">
                                    <div class="img-1"></div>
                                    <div class="img-2"></div>
                                    <div class="img-3"></div>
                                </td>
                                <td>
                                    <span class="badge success">Success</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Html</td>
                                <td>12/12/21</td>
                                <td>12/12/21</td>
                                <td class="table-team">
                                    <div class="img-1"></div>
                                    <div class="img-2"></div>
                                    <div class="img-3"></div>
                                </td>
                                <td>
                                    <span class="badge success">Success</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Html</td>
                                <td>12/12/21</td>
                                <td>12/12/21</td>
                                <td class="table-team">
                                    <div class="img-1"></div>
                                    <div class="img-2"></div>
                                    <div class="img-3"></div>
                                </td>
                                <td>
                                    <span class="badge success">Success</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Html</td>
                                <td>12/12/21</td>
                                <td>12/12/21</td>
                                <td class="table-team">
                                    <div class="img-1"></div>
                                    <div class="img-2"></div>
                                    <div class="img-3"></div>
                                </td>
                                <td>
                                    <span class="badge warning">Processing</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="summary">
                <div class="summary-card">
                    <div class="summary-single">
                        <span class="ti-id-badge"></span>
                        <div>
                            <h5>196</h5>
                            <small>Number of Staff</small>
                        </div>
                    </div>
                    <div class="summary-single">
                        <span class="ti-calendar"></span>
                        <div>
                            <h5>196</h5>
                            <small>Number of Leave</small>
                        </div>
                    </div>
                    <div class="summary-single">
                        <span class="ti-face-smile"></span>
                        <div>
                            <h5>196</h5>
                            <small>Profile update request</small>
                        </div>
                    </div>
                </div>
                <div class="birthday-card">
                    <div class="birthday-flex">
                        <div class="birthday-img"></div>
                        <div class="birthday-info">
                            <h5>Shahabuddin</h5>
                            <small>Birthday today</small>
                        </div>
                    </div>
                    <div class="text-content">
                        <button>
                            <span class="ti-gift"></span>
                            Wish him
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</div>
<?php
require_once 'assets/php/footer.php';
?>
