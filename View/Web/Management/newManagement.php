<div class="modal" id="newManagementModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Management</h4>
            </div>
            <div class="modal-body">
                <form action="../../../Control/newManagement.php" method="post">
                    <div class="form-group">
                        <label for="name"></span> Name</label>
                        <input type="text" maxlength="255" class="form-control" name="name" placeholder="Enter name" required pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number"/>
                    </div>
                    <div class="form-group">
                        <label for="gender"></span> Gender</label><br/>
                        <input type="radio" value="1" id="male" name="gender" /><label for="male">Male</label>&nbsp;&nbsp;
                        <input type="radio" value="2" id="female" name="gender"/><label for="female">Female</label>
                    </div> 
                    <div class="form-group">
                        <label for="email"></span> Email</label>
                        <input type="text" maxlength="255" id="email" name="email" class="form-control"  placeholder="Enter email" required />
                    </div>
                    <div class="form-group">
                        <label for="email"></span> Address</label>
                        <input type="text" maxlength="255" name="address" id="address" name="address" class="form-control" placeholder="Enter address" required />
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
