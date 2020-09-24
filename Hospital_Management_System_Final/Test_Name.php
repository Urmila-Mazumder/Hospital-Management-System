<?php
   $T_NameArr = array();//to store results
   $T_AmountArr = array();

   $mysqli = new mysqli('localhost', 'root', '', 'hospital_management_system');
   $count=0;
   if($mysqli->connect_errno>0)
   {
     die("Connection to MySQL-server failed!"); 
   }
   //to execute query
   $executingFetchQuery = $mysqli->query("SELECT T_Name, T_Amount FROM Test");
   if($executingFetchQuery)
   {
      while($arr = $executingFetchQuery->fetch_assoc())
      {
         $T_NameArr[] = $arr['T_Name'];//storing values into an array
         $T_AmountArr[] = $arr['T_Amount'];
         $count++;
      }
   }  


   print("<div align=center style=padding-top:50px;>");
   print("<fieldset style=width:700px;>");
   print(" <legend align=center style=color:blue;><b>Test Information</b></legend>");
   print("  <!--  -->
                     <div style=padding:5px;>
                       <label class=label>Test Name</label>          <label class=label>Amount</label> 
                     </div>");
   for ($i=0; $i < $count ; $i++) 
   { 
      print(
               "<form >
               <div align=center > 
               <fieldset>
    
                   <div align=center > 
                     <!--T_Name and T_Amount-->
                     <div style=padding:5px;margin-left:100px;> 
                           <input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$T_NameArr[$i]."'>           <input style=border-top-width:0px;border-bottom-width:0px;border-right-width:0px;border-left-width:0px; type='text'  value='".$T_AmountArr[$i]."'>     
                     </div>

                     </div>

             
             </fieldset>
             </div>                                
             </form>");
   }
    print("</fieldset>");
    print("</div>");
?>