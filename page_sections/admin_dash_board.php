<?php
    require_once '../core/init.php';
    //check if the user has successfully logged in...otherwise redirect him/her 
    //back to the index page.
    if(! isset($_SESSION['user'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" ng-app="adminDashboardApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Satellite Admin Dashboard</title>
        <!-- Bootstrap Core CSS -->
        <link href="../admin_css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../admin_css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Timeline CSS -->
        <link href="../admin_css/plugins/timeline.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../admin_css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../css/style-form-validation.css" rel="stylesheet" type="text/css"/>
        <!--style for the text editor -->
        <link rel="stylesheet" type="text/css" href="../jQuery-TE_v.1.4.0/jquery-te-1.4.0.css" />
        <!--style for the datatables-->
        <link href="../admin_css/plugins/dataTables.bootstrap.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <!-- Navigation -->
                <?php                    
                    //echo 'session value is : '.Session::get(Config::get('session/session_name'));
                    require_once 'admin_header_navigation.php';
                ?>
                <!--End Navigation Bar-->
                <!--Side bar navigation starts-->
                <?php
                    require_once 'admin_sidebar_navigation.php';
                ?>
                <!--End Side Bar Navigation-->
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                
                <div class="row">
                    <?php
                        require_once 'admin_main_middle_panel.php';
                    ?>
                    <div class="col-lg-4">
                        <?php
                            require_once 'admin_rightsidebar_notification.php';
                        ?>
                    </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php
            require_once 'admin_dashboard_js_imports.php';
        ?>
    </body>
</html>