<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "faultsystem";
$conn = mysqli_connect($server,$username,$password,$dbname);
?>
 </head>
<body style="padding-left: 10%; padding-right: 10%; align-content: center">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <?php  
        echo "<h1 style=\"text-align:start;\">Hello, rotem</h1>";
        echo "<table class=\"table table-striped table-bordered\" style=\"margin-left: auto; margin-right: auto; \">";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope=\"col\">ID</th>";
        echo "<th scope=\"col\">Date</th>";
        echo "<th scope=\"col\">Location</th>";
        echo "<th scope=\"col\">Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		$query = "select * from fault";

		$run = mysqli_query($conn,$query) or die(mysqli_error());

		if($run){
         while($row = mysqli_fetch_array($run)) 
         {
            echo "<tr>";
            echo "<td> $row[ID]</td>";
            echo "<td> $row[faultDate]</td>";
            echo "<td> $row[faultLocation]</td>";
             echo "<td> $row[faultStatus]</td>";
          
            echo "</tr>";
         }
        }
       echo "</table>"
            

?>