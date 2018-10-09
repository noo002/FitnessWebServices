

<div class="modal" id="newTrainerModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Trainer</h4>
            </div>
            <div class="modal-body">
                <form action="../../../Control/newTrainer.php" method="post">
                    <div class="form-group">
                        <label for="name"></span> Name</label>
                        <input type="text" maxlength="255" class="form-control" name="name" placeholder="Enter name" required pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number"/>
                    </div>
                    <div class="form-group">
                        <label for="gender"></span> Gender</label><br/>
                        <label><input type="radio" value="1" name="gender" required/>Male</label>&nbsp;&nbsp;
                        <label><input type="radio" value="2" name="gender"/>Female</label>
                    </div> 
                    <div class="form-group">
                        <label for="email"></span> Email</label>
                        <input type="email" maxlength="255" id="email" name="email" class="form-control" oninvalid="checkEmail(this);" oninput="checkEmail(this);" placeholder="Enter email" required />
                    </div>
                    <div class="form-group">
                        <label for="cert"></span> Certificate</label>
                        <input type="text" maxlength="255" class="form-control" name="cert" placeholder="Enter certificate" />
                    </div>
                    <div class="form-group">
                        <label for="year"></span> Address</label>
                        <input type="text" min="0" maxlength="255" class="form-control" name="address" placeholder="Enter year" required  title="Not allow negative number"/>
                    </div>
                    <div class="form-group">
                        <label for="year"></span> Birthdate (example : 2016-6-6)</label>
                        <input type="text" min="0" maxlength="255" class="form-control" name="birthdate" placeholder="Enter year" required  title="Not allow negative number"/>
                    </div>
                    <div class="form-group">
                        <label for="year"></span> Year of experience</label>
                        <input type="number" min="0" maxlength="255" class="form-control" name="year" placeholder="Enter year" required  title="Not allow negative number"/>
                    </div>
                    <div class="alert alert-info">
                        <strong>
                            <ul>
                                <li>Password will send through the email.</li>
                                <li>Email cannot change after insert.</li>
                            </ul>
                        </strong>
                    </div>
                    <button type="submit" name="new" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </form>
            </div>
        </div>
    </div>
</div>