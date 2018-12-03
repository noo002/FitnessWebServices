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
        <form method="post" action="../../../Control/assignPlan.php">
            <table id="activityPlan" style="font-size: 12pt">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $activityPlanList = $_SESSION['allActivityPlan'];
                    foreach ($activityPlanList as $row => $key) {
                        echo "<tr>";
                        echo "<td>" . $key['description'] . " </td>";
                        if ($key['status'] == 1) {
                            echo "<td><button name='activityPlanId' class='btn btn-xs btn-primary btn-success' disabled>selected</button></td>";
                        } else {
                            echo "<td><button value='" . $key['activityPlanId'] . "' name='activityPlanId' class='btn btn-primary btn-xs'>select</button></td>";
                        }
                        echo "</tr>";
                    }
                    ?>


                </tbody>
            </table>
        </form>
        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
