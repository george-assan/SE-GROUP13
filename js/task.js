


function sendRequest ( u )
           {
               var obj = $.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendrequest

/** This function takes in the values from the login form input elements and makes an ajax call
  * to the task controller.php
  */
function login(){
    var pword = encodeURI(document.getElementById("username").value);
     var uname = encodeURI(document.getElementById("password").value);

     var url = "php/task_controller.php?cmd=3&uname="+uname+"&pword="+pword;
               var obj = sendRequest ( url );

    if(obj.permission == 0){
      location.href = "admin-dashboard.html";
    }

}//end of login function

function addTask(){

            var taskname = encodeURI(document.getElementById("title").value);
            var des = encodeURI(document.getElementById("description").value);
            var ddate = encodeURI(document.getElementById("datepicker").value);
              var sid =encodeURI(document.getElementById("id").value);
             var url = "php/task_controller.php?cmd=1&nme="+taskname+"&ddate="+ddate+"&des="+des+"&sid="+sid;
               var obj = sendRequest ( url );
            
			   }


function displayTasks(){
  var url = "./php/task_controller.php?cmd=2";
               var obj = sendRequest ( url );
        var i = 0;
        var panel ="<li><input type='text' placeholder='Search'></l1>";
        if(obj.result== 1){
        for(;i<obj.tasks.length; i++){
          panel = panel + "<li><a zf-toggle='message'><h5>"+obj.tasks[i].task_name+"</h5><p></p></a></li>";
        }
        $("#tasklist").html(panel);
      }
       else{
        
       }
}

function populateCenterCombo(){

     var url = "php/task_controller.php?cmd=4";
      var obj = sendRequest ( url );

      var i = 0;
        var sel ="";
        if(obj.result== 1){
          for(;i<obj.centers.length; i++){
            var sel="<option value="+obj.centers[i].id+">"+obj.centers[i].center_name+"</option>";

          }
        }
        $("#centerCombo").html(sel);

}

function displayAddTaskForm(){
    var panel = " <h2 id='user'></h2><form role='form'><div class='form-group'><label for='id'>Id:</label><input type='text' class='form-control' id='id'></div><div class='form-group'><label for='title'>Task title:</label><input type='text' class='form-control' id='title'></div><div class='form-group'><label  for='description'>Description</label><textarea class='form-control' rows='4' id='description' placeholder='Enter task description' required></textarea></div><div><label for='datepicker' >Due date</label><input id='datepicker'type='date' name='ddate' required></div></form><button onclick='addTask()' class='btn btn-default'>Submit</button> ";

    $("#addtaskform").html(panel);
    var index = document.getElementById("centerCombo").value;
    var url = "php/task_controller.php?cmd=5&id="+index;
      var obj = sendRequest ( url );

      var i = 0;

       $("#user").html("Supervisor: "+obj.supervisor[i].firstname + " "+obj.supervisor[i].lastname );
        var text =  document.getElementById("id");
          text.value = obj.supervisor[i].id ;

}

function getUnassignedTasks(){

     var url = "php/task_controller.php?cmd=6";
               var obj = sendRequest ( url );
        var i = 0;
        var panel ="";
          if(obj.result== 1){

        for(;i<obj.tasks.length; i++){
          panel = panel + "<div class='panel panel-default'><div class='panel-body'><div><span style='float:left'><p><b>"+obj.tasks[i].title+"</b></p><p>"+obj.tasks[i].center_name+"</p></span><span id='editbtn'><button>edit</button></span></div></div></div>";
              }
       $(".container-fluid").html(panel); 
      }
       else{
        
       }

}



