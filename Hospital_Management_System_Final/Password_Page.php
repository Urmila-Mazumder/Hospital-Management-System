<?php session_start();?>
<?php
	if (isset(($_POST['OK']))) 
	{
		header("Location: Welcome.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/sm.css">
   <style>
   	.x
	{
		/*border-right:  1px solid green;*/
	    padding-left: 10px;
	    padding-right: 20px;
	    padding-bottom: 100px;
	    background-color: #4CAF50;
	}
	.y
	{
	   /* padding-top: 5px;
	    height: 19px;*/
	    padding-bottom: 280px;
	    /*padding-top: 10px;*/
	    padding-left: 10px;

	}
   </style>
</head>
<body>
	<div style="width:100%">
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
	<div style="width:100%;">
		<div>
			<div class="x" style="float: left;">
				<?php include 'Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div  style="padding-left: 60px;height: 200px;" align="center">
				<p style="margin-top: 0px;padding-top: 100px;font-size: 130%">Password Changed successfully</p>
				<p style="font-size: 130%">Please Re-Login</p>
				<?php 
					unset($_SESSION["id"]);
				?>
			</div>
		

			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
				<div align="center" style="padding-bottom: 100px">
					<input type="submit" name = "OK" value="Ok">
				</div>
			</form>
	
		</div>
	</div>	
		
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div style="width:100%;">
		<div style="background-color: #4CAF50">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>

