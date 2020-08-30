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

<!-- Login Check -->
<?php isset($_COOKIE["UserID"]) ? $_COOKIE["UserID"] : header("Location: ./"); ?>

<!-- Head Nav Image and text -->
<?php include 'navbar.php'; ?>

<!-- Side Nav Manu -->
<?php include 'sidenavmenu.php'; ?>

    <div style="padding-left: 15%; padding-right: 15%; align-content: center">
	<br> <br> <br> <br>
		<h1> Add New Fault </h1>
		<br>

		<form action="insertNewFault.php" method="post" id ="faultForm" > 
			
			<label>Category: </label> <br>
			<select name="category" required>
					<option value=""></option>
					<option value="Electricity">Electricity</option>
					<option value="Safety Hazard">Safety Hazard</option>
					<option value="Toilet">Toilet</option>
					<option value="Computerization">Computerization</option>
					<option value="Fractional">Fractional</option>
					<option value="Other">Other</option>
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
			<br>
			<button type="submit" name="submit" id="submit">Submit</button>
			
		</form>
	</div> 
	<br>
<!-- footer-->
<?php include 'footer.php'; ?>

</body>
</html>