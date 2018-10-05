
<div class="modal" id="passwordModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
                <script>
                    function checkPass(textbox) {
                        var pass = document.getElementById("password").value;
                        if(textbox.value !=pass) {
                            textbox.setCustomValidity('Password Must be Matching.');
                        }
                        else{
                            textbox.setCustomValidity('');
                        }
                    };
                </script>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="name"> Current Password</label>
                        <input type="password"  name="password" maxlength="20" minlength="6" pattern="" title="Current Password not match" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="name"> New Password</label>
                        <input type="password" name="newPassword" maxlength="20" minlength="6" pattern="[A-Za-z1-9]{3,255}" title="Not allow special symbol & number" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="name"> Confirm password</label>
                        <input type="password" oninvalid="checkPass(this);" oninput="checkPass(this);" maxlength="20" minlength="6" pattern="[A-Za-z1-9]{3,255}" title="Not allow special symbol & number" class="form-control" required/>
                    </div>
                    <button type="submit" name="changePass" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
