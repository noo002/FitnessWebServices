<div class="modal" id="managementModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Management Login</h4>
    </div>
    <div class="modal-body">
        <form onsubmit="return managmentLogin()">
           <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                <input type="email" maxlength="255" class="form-control" name="managementEmail" id="managementEmail" placeholder="Enter email" required/>
            </div>
            <div class="form-group">
                <label for="pass"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                <input type="password" maxlength="20" minlength="6" pattern="[a-zA-Z0-9-]+" title="No special symbol allow" class="form-control" name="managementPassword" id="managementPassword"  placeholder="Enter password" required/>
            </div>
        <button type="submit" id="managementLogin" name="managementLogin"  class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
    </form>
    </div>
      <div class="modal-footer">
          <p><a href="#" id="managementForget">Forgot Password?</a></p>
      </div>
  </div>

</div>
</div>