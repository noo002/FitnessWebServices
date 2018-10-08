<?php
$management = $_SESSION['managementDetail'];
?>

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
                        <td>
                            <?php
                            echo $management->name;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>   <?php
                            if($management->gender ==1){
                                echo "Male";
                            }
                            else if($management->gender ==2){
                                echo "Female";
                            }
                            else{
                                echo "Problem occur with 3rd gender";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?php
                            echo $management->email;
                            ?>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>