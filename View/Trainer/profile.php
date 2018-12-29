
<?php
require_once 'header.php';
?>

<script>
    document.getElementById('pathLocation').innerHTML = "Profile";

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


            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Your Profile</h4>
                    </div>
                    <div class="content">
                        <form action="../../Control/Trainer/editProfile.php" method="post">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" value="<?php echo $_SESSION['trainerDetail']->name ?>" name="name" maxlength="255" pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="gender"></span> Gender</label><br/>
                                <?php
                                $male = '<label><input type="radio" checked  value="1" name="gender"/>Male</label>&nbsp;&nbsp;';
                                $Female = '<label><input type="radio" checked value="2" name="gender"/>Female</label>';
                                if ($_SESSION['trainerDetail']->gender == 1) {
                                    echo $male;
                                    ?>
                                    <label><input type="radio"  value="2" name="gender"/>Female</label>
                                    <?php
                                } else {
                                    ?>
                                    <label><input type="radio"  value="1" name="gender"/>Male</label>&nbsp;&nbsp;
                                    <?php
                                    echo $Female;
                                }
                                ?>
                            </div> 
                            <div class="form-group">
                                <label for="cert"> Certificate</label>
                                <input type="text" value="<?php echo $_SESSION['trainerDetail']->certificate ?>" name="cert" maxlength="255" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="cert"> Year of experience</label>
                                <input type="number" step="0.01" min="0.00" placeholder="0.00" value="<?php echo $_SESSION['trainerDetail']->experience ?>" name="year" class="form-control" required/>
                            </div>
                            <button type="submit" name="update" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>









<?php
require_once './footer.php';
