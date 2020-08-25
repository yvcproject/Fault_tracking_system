<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";



$conn = mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])){

	if(!empty($_POST['category']) && !empty($_POST['location'])&& !empty($_POST['description'])){

		$ID = htmlspecialchars($_COOKIE["UserID"]);
		$category = $_POST['category'];
		$priority = $_POST['Priority'];
		$location = $_POST['location'];
		$description = $_POST['description'];
		$Date = date('yy-m-d'); 
		$status = "open";

		$query = "insert into fault (faultDate,faultCategory,faultLocation,faultDescription,faultOpenBy,faultStatus,faultPriority) 
		values ('$Date', '$category', '$location', '$description', '$ID', '$status','$priority')";


		$run = mysqli_query($conn,$query) or die(mysqli_error());
		

		if($run){
             header("Location: ./mainPage.php?msg=Fault Added Successfully");
		}
	}


	else{
		echo"all fields required";
	}

}


?>