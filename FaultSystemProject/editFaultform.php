<!DOCTYPE html>
<html>
<head>
	<title> New Fault </title>
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<!-- infromation from DB  --> 
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
?>


</head>
<body>

<!-- Login Check -->
<?php isset($_COOKIE["UserID"]) ? $_COOKIE["UserID"] : header("Location: ./"); ?>

<!-- Head Nav Image and text -->
<?php include 'navbar.php'; ?>

<!-- Side Nav Manu -->
<?php include 'sidenavmenu.php'; ?>


    <div style="padding-left: 10%; padding-right: 10%; align-content: center">

        <?php 
        	
        	$categoryOptions = array(
        		'electricity' => 'Electricity',
        		'safetyHazard' => 'Safety Hazard',
        		'toilet' => 'Toilet'
        	);

          $faultID = '0';
          if(@$_GET['id']==true){
            $faultID=$_GET['id'];
            }

            $query = "select * from fault where ID= ".$faultID;
            $run = mysqli_query($conn,$query) or die(mysqli_error());
            $row = mysqli_fetch_array($run);

            $fault_location = isset($row['faultLocation']) ? $row['faultLocation'] : '';
            $fault_category = isset($row['faultCategory']) ? $row['faultCategory'] : '';

            $fault_priority = isset($row['faultPriority']) ? $row['faultPriority'] : '';
            $fault_description = isset($row['faultDescription']) ? $row['faultDescription'] : '';
            $fault_status = isset($row['faultStatus']) ? $row['faultStatus'] : '';
            $serviceman_comments = isset($row['serviceManComments']) ? $row['serviceManComments'] : '';
            $parts_replaced = isset($row['partsReplaced']) ? $row['partsReplaced'] : '';

            $fault_ID = isset($row['ID']) ? $row['ID'] : 'no ID';
            $fault_Date = isset($row['faultDate']) ? $row['faultDate'] : 'no Date';

            $html ='
            <br> <br> <br>

	          	<h3> Fault # '.$fault_ID.' </h3>
				<h3> fault Date '.$fault_Date.' </h3>

				<form action="updateFault.php" method="post" id ="updateForm" >
				<input type="hidden" name="fault_id" value="'.$fault_ID.'">
				<label>Category: </label>
				<select name="category" value='.$fault_category.'required>
											';
				

			//category options - cheack who to select
			//TODO - check why this code fails without @ sign
			foreach ($categoryOptions as $optionKey => $optionVal) {
				$html.= '<option value="'.$optionKey.'" '.($optionKey == $fault_category ? 'selected': '').'>'.$optionVal.'</option>';
			};

			$html.= '
			</select>
			<br>
			<label>Location: </label>
			<input type="text" name="location" value="'.$fault_location.'" required >
			<br>';

        	$priorityOptions = array(
        		'1' => '1',
        		'2' => '2',
        		'3' => '3',
        		'4' => '4',
        		'5' => '5'
        	);

			$html.= '
			<label>Priority: </label>
			<div>
			<label>not very important - </label>';

			foreach ($priorityOptions as $optionKey => $optionVal) {
				$html.= '<input required="r" type="radio" name="Priority"  value="'.$optionKey.'" '.($optionKey == $fault_priority ? 'checked': '').'>'.$optionVal.'';
			};
			$html.= '

			<label> - very important</label>
			</div>
			<label>Description: </label><br>
			<textarea rows="4" cols="50" name="description" form="updateForm" required> '.$fault_description.'  </textarea> <br>

			<label>Serviceman Comments: </label><br>
			<textarea rows="4" cols="50" name="Comments" form="updateForm" required> '.$serviceman_comments.' </textarea>  <br>

			<label>Part replaced: </label><br>
			<textarea rows="4" cols="50" name="replaced" form="updateForm" value="" required> '.$parts_replaced.' </textarea> <br>
            <label>Status: </label>
            <select name="status" value='.$fault_status.' required>
                ';

        	$statusOptions = array(
        		'open' => 'Open',
        		'closed' => 'Close',
        	);

			foreach ($statusOptions as $optionKey => $optionVal) {
				$html.= '<option value="'.$optionKey.'" '.($optionKey == $fault_status ? 'selected': '').'>'.$optionVal.'</option>';
			};

			$html.= '
			</select>
            <br><br>
			<button type="submit" name="submit">Submit</button>
			</form>';
							
			echo $html;
         ?>
	</div> 

	<!-- footer-->
    <?php include 'footer.php'; ?>


</body>
</html>