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
                                <h4 class="title">Food List - new food</h4>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="POST" action="../../Control/Management/newFood.php">
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
                                            <td> <input type="number"  name="measurement" min="1" max="2"  maxlength="2" class="form-control" placeholder="Enter food measurement code" required/></td>
                                        </tr>
                                        <tr>
                                            <th>Unit of measurement</th>
                                            <td> <input type="number"  name="unitOfMeasurement"  maxlength="255" class="form-control" placeholder="Enter food unit of measurement" required/></td>
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
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php
        require_once 'footer.php';
        ?>

