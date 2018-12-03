<?php
require_once'../../../Model/Management.php';
require_once 'header.php';
?>
<script src="../js/management.js" type="text/javascript"></script>
<p>
    <b>Fitness Companion - User List </b>
    <a href="newManagement.php"><button style="float:right" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Insert New User</button></a>

</p>
<br/>
<form method="post" action="../../../Control/activationManagement.php">
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
                if ($key->active == 1) {
                    echo "<td>Active</td>";
                    $inactive = "<td><button class='btn btn-danger btn-xs' name='activation' value='$key->managementId'><span class='glyphicon glyphicon-remove'></span>Inactive</button></td>";
                    echo $inactive;
                } else if ($key->active == 0) {
                    echo "<td>Inactive</td>";
                    $active = "<td><button class='btn btn-primary btn-xs' name='activation' value='$key->managementId'><span class='glyphicon glyphicon-ok'></span>Active</button></td>";
                    echo $active;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
<?php
require_once 'editManagement.php';
//require_once 'newManagement.php';
require_once '../footer.php';
