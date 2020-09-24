<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/common.css">
   </head>
   <body>
   </body>
</html>
<?php  
   require_once 'db_connect.php';
   
   $mysqli = new mysqli('localhost', 'root', '', 'hospital_management_system');
   $count=0;
   if($mysqli->connect_errno>0)
   {
     die("Connection to MySQL-server failed!"); 
   }
   
   $D_IDArr = array();//to store results
   $FeesArr = array();
   $DegreeArr = array();
   $NameArr = array();
   $PhotoArr = array();
   //to execute query
   $executingFetchQuery = $mysqli->query("SELECT D_ID, Fees, Degree FROM Doctor");
   if($executingFetchQuery)
   {
      while($arr = $executingFetchQuery->fetch_assoc())
      {
         $D_IDArr[] = $arr['D_ID'];//storing values into an array
         $FeesArr[] = $arr['Fees'];
         $DegreeArr[] = $arr['Degree'];
         $count++;
      }
   }
   
   for ($i=0; $i < $count ; $i++) 
   { 
   	$ab=$D_IDArr[$i];
   	$sql = "SELECT Name,Photo FROM User WHERE U_ID='".$ab."'";
     	$result = $conn->query($sql);
   
     if ($result->num_rows > 0 ) 
     {
       $row = $result->fetch_assoc(); 
       $NameArr[] = $row['Name']; 
       $PhotoArr[] = $row['Photo']; 
     } 
     else 
     {
         echo "0 results";
     }
   }
   print("<div align=center style=padding-top:50px;>");
   print("<fieldset style=width:700px;>");
   print(" <legend align=center style=color:blue;><b>DOCTOR INFORMATION</b></legend>");
   for ($i=0; $i < $count ; $i++) 
   { 
   	print(
			   	"<form >
			   	<fieldset>
    
                   <div align=left style=float:left;> 
                     <!-- Name -->
                     <div style=padding:5px;>
                       <label class=label>Name</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$NameArr[$i]."'>  
                         
                       
                     </div>
   
                     <hr>
   
                     <!--Fees-->
                     <div style=padding:5px;> 
                         <label class=label>Fees</label> 
                         :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$FeesArr[$i]."'> 
                     </div>
   
                     <hr>
   
                       <!--Degree-->
                       <div style=padding:5px;> 
                         <label class=label>Degree</label> 
                         : <input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$DegreeArr[$i]."'> 
         			    </div>
   
                     </div>
   
                    <div style=float:right;width:200px; height:200px>
                     <img src='".$PhotoArr[$i]."' style=height:100px;width:100px; >
                   </div>
		       <div>
		       </fieldset>                                
		       </form>");
   }
    print("</fieldset>");
    print("</div>");
   ?>