<?php

include "config.php";
include "mysql.php";

// mysql query
$del=$_GET['del'];
$query = $conn->prepare("DELETE FROM users WHERE email=?");
$query->bind_param("s",$del);
$query->execute();

// mongo query
$delete = $collection->deleteOne(["email"=>$del]);

header("location:admin-dash.php");

?>