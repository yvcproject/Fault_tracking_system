<?php
$name = isset($_COOKIE["FirstName"]) ? $_COOKIE["FirstName"] : '';

echo '

    <script src="nav.js"></script>
    <div style= "z-index: 999;">
    <nav class="navbar navbar-light bg-light navbar" style="  top: 0; width: 100%;">

    <div>
	 <span style="font-size:30px;cursor:pointer z-index: 999; " dir="ltr" onclick="openNav()">&#9776;
    Hello, '.$name.'



    </span>

 <button style="margin-left: 30px;"
         onclick="location.href='."'index.php'".'";>Log out</button>

 </div>
    <a class="navbar-brand" href="./mainPage.php" style="font-size:30px;cursor:">
        FaultSystemProject - YAR
        <img src="YARLOGO.jpg" alt="logo" width="80" height="40" class="d-inline-block align-top" loading="lazy">
    </a>
</nav>
</div>
';
?>