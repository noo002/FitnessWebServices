$(document).ready(function(){
    $('#studentTable').dataTable();
    $('#assignTable').dataTable();
    
});
function assignTrainer(id) {
    $('#studentID').val(id);
    $.ajax({ 
        url:"../Action/student.php",
        method:"POST", 
        data: {id:id, findTrainer:"findTrainer"},
        success:function(data) {
            var trainerID= $.trim(data)
            if(trainerID!='') {
                $("#"+trainerID).prop("checked", true);
            }
            $('#assignModal').modal();
        }
    });
};
