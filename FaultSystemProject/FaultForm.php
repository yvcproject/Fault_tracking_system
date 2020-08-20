<!DOCTYPE html>
<html>
<head>
	<title> New Fault </title>
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="general.css">

    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">


<style>
		#submit{
			border-radius: 8px;
			background-color: #66CDAA;
			padding: 12px 28px;
			font-weight: bold;
			
		}


	</style>


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
  <a href="http://localhost/FaultSystemProject/mainPage.php">Home Page</a>
  <a href="http://localhost/FaultSystemProject/faultForm.php">New Fault</a>
  <a href="http://localhost/FaultSystemProject/reports.php">Reports</a>
  <a href="http://localhost/FaultSystemProject/Register.php">Add New User</a>
</div> 

    <div style="padding-left: 20%; padding-right: 20%; align-content: center">
		<h1> Add New Fault </h1>
		<br>

		<form action="insertNewFault.php" method="post" id ="faultForm" > 
			
			<label>Category: </label> <br>
			<select name="category" required>
					<option value=""></option>
					<option value="electricity">Electricity</option>
					<option value="safetyHazard">Safety Hazard</option>
					<option value="toilet">Toilet</option>
					</select> 
			<br>
			
			<label>Location: </label> <br>
			<input type="text" name="location" required >  
			<br>
		
			<label>Priority: </label> <br> 
			<div>	 
					<label>not very important - </label>
					<input required="r" type="radio" name="Priority"  value="1">1 
					<input required="r" type="radio" name="Priority"  value="2">2
					<input required="r" type="radio" name="Priority"  value="3">3
					<input required="r" type="radio" name="Priority"  value="4">4
					<input required="r" type="radio" name="Priority"  value="5">5
					<label> - very important</label>

			</div>     



			<label>Description: </label> <br>
			<textarea rows="4" cols="50" name="description" form="faultForm" placeholder="Enter Text Here" required></textarea>
			<br>								

			<button type="submit" name="submit" id="submit">Submit</button>
			
		</form>
	</div> 
	





	
	<br>
	<div class="footer" id="footer">
		<p>&copy; YAR 2020</p>

	</div>

</body>
</html>