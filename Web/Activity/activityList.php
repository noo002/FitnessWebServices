<script src="../js/activity.js" type="text/javascript"></script>
<a href="#" onclick="newActivity()"><h3><span class="glyphicon glyphicon-plus"></span>Insert New Activity</h3></a>
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
            $query = $con->prepare("SELECT * FROM Activity ORDER BY name");
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            while($row = $result->fetch_Array()) {
                echo'<tr data-toggle="tooltip" title="'.$row[2].'">';
                if($row[5]!=null) {
                    echo '<td> <img width="80px" src="data:image/gif;base64,'.$row[5].'" /></td>';
                }
                else{
                    echo '<td> <img width="80px" src="../image/logo-small.png" /></td>';
                }
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td class="text-center">'
                . '<a class="btn btn-primary btn-xs" onclick="editActivity('.$row[0].')" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a>'
                . '&nbsp<a class="btn btn-danger btn-xs" onclick="deleteActivity('.$row[0].')" href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a>'
                . '</td>';
                echo'</tr>';
            }
        ?>
    </tbody>
</table>
<?php 
require_once 'newActivity.php';
require_once 'editActivity.php';
require_once '../footer.php';?>