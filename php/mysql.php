<?php

// $conn=new mysqli("localhost","root","root","mydb");
// remote database:
$host="remotemysql.com";
$db="bYNofZPkBu";
$user="bYNofZPkBu";
$pass="j19Ph8ZiSK";
$conn=new mysqli("remotemysql.com","bYNofZPkBu","j19Ph8ZiSK","bYNofZPkBu");
if(!$conn){
    echo "Connection Denied!" . mysqli_connect_error();
}

?>