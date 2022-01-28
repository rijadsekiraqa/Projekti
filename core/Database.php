<?php 

define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'webprojekti1');


$connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

if(!$connection){
    echo 'Error: Could not connect ' . mysqli_connect_error(); 
}

?>