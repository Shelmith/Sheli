<?php require('auth/auth2.php');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RMS</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../assets/img/icons/favicon.ico"/>
        <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <link href="../assets/global/css/components-md.min.css" rel="stylesheet" />
    <link href="../assets/apps/css/todo-2.min.css" rel="stylesheet" />
    <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- <link rel="shortcut icon" href="../assetsfavicon.ico" /> -->
    
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css' />


</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">RMS</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">                
              
                <li class="dropdown">
                  <a href="http://localhost/rms/tenant/auth/tlogout.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp; Logout</a>
                    
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
           <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="http://localhost/rms/tenant/tenant_dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                                    
                    
                    <li>
                        <a href="http://localhost/rms/tenant/house_vacant.php"><i class="fa fa-home"></i>Vacant Houses<span class="fa arrow"></span></a>
                        
                    </li>
                    
                    
                    <li>
                        <a href="http://localhost/rms/tenant/calendar/calender.php"><i class="fa fa-calendar"></i>Calendar<span class="fa arrow"></span></a>                        
                    </li>
                </ul>

            </div> 

        </nav>
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row">
                </div>
                <div class="clearfix"></div>