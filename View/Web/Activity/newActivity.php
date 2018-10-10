<div class="modal" id="newActivityModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Activity</h4>
            </div>       
            <div class="modal-body">
                <form action="../../../Control/newActivity.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="newIsImage" id="newIsImage" />
                    <div class="form-group">
                        <img id="newImage" name="newImage" src="../image/logo-small.png" width="80px" height="80px"/>
                        <br/>
                        <br/>
                    <!----    <input type="file" name="fileToUpload"  class="form-control"  accept="image/*" />--->
                        <input type="file" name="fileToUpload" id="" class="form-control" accept="image/*">

                    </div>
                    <div class="form-group">
                        <label for="name">Activity Name</label>
                        <input type="text" name="name" maxlength="255" class="form-control" placeholder="Enter activity name" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea name="desc"  cols="40" rows="3" maxlength="255" class="form-control" placeholder="Enter description" required/></textarea >
                    </div>
                    <div class="form-group">
                        <label for="name">Calories burn per minutes</label>
                        <input type="number" name="calories" min="1" class="form-control" placeholder="Enter calories" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Recommended time(minutes)</label>
                        <input type="number" name="recommendTime" min="1" class="form-control" placeholder="Enter minutes" required/>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" name="newActivity" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </form>
            </div>
        </div> 
    </div>
</div>
