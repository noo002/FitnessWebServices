<div class="modal" id="editProfileModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Profile</h4>
            </div>
            <div class="modal-body">
               
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" value="" name="name" maxlength="255" pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="gender"></span> Gender</label><br/>
                        <label><input type="radio" value="0" name="gender" required/>Male</label>&nbsp;&nbsp;
                        <label><input type="radio" value="1" name="gender"/>Female</label>
                    </div> 
                    <div class="form-group">
                        <label for="cert"> Certificate</label>
                        <input type="text" value="" name="cert" maxlength="255" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="cert"> Year of experience</label>
                        <input type="number" min="0" value="" name="year" class="form-control" required/>
                    </div>
                    <button type="submit" name="update" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
