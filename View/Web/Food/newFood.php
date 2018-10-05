<div class="modal" id="newFoodModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Food</h4>
            </div>
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" id="newImageSrc" name="newImageSrc" />
                    <div class="form-group">
                        <img id="newImage" name="newImage" src="../image/logo-small.png" width="80px" height="80px"/>
                        <br/>
                        <br/>
                        <input type="file" class="form-control" onchange="readURL(this)" accept="image/*" />
                        </div> 
                        
                    <div class="form-group">
                        <label for="name">Food Name</label>
                        <input type="text" name="newName" maxlength="255" class="form-control" placeholder="Enter food name" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Calories(Cal)</label>
                        <input type="number" min="1" name="newCal" maxlength="255" class="form-control" placeholder="Enter food calories" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Fat(g)</label>
                        <input type="number" step="0.01" min="0.1" name="newFat" maxlength="255" class="form-control" placeholder="Enter food fat" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Protein(g)</label>
                        <input type="number" step="0.01" min="0.1" name="newProtein" maxlength="255" class="form-control" placeholder="Enter food protein" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Carbohydrate(g)</label>
                        <input type="number" step="0.01" min="0.1" name="newCarboh"  maxlength="255" class="form-control" placeholder="Enter food carbohydrate" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Barcode</label>
                        <input type="text" name="newBarcode" maxlength="255" class="form-control" placeholder="Enter food barcode"/>
                    </div>
                    <button type="submit" name="newFood" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['newFood'])){
        $name = $_POST['newName'];
        $cal = $_POST['newCal'];
        $fat = $_POST['newFat'];
        $protein = $_POST['newProtein'];
        $carboh = $_POST['newCarboh'];
        $barcode = $_POST['newBarcode'];
        $image = $_POST['newImageSrc'];
        
        if($image == null) {
            $image='';
        }
        $query = $con->prepare("INSERT INTO food (name,calories,protein,fat,carbohydrate,barcode,image) VALUES(?,?,?,?,?,?,?)");
        $query->bind_param('sidddss',$name,$cal,$fat,$protein,$carboh,$barcode,$image);
        if(!$query->execute()) echo $query->error;
        
        echo "<script type='text/javascript'>alert('New Food Added');</script>";
        echo '<meta http-equiv="refresh" content="0">';
    }
?>