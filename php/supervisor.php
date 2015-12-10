<?php
/*
*includes adb class
*/

/**
 * This contains functions for retrieving and entering data of tasks into database
 *
 * The functions included in this class enable the user to retrieve a particular tasks
 * as well as all tasks. It also allows the user to search and delete tasks.
 *
 * @author      George Esiful Assan <george.assan@ashesi.edu.gh>
 * @copyright  2015-2016 
 */
include_once ( "adb.php" );
class supervisor extends adb
{	
    /**
    * Constructor for supervisor class
    **/
    function  Supervisor ( ){
    }
	 
    
    
    function getSupervisorOfCenter($id){
        $str_query = "Select * from supervisors where centerid='$id'";
        return $this->query ($str_query);
    }
    
}

?>