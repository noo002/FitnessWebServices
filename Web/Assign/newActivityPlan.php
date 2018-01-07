<div class="modal" id="newModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" >Assigning Activity Plan</h3>
            </div>
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" name="newId" id="newId" />
                    <div class="form-group">
                        <label for="plan">Activity Plan Name</label>
                        <select class="form-control" name="select" id="select"> 
                        </select>
                    </div>
                    <input type="hidden" id="newId" />
                    <div class="form-group">
                        <label for="start">Start Date</label>
                       <input type="date" name="start" min="<?php echo date('Y-m-d');?>" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="end">End Date</label>
                        <input type="date" name="end" min="<?php echo date('Y-m-d');?>" class="form-control" required/>
                    </div>
                    <button type="submit" name="newActivity" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Assign</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['newActivity'])){
        
        $start = $_POST['start'];
        $end = $_POST['end'];
        $selectOption = $_POST['select'];
        $id = $_POST['newId'];
       
        $query = $con->prepare("INSERT INTO activityassigned(start_date,end_date,plan_no,user_id) VALUES (?,?,?,?)");
        $query->bind_param('ssii',$start,$end,$selectOption,$id);
        if(!$query->execute()) echo $query->error;    
        
        echo "<script type='text/javascript'>alert('Plan Assigned');</script>";
        echo '<meta http-equiv="refresh" content="0">';
        $con->close();
    }
?>