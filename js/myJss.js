var currentCity = "";
function sendRequest(u) {
    // Send request to server
    //u a url as a string
    //async is type of request
    var obj = $.ajax({url: u, async: false});
    //Convert the JSON string to object
    var result = $.parseJSON(obj.responseText);
    return result;	//return object
}
function add_center(){
	/*nursename*/
    var id = $("#id").val();
    alert("jjj");
	/*username*/
    var center_name = $("#center_name").val();

    /*password*/
    var location = $("#location").val();
  
if (id==""){
    alert("Enter id")
return ;
}
else if (center_name==""){

    alert("Enter the center name")
    return;
}
    else{
var objResult = sendRequest("php/center_controller.php?cmd=1&center_name="+center_name+"&location="+location);
var errorArea = document.getElementById("error_area");
if(objResult.result==1){
    alert(objResult.message);
document.getElementById("error_area").innerHTML = objResult.message;
}
else {
    alert(objResult.message);
    document.getElementById("error_area").innerHTML = objResult.message;
    return;

}

}
}


function delete_center(id){

var objResult = sendRequest("php/center_controller.php?cmd=3&id="+id);
var errorArea = document.getElementById("error_area");
if (objResult.result==1){
    alert(objResult.message);
    window.location.reload();
    document.getElementById("error_area").innerHTML = objResult.message;
}
else{
    alert(objResult.message);
    document.getElementById("error_area").innerHTML = objResult.message;
    return;
}
}
/*
This function sends a request to the extend_center.php page to display a center's id and 
center's last name in a table
*/
function displaying(){
    var view = sendRequest("php/center_controller.php?cmd=4");
    if(view.result==1){
        var tableValue=view.center;
        var tableHTML="";
        for(var i=0;i<tableValue.length;i++){
            
            tableHTML+="<tr><td>"+tableValue[i]['id']+"</td><td>"+tableValue[i]['center_name']+"</td><td>"+tableValue[i]['center_name']+"</td><td><a href=# onclick='delete_center("+tableValue[i]['id']+")'>delete</a></td></tr>";
        }
        document.getElementById("mytable").innerHTML=tableHTML;
    }

}