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
            $(document).ready(function () {
                $("#user_data").DataTable({
                });
            });
            function newGoal() {
                $("#newGoal").modal();
            }
            function edit() {
                $("#editGoal").modal();
            }
        </script>

        <div id="content" style="width:100%;">
            <div class="container box">

                <p style='text-align: center'><button onclick="newGoal()" class='btn btn-success'><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp; Add New Goal </button></p>

                <div class="modal" id="newGoal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">New Goal</h4>
                            </div>       
                            <div class="modal-body">
                                <form action="" method="post">

                                    <div class="form-group">
                                        <label for="name">New Goal Name</label>
                                        <input type="text" name="newGoalName" maxlength="255" class="form-control" placeholder="Enter Goal name" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Food Intake (Calories In Day)</label>
                                        <input type='number' name="foodIntake"  maxlength="255" class="form-control" placeholder="Enter Food Intake (Calories per Day)" required/></textarea >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Activity Duration (Minutes per Day)</label>
                                        <input type="number" name="newMin"class="form-control" placeholder="Enter minutes" required/>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>


                <table id="user_data" class="display table">
                    <thead>
                        <tr>
                            <th>Goal Name</th>
                            <th>Food Intake (Calories per Day) </th>
                            <th>Activity Duration (Minutes per Day)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    ?>
                    <tr>
                        <td>Body Weight Management</td>
                        <td>3000</td>
                        <td>5</td>
                        <td>
                            <button name='action' onclick="edit()" class='btn btn-primary btn-xs'>Edit</button>
                            <button name='action' onclick="confirm('are you sure you want to delete body weight management?')" class='btn btn-danger btn-xs delete'>delete</button>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="modal" id="editGoal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modify Goal</h4>
                        </div>       
                        <div class="modal-body">
                            <form action="" method="post">

                                <div class="form-group">
                                    <label for="name"> Goal Name</label>
                                    <input type="text" name="newGoalName" maxlength="255" class="form-control" placeholder="Enter Goal name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="name">Food Intake (Calories In Day)</label>
                                    <input type='number' name="foodIntake"  maxlength="255" class="form-control" placeholder="Enter Food Intake (Calories per Day)" required/></textarea >
                                </div>
                                <div class="form-group">
                                    <label for="name">Activity Duration (Minutes per Day)</label>
                                    <input type="number" name="newMin"class="form-control" placeholder="Enter minutes" required/>
                                </div>
                                <div class="form-group">
                                </div>
                                <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Edit</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </body>
    <?php
    require_once '../footer.php';
    ?>
</html>
