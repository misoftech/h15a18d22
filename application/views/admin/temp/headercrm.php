<?php define('URLI', 'http://localhost/miconsulting/assets/admin/'); 
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
      
	<title><?php echo $page_title ? $page_title : 'CRM'; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Cargusto.com">
	<meta name="author" content="Cargusto.com">
	<link rel="shortcut icon" href="assets/icon/favicon.png" />    
    <link rel="stylesheet" href="<?php echo URLI;?>css/styles.css">
    <link rel="stylesheet" href="<?php echo URLI;?>fonts/font-awesome/css/font-awesome.css">
    <link href='<?php echo URLI;?>demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='styleswitcher'>     
    <link href='<?php echo URLI;?>demo/variations/header-white.css' rel='stylesheet' type='text/css' media='all' id='headerswitcher'> 
   
<?php
function linktag($address) {echo "<link rel='stylesheet' type='text/css' href='$address' /> \n";}?>
 
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-daterangepicker/daterangepicker-bs3.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-markdown/css/bootstrap-markdown.min.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/codeprettifier/prettify.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-toggle/toggles.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/datatables/dataTables.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-select2/select2.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-multiselect/css/multi-select.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-daterangepicker/daterangepicker-bs3.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-fseditor/fseditor.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/form-tokenfield/bootstrap-tokenfield.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>js/jqueryui.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>css/print.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/jquery-fileupload/css/jquery.fileupload-ui.css' />
<link rel='stylesheet' type='text/css' href='<?php echo URLI;?>plugins/dropzone/css/dropzone.css' />
<script type='text/javascript' src='<?php echo URLI ; ?>js/less.js'></script>
      
  



</head>

<body class="<?php //if (isset($_COOKIE["admin_leftbar_collapse"])) echo ($_COOKIE['admin_leftbar_collapse'] . " "); // check collapse state with php
                // if (isset($_COOKIE["admin_rightbar_show"])) echo $_COOKIE['admin_rightbar_show'];
                // if (isset($_COOKIE["fixed-header"])) echo ' static-header';
                ?>">

    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title=""></a>
        <!--a id="rightmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="left" title=""></a-->

        <div class="navbar-header pull-left">
            <a class="navbar-brand" href="index.php"></a>
        </div>

        <ul class="nav navbar-nav pull-right toolbar">        	        	
        	<li class="dropdown">
        		<a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs"><?php //echo $user['vorname']." ".$user['nachname'];?> <i class="fa fa-caret-down"></i></span></a>
        		<ul class="dropdown-menu userinfo arrow">
        			<li class="username">                       
                        <a href="#">        				    
        				    <div class="pull-right"><h5><?php //echo $user['vorname']." ".$user['nachname'];?></h5><small>Signed In with <span><?php //echo $user['email'];?></span></small></div>
                        </a>
        			</li>
        			<li class="userlinks">
        				<ul class="dropdown-menu">        					
                                            <li><a href="<?php echo base_url();?>admin/usercrm/user&id=<?php //echo $user['id'];?>">Edit Profile <i class="pull-right fa fa-cog"></i></a></li>
        					<li><a href="<?php echo base_url();?>admin/pwchange">Change Password <i class="pull-right fa fa-pencil"></i></a></li>        					
        					<li class="divider"></li>
        					<li><a href="<?php echo base_url();?>admin/login/logout" class="">Sign out <i class="pull-right fa fa-sign-out"></i></a></li>
        				</ul>
        			</li>
        		</ul>
        	</li> 
        	<li>
                <a href="#" id="headerbardropdown"><span><i class="fa fa-calendar-o"></i>  <?php // echo date("F j, Y"); ?></span></a>
            </li>       	            
		</ul>
    </header>

    

    
    <div id="page-container">
        <!-- BEGIN SIDEBAR -->
        <nav id="page-leftbar" role="navigation">
                <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">
                <li id="search">                    
                    <a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
                     <form action="index.php" method="get">                     
                     	<input type="hidden" value="applyprofil" name="c">
                        <input type="text" class="search-query" name="id" placeholder="Application #ID.">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>admin/homecrm"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>                
                <li><a href="<?php echo base_url();?>admin/applycrm"><i class="fa fa-file-text-o"></i> <span>ALL Applications</span></a></li>                
                
                <li><a href="<?php echo base_url();?>admin/usercrm"><i class="fa fa-group"></i> <span>Employees</span></a></li>    
                
                                        
                <!--li class="divider"></li>
                <li><a href="javascript:;"><i class="fa fa-ticket"></i> <span>Support Tickets</span> </a>
                    <ul class="acc-menu">
                        <li><a href="index.php?c=tickets">Offene Tickets</a></li>
                        <li><a href="index.php?c=ticketsclose">Geschlossene Tickets</a></li>                        
                    </ul>
                </li-->                
            </ul>
            <!-- END SIDEBAR MENU -->
        </nav>

        <!-- BEGIN RIGHTBAR >
        <div id="page-rightbar">
            <div id="widgetarea">                
                <div class="widget" id="activities">                    
                    <p><span class="fa fa-user"></span> Benutzer Aktivitäten</p>                    
                </div>
            </div>
        </div>
        <- END RIGHTBAR -->