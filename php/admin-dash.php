<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin-dash.css"> 
</head>
<body>
<div class="background"></div>
    <h3>ADMIN PANEL</h3>
    <a class='ancher' href="../index.html">Back to Home</a>
</body>
</html>

<?php

include "config.php";
include "mysql.php";

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])  && isset($_POST['password'])  && isset($_POST['mobile']) && isset($_POST['dob'])){
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$mobile =trim($_POST['mobile']);
$dob = trim($_POST['dob']);
}
$query = $conn->prepare("SELECT fname,lname,email,password,mobile,dob FROM users");
$query->execute();
$row=$query->get_result();
if($row->num_rows)
    echo "<div class='container table-responsive'>";
    echo "<table class='table table-bordered table-condensed'>";
    echo "<tr class='success'>"; 
    echo "<th>S.NO</th>";
    echo "<th>FirstName</th>";
    echo "<th>LastName</th>";
    echo "<th>Email</th>";
    echo "<th>Password</th>";
    echo "<th>Mobile</th>";
    echo "<th>DOB</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
    $i=0;
    $qry=array();
    $result=$collection->find($qry);
    foreach($result as $retrive){
        while($retrive=$row->fetch_assoc()){
        $fname=$retrive['fname'];
        $lname=$retrive['lname'];
        $email=$retrive['email'];
        $password=$retrive['password'];
        $mobile=$retrive['mobile'];
        $dob=$retrive['dob'];
        $myJSON = json_encode($retrive);

        $user = new stdClass();
        $user->fname=$fname;
        $user->lname=$lname;
        $user->email=$email;
        $user->password=$password;
        $user->mobile=$mobile;
        $user->dob=$dob;
        $myJSON = json_encode($user);
        echo "<tr>";
        echo "<td>".$i=$i+1;"</td>";
        echo "<td>$fname</td>";
        echo "<td>$lname</td>";
        echo "<td>$email</td>";
        echo "<td>$password</td>";
        echo "<td>$mobile</td>";
        echo "<td>$dob</td>";
        echo "<td><a href='edit-admin.php?user_email=$email'><button>Edit</button></a></td>";  
        echo "<td><a href='delete-admin.php?del=$email'><button>Delete</button></a></td>";
        echo "</tr>";
    }
}

?>


