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
                <?php  
                    $query = $con->prepare("SELECT password FROM trainer WHERE id =?");
                    $query->bind_param('i',$myId);
                    if(!$query->execute()) echo $query->error;
                    $result = $query->get_result()->fetch_assoc();
                ?>
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group">
                        <label for="name"> Current Password</label>
                        <input type="password"  name="password" maxlength="20" minlength="6" pattern="<?php echo$result['password']?>" title="Current Password not match" class="form-control" required/>
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
<?php
    if(isset($_POST["changePass"])) {
        $pass = $_POST['newPassword'];
        $query = $con->prepare("UPDATE trainer SET password =? WHERE id =?");
        $query->bind_param('si',$pass,$myId);
        if(!$query->execute()) echo $query->error;
        echo "<script type='text/javascript'>alert('Updated Successful');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>