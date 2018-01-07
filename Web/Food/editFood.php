<div class="modal" id="editFoodModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Food</h4>
            </div>
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" id="editImageSrc" name="editImageSrc" />
                    <input type="hidden" id="editId" name="editId" />
                    <div class="form-group">
                        <img name="editImage" id="editImage" src="../image/logo-small.png" width="80px" height="80px"/>
                        <br/>
                        <br/>
                        <input type="file" class="form-control" onchange="readURL2(this)" accept="image/*" />
                        </div> 
                        
                    <div class="form-group">
                        <label for="name">Food Name</label>
                        <input type="text" name="editName" id="editName" maxlength="255" class="form-control" placeholder="Enter food name" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Calories(Cal)</label>
                        <input type="number" min="1" name="editCal" id="editCal" maxlength="255" class="form-control" placeholder="Enter food calories" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Fat(g)</label>
                        <input type="number" step="0.01" min="0.1" name="editFat" id="editFat" maxlength="255" class="form-control" placeholder="Enter food fat" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Protein(g)</label>
                        <input type="number" step="0.01" min="0.1" name="editProtein" id="editProtein" maxlength="255" class="form-control" placeholder="Enter food protein" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Carbohydrate(g)</label>
                        <input type="number" step="0.01" min="0.1" name="editCarboh" id="editCarboh"  maxlength="255" class="form-control" placeholder="Enter food carbohydrate" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Barcode</label>
                        <input type="text" name="editBarcode" id="editBarcode"  maxlength="255" class="form-control" placeholder="Enter food barcode"/>
                    </div>
                    <button type="submit" name="editFood" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["editFood"])) {
        require_once '../../Connection.php'; 
        $name = $_POST['editName'];
        $cal = $_POST['editCal'];
        $fat = $_POST['editFat'];
        $protein = $_POST['editProtein'];
        $carboh = $_POST['editCarboh'];
        $barcode = $_POST['editBarcode'];
        $image = $_POST['editImageSrc'];
        $no = $_POST['editId'];
        if($image == null) {
            $image='';
        }
        $query = $con->prepare('UPDATE food SET name =? , barcode =? , calories=? , protein =? ,fat =? , carbohydrate =? ,image=? WHERE no =?');
        $query->bind_param('ssidddsi',$name,$barcode,$cal,$protein,$fat,$carboh,$image,$no);
        if(!$query->execute()) echo "<script type='text/javascript'>alert('$query->error');</script>";
        else{
            echo "<script type='text/javascript'>alert('Update Successful');</script>";
            echo '<meta http-equiv="refresh" content="0">';
        }
        $con->close();
        
    }
?>