<?php

$html = `

<nav class="navbar navbar-light bg-light">
	 <span style="font-size:30px;cursor:pointer" dir="ltr" onclick="openNav()">&#9776; <?php
echo 'Hello, ' . htmlspecialchars($_COOKIE["FirstName"]) ;
?> </span>
    <a class="navbar-brand" href="./mainPage.php" style="font-size:30px;cursor:">
        FaultSystemProject - YAR
        <img src="YARLOGO.jpg" alt="logo" width="80" height="40" class="d-inline-block align-top" loading="lazy">
    </a>
</nav>  `

echo $html;
?>