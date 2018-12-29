<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password </title>
    </head>
    <?php
    require_once 'header.php';
    ?>

    <script>
        document.getElementById('pathLocation').innerHTML = "Change Password";

        var dashboard = document.getElementById('dashboard');
        var traineeList = document.getElementById('traineeList');
        var activityPlan = document.getElementById('activityPlan');
        var goalList = document.getElementById('goalList');


        dashboard.classList.remove('active');
        traineeList.classList.remove('active');
        traineeList.classList.remove('active');
        goalList.classList.remove('active');

    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="header">
                            <p class="category" style="color:black">
                                <b>Change Password</b> 
                            </p>
                        </div>
                        <div class="content">
                            <form action="../../Control/Trainer/changePassword.php" onsubmit="return checkNewPassword()"  method="post">
                                <div class="form-group">
                                    <label for="name"> Current Password</label>
                                    <input type="password"  name="password" maxlength="20" minlength="6"  class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label for="name"> New Password</label>
                                    <input type="password" name="newPassword" maxlength="20" minlength="6"   class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Confirm password</label>
                                    <input type="password"name="confirmPassword" maxlength="20" minlength="6"  class="form-control" required/>
                                </div>
                                <button type="submit" name="changePass" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php
    require_once './footer.php';

    