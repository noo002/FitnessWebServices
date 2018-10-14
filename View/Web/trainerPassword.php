<div class="modal" id="trainerPasswordModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Management Password Recovery</h4>
            </div>
            <div class="modal-body">
                <form action="../../Control/Trainer/trainerPasswordRecovery.php" method="post">
                <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                <input type="email" maxlength="255" class="form-control" name="email" oninvalid="checkEmailT(this);" oninput="checkEmailT(this);" placeholder="Enter email" required/>
            </div>
            <button type="submit"  name="trainerForget"  class="btn btn-success btn-block"><span class="glyphicon glyphicon-refresh"></span> Recovery</button>
            </form>
            </div>
        </div>
    </div>
</div>