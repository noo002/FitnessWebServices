<title>Activity Plan List</title>
<?php
require_once 'header.php';
$standardGoalList = $_SESSION['standardGoal'];
?>
<script>
    document.getElementById('pathLocation').innerHTML = "Goal List";

    var dashboard = document.getElementById('dashboard');
    var traineeList = document.getElementById('traineeList');
    var activityPlan = document.getElementById('activityPlan');
    var goalList = document.getElementById('goalList');


    dashboard.classList.remove('active');
    traineeList.classList.remove('active');
    traineeList.classList.remove('active');
    activityPlan.classList.remove('active');


    goalList.classList.add('active');
</script>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-14">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Goal List</h4>
                        <p>
                            <?php
                            for ($d = 0; $d < 221; $d++) {
                                echo "&nbsp;";
                            }
                            ?>
                            <a href="newGoal.php"><button class='btn btn-success'>New Goal</button></a>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form method="post" action="../../Control/Trainer/standardGoalDetail.php">
                            <table class="table table-striped table-bordered table-hover table-striped" id="goalListTable">
                                <thead>
                                    <tr>
                                        <th style="color:black">Goal Name</th>
                                        <th style="color:black">Food Intake (Calories per Day) </th>
                                        <th style="color:black">Activity Duration (Minutes per Day)</th>
                                        <th style="color:black">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($standardGoalList as $row => $key) {
                                        $edit = '<td><button value="' . $key->standardGoalId . '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</button></td>';
                                        echo "<tr>";
                                        echo "<td>$key->goalName</td>";
                                        echo "<td>$key->foodIntake</td>";
                                        echo "<td>$key->activityDuration</td>";
                                        echo $edit;
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
        $("#goalListTable").DataTable();
    });
</script>