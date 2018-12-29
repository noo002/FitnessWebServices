<title>Activity Plan List</title>
    <?php
    require_once 'header.php';
    ?>
    <script>
        document.getElementById('pathLocation').innerHTML = "Activity Plan List";

        var dashboard = document.getElementById('dashboard');
        var traineeList = document.getElementById('traineeList');
        var activityPlan = document.getElementById('activityPlan');
        var goalList = document.getElementById('goalList');


        dashboard.classList.remove('active');
        traineeList.classList.remove('active');
        traineeList.classList.remove('active');
        goalList.classList.remove('active');


        activityPlan.classList.add('active');
    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-14">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Activity Plan List</h4>
                            <p>
                                <?php
                                for ($d = 0; $d < 221; $d++) {
                                    echo "&nbsp;";
                                }
                                ?>
                                <a href="newActivityPlan.php"><button class='btn btn-success'>New Activity Plan</button></a>
                            </p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form method="post" action="../../Control/Trainer/actionActivityPlanList.php">
                                <table class="table table-striped table-bordered table-hover table-striped" id="activityPlanListTable">
                                    <thead>
                                        <tr>
                                            <th style="color:black">Name</th>
                                            <th style="color:black">Number of Activity</th>
                                            <th style="color:black">Number of Diet</th>
                                            <th style="color:black">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $activityPlanList = $_SESSION['activityPlanList'];
                                        foreach ($activityPlanList as $row => $key) {
                                            echo "<tr>";
                                            echo "<td>" . $key['description'] . "</td>";
                                            echo "<td>" . $key['NumberActivity'] . "</td>";
                                            echo "<td>" . $key['NumberFood'] . "</td>";
                                            echo "<td><button name='edit' value=" . $key['activityPlanId'] . " class='btn btn-primary btn-xs'>Edit</button>&nbsp;&nbsp;<button name='detail'class='btn btn-primary btn-xs' value=" . $key['activityPlanId'] . "><span class='glyphicon glyphicon-info-sign'></span>&nbsp;&nbsp;Detail</button>&nbsp;&nbsp;"
                                            . "<button name='feedback' value=" . $key['activityPlanId'] . " class='btn btn-success btn-xs'><span class='glyphicon glyphicon-pencil'></span>&nbsp;&nbsp;Feedback</button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>
    <script>
        $(document).ready(function () {
            $("#activityPlanListTable").DataTable();
        });
    </script>