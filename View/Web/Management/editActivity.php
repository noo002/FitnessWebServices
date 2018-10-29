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
        require_once '../../../Model/Management.php';
        require_once '../../../Model/activity.php';
        require_once 'header.php';
        $activityDetail = $_SESSION['activityDetail'];
        ?>
        <p>
            <b><a href="../../../Control/activityList.php">Activity List</a> - Edit Activity </b>

        </p>
        <br/>
        <form method="post" action="../../../Control/editActivity.php" enctype="multipart/form-data">
            <table class="table table-bordered table-striped" align="center">
                <tr>
                    <td>
                        <?php
                        if ($activityDetail->image == null) {
                            echo "<img src='../../../noimage.png' width='60px' height='60px'/>";
                        } else {
                            // echo '<img src="data:image/jpeg;base64,'.base64_encode( $key['image'] ).'"/>';
                            echo '<img src="data:image/jpeg;base64,' . $activityDetail->image . '" width="60px" height="60px"/>';
                        }
                        ?>
                    </td>
                    <td>
                        <input type="file" accept="image/*" class="form-control" name="image" value="" />
                        <input type="hidden" name="activityId" value="<?php echo $activityDetail->activityId ?>";
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" required class="form-control" placeholder="Enter activity name" name="name" value="<?php echo $activityDetail->name ?>" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <input type="text" required  placeholder="Enter Description"  class="form-control" name="description" value="<?php echo $activityDetail->description ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Calories burn per minutes</th>
                    <td><input type="number" min="1" required placeholder="Enter callories burn per minutes" class="form-control" name="calories" value="<?php echo $activityDetail->caloriesBurnPerMin ?>" /></td>
                </tr>
                <tr>
                    <th>Recommend Duration (minutes) </th>
                    <td><input type="number" min="1" required placeholder="Enter Recommend time in minutes" class="form-control" name="time" value="<?php echo $activityDetail->suggestedDuration ?>" /></td>
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

        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
