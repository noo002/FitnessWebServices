<script src="../js/activity.js" type="text/javascript"></script>

<p style="text-align:center ">
    <button onclick="newActivity()" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp; Insert New Activity</button>
</p>

<table id="myTable" >
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Calories burn per minutes</th>
            <th>Recommended time(minutes)</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $activityList = $_SESSION['activityList'];
        foreach ($activityList as $row => $key) {
            echo "<tr>";
            echo "<td><img src='../../../noimage.png' width='80px' height='80px'/> </td>";
            echo "<td>$key->name</td>";
            echo "<td>$key->caloriesBurnPerMin</td>";
            echo "<td>$key->suggestedDuration</td>";
            echo '<td class="text-center">'
            . '<a class="btn btn-primary btn-xs" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a>'
            . '&nbsp<a class="btn btn-danger btn-xs" href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a>'
            . '</td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php
require_once 'newActivity.php';
require_once 'editActivity.php';
require_once '../footer.php';
