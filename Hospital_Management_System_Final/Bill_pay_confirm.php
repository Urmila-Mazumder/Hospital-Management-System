<?php
  $Day=$_POST["day"];
  $Month=$_POST["month"];
  $Year=$_POST["year"];
  $Date=$Day."-".$Month."-".$Year;
  $_SESSION["Date"]=$Date;
  //echo $Date;
  require_once 'db_connect.php';     
  if (isset($_SESSION["id"])) 
  {
    $Patient_id=$_SESSION["id"];
    //echo $Patient_id;
    $sql = "SELECT * FROM Bill WHERE P_ID='".$Patient_id."' and Date = '".$Date."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
      $row = $result->fetch_assoc();
      //$Fees = $row['Fees'];    
    } 
    else 
    {
      echo '<script type="text/javascript">window.location.href="Bill_Page_Error.php";</script>';
    }

    $conn->close();
  }
  else
  {
     echo '<script type="text/javascript">window.location.href="Welcome.php";</script>';
  }
  //echo $Fees;
     
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/common.css">
	<style type="text/css">
		.label2
	    {
	      width: 150px;
	      display: inline-block;
	      /*This Allows to align the label*/
	    }
	</style>
	<title>Bill Pay confirm</title>
</head>
<body>
<div align="center">
    <div align="center" class="max_size1">

        <div  class="div1">
	      <form  method="post" onsubmit="return form_validation()" action="Bill.php"> 
            
            
            <fieldset align="left" style="width: 850px;height: 250px;">
              
              <legend align="center" style="color: blue;"><b>Bill Payment Confirm</b></legend>
               
             
              <div class="Padding5">
                <label class="label2">Appointment Amount</label>
               	:<span style="padding-right: 50px;"><label >
                     <?php 
                       echo $row["D_Amount"];
                    ?>
                     Tk
                </label></span>

              
                  
              </div>

              <fieldset align="left">
              
              	<legend align="center" style="color: Green;"><b>Bkash Payment</b></legend>
              	<div class="Padding5">
	                <label class="label2">Bkash Number</label>
	                :<input type="text" name="bnum" id="bnum"    size="50" style="width: 290px;"><label class="error">*</label>
	                <span id="bnum_msg" class="error"></span>
              	</div>
              	<hr>


                <div class="Padding5">
                  <label class="label2">Bkash Pin</label>
                  :<input type="Password" name="bpin" id="bpin"  size="50" style="width: 290px;"><label class="error">*</label>
                    <span id="bpin_msg" class="error"></span>
                    <!-- <span id="bpin" class="error"></span> -->
                </div>
                <hr>

                <div style="padding-top: 20px">
                 <button type="submit"  name="Change" >Pay Fees</button>
                </div>
             </fieldset>

              </div>
            </fieldset>
          </form>
    	 </div>  
    </div>
  </div>
  <script type="text/javascript">
        var B_Num=document.getElementById('bnum');
        var B_Pin=document.getElementById('bpin');
        var phoneno = /^\d{11}$/;
        var Pin = /^\d{5}$/;
        var n = B_Pin.length;
        //document.write(n.value);
        //document.getElementById('bpin').innerHTML=n;
        //---------------------------------------------------------
        function form_validation()
        {
            //-------------------------------------------Bkash number-----------------------
            if(B_Num.value=='' )
            {
              B_Num.style.borderColor="red";
              document.getElementById('bnum_msg').innerHTML="Bkash number Can not be Empty";
              return false;
            } 
            else
            {
                B_Num.style.borderColor="green";
                document.getElementById('bnum_msg').innerHTML=" ";
            }
            if(B_Num.value.match(phoneno))
            {
                B_Num.style.borderColor="green";
                document.getElementById('bnum_msg').innerHTML=" ";
            }
            else
            {
              B_Num.style.borderColor="red";
              document.getElementById('bnum_msg').innerHTML="Enter Valid Phone Number which has 11 Digit";
              return false;
            }
           
            
            //------------------------------------------- Bkash pin-----------------------     
             if(B_Pin.value=='' )
            {
              B_Pin.style.borderColor="red";
              document.getElementById('bpin_msg').innerHTML="Bkash pin Can not be Empty";
              return false;
            } 
            else if(B_Pin.value.match(Pin) )
            {
              B_Pin.style.borderColor="green";
              document.getElementById('bpin_msg').innerHTML=" ";
            }
            else
            {
              B_Pin.style.borderColor="red";
              document.getElementById('bpin_msg').innerHTML="Enter Valid Bkash Pin which has 5 Digit";
              return false;
            }

           

            
            
            return true;
        }

      </script>
</body>
</html>