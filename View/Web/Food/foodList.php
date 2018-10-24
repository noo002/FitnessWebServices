<script src="../js/food.js" type="text/javascript"></script>


<p>
    <b>Fitness Companion - Food List </b>
    <button style="float:right" onclick="newFood()" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp; Insert New Food</button>
</p><br/>


<table id="foodTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Calories(Cal)</th>
            <th>Fat(g)</th>
            <th>Protein(g)</th>
            <th>Carbohydrate(g)</th>
            <th>Bar code</th>
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
            echo '<td><a class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp;';
            echo '<a class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php
require_once 'editFood.php';
require_once 'newFood.php';
require_once '../footer.php';

