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
        require_once './header.php';

        $description = $_SESSION['activityPlanDescription'];
        ?>
        <p>
            <b>Trainer - Edit Activity Plan Name </b>
        </p><br/>
        <form method="post" action="../../../Control/Trainer/editActivityPlan.php">
            <table class="table table-bordered table-striped" align="center">
                <tr>
                    <th>Provide Name of new Activity Plan</th>
                    <td><input placeholder="Enter your Activity Plan Name" required class="form-control" type="text" name="activityPlanName" value="<?php echo $description ?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-xs btn-success" value="Edit" />&nbsp;&nbsp;
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
