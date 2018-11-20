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
                <th>Status</th>
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
                        if ($row['status'] == 1) {
                            echo '<td><input id="' . $row['activityId'] . '" type = "checkbox"  value="' . $row['activityId'] . '" name ="' . $row['activityId'] . '" checked /></td>';
                        } else {
                            echo '<td><input id="' . $row['activityId'] . '" type="checkbox" value="' . $row['activityId'] . '" name ="' . $row['activityId'] . '"  /></td>';
                        }
                        echo "<td><button  value='" . $row['activityId'] . "'  name='save' id='" . $row['activityId'] . "' class='btn btn-xs btn-success'>Save</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>

        <br/>

        <h4><b><?php echo $_SESSION['activityPlanDescription'] ?></b></h4>
        <table id="dietListTable">
            <thead>
            <th>Name</th>
            <th>Fat</th>
            <th>Protein</th>
            <th>carbohydrate</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $foodListDetail = $_SESSION['foodListDetail'];
            foreach ($foodListDetail as $row) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['fat'] . "</td>";
                echo "<td>" . $row['protein'] . "</td>";
                echo "<td>" . $row['carbohydrate'] . "</td>";
                if (!empty($row['status'])) {
                    echo '<td><input type="checkbox" id="f' . $row['foodId'] . '" name="status" checked /></td>';
                } else {
                    echo '<td><input type="checkbox" name="' . $row['foodId'] . '" id="f' . $row['foodId'] . '" /></td>';
                }
                echo '<td><input type="submit"onclick="foodAction(' . $row['foodId'] . ')"  value="save" class="btn btn-xs btn-success"/></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
        <script>
            //1 using the script in  <script src="js/activityPlanDetail.js" type="text/javascript"> here
            //1 write at here because of only here can run .
            function foodAction(foodId) {
                var status = "f" + foodId;
                var s = document.getElementById(status).checked;
                $.ajax({
                    type: "post",
                    url: "../../../Control/Trainer/actionFoodPlanDetail.php",
                    data: {foodId: foodId, status: s},
                    success: function (data) {
                        alert(data);
                    }
                });
            }

        </script>
    </table>

    <?php
    require_once '../footer.php';
    ?>
</body>
</html>
