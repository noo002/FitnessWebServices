<script src="../js/food.js" type="text/javascript"></script>
<a href="#" onclick="newFood()"><h3><span class="glyphicon glyphicon-plus"></span>Insert New Food</h3></a>
<table id="foodTable">
    <thead>
        <tr>
            <th>Image</th>
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
            $query = $con->prepare("SELECT * FROM food ORDER BY name");
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            while($row = $result->fetch_Array()) {
                echo '<tr>';
                if($row[7]!=null) {
                    echo '<td> <img width="80px" src="data:image/gif;base64,'.$row[7].'" /></td>';
                }
                else{
                    echo '<td> <img width="80px" src="../image/logo-small.png" /></td>';
                }
                $barcode = '-';
                if($row[2]!=null) {
                    $barcode=$row[2];
                }
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td>'.$row[5].'</td>';
                echo '<td>'.$row[6].'</td>';
                echo '<td>'.$barcode.'</td>';
                echo '<td class="text-center">';

                echo '<a class="btn btn-primary btn-xs" onclick="editFood('.$row[0].')" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
                echo '&nbsp<a class="btn btn-danger btn-xs" onclick="deleteFood('.$row[0].')" href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>
<?php
    require_once 'editFood.php';
    require_once 'newFood.php';
    require_once '../footer.php'; 
?>

