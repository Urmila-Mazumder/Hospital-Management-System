<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Information</title>
   <link rel="stylesheet" href="css/sm.css">
   <link rel="stylesheet" href="css/All_registration.css">
</head>
<body>
	<div >
		<!-- Header-->
		<div>
			<?php include 'Header.php' ?>			
		</div>
		<!-- Header2 -->
		<div>
			<?php include 'Header2.php' ?>			
		</div>
	</div>
		<!-------------------------------------------------------------------------------------------------->
	<div >
		<div>
			<div class="final_ref_show">
				<?php include 'Admin_Ref.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="final_main_show">
				<?php include 'show_admin_info.php' ?>
			</div>
		</div>
	</div>	
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div >
		<div class="final_footer">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>