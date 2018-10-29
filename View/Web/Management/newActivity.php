<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Activity Registration</title>
    </head>
    <body>
        <?php
        require_once '../../../Model/Management.php';
        require_once 'header.php';
        ?>
        <p>
            <b><a href="../../../Control/activityList.php">Activity List </a> - New Activity Registration </b>
        </p><br/>
        <div>
            <form action="../../../Control/newActivity.php" method="post" enctype="multipart/form-data">
                <table class="table table-bordered table-striped" align="center">
                    <tr>
                        <th>Select New Photo</th>
                        <td>  <input type="file" name="fileToUpload" id="" class="form-control" accept="image/*"></td>
                    </tr>
                    <tr>
                        <th>Activity Name</th>
                        <td> <input type="text" name="name" maxlength="255" class="form-control" placeholder="Enter activity name" required/></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td> <textarea name="desc"  cols="40" rows="3" maxlength="255" class="form-control" placeholder="Enter description" required/></textarea ></td>
                    </tr>
                    <tr>
                        <th>Calories burn per minutes</th>
                        <td> <input type="number" name="calories" min="1" class="form-control" placeholder="Enter calories" required/></td>
                    </tr>
                    <tr>
                        <th>Recommended time(minutes)</th>
                        <td>  <input type="number" name="recommendTime" min="1" class="form-control" placeholder="Enter minutes" required/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>                         <input type="submit" value="Add"class="btn btn-primary btn-xs" />
                            <input type="reset" value="Reset"  class="btn btn-xs btn-danger delete"/></td>
                    </tr>
                </table>

            </form>
        </div>


        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
