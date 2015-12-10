


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

            var taskname = encodeURI(document.getElementById("taskname").value);
            var des = encodeURI(document.getElementById("description").value);
            var sdate = encodeURI(document.getElementById("sdate").value);
            var ddate = encodeURI(document.getElementById("ddate").value);

             var url = "./php/task_controller.php?cmd=1&nme="+taskname+"&ddate="+ddate+"&des="+des+"&sdate="+sdate;
               var obj = sendRequest ( url );
               refreshAddForm();
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
