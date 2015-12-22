<?php
session_start();

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        case 1:
            adminaddtask ( );
            break;
        case 2:
            displayTask ( );
            break;
        case 3:
            login ( );
            break;
        case 4:
            getCenters ( );
            break; 
         case 5:
           getSupervisorOfCenter();
            break; 
         case 6:
           getUnassignedtask();
            break;
            case 7:
           adduser();
            break;
            case 8:
           addnurse();
            break;
            case 9:
           getnurse();
            break;
            case 10:
           editnurse();
            break;
        case 11:
           getallnurses();
            break;
             case 12:
           deletenurse();
            break;
        default:
            echo '{"result":0,message:"failed command"}';
            break;
    }//end of switch
    
}//end of if statement

/*
Function to start session with details of user obtained from calling the getUser method of the user object it creates

*/
function login(){
	include("user.php");
	$obj=new User();
	$uname=$_REQUEST['uname'];
	$pword=$_REQUEST['pword'];
	if(!$obj->getUser($uname,$pword)){
		echo '{"result":0,"message": "failed to access user information"}';
	}
	else{
	$row=$obj->fetch();	
	$_SESSION['userid']=$row['id'];
	$_SESSION['username']=$row['username'];
	$_SESSION['password']=$row['password'];
	$_SESSION['permission']=$row['permission'];
	getUserDetails();
	}
}

function getUserDetails(){
	echo '{"id":'.$_SESSION['userid'].',"username": "'.$_SESSION['username'].'","permission":"'.$_SESSION['permission'].'"}';
}

function adminaddtask(){
	include("task.php");
	$obj=new task();
	$name=$_REQUEST['nme'];
	$ddate=$_REQUEST['ddate'];
	$des=$_REQUEST['des'];
	$supv_id=$_REQUEST['sid'];
	
	if(!$obj->add_task($name,$ddate,$des,$supv_id)){
		echo  '{"result":0,"message": "failed to add task"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added task"}';
	
	}
}

function displaytask(){
	include("task.php");
	$obj=new task();
	if(!$obj->getTasks()){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"tasks":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";	

}

function getCenters(){
	include("center.php");
	$obj=new Center();
	if(!$obj->getCenters()){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"centers":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";	
}

function getSupervisorOfCenter(){
	include("supervisor.php");
	$id = $_REQUEST['id'];
	$obj=new Supervisor();
	if(!$obj->getSupervisorOfCenter($id)){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"supervisor":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";	
}


function getUnassignedtask(){

	include("task.php");
	$obj=new task();
	if(!$obj->getUnassignedTasks()){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"tasks":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";	


}


function adduser(){
    include("user.php");
	$obj=new User();
	$id=$_REQUEST['id'];
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	//$supv_id=$_REQUEST['sid'];
	
	if(!$obj->add_user($id,$username,$password)){
		echo  '{"result":0,"message": "failed to add user"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added user"}';
	
	}
    
}

function addnurse(){
    
    include("nurse.php");
	$obj=new nurse();
	$id=$_REQUEST['id'];
	$uid=$_REQUEST['uid'];
	$firstname=$_REQUEST['fname'];
	$lastname=$_REQUEST['sid'];
    $cid=$_REQUEST['sid'];
	
	if(!$obj->add_nurse($id,$uid,$firstname,$lastname, cid)){
		echo  '{"result":0,"message": "failed to add nurse"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added nurse"}';
	
	}
}

function getnurse(){
    include("nurse.php");
	$obj=new nurse();
    $id=$_REQUEST['nurseid'];
	if(!$obj->getnurse($id)){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"nurses":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";	
}

function editnurse(){
    
        
    include("nurse.php");
	$obj=new nurse();
	$id=$_REQUEST['id'];
	$firstname=$_REQUEST['firstname'];
	$lastname=$_REQUEST['lastname'];
	
	if(!$obj->editnurse($id,$firstname,$lastname)){
		echo  '{"result":0,"message": "failed to add nurse"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added nurse"}';
	
	}
}

function getallnurses(){
     include("nurse.php");
	$obj=new nurse();
	if(!$obj->getallnurses()){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"nurses":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";	
    
}

function deletenurse(){
    include("nurse.php");
	$obj=new nurse();
	$id=$_REQUEST['id'];
	
	
	if(!$obj->deletenurse($id)){
		echo  '{"result":0,"message": "failed to delete nurse"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully deleted nurse"}';
	
	}
    
    getallnurses();
}

?>


