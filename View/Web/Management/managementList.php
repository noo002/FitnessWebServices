<?php
require_once'../../../Model/Management.php';
require_once 'header.php';
?>
<script src="../js/management.js" type="text/javascript"></script>
<p style='text-align: center'>
    <button onclick="newManagement()" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Insert New Management</button>
</p>
<!-----<button   onclick="newTrainer()" class='btn btn-success'><span class="glyphicon glyphicon-plus"></span>Insert New Trainer</button>---------->
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
        $management = $_SESSION['managementList'];

        foreach ($management as $row => $key) {
            echo "<tr>";
            echo "<td>$key->name</td>";
            echo "<td>$key->gender</td>";
            echo "<td>$key->email</td>";
            if($key->active == 1){
                echo "<td>Active</td>";
            }
            else if($key->active ==2){
                echo "<td>Inactive</td>";
            }
            echo '<td class="text-center"><a class="btn btn-success btn-xs""><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php
require_once 'editManagement.php';
require_once 'newManagement.php';
require_once '../footer.php';
