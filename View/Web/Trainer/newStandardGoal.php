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
            <b><a href="../../../Control/Trainer/goalList.php">Standard Goal List </a> - New Standard Goal Registration </b>
        </p><br/>
        <div>
            <form method="post" action="../../../Control/Trainer/newStandardGoal.php">
                <table class="table table-bordered table-striped" align="center">
                    <tr>
                        <th>Goal Name</th>
                        <td><input class="form-control" type="text" name="goalName" value=""  /></td>
                    </tr>
                    <tr>
                        <th>Food Intake (Calories per day)</th>
                        <td><input class="form-control" type="number" name="foodIntake" value="" /></td>
                    </tr>
                    <tr>
                        <th>Activity Duration(Minutes per day)</th>
                        <td><input class="form-control" type="number" name="activityDuration" value=""  /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Submit"class="btn btn-primary btn-xs" />&nbsp;
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
