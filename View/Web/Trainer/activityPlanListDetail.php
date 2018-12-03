<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activity Plan Detail</title>
    </head>
    <body>
        <?php
        require_once './header.php';
        ?>
        <script>
            $(document).ready(function () {
                $("#activityListTable").dataTable();
            });
            $(document).ready(function () {
                $("#dietListTable").dataTable();
            });
        </script>
        <script type="text/javascript">
            function disableF5(e) {
                if ((e.which || e.keyCode) === 116 ) {
                    e.preventDefault();
                    alert("You are not allowed to refresh this page");
                }
            }
            ;
            $(document).ready(function () {
                $(document).on("keydown", disableF5);
            });
        </script>
        <style type="text/css">
            tbody{
                font-size: 12pt;
            }
        </style>
        <script src="js/activityPlanDetail.js" type="text/javascript"></script>
        <p><b><a href="../../../Control/Trainer/activityPlanList.php">Activity Plan</a> - Activity Plan Detail</b></p>
        <br/>
        <h4><b><?php echo $_SESSION['activityPlanDescription'] ?></b></h4>
        <form method="post" action="">
            <table id="activityListTable">
                <thead>
                <th>Name</th>
                <th>Calories Burn Per Minutes</th>
                <th>Suggested Duration</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    $activityPlanListDetail = $_SESSION['activityPlanListDetail'];
                    foreach ($activityPlanListDetail as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['caloriesburnpermin'] . "</td>";
                        echo "<td>" . $row['suggestedduration'] . "</td>";
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

        <br/>
        <table id="dietListTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Fat</th>
                    <th>Protein</th>
                    <th>Carbohydrate</th>
                    <th>Action</th>
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
                    $cancel = '<td><input type="submit"onclick="foodAction(' . $key['foodId'] . ')" id="f' . $key['foodId'] . '"   value="Cancel" class="btn btn-primary btn-xs"/></td>';
                    $select = '<td><input type="submit"onclick="foodAction(' . $key['foodId'] . ')" id="f' . $key['foodId'] . '"  value="Select" class="btn btn-xs btn-success"/></td>';
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
        <script>
            function foodAction(foodId) {
                $.ajax({
                    method: "post",
                    url: "../../../Control/Trainer/actionFoodPlanDetail.php",
                    data: {foodId: foodId},
                    success: function (data) {
                        if (data === "1") {
                            var buttonId = "f" + foodId;
                            document.getElementById(buttonId).value = "Cancel";
                            document.getElementById(buttonId).className = "btn btn-primary btn-xs";
                            alert("This Food is Assigned to the Plan");
                        } else if (data === "2") {
                            var buttonId = "f" + foodId;
                            document.getElementById(buttonId).value = "Select";
                            document.getElementById(buttonId).className = "btn btn-success btn-xs";
                            alert("This Food is Removed from the Plan");
                        } else {
                            alert(data);
                        }
                    }
                });
            }
        </script>
        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
