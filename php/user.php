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
class User extends adb
{	
    /**
    * Constructor for task class
    **/
    function  User ( ){
    }
	 
    /**
    * A function to add a tuser. Using the values given to it submits a 
    * a query to the adb class and returns a boolean value based on
	* whether the entry was successful
	*
	* @param $name TThe username of the user
    * @param $start_date The password the user would be able to login in with
	*
	* @return returns a boolean value
    **/

    function add_user ($id,$username,$password)
    {
		$insert_query = "insert into users set id = '$id' , username='$username',password = '$password'";
        return $this->query ($insert_query);
    }
    /**
    * A function to retrieve user for the database. 
    * @return returns a boolean value
    **/
    function  getUser($username,$password){
        $str_query = "Select * from users where username='$username' AND password='$password'";
        return $this->query ($str_query);
    }
}

?>