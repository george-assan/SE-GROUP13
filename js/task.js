$ ( document ).ready ( function ( )
            {
              displayTasks();
              });



function sendRequest ( u )
           {
               var obj = $.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendrequest

function addTask(){

            var taskname = encodeURI(document.getElementById("taskname").value);
            var des = encodeURI(document.getElementById("description").value);
            var sdate = encodeURI(document.getElementById("sdate").value);
            var ddate = encodeURI(document.getElementById("ddate").value);

             var url = "./php/task_controller.php?cmd=1&nme="+taskname+"&ddate="+ddate+"&des="+des+"&sdate="+sdate;
               var obj = sendRequest ( url );
               refreshAddForm();
			   }
function refreshAddForm(){
	  document.getElementById("taskname").value ="";
      document.getElementById("description").value ="";
      document.getElementById("sdate").value = "";
      document.getElementById("ddate").value = ""; 
}

function bgChange(selObj) {
  newColor = selObj.options[selObj.selectedIndex].text;
  $("#titlebar").css("color", newColor);
  selObj.selectedIndex = -1;
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
