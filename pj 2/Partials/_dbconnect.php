<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "user";


$conn = mysqli_connect($server , $username , $password ,$database);
if($conn){
    
}
else{
    echo "Error occured" .mysqli_connect_error($conn);
}

?>