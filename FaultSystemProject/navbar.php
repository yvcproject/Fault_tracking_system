<?php
$name = isset($_COOKIE["FirstName"]) ? $_COOKIE["FirstName"] : '';

echo '
    <script src="nav.js"></script>
    <nav class="navbar navbar-light bg-light navbar" style="  top: 0;position: fixed; width: 100%;">
	 <span style="font-size:30px;cursor:pointer" dir="ltr" onclick="openNav()">&#9776;
    Hello, '.$name.'
    </span>

    <a class="navbar-brand" href="./mainPage.php" style="font-size:30px;cursor:">
        FaultSystemProject - YAR
        <img src="YARLOGO.jpg" alt="logo" width="80" height="40" class="d-inline-block align-top" loading="lazy">
    </a>
</nav>

';
?>