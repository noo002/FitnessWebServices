<?php require_once 'header.php';?>
<script src="../js/trainerAdmin.js" type="text/javascript"></script>
<a href="#" onclick="newTrainer()"><h3><span class="glyphicon glyphicon-plus"></span>Insert New Trainer</h3></a>
<table id="trainerTable">
    <thead>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Certificate</th>
        <th>Year of Experience</th>
        <th>Status</th>
        <th>Action</th>
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
                $button = '<a class="btn btn-danger btn-xs" onclick="inactive('.$row[0].')" href="#"><span class="glyphicon glyphicon-remove"></span> Inactive</a>';
                $status = 'Active';
                if($row[7]=='0') {
                    $status = 'Inactive';
                    $button ='<a class="btn btn-primary btn-xs" onclick="active('.$row[0].')" href="#"><span class="glyphicon glyphicon-ok"></span> Active  .</a>';
                }
                echo '<tr>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$gender.'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[5].'</td>';
                echo '<td class="text-center">'.$row[6].'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td class="text-center"><a class="btn btn-primary btn-xs" onclick="studentDetail('.$row[0].')" href="#"><span class="glyphicon glyphicon-info-sign"></span> Student List</a>&nbsp<a class="btn btn-success btn-xs" onclick="edit('.$row[0].')" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp'.$button.'</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>
<?php 
require_once 'studentModal.php';
require_once 'editTrainer.php';
require_once 'newTrainer.php';
require_once '../footer.php';?>