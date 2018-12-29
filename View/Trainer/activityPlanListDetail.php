<title>Activity Plan List</title>
<?php
require_once 'header.php';
?>
<script>
    document.getElementById('pathLocation').innerHTML = "Activity Plan List Detail";

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
                        <h4 class="title">Activity List Detail</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form method="post" action="../../Control/Trainer/activityPlanListDetail.php">
                            <table class="table table-striped table-bordered table-hover table-striped" id="activityPlanListTable">
                                <thead>
                                <th style="color:black">Name</th>
                                <th style="color:black">Calories Burn Per Minutes</th>
                                <th style="color:black">Suggested Duration</th>
                                <th style="color:black">Total Calories Burned</th>
                                <th style="color:black">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $activityPlanListDetail = $_SESSION['activityPlanListDetail'];
                                    foreach ($activityPlanListDetail as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['caloriesburnpermin'] . "</td>";
                                        echo "<td>" . $row['suggestedduration'] . "</td>";
                                        echo "<td> " . $row['totalCaloriesBurned'] . " </td>";
                                        $cancel = "<td><button id='" . $row['activityId'] . "' name='activityId' value='" . $row['activityId'] . "'  class='btn btn-primary btn-xs'>Cancel</button></td>";
                                        $select = "<td><button id='" . $row['activityId'] . "' name='activityId' value='" . $row['activityId'] . "'  class='btn btn-success btn-xs'>Select</button></td>";
                                        if ($row['status'] == 1) {
                                            echo $cancel;
                                        } else {
                                            echo $select;
                                        }
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
        <div class="row">
            <div class="col-md-14">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Diet List Detail</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="../../Control/Trainer/foodPlanDetail.php">
                            <table class="table table-striped table-bordered table-hover table-striped" id="dietListTable">
                                <thead>
                                    <tr>
                                        <th style="color:black">Name</th>
                                        <th style="color:black">Fat</th>
                                        <th style="color:black">Protein</th>
                                        <th style="color:black">Carbohydrate</th>
                                        <th style="color:black">Calories</th>
                                        <th style="color:black">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $foodListDetail = $_SESSION['foodListDetail'];
                                    foreach ($foodListDetail as $row => $key) {
                                        echo "<tr>";
                                        echo "<td>" . $key['name'] . "</td>";
                                        echo "<td>" . $key['fat'] . "</td>";
                                        echo "<td>" . $key['protein'] . "</td>";
                                        echo "<td>" . $key['carbohydrate'] . "</td>";
                                        echo "<td>" . $key['calories'] . "</td>";
                                        $cancel = '<td><button name="foodId"  id="f' . $key['foodId'] . '"   value="' . $key['foodId'] . '" class="btn btn-primary btn-xs">Cancel</button></td>';
                                        $select = '<td><button name="foodId"  id="f' . $key['foodId'] . '"  value="' . $key['foodId'] . '" class="btn btn-xs btn-success">Select</button></td>';
                                        if ($key['status'] == 1) {
                                            echo $cancel;
                                        } else {
                                            echo $select;
                                        }
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
    $(document).ready(function () {
        $("#dietListTable").dataTable();
    });
</script>