<div class="modal" id="editProfileModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <?php  
                    $query = $con->prepare("SELECT * FROM management WHERE id =?");
                    $query->bind_param('i',$myId);
                    if(!$query->execute()) echo $query->error;
                    $result = $query->get_result()->fetch_assoc();
                ?>
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" value="<?php echo$result['name']; ?>" name="name" maxlength="255" pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="gender"></span> Gender</label><br/>
                        <label><input type="radio" value="0"<?php if($result['gender']==0) echo'checked'; ?> name="gender" required/>Male</label>&nbsp;&nbsp;
                        <label><input type="radio" value="1"<?php if($result['gender']==1) echo'checked'; ?> name="gender"/>Female</label>
                    </div> 
                    <button type="submit" name="update" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["update"])) {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $query = $con->prepare("UPDATE management SET name =? , gender =? WHERE id =?");
        $query->bind_param('sii',$name,$gender,$myId);
        if(!$query->execute()) echo $query->error;
        echo "<script type='text/javascript'>alert('Updated Successful');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>