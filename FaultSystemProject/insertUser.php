<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";


$conn = mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])){

	if(!empty($_POST['ID']) && !empty($_POST['firstName'])&& !empty($_POST['lastName'])
    && !empty($_POST['password'])&& !empty($_POST['Role'])&& !empty($_POST['phoneNumber'])){

		$ID =$_POST['ID'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$password = $_POST['password'];
		$Role = $_POST['Role'];
		$phoneNumber = $_POST['phoneNumber'];

		$query = "insert into users (ID, firstName, lastName, userPassword, Role, userPhoneNumber) 
		values ('$ID', '$firstName', '$lastName', '$password', '$Role', '$phoneNumber')";

		$run = mysqli_query($conn,$query) or die(mysqli_error());

		if($run){
			header("Location: ./mainPage.php?msg=User Added Successfully");
		}
}
	else{
		echo"all fields required";
	}

}


?>