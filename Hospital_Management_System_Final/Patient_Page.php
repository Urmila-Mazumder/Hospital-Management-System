<?php 
	session_start();
	
?>
<?php
require_once 'db_connect.php';
if (isset($_SESSION["id"])) 
{
	$id=$_SESSION["id"];
	$App_ID="";
	$sql = "SELECT Name FROM User WHERE U_ID='".$id."'";
	$result = $conn->query($sql);

	$sql2 = "SELECT App_ID FROM Patient WHERE P_ID='".$id."'";
	$result2 = $conn->query($sql2);

	if ($result->num_rows > 0 or $result2->num_rows > 0 ) 
	{
	    $row = $result->fetch_assoc();
	    $row2 = $result2->fetch_assoc();
	    $App_ID = $row2['App_ID'];
	    $_SESSION["App_ID"]=$App_ID;
	} 
	else 
	{
	    echo "0 results";
	}

	$conn->close();
}
else
{
	echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
}
?> 
<!-- ----------------------------------------------------HTML------------------------------------------------------ -->
<!DOCTYPE html>
<html>
<head>
	<title>Patient Page</title>
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
			<div class="Normal_welcome_ref">
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
			<div class="Normal_welcome">
				<p class="margin_top_0px">Welcome <?php echo $row["Name"]; ?> </p>
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

