
<div class="modal" id="passwordModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
                <script>
                    function checkNewPassword() {
                        var currentPassword = document.getElementById('currentPassword');
                        var newPassword = document.getElementById('newPassword').value;
                        var confirmedPassword = document.getElementById('confirmPassword').value;
                        if (newPassword !== confirmedPassword) {
                            alert('new password and confirmed password are not same');
                            currentPassword.value = "";
                            var newPass = document.getElementById('newPassword');
                            newPass.value = "";
                            var confirmedPass = document.getElementById('confirmPassword');
                            confirmedPass.value = "";
                            return false;
                        }
                    }
                </script>

                <form action="../../../Control/changePassword.php" onsubmit="return checkNewPassword()"  method="post">
                    <div class="form-group">
                        <label for="name"> Current Password</label>
                        <input type="password" id="currentPassword"  autofocus name="currentPassword" maxlength="20" minlength="6"  class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="name"> New Password</label>
                        <input type="password" id="newPassword" name="newPassword" maxlength="20" minlength="6"  class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="name"> Confirm password</label>
                        <input type="password"  name="confirmPassword" id="confirmPassword" maxlength="20" minlength="6"  class="form-control" required/>
                    </div>
                    <button type="submit" name="changePass" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
