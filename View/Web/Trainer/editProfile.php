<div class="modal" id="editProfileModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Profile</h4>
            </div>
            <div class="modal-body">

                <form action="../../../Control/Trainer/editProfile.php" method="post">
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
