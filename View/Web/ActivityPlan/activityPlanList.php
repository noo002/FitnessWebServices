
<script src="../js/activityPlan.js" type="text/javascript"></script>

<p><b>Trainer - Activity List</b><button style='float: right' class='btn btn-success'><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp; New Activity </button></p>
<br/>
<table id="myTable" class="display table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Number of Activity</th>
            <th>Number of Diet</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $activityPlanList = $_SESSION['activityPlanList'];
        foreach ($activityPlanList as $row => $key) {
            echo "<tr>";
            echo "<td>$key->name</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";

            echo "</tr>";
        }
        ?>
    </tbody>

</table>
<?php
//require_once 'editActivityPlan.php';

require_once '../footer.php';
?>