var studentID;
$(document).ready(function(){
    $('#myTable').dataTable();

});

$(function(){
    $('.dropdown').hover(function() {
            $(this).addClass('open');
    },
    function() {
            $(this).removeClass('open');
    });
});
function detailUser(id) { 
    
    $.ajax({ 
       dataType: "json",
       url:"../Action/trainer.php",
       method:"POST", 
       data: {id:id, action:"getData"},
       success:function(data) {
           $("#studentDetailModal").modal();
           if(data[0].image!=='') {
               myProfile.setAttribute('src', "data:image/jpg;base64," + data[0].image);
           }
           else{
               myProfile.setAttribute('src',"../image/logo-small.png");
           }
           gender = 'Male';
           if(data[0].gender==1) {
               gender = 'Female';
           }
           
           if(data[0].weight!=null) {
               $("#weight").html(data[0].weight+" KG");
           }
           else{
               $("#weight").html("-");
           }
           
           if(data[0].height!=0) {
               $("#height").html(data[0].height+" CM");
           }
           else{
               $("#height").html("-");
           }
           
           if(data[0].step!=null) {
               $("#step").html(Math.round(data[0].step)+" Step");
           }
           else{
               $("#step").html("-");
           }
           if(data[0].hr!=null) {
               $("#hr").html(Math.round(data[0].hr)+" bpm");
           }
           else{
               $("#hr").html("-");
           }
           if(data[0].activtiyBrun!=null) {
               $("#activityBrun").html(Math.round(data[0].activtiyBrun)+" cal");
           }
           else{
               $("#activityBrun").html("-");
           }
           
           if(data[0].dietBurn!=null) {
               $("#dietBurn").html(Math.round(data[0].dietBurn)+" cal");
           }
           else{
               $("#dietBurn").html("-");
           }
           
           if(data[0].goalWeight!=null) {
               $("#goalWeight").html(Math.round(data[0].goalWeight)+" KG");
           }
           else{
               $("#goalWeight").html("-");
           }
           
           if(data[0].goalStep!=null) {
               $("#goalStep").html(Math.round(data[0].goalStep));
           }
           else{
               $("#goalStep").html("-");
           }
           
           if(data[0].goalBrun!=null) {
               $("#goalBrun").html(Math.round(data[0].goalBrun)+' cal');
           }
           else{
               $("#goalBrun").html("-");
           }
           
           myProfile.setAttribute('width','150px');
           myProfile.setAttribute('height','150px');
           $("#studentID").val(id);
           studentID = id;
           $("#name").html(data[0].name);
           $("#gender").html(gender);
           $("#dob").html(data[0].dob);
           $("#email").html(data[0].email);   
       }
    });
};
var dataRows;
function showWeight() {
    dataRows=null;
    $.ajax({ 
       url:"../Action/trainer.php",
       method:"POST", 
       data: {id:studentID, action:"weight"},
       success:function(data) {
           dataRows= data;
           if(dataRows.length!=3) {
               $("#graphModal").modal(); 
               $("#graphTitle").html("Student Weight History");
               google.charts.load('current', {packages: ['corechart', 'line']});
               google.charts.setOnLoadCallback(drawWeight);
           }
           else{
               alert("No have any weight data");
           }
       }
    });
};
function showHr() {
    dataRows=null;
    $.ajax({ 
       url:"../Action/trainer.php",
       method:"POST", 
       data: {id:studentID, action:"hr"},
       success:function(data) {
           dataRows= data;
           if(dataRows.length!=3) {
               $("#graphModal").modal(); 
               $("#graphTitle").html("Student Heart Rate History");
               google.charts.load('current', {packages: ['corechart', 'line']});
               google.charts.setOnLoadCallback(drawHr);
           }
           else{
               alert("No have any Heart Rate data");
           }
       }
    });
};
function showStep() {
    dataRows=null;
    $.ajax({ 
       url:"../Action/trainer.php",
       method:"POST", 
       data: {id:studentID, action:"step"},
       success:function(data) {
           dataRows= data;
           if(dataRows.length!=3) {
               $("#graphModal").modal(); 
               $("#graphTitle").html("Student Walking Step History");
               google.charts.load('current', {packages: ['corechart', 'line']});
               google.charts.setOnLoadCallback(drawStep);
           }
           else{
               alert("No have any Walking Step data");
           }
       }
    });
};
function showWorkout() {
    dataRows=null;
    $.ajax({ 
       url:"../Action/trainer.php",
       method:"POST", 
       data: {id:studentID, action:"workout"},
       success:function(data) {
           dataRows= data;
           if(dataRows.length!=3) {
               $("#graphModal").modal(); 
               $("#graphTitle").html("Student Workout Calories Burn History");
               google.charts.load('current', {packages: ['corechart', 'line']});
               google.charts.setOnLoadCallback(drawWorkout);
           }
           else{
               alert("No have any workout data");
           }
       }
    });
};
function showDiet() {
    dataRows=null;
    $.ajax({ 
       url:"../Action/trainer.php",
       method:"POST", 
       data: {id:studentID, action:"diet"},
       success:function(data) {
           dataRows= data;
           if(dataRows.length!=3) {
               $("#graphModal").modal(); 
               $("#graphTitle").html("Student diet intake History");
               google.charts.load('current', {packages: ['corechart', 'line']});
               google.charts.setOnLoadCallback(drawDiet);
           }
           else{
               alert("No have any diet data");
           }
       }
    });
};
function drawWeight() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Weight');
    data.addRows(JSON.parse(dataRows));

    var options = {
      hAxis: {
        title: 'Date'
      },
      vAxis: {
        viewWindow:{
            min:1
        },
        title: 'Weight (KG)'

      }
    };
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);  
}
function drawHr() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Heart Rate');
    data.addRows(JSON.parse(dataRows));

    var options = {
      hAxis: {
        title: 'Date'
      },
      vAxis: {
        viewWindow:{
            min:1
        },
        title: 'Heart Rate (bpm)'

      }
    };
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);  
}
function drawStep() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Walking Step');
    data.addRows(JSON.parse(dataRows));

    var options = {
      hAxis: {
        title: 'Date'
      },
      vAxis: {
        viewWindow:{
            min:1
        },
        title: 'Walking Step'

      }
    };
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);  
}
function drawWorkout() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Calories');
    data.addRows(JSON.parse(dataRows));

    var options = {
      hAxis: {
        title: 'Date'
      },
      vAxis: {
        viewWindow:{
            min:1
        },
        title: 'Calories Burn(cal)'

      }
    };
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);  
}
function drawDiet() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Calories');
    data.addRows(JSON.parse(dataRows));

    var options = {
      hAxis: {
        title: 'Date'
      },
      vAxis: {
        viewWindow:{
            min:1
        },
        title: 'Calories intake(cal)'

      }
    };
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);  
}
function assignActivity(id) {
    $('#assignActivityTable td').parent().remove();
    $.ajax({ 
        dataType:'json',
        url:"../Action/trainer.php",
        method:"POST", 
        data: {id:id,action:"assigned"},
        success:function(data) {
            if(data.length!=0) {
                for(var x=0;x<data.length;x++) {
                    $('#assignActivityTable > tbody:last').append('<tr><td>'+data[x].name+'</td><td>'+data[x].start+'</td><td>'+data[x].end+'</td>\n\
                    <td><a class="btn btn-danger btn-xs" onclick="deleteActivity('+data[x].no+')" href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a></td></tr>');
                }
                $('#assignActivityTable').DataTable();
                $('#newPlanModal').modal();
            }
            else{
                alert('No assigned any activity plan');
            }
        }
    });
};
function assigned(id,tainerID) {
    $.ajax({
        dataType:'json',
        url:"../Action/trainer.php",
        method:"POST", 
        data: {id:tainerID,action:"getPlanName"},
        success:function(data) {
            if(data.length!=0) {
                for(var x=0;x<data.length;x++) {
                    $("#select").append($("<option></option>").val(data[x].no).html(data[x].name));
                    $("#newId").val(id);
                }
                $('#newModal').modal();
            }
            else{
                alert('No plan can choose');
            }
            
            
        }
    });
    
};
function deleteActivity(no) {
    $.ajax({
        url:"../Action/trainer.php",
        method:"POST", 
        data: {no:no,action:"deletePlan"},
        success:function(data) {
            alert(data);
            location.reload();
        }
    });
};