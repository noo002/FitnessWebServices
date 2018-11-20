<?php
require_once '../../../Model/food.php';


require_once 'header.php';
?>


<script>
    $(document).ready(function () {
        $("#foodTable").dataTable();
    });
</script>


<p>
    <b>Trainer - Food List </b>

</p><br/>

<form method="post" action="../../../Control/Trainer/actionFood.php">
    <table id="foodTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Calories(Cal)</th>
                <th>Fat(g)</th>
                <th>Protein(g)</th>
                <th>Carbohydrate(g)</th>
                <th>Bar code</th>


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


                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
</form>
<?php
//require_once 'editFood.php';
//require_once 'newFood.php';
require_once '../footer.php';
