<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";

$conn = mysqli_connect($server,$username,$password,$dbname);



if(isset($_POST['submit'])){

	if    (!empty($_POST['fault_id']) && !empty($_POST['category'])&& !empty($_POST['location'])
	    && !empty($_POST['Priority']) && !empty($_POST['description']) && !empty($_POST['Comments'])
	    && !empty($_POST['replaced']) && !empty($_POST['status'])





	){

		$faultid = $_POST['fault_id'];
		$category = $_POST['category'];
		$location = $_POST['location'];
		$Priority = $_POST['Priority'];
		$description = $_POST['description'];
		$Comments = $_POST['Comments'];
		$replaced = $_POST['replaced'];
	    $status = $_POST['status'];
		$CloseDate = date('yy-m-d');

		$query = "update fault
		          set
		            faultCategory = '$category',
		            faultLocation = '$location',
		            faultDescription = '$description',
		            faultStatus = '$status',
		            ";
		            if ($status=='closed'){
		            $query.= " faultClosedDate = '$CloseDate', ";
		            }
		$query.=   "faultPriority = '$Priority',
		            serviceManComments = '$Comments',
		            partsReplaced = '$replaced'
		          where
		            ID=$faultid;
		            ";


		$run = mysqli_query($conn,$query) or die(mysqli_error());

		if($run){
			echo "From submitted successfully";
            header("Location: ./mainPage.php?msg=update successfully");
		}
		else{
			echo "Form not submitted";
			header("Location: ./mainPage.php?msg=Not updated !!!");
    	}
	}
	else{
		echo"all fields required";
	}
}
?>