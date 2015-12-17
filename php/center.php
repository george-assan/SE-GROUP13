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
class center extends adb
{	
    /**
    * Constructor for center class
    **/
    function  center ( ){
    }
	 
    /**
    * A function to add a user. Using the values given to it submits a 
    * a query to the adb class and returns a boolean value based on
	* whether the entry was successful
	*
	* @param String $name The name of the center
    * @param String $location The location of center 
	*
	* @return boolean true when successful and false else.
    **/

    function add_center($center_name,$location)
    {
		$insert_query = "insert into centers set center_name='$center_name',location = '$location'";
        return $this->query ($insert_query);
    }
    /**
    * A function to retrieve user for the database. 
    * @return returns a boolean value
    **/
    function  view_center(){
        $str_query = "Select * from centers";
        return $this->query ($str_query);
    }
    /**
    * A function to delete a center from the table. 
    * @return returns a boolean value
    **/
    function delete_center($id){
        $str = "delete from centers where id='$id'";
        return $this->query ($str);
    }
  

}

?>