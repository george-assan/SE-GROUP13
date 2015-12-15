<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Searh Nurse/Supervisor View</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <!-- Materialize Core CSS -->
    <link href="materialize/css/materialize.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css" type="text/css">
	</head>
	<body>
		<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" id="logoholder">
                        <img src="images/taskgenie.png" width="50%">
                    </a>
                </li>
                <li>
                    <a href="supNurseView.html">Back</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div id="page-content-wrapper" style="margin:0px;padding:0px">

        <div  class="page-header"><a href="#menu-toggle" class="fa fa-bars fa-2x" id="menu-toggle" ><i></i></a><img id="logoholder2"src="images/taskgenie1.png" width="100px">
            <a href="#menu-toggle"  id="logindetails"><b>Supervisor</b></a>

        </div></div>
		<div class="container-fluid">
			<div class="panel panel-default">
				<div class="panel-body">

					<form  action="nurse_search.php" method="GET">
					<input type="text" name="txtSearch" placeholder="Enter Nurse Name"/><input type="submit" class="waves-effect waves-light btn" value="search">
					</form>
				</div>
			</div>
		</div>

		<?php
			include_once("nurses.php");
	
			$obj=new nurses();
			$nurse_name="";
			if(isset($_REQUEST['txtSearch'])){
				$nurse_name=$_REQUEST['txtSearch'];
			}
			$obj->get_nurse($nurse_name);
							
			echo "<table border='1'>";
			echo "<tr style='background-color:olive; color:white; text-align:center'><td>Name</td><td>location</td><td></td></tr>";
							
			$row=$obj->fetch();
			$style="";
			$i=0;
				while($row){
					if($i%2==0){
					$style="style='background-color:khaki'";
					}else{
					$style="style='background-color:white'";
					}
					echo "<tr $style >";
					echo "<td><span class='clickspot' onclick='getDesc({$row['nurse_id']})'>{$row['nurse_name']}<span></td>";
					/*echo "<td>{$row['location']}</td>";*/
					echo "<td><a href=''>edit</a> <a href=''>delete</a></td>";
					echo "</tr>";
					$row=$obj->fetch();
					$i++;
					}
		?>
	<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
     <!-- Materialize Core JavaScript -->
    <script src="materialize/js/materialize.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>	
	</body>

</html>
