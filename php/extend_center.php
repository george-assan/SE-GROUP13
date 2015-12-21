<?php
/**
* 
*/
include("center.php");
/**
* 
*/
class extendedCenter extends center{
	/**
	* 
	* 
	* @return
	*/
	
	function displayCenter(){
				if(!$this->view_center()){
					echo '{"result": 0, "mesage": "Failed to fetch"}';
					return;
				}else{
				
				echo '{"result":1,"center":[';
				$row=$this->fetch();
				while($row){
					echo json_encode($row);
					$row=$this->fetch();
					if($row){
						echo ",";
					}
				}echo "]}";
			}
			}
			$mycenter=new extendedCenter();
			if(isset($_REQUEST['cmd'])){
				$cmd=$_REQUEST['cmd'];
				switch($cmd){
					case 1:
					$mycenter->displayCenter();
					break;
					
				}
			}

			?>