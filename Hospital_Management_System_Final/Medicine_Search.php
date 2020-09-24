<?php
	$search = $_GET['key'];

	require_once 'db_connect.php';

	//$search=Sumit;
	
    
    $sql = "SELECT M_ID, Medicine_Name, Disease_Name, Company_Name FROM med_list where Medicine_Name like '%{$search}%'";

	$result = mysqli_query($conn, $sql);
	$count =mysqli_num_rows($result);

	if($count > 0)
	{

		$data = "

        <table border=1>
		 
		<tr>
		    <td colspan=12><center><b>Medicine Details</b></center></td>
		 
		</tr>
		 
		<tr>
		    <td><b><center>M_ID</center></b></td>
			<td><center><b>Medicine Name</b></center></td>
			<td><center><b>Disease Name</b></center></td>
			<td><center><b>Company Name</b></center></td>
			 
		</tr>";

		while($row = mysqli_fetch_assoc($result))
		{
			//--------.=------Is used For Concat Operation---------------------
			$data .= "<tr>
		    <td>{$row['M_ID']}</td>
			<td>{$row['Medicine_Name']}</td>
			<td>{$row['Disease_Name']}</td>
			<td>{$row['Company_Name']}</td>
			
			
			
		 
		</tr>";
		}

		$data .= "</table>";
		echo $data;

	}
	
	else
	{
		echo "Medicine is not found!";
	}
?>