<?php
require_once '../../../Model/activity.php';

require_once 'header.php';
?>
<script>
    $(document).ready(function () {
        $("#myTable").dataTable();
    });
</script>

<p>
    <b>Trainer  - Activity List </b>

</p>
<br/>
<form method="post" action="../../../Control/Trainer/actionActivity.php" enctype="multipart/form-data">
    <table id="myTable" >
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Calories burn per minutes</th>
                <th>Recommended time(minutes)</th>

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

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
<?php
//require_once 'newActivity.php';
//require_once 'editActivity.php';
require_once '../footer.php';
