<div class="modal" id="studentDetailModal" role="dialog">
    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Student Detail</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="studentID"/>
                <table width="100%">
                    <tr>
                        <td width="30%"> <img id="myProfile" class="img-thumbnail" width="150px" height="150px" src="../image/logo-small.png"/></td>
                        <td>
                            
                                <table width="100%">
                                    <tr ><td colspan="2"><h4><b>Personal Information</b></h4></td></tr>
                              
                                    <tr>
                                        <td>Name</td>
                                        <td id="name"></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td id="gender"></td>
                                    </tr>
                                    <tr>
                                        <td>Date of birth</td>
                                        <td id="dob"></td>
                                    </tr>
                                
                                    <tr ><td colspan="2"><h4><b>Contact Information</b></h4></td></tr>
                                    <tr>
                                        <td>Email</td>
                                        <td id="email"></td>
                                    </tr>
                                    <tr ><td colspan="2"><h4><b>Health Information</b></h4></td></tr>
                                    <tr>
                                        <td>Height</td>
                                        <td id="height"></td>
                            
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td id="weight"></td>
                                        <td>
                
                                            <a class="btn btn-success btn-xs" onclick="showWeight()" href="#">
                                                <span class="glyphicon glyphicon-signal">
                                                    
                                                </span> Graph</a>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Current Heart Rate</td>
                                        <td id="hr"></td>
                                        <td>
                
                                            <a class="btn btn-success btn-xs" onclick="showHr()" href="#">
                                                <span class="glyphicon glyphicon-signal">
                                                    
                                                </span> Graph</a>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Current Step</td>
                                        <td id="step"></td>
                                        <td>
                
                                            <a class="btn btn-success btn-xs" onclick="showStep()" href="#">
                                                <span class="glyphicon glyphicon-signal">
                                                    
                                                </span> Graph</a>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Current Calories Burn</td>
                                        <td id="activityBrun"></td>
                                        <td>
                
                                            <a class="btn btn-success btn-xs" onclick="showWorkout()" href="#">
                                                <span class="glyphicon glyphicon-signal">
                                                    
                                                </span> Graph</a>
                                         </td>  
                                    </tr>
                                    <tr>
                                        <td>Current Food Intake</td>
                                        <td id="dietBurn"></td>
                                        <td>
                
                                            <a class="btn btn-success btn-xs" onclick="showDiet()"href="#">
                                                <span class="glyphicon glyphicon-signal">
                                                    
                                                </span> Graph</a>
                                         </td>
                                    </tr>
                                    <tr ><td colspan="2"><h4><b>Goal Information</b></h4></td></tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td id="goalWeight"></td>
                                    </tr>
                                    <tr>
                                        <td>Step</td>
                                        <td id="goalStep"></td>
                                    </tr>
                                    <tr>
                                        <td>Calories Burn</td>
                                        <td id="goalBrun"></td>
                                    </tr>
                                </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>