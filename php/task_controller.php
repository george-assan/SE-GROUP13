<?php


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
        default:
            echo '{"result":0,message:"failed command"}';
            break;
    }//end of switch
    
}//

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