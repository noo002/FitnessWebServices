$(document).ready(function(){
    $('#myTable').dataTable();
});
function newActivity() {
    $("#newActivityModal").modal();
};
function editActivity(no) {
    $.ajax({ 
        dataType: "json",
        url:"../Action/activity.php",
        method:"POST", 
        data: {no:no, getData:"getData"},
        success:function(data) {
            $("#editNo").val(no);
            $("#editName").val(data[0].name);
            $("#editDesc").val(data[0].desc);
            $("#editCal").val(data[0].cal);
            $("#editMin").val(data[0].time);
            
            if(data[0].image!='') {
                $('#editImage').attr('src','data:image/png;base64,'+data[0].image);
                $("#editIsImage").val(data[0].image);
            }
            else{
                $('#editImage').attr('src','../image/logo-small.png');
                $("#editIsImage").val('');
            }
      
        }
    });
    $("#editActivityModal").modal();
};
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#newImage')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
        $("#newIsImage").val(e.target.result.substring(22));
        };
        reader.readAsDataURL(input.files[0]);
    }
};
function editURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#editImage')
                .attr('src', e.target.result)
                .width(80)
                .height(80);
        $("#editIsImage").val(e.target.result.substring(22));
        };
        reader.readAsDataURL(input.files[0]);
    }
};
function deleteActivity(no) {
    var retVal = confirm("Do you want to delete this activity ?");
    if( retVal == true ){
        $.ajax({ 
            url:"../Action/activity.php",
            method:"POST", 
            data: {no:no, delete:"delete"},
            success:function(data) {
                if(data.trim()=='fail') {
                    alert('Fail delete \nThis Activity already assigned to student');
                }
                else{
                    location.reload();
                    alert('Successful deleted');
                }
            }
        });
    } 
};
