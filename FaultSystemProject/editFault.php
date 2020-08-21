<!DOCTYPE html>
<html>
<head>
	<title> New Fault </title>
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="general.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<!-- infromation from DB  --> 
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
?>


</head>
<body>
    
    <script src="nav.js"></script>

<!-- Head Nav Image and text -->
<nav class="navbar navbar-light bg-light">
	 <span style="font-size:30px;cursor:pointer" dir="ltr" onclick="openNav()">&#9776; <?php
echo 'Hello, ' . htmlspecialchars($_COOKIE["FirstName"]) ;
?> </span>
  <a class="navbar-brand" href="http://localhost/FaultSystemProject/mainPage.php" style="font-size:30px;cursor:">
      FaultSystemProject - YAR
    <img src="YARLOGO.jpg" alt="logo" width="80" height="40" class="d-inline-block align-top" loading="lazy">
  </a>
</nav>



<!-- Side Nav Manu -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="./mainPage.php">Home Page</a>
  <a href="./faultForm.php">New Fault</a>
  <a href="./reports.php">Reports</a>
  <a href="./Register.php">Add New User</a>
</div> 


    <div style="padding-left: 10%; padding-right: 10%; align-content: center">

        <?php 
          $faultID = '0';
          if(@$_GET['id']==true){
            $faultID=$_GET['id'];
            }

            $query = "select * from fault where ID= ".$faultID;
            $run = mysqli_query($conn,$query) or die(mysqli_error());
            $row = mysqli_fetch_array($run);

          	echo "<h3> Fault # $row[ID] </h3>";
			echo "<h3> fault Date $row[faultDate] </h3>";
			echo '<form action="UpdateFault.php" method="post" id ="faultForm" >';
			echo '<label>Category: </label>';
			echo "<select name=\"category\" value=\"$row[faultCategory]\" required>";
			echo '<option value=""></option>';
			if($row[faultCategory]== electricity){
				echo '<option value="electricity" selected>Electricity</option>';
			}
			else{
				echo '<option value="electricity">Electricity</option>';
				if($row[faultCategory]== safetyHazard){
					echo '<option value="safetyHazard" selected>Safety Hazard</option>';
					echo '<option value="toilet">Toilet</option>';
				}
				else{
					echo '<option value="safetyHazard">Safety Hazard</option>';
					echo '<option value="toilet" selected>Toilet</option>';
				}
			}

			echo '</select>';
			echo '<br>';
			echo '<label>Location: </label>';
			echo '<input type="text" name="location" value="" required >';
			echo '<br>';
			echo '<label>Priority: </label>';
			echo '<div>';
			echo '<label>not very important - </label>';
			echo '<input required="r" type="radio" name="Priority"  value="1">1';
			echo '<input required="r" type="radio" name="Priority"  value="2">2';
			echo '<input required="r" type="radio" name="Priority"  value="3">3';
			echo '<input required="r" type="radio" name="Priority"  value="4">4';
			echo '<input required="r" type="radio" name="Priority"  value="5">5';
			echo '<label> - very important</label>';
			echo '';
			echo '</div>';
			echo '';
			echo '<label>Description: </label><br>';
			echo '<textarea rows="4" cols="50" name="description" form="faultForm" value="" placeholder="Enter Text Here" required></textarea> <br>';
			echo '';
			echo '';
			echo '<select name="status" required>';
			echo '<option value="open">open</option>';
			echo '<option value="closed">closed</option>';
			echo '</select>';
			echo 'status=closed';
			echo '<label>Serviseman Comments: </label><br>';
			echo '<textarea rows="4" cols="50" name="Comments" form="faultForm" value="" placeholder="Enter Text Here" required></textarea> <br>';
			echo '';
			echo '<label>Part replaced: </label><br>';
			echo '<textarea rows="4" cols="50" name="replaced" form="faultForm" value="" placeholder="Enter Text Here" required></textarea> <br>';
			echo '';
			echo '<button type="submit" name="submit">Submit</button>';
			echo '';
			echo '</form>';


















         ?>
	</div> 
	
	
	<br>
	<div class="footer" id="footer">
		<p>&copy; YAR 2020</p>

	</div>

</body>
</html>