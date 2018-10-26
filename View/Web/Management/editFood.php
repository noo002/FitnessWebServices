
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Food Detail</title>

    </head>
    <body>
        <?php
        require_once '../../../Model/Management.php';
        require_once '../../../Model/food.php';
        require_once 'header.php';

        $foodDetail = $_SESSION['foodDetail'];
        ?>

        <p>
            <b><a href="../../../Control/foodList.php">Food List </a> - Edit Food </b>
        </p><br/>
        <div>
            <form action="../../../Control/editFood.php" method="post">
                <table class="table table-bordered table-striped" align="center">
                    <tr>
                        <td><b>Food Name</b></td>
                        <td>
                            <input type="hidden" name="foodId" value=" <?php echo $foodDetail->foodId ?>  " />
                            <input type="text" name="foodName" required placeholder="Enter food name" class="form-control" value="<?php echo $foodDetail->name ?>" />
                        </td>
                    </tr>            
                    <tr>
                        <td><b>Calories(Cal)</b></td>
                        <td><input type="number" min="0"  class="form-control" required placeholder="Enter calcories" name="calories" value="<?php echo $foodDetail->calories ?>" /></td>
                    </tr>             
                    <tr>
                        <td><b>Fat(g)</b></td>
                        <td><input class="form-control" min="0"  required placeholder="Enter Fat in g" type="number" name="fat" value="<?php echo $foodDetail->fat ?>" /></td>
                    </tr>             
                    <tr>
                        <td><b>Protein(g)</b></td>
                        <td><input class="form-control" min="0"  type="number" name="protein" value="<?php echo $foodDetail->protein ?>" /></td>
                    </tr>            
                    <tr>
                        <td><b>Carbohydrate(g)</b></td>
                        <td><input class="form-control" min="0"  type="number" required placeholder="Enter Carbohydrate" name="carbo" value="<?php echo $foodDetail->carbohydrate ?>" /></td>
                    </tr>
                    <tr>
                        <td><b>Food Type</b></td>
                        <td>
                            <select name="type" class="form-control">

                                <?php
                                $array = array("Rice" => "Rice", "Chicken" => "Chicken", "Drink" => "Drink", "Fish" => "Fish", "Fruit" => "Fruit");
                                foreach ($array as $row) {
                                    if ($foodDetail->type == $row) {
                                        echo "<option selected>$row</option>";
                                    } else {
                                        echo "<option>$row</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Measurement</b></td>
                        <td>
                            <select name="measurement" class="form-control">
                                <?php
                                $measurement = array("1" => "g", "2" => "ml");
                                foreach ($measurement as $row => $key) {
                                    if ($foodDetail->meassurement == $row) {
                                        echo "<option selected>$key</option>";
                                    } else {
                                        echo "<option>$key</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Barcode</b></td>
                        <td><input class="form-control" placeholder="Enter barcode" type="number" name="barcode" value="<?php echo $foodDetail->barcode ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Submit"class="btn btn-primary btn-xs" />
                            &nbsp;&nbsp;

                            <input type="reset" value="Reset"  class="btn btn-xs btn-danger delete"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>


        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>