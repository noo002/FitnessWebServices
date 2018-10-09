<div class="modal" id="newFoodModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Food</h4>
            </div>
            <div class="modal-body">
                <form action="../../../Control/newFood.php" method="post">
                    <input type="hidden" id="newImageSrc" name="newImageSrc" />

                    <div class="form-group">
                        <label for="foodName">Food Name</label>
                        <input type="text" autofocus name="foodName" id="foodName" maxlength="255" class="form-control" placeholder="Enter food name" required/>
                    </div>
                    <div class="form-group">
                        <label for="calories">Calories(Cal)</label>
                        <input type="number" min="1" id="calories" name="calories" maxlength="255" class="form-control" placeholder="Enter food calories" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Fat(g)</label>
                        <input type="number" step="0.01" min="0.1" name="fat" maxlength="255" class="form-control" placeholder="Enter food fat" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Protein(g)</label>
                        <input type="number" step="0.01" min="0.1" name="protein" maxlength="255" class="form-control" placeholder="Enter food protein" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Carbohydrate(g)</label>
                        <input type="number" step="0.01" min="0.1" name="carbo"  maxlength="255" class="form-control" placeholder="Enter food carbohydrate" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Food Type </label>
                        <input type="text" name="foodType"  maxlength="255" class="form-control" placeholder="Enter food type" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Measurement (1 = gram, 2 = cup) </label>
                        <input type="number"  name="measurement"  maxlength="255" class="form-control" placeholder="Enter food measurement" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Barcode</label>
                        <input type="text" name="barcode" maxlength="255" class="form-control" placeholder="Enter food barcode"/>
                    </div>
                    <button type="submit"  class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
