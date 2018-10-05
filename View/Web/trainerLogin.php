<div class="modal" id="trainerModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Trainer Login</h4>
    </div>
    <div class="modal-body">
        <form onsubmit="return trainerLogin()">
           <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                <input type="email" maxlength="255" class="form-control" name="trainerEmail" id="trainerEmail" placeholder="Enter email" required/>
            </div>
            <div class="form-group">
                <label for="pass"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                <input type="password" maxlength="20" minlength="6" pattern="[a-zA-Z0-9-]+" title="No special symbol allow" class="form-control" name="trainerPassword" id="trainerPassword" placeholder="Enter password" required/>
            </div>
        <button type="submit" id="loginTrainer" name="loginTrainer" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
    </form>
    </div>
      <div class="modal-footer">
          <p><a href="#" id="trainerForget">Forgot Password?</a></p>
      </div>
  </div>
</div>
</div>