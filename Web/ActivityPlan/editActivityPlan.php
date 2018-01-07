<div class="modal" id="editPlanModal" role="dialog">
    <div class="modal-dialog" style="width:80%; height:100%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Edit Activity Plan</h3>
            </div>
            <div class="modal-body">
                <form onsubmit="return onEdit()">
                    <input type="hidden" id="editNo">
                    <div class="form-group">
                        <label for="planName">Activity Plan Name</label>
                        <input type="text" id="editName" maxlength="255" class="form-control" placeholder="Enter activity plan name" required/>
                    </div>
                    <table id="myTable3">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>Activity Name</th>
                                <th>Calories burn per minutes</th>
                                <th>Recommended time(minutes)</th>
                                <th>Total Calories burn(Cal)</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        
                    </table>
                    <table width="80%">
                            <tr>
                                <td colspan="5"><h4>Total Calories burn(Cal)</h4></td>
                                <td id="editGrandTotal">0</td>
                            </tr>
                    </table>
                    <br/>
                     <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
