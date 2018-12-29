<title>New Activity Plan</title>

<?php
require_once 'header.php';
?>
<script>
    document.getElementById('pathLocation').innerHTML = "New Activity Plan";

    var dashboard = document.getElementById('dashboard');
    var traineeList = document.getElementById('traineeList');
    var activityPlan = document.getElementById('activityPlan');
    var goalList = document.getElementById('goalList');


    dashboard.classList.remove('active');
    traineeList.classList.remove('active');
    traineeList.classList.remove('active');
    goalList.classList.remove('active');


    activityPlan.classList.add('active');
</script>

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-14">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Activity Plan List - New Activity Plan</h4>

                    </div>
                    <div class="content table-responsive table-full-width">
                        <form method="POST" action="../../Control/Trainer/newActivityPlan.php">
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
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?php
require_once 'footer.php';


