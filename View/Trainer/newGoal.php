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
                        <h4 class="title">Goal List - New Goal</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form method="post" action="../../Control/Trainer/newStandardGoal.php">
                            <table class="table table-striped table-bordered table-hover table-striped">
                                <tr>
                                    <th>Goal Name</th>
                                    <td><input class="form-control" type="text" name="goalName" value=""  /></td>
                                </tr>
                                <tr>
                                    <th>Food Intake (Calories per day)</th>
                                    <td><input class="form-control" type="number" name="foodIntake" value="" /></td>
                                </tr>
                                <tr>
                                    <th>Activity Duration(Minutes per day)</th>
                                    <td><input class="form-control" type="number" name="activityDuration" value=""  /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" value="Submit"class="btn btn-primary btn-xs" />&nbsp;
                                        <input type="reset" value="Reset"  class="btn btn-xs btn-danger delete"/>
                                    </td>
                                </tr>
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
