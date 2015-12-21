<?php
/**
* 
* @var 
* 
*/
if(isset($_REQUEST['id'])){
				include("center.php");
				//create object of centers 
				$obj=new center();
				
				$row=$obj->view_center();
				
				
				$result=$obj->view_center($id);
				if(!$result){
					echo '{"result": 0, "message": "Error displaying centers"}'; 
					return;
				}else{
					echo '{"result": 1, "message": "Displaying centers"}';
					return;
				}
			}			
?>