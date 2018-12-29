
<?php
require_once './header.php';
?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Total User</h4>
                    </div>
                    <div class="content">
                        <div class="footer">
                            <div class="legend">
                                <b> <i class="pe-7s-users"></i> Total Trainee : <?php echo $_SESSION['totalNumber']['totalTrainee'] ?></b>

                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Information are reliable
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Total Activity Plan</h4>
                    </div>
                    <div class="content">
                        <div class="footer">
                            <div class="legend">
                                <b> <i class="pe-7s-users"></i> Total Activity Plan : <?php echo $_SESSION['totalNumber']['totalActivityPlan'] ?></b>

                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Information are reliable
                            </div>
                        </div>
                    </div>
                </div>

            </div>        

            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Total Goal</h4>
                    </div>
                    <div class="content">
                        <div class="footer">
                            <div class="legend">
                                <b> <i class="pe-7s-users"></i> Total Trainee : <?php echo $_SESSION['totalNumber']['totalStandardGoal'] ?></b>

                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Information are reliable
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>









<?php
require_once './footer.php';
?>