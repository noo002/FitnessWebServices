<div class="modal" id="editActivityModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Activity</h4>
            </div>       
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="editNo" id="editNo" />
                    <input type="hidden" name="editIsImage" id="editIsImage" />
                    <div class="form-group">
                        <img id="editImage" name="editImage" src="../image/logo-small.png" width="80px" height="80px"/>
                        <br/>
                        <br/>
                        <input type="file" class="form-control" onchange="editURL(this)" accept="image/*" />

                    </div>
                    <div class="form-group">
                        <label for="name">Activity Name</label>
                        <input type="text" id="editName" name="editName" maxlength="255" class="form-control" placeholder="Enter activity name" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea name="editDesc" id="editDesc" cols="40" rows="3" maxlength="255" class="form-control" placeholder="Enter description" required/></textarea >
                    </div>
                    <div class="form-group">
                        <label for="name">Calories burn per minutes</label>
                        <input type="number" name="editCal" id="editCal" min="1" class="form-control" placeholder="Enter calories" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Recommended time(minutes)</label>
                        <input type="number" name="editMin" id="editMin" min="1" class="form-control" placeholder="Enter minutes" required/>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" name="editActivity" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div> 
    </div>
</div>
<?php
    

