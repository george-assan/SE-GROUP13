<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Nurse/Supervisor View</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <!-- Materialize Core CSS -->
    <link href="materialize/css/materialize.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
     <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.css" type="text/css">
        <!-- Latest compiled and minified CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

        <div  class="page-header"><a href="#menu-toggle" class="fa fa-bars fa-2x" id="menu-toggle" ><i></i></a>                <img id="logoholder2"src="images/taskgenie1.png" width="100px">
                        <a href="#menu-toggle"  id="logindetails"><b>Supervisor</b></a>

                    </div></div>
        <div class="container-fluid">
        	<div class="panel panel-default">
        		<div class="panel-body">
					<div class="addnurseform">
								<form>
									<div class="form-group">
									<label style="color:#454445;" >Firstname</label>
									<input type="text" class="form-control" id="nursename" placeholder="Enter Firstname">
									</div>
									<div>
									<label for="datepicker" style="color:#454445;">Lastname</label>
									<input class="form-control" id="username" type="text" name="username" placeholder="Enter Lastname" required>
									</div>
									<div class="form-group">
									<label  style="color:#454445;" for="password">Nurse ID</label>
									<input class="form-control" type="text"  id="password" placeholder="Enter Nurse Id" required></input>
									</div>
									<div class="form-group">
									<label  style="color:#454445;" for="password">User ID</label>
									<input class="form-control" type="text"  id="password" placeholder="Enter User Id" required></input>
									</div>
									<div class="form-group">
									<label  style="color:#454445;" for="password">Contact Info</label>
									<input class="form-control" type="text"  id="password" placeholder="Enter contact" required></input>
									</div>
									<div class="form-group">
										<label  style="color:#454445;" for="centerCombo"></label>
											<select class="form-control" id="centerCombo" required>
											</select>
										</div>
									<button onClick="addnurse()" type="button" class="waves-effect waves-light btn">
												Add
					                  </button>
								</form>			
					</div>
				</div>
			</div>
		</div>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
     <!-- Materialize Core JavaScript -->
    <script src="materialize/js/materialize.js"></script>
    <!-- app js -->
    <script src="js/task.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
         window.onload = function() {
             populateCenterCombo();
         };
        
    </script>

</body>

</html>
