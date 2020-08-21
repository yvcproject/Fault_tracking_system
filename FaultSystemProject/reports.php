<!DOCTYPE html>
<html>
<head>
	<title> Reports </title>
		<link rel="stylesheet" type="text/css" href="nav.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="general.css">

</head>
<body >
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




<div>
  <form>
    
      <input type = "button" value = "Print" onclick = "window.print()" />
  </form> 



</div>



















  <br>
    <div class="footer" id="footer">
      <p>&copy; YAR 2020</p>

    </div>

</body>
</html>