<script src="../js/activity.js" type="text/javascript"></script>

<p>
    <b>Fitness Companion - Activity List </b>
    <button style="float:right" onclick="newActivity()" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp; Insert New Activity</button>
</p>
<br/>
<form method="post" action="../../../Control/actionActivity.php" enctype="multipart/form-data">
    <table id="myTable" >
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Calories burn per minutes</th>
                <th>Recommended time(minutes)</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $activityList = $_SESSION['activityList'];
            foreach ($activityList as $row => $key) {
                echo "<tr>";
                if ($key->image == null) {
                    echo "<td><img src='../../../noimage.png' width='60px' height='60px'/> </td>";
                } else {
                    // echo '<img src="data:image/jpeg;base64,'.base64_encode( $key['image'] ).'"/>';
                    echo '<td><img src="data:image/jpeg;base64,' . $key->image . '" width="60px" height="60px"/></td>';
                }
                echo "<td>$key->name</td>";
                echo "<td>$key->caloriesBurnPerMin</td>";
                echo "<td>$key->suggestedDuration</td>";
                $edit = '<td><button value="' . $key->activityId . '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</button>&nbsp;&nbsp;';
                $Inactive = '<button value="' . $key->activityId . '"  name="status" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Inactive</button></td>';
                $active = '<button value="' . $key->activityId . '"  name="status" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"></span> Active</button></td>';
                if ($key->status == 1) {
                    // mean active;
                    echo "<td>Active</td>";
                    echo $edit;
                    echo $Inactive;
                } else if ($key->status == 2) {
                    echo "<td>Inactive</td>";
                    echo $edit;
                    echo $active;
                } else {
                    echo "<td>Error occur</td>";
                    echo $edit;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
<?php
require_once 'newActivity.php';
//require_once 'editActivity.php';
require_once '../footer.php';
