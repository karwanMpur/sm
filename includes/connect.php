
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="bag";
date_default_timezone_set("Asia/Baghdad");


// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
mysqli_set_charset($conn,"utf8");

if ($conn) {
    // echo "Connected successfully";
}
else{
    echo'
        <div class="main-wrapper error-wrapper">
            <div class="error-box">
                <h1>404</h1>
                <h3><i class="fa fa-warning"></i> Oops! Page not found!</h3>
                <p>The page you requested was not found.</p>
                <a href="index-2.html" class="btn btn-primary go-home">Go to Home</a>
            </div>
        </div>
    ';
}

 ?>
