<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register New Activity Plan</title>
    </head>
    <body>
        <?php
        require_once './header.php';
        ?>
        <p>
            <b>Trainer - New Activity Plan </b>
        </p><br/>
        <form method="post" action="../../../Control/Trainer/newActivityPlan.php">
            <table class="table table-bordered table-striped" align="center">
                <tr>
                    <th>Provide Name of new Activity Plan</th>
                    <td><input placeholder="Enter your Activity Plan Name" required class="form-control" type="text" name="activityPlanName" value="" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-xs btn-success" value="Create" />&nbsp;&nbsp;
                        <input type="reset" class="btn btn-xs btn-danger" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
