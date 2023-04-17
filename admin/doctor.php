<?php

session_start();

?>


<!DOCTYPE html>
<html>
<head>
	
	<title>Total Doctor</title>
</head>
<body>

	 	<?php 

	     include("../include/header.php");

	     include("../include/connection.php");

	 ?> 

         
         <div class="container-fluid">
         	
         	<div class="col-md-12">
         		<div class="row">
         			<div class="col-md-2 " style="margin-left: -30px;">

         				<?php

                          include("slidenav.php");

         				?>
         				
         			</div>
         			<div class="col-md-10">

         				<h5 class="text-center">Total Doctors</h5>
         				
                          <?php

                          $query = "SELECT *FROM doctors WHERE status = 'Approved' ORDER BY date_reg ASC";

                          $res = mysqli_query($connect,$query);

                           $output = "";


$output .="

         <table class='table table-bordered'>
            <tr>

                  <th>ID</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Country</th>
                  <th>Salary</th>
                  <th>Date Registration</th>
                  <th>Action</th>
                  
           
            </tr>



";


if (mysqli_num_rows($res) <1) {
	
	$output .="

    <tr>
    <td colspan='10' class=''>No Job Request Yet.</td>
    </tr>
    "; 

}

while($row = mysqli_fetch_array($res)){

	$output .="

	  <tr>
	      <td>".$row['id']."</td>
	      <td>".$row['firstname']."</td>
	      <td>".$row['lastname']."</td>
          <td>".$row['username']."</td>
	      <td>".$row['email']."</td>
	      <td>".$row['gender']."</td>
	      <td>".$row['phone']."</td>
	      <td>".$row['country']."</td>
	      <td>".$row['salary']."</td>
	      <td>".$row['date_reg']."</td>
	      <td>

	           <a href='edit.php?id=".$row['id']."'>

	           <button class='btn' style='background-color: #9F8C76;'>Edit</button>


	           </a>

          
	      </td>


	  ";
}


$output .="

     </tr>
     </table>

";

echo $output;
                               


                          ?>

         			</div>
         		</div>
         	</div>
         </div> 


</body>
</html>