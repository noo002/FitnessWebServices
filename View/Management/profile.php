<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainer List</title>
    </head>
    <?php
    require_once 'header.php';
    ?>
    <script>
        document.getElementById('pathLocation').innerHTML = "Profile";

        var dashboard = document.getElementById('dashboard');
        var trainerList = document.getElementById('trainerList');
        var traineeList = document.getElementById('traineeList');
        var userList = document.getElementById('userList');
        var foodList = document.getElementById('foodList');
        var activityList = document.getElementById('activityList');


        dashboard.classList.remove('active');
        traineeList.classList.remove('active');
        userList.classList.remove('active');
        foodList.classList.remove('active');
        activityList.classList.remove('active');



    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="header">
                            <p class="category" style="color:black">
                                <b>Profile</b> 
                            </p>
                        </div>
                        <div class="content">
                            <div>

                                <script>
                                    function checkValue() {
                                        var name = document.getElementById('name').value;
                                        var gender = document.getElementById('gender').value;
                                        if (name === null) {
                                            return false;
                                        }
                                        if (gender === null) {
                                            return false;
                                        }
                                    }
                                </script>

                                <form action="../../Control/Management/editProfile.php" method="post">
                                    <div class="form-group">
                                        <label for="name" style="color:black"> Name</label>
                                        <input value="<?php echo $_SESSION['managementDetail']->name ?>" type="text" id="name" name="name" maxlength="255" pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" style="color:black"> Gender</label><br/>
<!--                                        <label><input type="radio" id="male" value="1" name="gender" />Male</label>&nbsp;&nbsp;
                                        <label><input type="radio" id="female" value="2" name="gender"/>Female</label>-->
                                        <?php
                                        $maleChecked = '<label style="color:black"><input type="radio" id="male" value="1" name="gender" checked/> Male</label>';
                                        $femaleChecked = '<label style="color:black"><input type="radio" id="female" value="2" name="gender" checked/> Female</label>';
                                        if ($_SESSION['managementDetail']->gender == 1) {
                                            echo $maleChecked, " &nbsp;&nbsp;";
                                            echo '<label style="color:black"><input type="radio" id="female" value="2" name="gender" /> Female</label>';
                                        } else {
                                            echo '<label style="color:black"><input type="radio" id="male" value="1" name="gender" checked /> Male</label>&nbsp;&nbsp;';
                                            echo $femaleChecked;
                                        }
                                        ?>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php
    require_once './footer.php';
    ?>
