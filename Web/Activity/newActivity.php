<div class="modal" id="newActivityModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Activity</h4>
            </div>       
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" name="newIsImage" id="newIsImage" />
                    <div class="form-group">
                        <img id="newImage" name="newImage" src="../image/logo-small.png" width="80px" height="80px"/>
                        <br/>
                        <br/>
                        <input type="file" class="form-control" onchange="readURL(this)" accept="image/*" />

                    </div>
                    <div class="form-group">
                        <label for="name">Activity Name</label>
                        <input type="text" name="newName" maxlength="255" class="form-control" placeholder="Enter activity name" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea name="newDesc"  cols="40" rows="3" maxlength="255" class="form-control" placeholder="Enter description" required/></textarea >
                    </div>
                    <div class="form-group">
                        <label for="name">Calories burn per minutes</label>
                        <input type="number" name="newCal" min="1" class="form-control" placeholder="Enter calories" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Recommended time(minutes)</label>
                        <input type="number" name="newMin" min="1" class="form-control" placeholder="Enter minutes" required/>
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" name="newActivity" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </form>
            </div>
        </div> 
    </div>
</div>
<?php 
    if(isset($_POST['newActivity'])){
        $name = $_POST['newName'];
        $desc = $_POST['newDesc'];
        $cal = $_POST['newCal'];
        $min = $_POST['newMin'];
        $isImage = $_POST['newIsImage'];
        $image ='';
        if($isImage!=null) {
            $image = $isImage;
        }
        $query = $con->prepare("INSERT INTO activity(name,description,calories,suggest_time,image) VALUES(?,?,?,?,?)");
        $query->bind_param('ssiis',$name,$desc,$cal,$min,$image);
        if(!$query->execute()) echo $query->error;
        
        echo "<script type='text/javascript'>alert('New Activity Added');</script>";
        echo '<meta http-equiv="refresh" content="0">';
    }
?>