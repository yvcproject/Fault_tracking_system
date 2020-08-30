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

<!-- Head Nav Image and text -->
<?php include 'navbar.php'; ?>

<!-- Side Nav Manu -->
<?php include 'sidenavmenu.php'; ?>
        
    <div style="padding-left: 15%; padding-right: 15%; align-content: center">
		<br> <br> <br> <br>
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
<!-- footer-->
<?php include 'footer.php'; ?>


</body>
</html>