<div class="modal" id="editProfileModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Profile</h4>
            </div>
            <div class="modal-body">

                <script>
                    function checkValue() {
                        var name = document.getElementById('name').value;
                        var gender = document.getElementById('gender').value;
                        if (name === null) {
                            return false;
                        }
                        if (gender === null) {
                            return false;
                        }
                    }
                </script>

                <form action="../../../Control/editProfile.php" method="post">
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" id="name" name="name" maxlength="255" pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="gender"></span> Gender</label><br/>
                        <label><input type="radio" id="gender" value="1" name="gender" />Male</label>&nbsp;&nbsp;
                        <label><input type="radio" id="gender" value="2" name="gender"/>Female</label>
                    </div> 
                    <button type="submit" name="update" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
