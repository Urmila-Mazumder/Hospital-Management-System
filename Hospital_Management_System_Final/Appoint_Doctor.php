<?php session_start();?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/common.css">
      <link rel="stylesheet" href="css/sm.css">
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
   $TimeArr = array();
   $NameArr = array();
   $NumberArr = array();
   $EmailArr = array();
   $PhotoArr = array();
   //to execute query
   $executingFetchQuery = $mysqli->query("SELECT D_ID, Fees, Degree, ATime FROM Doctor");
   if($executingFetchQuery)
   {
      while($arr = $executingFetchQuery->fetch_assoc())
      {
         $D_IDArr[] = $arr['D_ID'];//storing values into an array
         $FeesArr[] = $arr['Fees'];
         $DegreeArr[] = $arr['Degree'];
         $TimeArr[] = $arr['ATime'];
         $count++;
      }
   }
   
   for ($i=0; $i < $count ; $i++) 
   { 
    $ab=$D_IDArr[$i];
    $sql = "SELECT Name,Email,Mobile,Photo FROM User WHERE U_ID='".$ab."'";
      $result = $conn->query($sql);
   
     if ($result->num_rows > 0 ) 
     {
       $row = $result->fetch_assoc(); 
       $NameArr[] = $row['Name']; 
       $EmailArr[] = $row['Email']; 
       $NumberArr[] = $row['Mobile']; 
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
          "<form method=post >
          <fieldset>
                    
                   <div align=left style=float:left;>

                       <!-- ID -->
                   
                       <input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text' name=id value='".$D_IDArr[$i]."' hidden>  
                         

                     <!-- Name -->
                     <div style=padding:5px;>
                       <label class=label>Name</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$NameArr[$i]."'>  
                         
                       
                     </div>
   
                     <hr>

                     <!-- Email -->
                     <div style=padding:5px;>
                       <label class=label>Email</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$EmailArr[$i]."'>  
                         
                       
                     </div>
   
                     <hr>

                     <!-- Mobile -->
                     <div style=padding:5px;>
                       <label class=label>Mobile</label>
                       :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$NumberArr[$i]."'>  
                         
                       
                     </div>
   
                     <hr>
   
                       <!--Degree-->
                       <div style=padding:5px;> 
                         <label class=label>Degree</label> 
                         : <input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$DegreeArr[$i]."'> 
                      </div>

                      <hr>
                       <!--Fees-->
                     <div style=padding:5px;> 
                         <label class=label>Fees</label> 
                         :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$FeesArr[$i]."'> 
                     </div>
   
                     <hr>

                      <!--Time-->
                     <div style=padding:5px;> 
                         <label class=label>Time</label> 
                         :<input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$TimeArr[$i]."'> 
                     </div>
                 
                        
                     </div>
   
                    <div style=float:right;width:200px; height:200px>
                      <div>
                        <img src='".$PhotoArr[$i]."' style=height:100px;width:100px; >
                      </div>

                      <div>
                        <button type=submit class=button  name=Login >Appointment</button>
                      </div>
                   </div>


           <div>

           </fieldset>                                
           </form>");
   }
    print("</fieldset>");
    print("</div>")
   ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
  if(isset(($_POST['Login'])))
  {
    //echo $_POST['id'];
    $_SESSION["D_ID"] = $_POST['id'];
    echo '<script type="text/javascript">window.location.href="Appoint_Time_final.php";</script>';
  }
}
?>