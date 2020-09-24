<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>SFPU Hospital</title>
   <link rel="stylesheet" href="css/sm.css">
   <link rel="stylesheet" href="css/common.css">
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
			<div class="welcome1" style="float: left;">
				<?php include 'Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
			<div class="welcome2 message">
				<p style="text-align: center;">Welcome to SFPU Hospital</p>
				<?php 
					unset($_SESSION["id"]);
				?>
				<div align="center" >
					<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
			            <button type="submit" class="button button1" name="Login">Login</button>
						<button type="submit" class="button button2" name="Registration">Registration</button>
					</form>
				</div>
			</div>
			
	
		</div>
	</div>	
		
		<!-------------------------------------------------------------------------------------------------->
		<!-- Footer-->
	<div style="width:100%;">
		<div style="background-color: #4CAF50;margin-top: 100px;">
			<?php include 'Footer.php' ?>	
		</div>
	</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	if(isset(($_POST['Login'])))
	{
		echo '<script type="text/javascript">window.location.href="Login_Final.php";</script>';
	}
	else if(isset(($_POST['Registration'])))
	{
		echo '<script type="text/javascript">window.location.href="Registration_final.php";</script>';
	}
}
?>

