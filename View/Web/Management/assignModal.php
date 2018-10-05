<div class="modal" id="assignModal" role="dialog">
    <div class="modal-dialog" style="width:80%; height:100%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Trainer Assign</h4>
            </div>
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    
                <input type="hidden" id="studentID" name="studentID"/>
                <table id="assignTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Certificate</th>
                            <th>Year of Experience</th>
                            <th>Number of Student</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = $con->prepare("SELECT * FROM trainer ORDER BY name");
                            if(!$query->execute()) echo $query->error;
                            $result = $query->get_result();
                            while($row = $result->fetch_Array()) {
                                $gender = 'Male';
                                if($row[2]=='1') {
                                    $gender = 'Female';
                                }
                                $query = $con->prepare("SELECT COUNT(*) AS count FROM user WHERE trainer_id = ?");
                                $query->bind_param('s',$row[0]);
                                if(!$query->execute()) echo $query->error;
                                $result2 = $query->get_result()->fetch_assoc();
                                echo '<tr>';
                                echo '<td><input type="radio" required name="trainer" id="'.$row[0].'" value="'.$row[0].'"/></td>';
                                echo '<td>'.$row[1].'</td>';
                                echo '<td>'.$gender.'</td>';
                                echo '<td>'.$row[3].'</td>';
                                echo '<td>'.$row[4].'</td>';
                                echo '<td>'.$row[5].'</td>';
                                echo '<td>'.$result2['count'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <br/>
                    <button type="submit" name="assigned" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Assign</button>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["assigned"])) {
        $stuId = $_POST["studentID"];
        $trainerId = $_POST["trainer"];
        $query = $con->prepare("UPDATE user SET trainer_id = ? WHERE id =?");
        $query->bind_param('ii',$trainerId,$stuId);
        if(!$query->execute()) echo $query->error;
        
        echo "<script type='text/javascript'>alert('Trainer Assigned Successful');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
        $con->close();
    }
?>