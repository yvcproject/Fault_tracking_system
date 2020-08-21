<!DOCTYPE html>
<html>
<head>
	<title> New Fault </title>
	<link rel="stylesheet" type="text/css" href="nav.css">
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
  <a class="navbar-brand" href="http://localhost/FaultSystemProject/mainPage.php" style="font-size:30px;cursor:>
    <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    FaultSystemProject - YAR
  </a>
</nav>



<!-- Side Nav Manu -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="http://localhost/FaultSystemProject/mainPage.php">Home Page</a>
  <a href="http://localhost/FaultSystemProject/faultForm.php">New Fault</a>
  <a href="http://localhost/FaultSystemProject/reports.php">Reports</a>
  <a href="http://localhost/FaultSystemProject/Register.php">Add New User</a>
</div> 


    <div style="padding-left: 10%; padding-right: 10%; align-content: center">

        <?php 
        	
        	$categoryOptions = array(
        		'electricity' => 'Electricity',
        		'safetyHazard' => 'Safety Hazard',
        		'toilet' => 'Toilet'
        	);

          $faultID = '0';
          if(@$_GET['id']==true){
            $faultID=$_GET['id'];
            }

            $query = "select * from fault where ID= ".$faultID;
            $run = mysqli_query($conn,$query) or die(mysqli_error());
            $row = mysqli_fetch_array($run);

            $faultlocation = isset($row['faultLocation']) ? $row['faultLocation'] : '';
            $faultCategory = isset($row['faultCategory']) ? $row['faultCategory'] : '';

            $faultCategory = isset($row['faultCategory']) ? $row['faultCategory'] : '';
            $faultCategory = isset($row['faultCategory']) ? $row['faultCategory'] : '';


            $html ="
	          	<h3> Fault # $row[ID] </h3>
				<h3> fault Date $row[faultDate] </h3>
				<form action='UpdateFault.php' method='post' id ='faultForm' >
				<label>Category: </label>
				<select name=\"category\" value=\'$row[faultCategory]\' required>
											";
				

			//category options - cheack who to select
			//TODO - check why this code fails without @ sign
			foreach ($categoryOptions as $optionKey => $optionVal) {
				$html.= '<option value='.$optionKey.''.($optionKey == $faultCategory ? 'selected': '').'>'.$optionVal.'</option>';
			};

			$html.= '
			</select>
			<br>
			<label>Location: </label>
			<input type="text" name="location" value="'.$faultlocation.'" required >
			<br>
			<label>Priority: </label>
			<div>
			<label>not very important - </label>
			<input required="r" type="radio" name="Priority"  value="1">1
			<input required="r" type="radio" name="Priority"  value="2">2
			<input required="r" type="radio" name="Priority"  value="3">3
			<input required="r" type="radio" name="Priority"  value="4">4
			<input required="r" type="radio" name="Priority"  value="5">5
			<label> - very important</label>

			</div>

			<label>Description: </label><br>
			<textarea rows="4" cols="50" name="description" form="faultForm" value="" placeholder="Enter Text Here" required></textarea> <br>

			<select name="status" required>
			<option value="open">open</option>
			<option value="closed">closed</option>
			</select>
			status=closed
			<label>Serviseman Comments: </label><br>
			<textarea rows="4" cols="50" name="Comments" form="faultForm" value="" placeholder="Enter Text Here" required></textarea> <br>

			<label>Part replaced: </label><br>
			<textarea rows="4" cols="50" name="replaced" form="faultForm" value="" placeholder="Enter Text Here" required></textarea> <br>

			<button type="submit" name="submit">Submit</button>
			</form>';
							
			echo $html;
         ?>
	</div> 
	
</body>
</html>