<?php 
	session_start();
	$App_ID="";
	$App_ID=$_SESSION["App_ID"];
?>
<!DOCTYPE html>
<html>
<head>
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
			<div class="final_ref_show_patient">
				<?php
					if ($App_ID=="0") 
					{
						include 'Patient_Reference.php';
					}

					else
					{
						include 'Patient_Reference2.php';
					}

				?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="final_main_show">
				<?php include 'Bill_pay_confirm.php' ?>
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