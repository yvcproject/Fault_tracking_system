<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";
$conn = mysqli_connect($server,$username,$password,$dbname);



if(isset($_POST['submit'])){

	if(!empty($_POST['ID']) && !empty($_POST['pwd'])){

        echo 12323;
		$ID = $_POST['ID'];
		$pwd = $_POST['pwd'];

		$query = "select * from users where ID='$ID'";

		$result = mysqli_query($conn,$query) or die(mysqli_error());
        $my_array = $result->fetch_assoc();
        

        
		if($result){
                   
                    $IDdb = $my_array["ID"];
                    $passdb = $my_array["userPassword"];
                    $roledb = $my_array["Role"];
                    $FirstName = $my_array["firstName"];
            
                    if ($ID==$IDdb && $pwd==$passdb){
                                    
                    $cookie_name = "UserID";
                    $cookie_value = $IDdb;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                    
                    $cookie_name = "FirstName";
                    $cookie_value = $FirstName;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                    
                    if ($roledb == "Student" || $roledb == "Staff"){
                    $cookie_name = "Permission";
                    $cookie_value = 1;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                    }
                    
                    if ($roledb == "serviceMan"){
                    $cookie_name = "Permission";
                    $cookie_value = 2;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                    }
                    
                    if ($roledb == "Management"){
                    $cookie_name = "Permission";
                    $cookie_value = 3;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                    }
                    
                    header("Location: ./mainPage.php");
                        
                    }

            else{
                    header("Location: index.php?msg=Invalid Username or Password");
            }
        
			
		}
 

    
}
}

?>