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
            document.getElementById('pathLocation').innerHTML = "User List";
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


            userList.classList.add('active');
        </script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">User List - Register User</h4>

                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="post" action="../../Control/Management/newManagement.php">
                                    <table class="table table-bordered table-striped" align="center">
                                        <thead>
                                            <tr>
                                                <th colspan="2" style="text-align: center;color:black">New User Registration</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td><b>Name : </b></td>
                                            <td>
                                                <input type="text" name="name" value="" maxlength="100" placeholder="Enter Name" required 
                                                       pattern="[A-Za-z ]{10,255}" title="Not allow special symbol & number minimum 10 letter"class="form-control"
                                                       />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><B>Gender  :</B> </td>
                                            <td>
                                                <input type="radio" title="Please specify your gender" required id="male" name="gender" value="1" /><label for="male" title="Please specify your gender" style="color:black">&nbsp;Male</label>
                                                <input type="radio" title="Please specify your gender" id="female" name="gender" value="2" /><label for="female" title="Please specify your gender" style='color:black'>&nbsp;Female</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email :</b></td>
                                            <td>
                                                <input type="email" name="email" value="" required class="form-control" placeholder="Enter Email" maxlength="100"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Address :</b></td>
                                            <td><input type="text" name="address" value="" maxlength="200" placeholder="Enter your address" required class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="submit" value="Submit"class="btn btn-primary btn-xs" />
                                                <input type="reset" value="Reset"  class="btn btn-xs btn-danger delete"/>
                                            </td>
                                        </tr>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2"class="alert alert-info">
                                                    <strong>
                                                        <ul>
                                                            <li>Password will be send to you thought registered email.</li>
                                                            <li>Email cannot be changed after registration</li>
                                                        </ul>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tfoot>
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
    </body>
</html>
