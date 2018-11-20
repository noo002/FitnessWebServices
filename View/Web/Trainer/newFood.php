<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'header.php';
        ?>
        <p>
            <b><a href="../../../Control/Trainer/foodList.php">Food List </a> - New Food Registration </b>
        </p><br/>
        <div>
            <form method="post" action="../../../Control/Trainer/newFood.php">
                <table class="table table-bordered table-striped" align="center">
                    <tr>
                        <th>Food Name</th>
                        <td><input type="text" autofocus name="foodName" id="foodName" maxlength="255" class="form-control" placeholder="Enter food name" required/></td>
                    </tr>
                    <tr>
                        <th>Calories(Cal)</th>
                        <td><input type="number" min="1" id="calories" name="calories" maxlength="255" class="form-control" placeholder="Enter food calories" required/></td>
                    </tr>
                    <tr>
                        <th>Fat(g)</th>
                        <td><input type="number"  min="1" name="fat" maxlength="255" class="form-control" placeholder="Enter food fat" required/></td>
                    </tr>
                    <tr>
                        <th>Protein(g)</th>
                        <td><input type="number" min="1" name="protein" maxlength="255" class="form-control" placeholder="Enter food protein" required/></td>
                    </tr>
                    <tr>
                        <th>Carbohydrate(g)</th>
                        <td><input type="number"  min="1" name="carbo"  maxlength="255" class="form-control" placeholder="Enter food carbohydrate" required/></td>
                    </tr>
                    <tr>
                        <th>Food Type</th>
                        <td>               
                            <select name="foodType" class="form-control">
                                <option>Rice</option>
                                <option>Chicken</option>
                                <option>Drink</option>
                                <option>Fish</option>
                                <option>Fruit</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Measurement (1 = g, 2 = ml)</th>
                        <td> <input type="number"  name="measurement"  maxlength="255" class="form-control" placeholder="Enter food measurement code" required/></td>
                    </tr>
                    <tr>
                        <th>Barcode</th>
                        <td> 
                            <input type="text" name="barcode" maxlength="255" class="form-control" placeholder="Enter food barcode"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Submit"class="btn btn-primary btn-xs" />
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
