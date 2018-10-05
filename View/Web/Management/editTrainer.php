<div class="modal" id="editTrainerModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Trainer</h4>
            </div>
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" id="editId" name="editId"/>
                    <div class="form-group">
                        <label for="name"></span> Name</label>
                        <input type="text" maxlength="255" class="form-control" id="editName" name="editName" placeholder="Enter name" required pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number"/>
                    </div>
                    <div class="form-group">
                        <label for="gender"></span> Gender</label><br/>
                        <label><input type="radio" id="editMale" value="0" name="editGender" required/>Male</label>&nbsp;&nbsp;
                        <label><input type="radio" id="editFemale" value="1" name="editGender"/>Female</label>
                    </div> 
                    <div class="form-group">
                        <label for="name"></span> Certificate</label>
                        <input type="text" maxlength="255" class="form-control" id="editCert" name="editCert" placeholder="Enter certificate" required/>
                    </div>
                    <div class="form-group">
                        <label for="name"></span> Year of experience</label>
                        <input type="text" maxlength="255" class="form-control" id="editYear" name="editYear" placeholder="Enter year" required/>
                    </div>
                    <button type="submit" name="edit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["edit"])) {
        $id = $_POST["editId"];
        $name = $_POST["editName"];
        $gender = $_POST["editGender"];
        $cert = $_POST["editCert"];
        $year = $_POST["editYear"];
        
        $query = $con->prepare("UPDATE trainer SET name = ? , gender =? , certificate= ? , experience=? WHERE id =?");
        $query->bind_param('sisii',$name,$gender,$cert,$year,$id);
        if(!$query->execute()) echo $query->error;
        echo "<script type='text/javascript'>alert('Updated Successful');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
        $con->close();
    }
?>