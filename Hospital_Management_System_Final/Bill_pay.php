<?php


require_once 'db_connect.php';     
if (isset($_SESSION["id"])) 
{
  $Patient_id=$_SESSION["id"];
  $sql = "SELECT * FROM User WHERE U_ID='".$Patient_id."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    $row = $result->fetch_assoc();
    $Password1 = $row['Password'];    
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

<!DOCTYPE html>
<html>
<head>
  <title>Bill Payment</title>
  <link rel="stylesheet" href="css/common.css">
  <style >
     .label2
    {
      width: 190px;
      display: inline-block;
      /*This Allows to align the label*/
    }
  </style>
   
</head>
<body>


<!-- Login.php -->
  <div align="center">
    <div align="center" class="max_size1">

        <div  class="div1">
          <form  method="post" onsubmit="return form_validation()" action="Bill_pay_confirm_final.php" enctype="multipart/form-data"> 
            
            
            <fieldset align="left" style="width: 850px;height: 250px;">
              
              <legend align="center" style="color: blue;"><b>Bill Payment</b></legend>
               
             
              <div class="Padding5">
                <label class="label2">Patient ID</label>
                :<input type="text" name="pid" id="pid"  value=""  size="50" style="width: 290px;"><label class="error">*</label>
                <span id="pid_msg" class="error"></span>
              </div>
              <hr>

               <div class="Padding5">
                <label class="label2">Password</label>
                :<input type="Password" name="pass" id="pass" value="" size="50" style="width: 290px;"><label class="error">*</label>
                  <span id="pass_msg" class="error"></span>
              </div>

              <hr>
              <!--Date-->
              <div class="Padding5"> 
                      <label class="label2">Due Date</label> 
                      :<input type="text" value="" name="day" id="day" size="3"> / 
                      <input type="text" value="" name="month" id="month" size="3"> /
                      <input type="text" value="" name="year" id="year" size="5">
                      <label class="error">*</label>
                      <label>(dd/mm/yyyy)</label>
              </div>
              <div class="Padding135">
                    <span id="day_msg" class="error"></span>
                    <span id="month_msg" class="error"></span>
                    <span id="year_msg" class="error"></span>
              </div>
              <hr>

              <div style="padding-top: 20px">
                <button type="submit"  name="Change" >Submit</button>
                <input type="reset" value="Reset">
              </div>
             

              </div>
            </fieldset>
          </form>
        </div>  
      
    </div>
  </div>
  
      <script type="text/javascript">
        var P_ID=document.getElementById('pid');
        var Pass=document.getElementById('pass');
        var Day=document.getElementById('day');
        var Month=document.getElementById('month');
        var Year=document.getElementById('year');

        var P_ID1 = <?php echo json_encode($Patient_id); ?>; 
        var Pass1 = <?php echo json_encode($Password1); ?>;
        //---------------------------------------------------------
        function form_validation()
        {
            //-------------------------------------------Patient ID-----------------------
            if(P_ID.value=='' )
            {
              P_ID.style.borderColor="red";
              document.getElementById('pid_msg').innerHTML="Patient ID Can not be Empty";

              return false;
         
            } 

            else if (P_ID.value != P_ID1) 
            {
              P_ID.style.borderColor="red";
              document.getElementById('pid_msg').innerHTML="Entered Wrong ID";

              return false;
          
            }

            else
            {
                P_ID.style.borderColor="green";
                document.getElementById('pid_msg').innerHTML=" ";
               
            }
            
            //------------------------------------------- Password-----------------------     
             if(Pass.value=='' )
            {
              Pass.style.borderColor="red";
              document.getElementById('pass_msg').innerHTML="Password Can not be Empty";

              return false;
         
            } 

            else if (Pass.value != Pass1) 
            {
              Pass.style.borderColor="red";
              document.getElementById('pass_msg').innerHTML="Entered Wrong Password";

              return false;
          
            }

            else
            {
                Pass.style.borderColor="green";
                document.getElementById('pass_msg').innerHTML=" ";
               
            }
            //-------------------------------------------Due Date-----------------------
            //-------------------------------------------Day-----------------------
            if(Day.value=='' )
            {
              Day.style.borderColor="red";
              document.getElementById('day_msg').innerHTML="Day Can not be Empty";

              return false;
         
            } 

            else if (Day.value > "31") 
            {
              Day.style.borderColor="red";
              document.getElementById('day_msg').innerHTML="Entered Wrong day";

              return false;
          
            }

            else
            {
                Day.style.borderColor="green";
                document.getElementById('day_msg').innerHTML=" ";
               
            }
            //-------------------------------------------month-----------------------
            if(Month.value=='' )
            {
              Month.style.borderColor="red";
              document.getElementById('month_msg').innerHTML="Month Can not be Empty";

              return false;
         
            } 

            else if (Month.value > "12") 
            {
              Month.style.borderColor="red";
              document.getElementById('month_msg').innerHTML="Entered Wrong month";

              return false;
          
            }

            else
            {
                Month.style.borderColor="green";
                document.getElementById('month_msg').innerHTML=" ";
               
            }
            //-------------------------------------------year-----------------------
            if(Year.value=='' )
            {
              Year.style.borderColor="red";
              document.getElementById('year_msg').innerHTML="Year Can not be Empty";

              return false;
         
            } 

            else if (Year.value > "2020") 
            {
              Year.style.borderColor="red";
              document.getElementById('year_msg').innerHTML="Entered Wrong year";

              return false;
          
            }

            else
            {
                Year.style.borderColor="green";
                document.getElementById('year_msg').innerHTML=" ";
               
            }
            return true;
        }

      </script>
</body>
</html>

