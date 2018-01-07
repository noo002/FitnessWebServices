<?php require_once 'header.php';?>
<script src="../js/management.js" type="text/javascript"></script>
<a href="#" onclick="newManagement()"><h3><span class="glyphicon glyphicon-plus"></span>Insert New Management</h3></a>

<table id="managementTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = $con->prepare("SELECT * FROM management  ORDER BY active DESC , name ASC");
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            while($row = $result->fetch_Array()) {
                $gender = 'Male';
                if($row[2]=='1') {
                    $gender = 'Female';
                }
                $button = '<a class="btn btn-danger btn-xs" onclick="inactive('.$row[0].')" href="#"><span class="glyphicon glyphicon-remove"></span> Inactive</a>';
                $status = 'Active';
                if($row[5]=='0') {
                    $status = 'Inactive';
                    $button ='<a class="btn btn-primary btn-xs" onclick="active('.$row[0].')" href="#"><span class="glyphicon glyphicon-ok"></span> Active  .</a>';
                }
                echo '<tr>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$gender.'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td class="text-center"><a class="btn btn-success btn-xs" onclick="editManagement('.$row[0].')" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp'.$button.'</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>
<?php 
    require_once 'editManagement.php';
    require_once 'newManagement.php';
    require_once '../footer.php';?>