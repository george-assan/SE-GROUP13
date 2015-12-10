<?php
session_start();

if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        case 1:
            addtask ( );
            break;
        case 2:
            displayTask ( );
            break;
        case 3:
            login ( );
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

function addtask(){
	include("task.php");
	$obj=new task();
	$name=$_REQUEST['nme'];
	$ddate=$_REQUEST['ddate'];
	$des=$_REQUEST['des'];
	$sdate=$_REQUEST['sdate'];
	$supv_id = 1;
	$nurse_id =1;
	if(!$obj->add_task($name,$sdate,$ddate,$des,$nurse_id,$supv_id)){
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
?>