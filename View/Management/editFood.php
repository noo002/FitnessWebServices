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
        $foodDetail = $_SESSION['foodDetail'];
        ?>
        <script>
            document.getElementById('pathLocation').innerHTML = "Food List";


            var dashboard = document.getElementById('dashboard');
            var trainerList = document.getElementById('trainerList');
            var traineeList = document.getElementById('traineeList');
            var userList = document.getElementById('userList');
            var foodList = document.getElementById('foodList');
            var activityList = document.getElementById('activityList');


            dashboard.classList.remove('active');
            traineeList.classList.remove('active');
            userList.classList.remove('active');
            trainerList.classList.remove('active');
            activityList.classList.remove('active');


            foodList.classList.add('active');
        </script>

        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Food List - update food</h4>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="POST" action="../../Control/Management/editFood.php">
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
                                            <td><b>Unit of Measurement</b></td>
                                            <td><input class="form-control" placeholder="Enter unit Of Measurement" type="number" name="unitOfMeasurement" value="<?php echo $foodDetail->unitOfMeasurement ?>" /></td>
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
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php
        require_once 'footer.php';
        ?>

