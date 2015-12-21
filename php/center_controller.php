
<?php


if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        case 1:
            add_center();
            break;
        case 2:
            view_center();
            break;
            case 3:
            delete_center();
            break;
            case 4:
            displayCenter();
            break;
        default:
            echo '{"result":0,message:"failed command"}';
            break;
    }//end of switch
    
}//

function add_center( ){
    include("center.php");
    $obj=new center();
    $center_name=$_REQUEST['center_name'];
    $location=$_REQUEST['location'];
    

    session_start();
    

    if(!$obj->add_center($center_name,$location)){

        echo  '{"result":0,"message": "failed to add center"}';
    }
    else{
        echo  '{"result":1,"message": "center added successfully"}';
    
    }

}
function delete_center(){
    include("center.php");
    $obj=new center();
    $id=$_REQUEST['id'];
    session_start();
    
if(!$obj->delete_center($id)){
        echo  '{"result":0,"message": "failed to delete center"}';
        return;
    }
    else{
        echo  '{"result":1,"message": "center was successfully deleted"}';
        return;
    }
}
function displayCenter(){
        include("center.php");
        $obj=new center();
        if(!$obj->view_center()){
            echo '{"result": 0, "mesage": "Failed to fetch"}';
            return;
        }else{
        
        echo '{"result":1,"center":[';
        $row=$obj->fetch();
        while($row){
            echo json_encode($row);
            $row=$obj->fetch();
            if($row){
                echo ",";
            }
        }echo "]}";
    }
}
            






?>

