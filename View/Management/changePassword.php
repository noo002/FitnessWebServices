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
    <script>
        function checkNewPassword() {
            var currentPassword = document.getElementById('currentPassword');
            var newPassword = document.getElementById('newPassword').value;
            var confirmedPassword = document.getElementById('confirmPassword').value;
            if (newPassword !== confirmedPassword) {
                alert('new password and confirmed password are not same');
                currentPassword.value = "";
                var newPass = document.getElementById('newPassword');
                newPass.value = "";
                var confirmedPass = document.getElementById('confirmPassword');
                confirmedPass.value = "";
                return false;
            }
        }
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
                            <form action="../../Control/Management/changePassword.php" onsubmit="return checkNewPassword()"  method="post">
                                <div class="form-group">
                                    <label for="name" style="color:black"> Current Password</label>
                                    <input type="password" id="currentPassword"  autofocus name="currentPassword" maxlength="20" minlength="6"  class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label for="name" style="color:black"> New Password</label>
                                    <input type="password" id="newPassword" name="newPassword" maxlength="20" minlength="6"  class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label for="name" style="color:black"> Confirm password</label>
                                    <input type="password"  name="confirmPassword" id="confirmPassword" maxlength="20" minlength="6"  class="form-control" required/>
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

    