<!DOCTYPE html>
<html>
<head>
	<title> insert form value into database </title>

		<link rel="stylesheet" type="text/css" href="nav.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="general.css">

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

    	<h1> Add New User </h1>
		<br>

	<form action="insertUser.php" method="post"> 

		<label style="bold">ID: </label><br>
		<input type="text" name="ID" required>
		<br>

		<label>First Name: </label><br>
		<input type="text" name="firstName" required>
		<br>

		<label>Last Name: </label><br>
		<input type="text" name="lastName" required>
		<br>

		<label>Password: </label><br>
		<input type="password" name="password" required>
		<br>

		<label>Role: </label> <br>
		<select name="Role" required>
				<option value=""></option>
			    <option value="Student">Student</option>
			    <option value="Staff">Staff</option>
			    <option value="Management">Management</option>
			    <option value="serviceMan">Service Man</option>
			    </select>
		<br>

		<label>Phone Number: </label><br>
		<input type="text" name="phoneNumber" required>
		<br>
		<br>

		<button type="submit" name="submit" id="submit">Submit</button>
		
	</form>
	</div>




	<br>
	<div class="footer">
		<p>&copy; YAR 2020</p>

	</div>


</body>
</html>