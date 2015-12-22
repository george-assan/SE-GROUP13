<?php
/*
*includes adb class
*/

/**
 * This contains functions for retrieving and entering data of nurse into database
 *
 * The functions included in this class enable the user to retrieve a particular nurses
 * as well as all nurses. It also allows the user to search and delete nurses.
 *
 * @author      Christian Biassey-Bogart <christian.biassey-bogart@ashesi.edu.gh>
 * @copyright  2015-2016 
 */
include_once ( "adb.php" );
class nurse extends adb
{	
    /**
    * Constructor for task class
    **/
    function  nurse ( ){
    }
	 
    /**
    * A function to add a nurse. Using the values given to it submits a 
    * a query to the adb class and returns a boolean value based on
	* whether the entry was successful
	*
	* @param $id The id of the nurse
    * @param $uid The user id of the nurse
    * @param $fname The firstname of the nurse
    * @param $lname The lastname of the nurse
    * @param $cid The id of the center the nurse belongs to
	*
	* @return returns a boolean value
    **/

    function add_nurse ($id,$uid,$fname, $lname,$cid)
    {
		$insert_query = "insert into nurses set id = '$id' , userid='$uid',firstname = '$fname', lastname = ' $lname' , centerid = '$cid'";
        return $this->query ($insert_query);
    }
    
    /**
    * A function to retrieve a particular nurse from the database. 
    * @param $id The id of the nurse 
    * @return returns a boolean value
    **/
    function  getnurse($id){
        $str_query = "Select * from nurses where id='$id'";
        return $this->query ($str_query);
    }
    
    
    /**
    * A function to retrieve all nurses from the database. 
    * @return returns a boolean value
    **/
    function  getallnurses(){
        $str_query = "Select * from nurses ";
        return $this->query ($str_query);
    }
    
     /**
    * A function to update a particular nurse in the database. 
    * @param $id The id of the nurse
    * @param $fname The new firstname of the nurse
    * @param $lname The new lastname of the nurse
    * @return returns a boolean value
    **/
    function  editnurse($id,$fname, $lname){
        $update_query= "update nurses set firstname='$fname', lastname='$lname' where id = '$id'";
        return $this->query ( $update_query );
    }
    
    /**
    * A function to remove a particular nurse from the database. 
    * @param $id The id of the nurse 
    * @return returns a boolean value
    **/
    function  deletenurse($id){
        $str_query = "delete from nurses where id='$id'";
        return $this->query ($str_query);
    }
    
}

?>