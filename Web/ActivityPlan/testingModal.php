<div class="modal" id="1Modal" role="dialog">
    <div class="modal-dialog" style="width:80%; height:100%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">New Activity Plan</h3>
            </div>
            <div class="modal-body">
                <from>
                    <div class="form-group">
                        <label for="planName">Activity Plan Name</label>
                        <input type="text" maxlength="255" class="form-control" placeholder="Enter activity plan name" required/>
                    </div>
                    <table id="myTable2">
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
                            <?php
                                $query = $con->prepare("SELECT * FROM Activity ORDER BY name");
                                if(!$query->execute()) echo $query->error;
                                $result = $query->get_result();
                                while($row = $result->fetch_Array()) {
                                    echo'<tr data-toggle="tooltip" title="'.$row[2].'">';
                                    echo '<td><input value="'.$row[0].'" type="checkbox"/></td>';
                                    if($row[5]!='') {
                                    echo '<td> <img width="80px" src="data:image/gif;base64,'.$row[5].'" /></td>';
                                    }
                                    else{
                                        echo '<td> <img width="80px" src="../image/logo-small.png" /></td>';
                                    }
                                    echo '<td>'.$row[1].'</td>';
                                    echo '<td id="newCal">'.$row[3].'</td>';
                                    echo '<td><input type="number" id="newTime" min="1" required class="form-control" disabled/></td>';
                                    echo '<td id="newSubCal">0</td>';
                                    echo '</tr>';
                                }
                                
                                echo'</tbody>';
                                echo '<tfoot>';
                                echo '<tr>
                                        <td colspan="5"><h4>Total Calories burn(Cal)</h4></td>
                                        <td id="newTotalCal">0</td>
                                    </tr>';
                                echo'</tfoot>'; 
                            ?>
                        
                    </table>
                </from>
            </div>
        </div>
    </div>
</div>