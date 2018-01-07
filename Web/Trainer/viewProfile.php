<div class="modal" id="viewProfileModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">My Profile</h4>
            </div>
            <div class="modal-body">
                <?php  
                    $query = $con->prepare("SELECT * FROM trainer WHERE id =?");
                    $query->bind_param('i',$myId);
                    if(!$query->execute()) echo $query->error;
                    $result = $query->get_result()->fetch_assoc();
                    
                ?>
                <table width="100%">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $result['name'];?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php 
                                   $gender = 'Male';
                                  if($result['gender']==1) {
                                      $gender='Female';
                                  }
                                  echo $gender;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $result['email'];?></td>
                    </tr>
                    <tr>
                        <td>Certificate</td>
                        <td><?php echo $result['certificate'];?></td>
                    </tr>
                    <tr>
                        <td>Year of experience</td>
                        <td><?php echo $result['experience'];?> Year</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>