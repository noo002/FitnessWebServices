<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../../../Model/Management.php';

        require_once './header.php';
        ?>
        <p>
            <b>Assign Plan - <?php echo $_SESSION['traineeName'] ?></b>
        </p><br/>
        <script>
            $(document).ready(function () {
                $("#activityPlan").dataTable();
            });
        </script>
        <table id="activityPlan" style="font-size: 12pt">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $activityPlanList = $_SESSION['allActivityPlan'];
                foreach ($activityPlanList as $row => $key) {
                    echo "<tr>";
                    echo "<td>" . $key['description'] . "</td>";
                    if ($key['status'] == 0) {
                        echo "<td>";
                        echo '<input type="radio" name="activityPlan" id="' . $key['activityPlanId'] . '" value="" />';
                        echo "</td>";
                    } else if ($key['status'] == 1) {
                        echo "<td>";
                        echo '<input type="radio" id="' . $key['activityPlanId'] . '" checked name="activityPlan" value="" />';
                        echo "</td>";
                    }
                    echo "<td><button value='" . $key['activityPlanId'] . "' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-floppy-saved'></span>&nbsp;&nbsp;Select</button></td>";
                    echo "</td>";
                }
                ?>

            <script>
                $(document).ready(function () {
                    $('button').click(function () {
                        var activityPlanId = this.value;
                        var status = document.getElementById(activityPlanId).checked;
                        $.ajax({
                            type: "post",
                            url: "../../../Control/assignPlan.php",
                            data: {activityPlanId: activityPlanId, status: status},
                            success: function (data) {
                                alert(data);
                            }
                        });
                    })
                });
            </script>
        </tbody>
    </table>

    <?php
    require_once '../footer.php';
    ?>
</body>
</html>
