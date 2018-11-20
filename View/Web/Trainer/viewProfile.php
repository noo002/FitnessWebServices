<div class="modal" id="viewProfileModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">My Profile</h4>
            </div>
            <div class="modal-body">
              
                <table width="100%">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $_SESSION['trainerDetail']->name ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php 
                        if($_SESSION['trainerDetail']->gender == 1){
                            echo "Male";
                        }
                        else{
                            echo "Female";
                        }
                        ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $_SESSION['trainerDetail']->email ?></td>
                    </tr>
                    <tr>
                        <td>Certificate</td>
                        <td><?php echo $_SESSION['trainerDetail']->certificate ?></td>
                    </tr>
                    <tr>
                        <td>Year of experience</td>
                        <td><?php echo $_SESSION['trainerDetail']->experience ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>