<?php

include "mysql.php";
require  '../vendor/autoload.php';

try{
    $client = new MongoDB\Client("mongodb+srv://Rajeshwari:Rajeshwari2712@mycluster.5w5an3j.mongodb.net/userdb");
    $collection = $client->userdb->admin;

    }catch (Exception $e) {
        echo "Couldn't connected to mongodb atlas";
        echo $e->getMessage();
}


// mongo with redis::

if(isset($_POST['email'])&&isset($_POST['password'])){
    $email=$_POST["email"];
    $password=$_POST["password"];

    // mysql query
    $stmt=$conn->prepare("SELECT * FROM admin WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows > 0){
        while($result->fetch_assoc()){

        }
    }
    // mongo query
    $login = array('email'=>$email,'password'=>$password);
    $result = $collection->findOne($login);
    if($result == null){
        echo json_encode(['status'=>'error']);
    }else{
        $email = $result['email'];
        $password = $result['password'];
        if($password === $password){
            echo json_encode(['status'=>'success']);
        }
    }
}

?>


