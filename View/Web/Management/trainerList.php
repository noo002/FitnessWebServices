<?php
require_once '../../../Model/trainer.php';
require_once 'header.php';
?>
<script src="../js/trainerAdmin.js" type="text/javascript"></script>

<p style='text-align: center'>
    <button   onclick="newTrainer()" class='btn btn-success'><span class="glyphicon glyphicon-plus"></span>Insert New Trainer</button>
</p>
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
    $trainerList = $_SESSION['trainerList'];
    foreach ($trainerList as $row => $key) {
        echo "<tr>";
        echo "<td>$key->name</td>";
        if ($key->gender == 1) {
            echo "<td>Male</td>";
        } else {
            echo "<td>Female</td>";
        }

        echo "<td>$key->email</td>";
        echo "<td>$key->certificate</td>";
        echo "<td>$key->experience</td>";
        if ($key->status == 1) {
            echo "<td>Active</td>";
        } else {
            echo "<td>Inactive</td>";
        }
        echo '<td class="text-center"><a class="btn btn-primary btn-xs" href="#"><span class="glyphicon glyphicon-info-sign"></span> Student List</a>&nbsp<a class="btn btn-success btn-xs"  href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp' . ''
        . '<a class="btn btn-danger btn-xs" href="#"><span class="glyphicon glyphicon-remove"></span> Inactive</a></td>';
        echo "</tr>";
    }
    ?>
</tbody>
</table>
    <?php
    require_once 'studentModal.php';
    require_once 'editTrainer.php';
    require_once 'newTrainer.php';
    require_once '../footer.php';
    