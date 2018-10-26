<script src="../js/food.js" type="text/javascript"></script>


<p>
    <b>Fitness Companion - Food List </b>
    <button style="float:right" onclick="newFood()" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp; Insert New Food</button>
</p><br/>

<form method="post" action="../../../Control/actionFood.php">
    <table id="foodTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Calories(Cal)</th>
                <th>Fat(g)</th>
                <th>Protein(g)</th>
                <th>Carbohydrate(g)</th>
                <th>Bar code</th>
                <th>Food Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $foodList = $_SESSION['foodList'];
            foreach ($foodList as $row => $key) {
                echo "<tr>";
                echo "<td>$key->name</td>";
                echo "<td>$key->calories</td>";
                echo "<td>$key->fat</td>";
                echo "<td>$key->protein</td>";
                echo "<td>$key->carbohydrate</td>";
                echo "<td>$key->barcode</td>";
                $edit = '<td><button value="' . $key->foodId . '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</button>&nbsp;';
                $Inactive = '<button value="' . $key->foodId . '"  name="status" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Inactive</button></td>';
                $active = '<button value="' . $key->foodId . '"  name="status" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"></span> Active</button></td>';
                if ($key->foodStatus == 1) {
                    echo "<td>Active</td>";
                    echo $edit;
                    echo $Inactive;
                    
                } else if ($key->foodStatus == 2) {
                    echo "<td>Inactive</td>";
                    echo $edit;
                    echo $active;
                } else {
                    echo "<td>Error occur</td>";
                }

                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
</form>
<?php
//require_once 'editFood.php';
require_once 'newFood.php';
require_once '../footer.php';

