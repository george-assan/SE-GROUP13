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
class Task extends adb
{	
    /**
    * Constructor for task class
    **/
    function  Task ( ){
    }
	 
    /**
    * A function to add a task. Using the values given to it submits a 
    * a query to the adb class and returns a boolean value based on
	* whether the entry was successful
	*
	* @param $name The title of the task
    * @param $start_date The date the task starts
	* @param $due_date The date the task is due
	* @param $description The details of the tasks
	* @param $nurse_id The id of the nurse
	* @param $superviser_id The id of the superviser
	* @return returns a boolean value
    **/

    function add_task ($name,$due_date,$description,$superviser_id)
    {
		$insert_query = "insert into tasks set title='$name', enddate = '$due_date',description ='$description', sid = '$superviser_id', assigned='0',status='uncompleted'";
        return $this->query ($insert_query);
    }
    /**
    * A function to retrieve tasks for the database. 
    * @return returns a boolean value
    **/
    function  getTasks(){
        $str_query = "Select * from task";
        return $this->query ($str_query);
    }


    function  getUnassignedTasks(){
        $str_query = "Select * from tasks,supervisors,centers where tasks.assigned='0' and tasks.sid=supervisors.id and supervisors.centerid=centers.id";
        return $this->query ($str_query);
    }
}

?>