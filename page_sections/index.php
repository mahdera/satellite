<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta info begin-->
	<title>Satellite Official Website | Admin Index Page</title>
	<meta charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<!--<meta name="viewport" content="width=device-width,initial-scale=1.0"/>-->
	<!-- Meta info end-->
	<link rel="stylesheet" type="text/css" href="../css/style.css" />		
        <link rel="stylesheet" type="text/css" href="../css/style-google.css"/>
        <link rel="stylesheet" type="text/css" href="../css/style-form-validation.css"/>
	<link rel="shortcut icon"  href="../img/favicon.ico" />
        <!-- Responsive CSS section -->
        <link rel="stylesheet" href="../css/responsive.css" type="text/css" media="screen and (max-width: 900px)"/>
</head>
<body>
	<div id="content-wrapper"> 
		<!-- Container begin -->
		<div id="container"> 
			<!-- Header begin-->
					<?php
                        include_once 'admin_index_header.php';
                     ?>
			<!-- Header end --> 
			<!-- slide start -->
			
			<!-- slide end --> 
			<!-- Main begin-->
			<div id="main" class="round_8 clearfix mobile-collapse">
                                <!--home content start-->
                                <?php
                                    include_once 'admin_index_home_content.php';
                                ?>				
                                <!--home content end-->                               
			</div>
			<!-- Main end --> 
			<!-- Footer begin -->
			<?php
                            include_once 'admin_index_footer.php';
                        ?>
			<!-- Footer end --> 
			
		</div>
		<!-- Container end --> 
	</div>
	<!--put the javascript import statements in here...-->
            <?php
                include_once 'admin_javascript_imports.php';
            ?>
        <!--end import javascript files-->
</body>
<script type="text/javascript">
    $(document).ready(function(){           
        $('#username').focus();
    });//end document.ready function
</script>	
</html>