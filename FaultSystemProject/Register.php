<!DOCTYPE html>
<html>
<head>
	<title> insert form value into database </title>
		<link rel="stylesheet" type="text/css" href="nav.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="general.css">
		
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

    	<h1> Add New User </h1>

	<form action="insertUser.php" method="post"> 

		<label>ID: </label><br>
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

		<button type="submit" name="submit">Submit</button>
		
	</form>
	</div>




	<footer id="footer">&copy; YAR</footer>
</body>
</html>