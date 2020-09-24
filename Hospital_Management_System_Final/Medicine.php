<?php 
	session_start();
	$DP_ID=$_SESSION["DP_ID"];
	if (isset($_SESSION["id"])) 
	{
		$D_ID=$_SESSION["id"];

	}
	else
	{
	  echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
	}

	$cy = date("d-m-Y");
	$Data="";
	$ID1=$M_N1=$Dose1=$T_N1="";
	$ID=$M_N=$Dose=$T_N="";
	$IDErr=$M_NErr=$DoseErr=$T_NErr="";
	if (isset($_SESSION["DP_ID"])) 
	{
		$ID1=$_SESSION["DP_ID"];
	}

	if (isset($_POST['Prescribe']))
	{	
		require_once 'db_connect.php';

		$ID1=$_POST['ID'];
		if(empty($_POST['ID']))
	  	{
	  		$IDErr="Please Enter Patient ID";
	  	}

	  	else if($ID1[0]!='P')
    	{
      		$IDErr="Please Enter Valid Patient ID";
    	}

	  	if($IDErr=="")
	  	{
		  	$sql = "SELECT * FROM User WHERE U_ID='".$ID1."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
			  $row = $result->fetch_assoc();
			  $ID=$_POST['ID'];
			} 
			else 
			{
			   $IDErr = "Please Enter a Valid Patient ID";
			}
		}

		$M_N1=$_POST['M_N'];
		if(empty($_POST['M_N']))
	  	{
	  		$M_NErr="Please Enter Medichine Name";
	  	}
	  	else
	  	{
	  		$M_N=$_POST['M_N'];
	  	}

	  	$Dose1=$_POST['Dose'];
		if(empty($_POST['Dose']))
	  	{
	  		$DoseErr="Please Enter Medichine Name";
	  	}
	  	else
	  	{
	  		$Dose=$_POST['Dose'];
	  	}

	  	$T_N=$_POST['T_N'];

	  	if(($IDErr == "") AND ($M_NErr == "") AND ($DoseErr == "") )
 		{
	     	$sql2 = "INSERT INTO prescription(P_ID, Test_Name, D_ID, Medicine_Name, Dose, Date)VALUES ('$ID','$T_N', '$D_ID', '$M_N', '$Dose', '$cy')";


	    if ($conn->query($sql2) === TRUE) 
	    {
	      $Data="Prescribed Successfully ";
	    } 
	    else 
	    {
	      $DataBase= "Error: " . $sql2 . "<br>" . $conn->error;
	    }
	}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
   <script src="//code.jquery.com/jquery-1.6.2.min.js"></script>
   <title>Prescription</title>
   <link rel="stylesheet" href="css/sm.css">
   <link rel="stylesheet" href="css/common.css">
   <style type="text/css">
    .label2
    {
      width: 160px;
      display: inline-block;
      /*This Allows to align the label*/
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
			<div class="welcome1" style="float: left;height: 800px">
				<?php include 'Doctor_Reference.php' ?>
			</div>
			<!-- -------------------------------------------------------->
		
			<div class="welcome2 " style="height:650px;padding-bottom: 0px;padding-top: 100px;" align="center">
				
			    <?php include 'ajax.html' ?>

				<div style="padding-top: 20px;">
					<fieldset style="width: 800px;">
						<legend style="color: blue;">Prescribe Medichine</legend>

						<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
							<div style="padding-top: 10px;" align="left">
								<label class="label2">Patient ID</label>
				                :<input type="text" name="ID" value="<?php echo $ID1; ?>" size="20" >
				                <label class="error">*</label><span class="error"><?php echo $IDErr;?></span>
                    		</div>
                    		<hr>
                    		<div style="padding-top: 10px;" align="left">
								<label class="label2">Test Name</label>
				                :<input type="text" name="T_N" value="<?php echo $T_N1; ?>" size="20" >
                    		</div>
                    		<hr>
			                <div style="padding-top: 10px;" align="left">
				                <label class="label2">Medichine Name</label>
				                :<input type="text" name="M_N" value="<?php echo $M_N1; ?>" size="20" >
				                <label class="error">*</label><span class="error"><?php echo $M_NErr;?></span>
                    		</div>
                    		<hr>
				            <div style="padding-top: 10px;" align="left">
				                <label class="label2">Dose</label>
				                :<input type="text" name="Dose" value="<?php echo $Dose1; ?>" size="20" >
				                <label class="error">*</label><span class="error"><?php echo $DoseErr;?></span>
			                </div>
			                <hr>
			                <div style="padding-top: 20px;">
				                <input type="Submit" name="Prescribe">
             					<button id="btn_reload">Reload Page</button>
			                </div>
			                <div style="padding-top: 5px;">
			                	<span class="error"><?php echo $Data;?></span>
			                </div>
		            	</form>
	                </fieldset>
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
	 <script> 
	 	getElementByID('btn_reload').click(function()
       	{
			location.reload(true);
		});
    </script>
</body>
</html>

