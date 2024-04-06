<?php

require '../config.php';

function error422($message){
    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Method Not Allowed");
    echo json_encode($data);
    exit();
}
function storeCustomer($cutomerInput){
    global $conn;

    $user_id=mysqli_real_escape_string($conn,$cutomerInput['user_id']);
    $username=mysqli_real_escape_string($conn,$cutomerInput['username']);
    $email=mysqli_real_escape_string($conn,$cutomerInput['email']);
    $password=mysqli_real_escape_string($conn,$cutomerInput['password']);
    $user_type=mysqli_real_escape_string($conn,$cutomerInput['user_type']);

    if(empty(trim($user_id))){
        return error422("Enter Your user ID");
    }elseif(empty(trim($username))){
        return error422("Enter Your Username");
    }elseif(empty(trim($email))){
        return error422("Enter Your Email");
    }elseif(empty(trim($password))){
        return error422("Enter Your Password");
    }elseif(empty(trim($user_type))){
        return error422("Enter Your user Type");
    }else{
        $query ="INSERT INTO users(user_id,username,email,password,user_type) VALUES('$user_id','$username','$email','$password','$user_type')";
        $result=mysqli_query($conn,$query);

        if($result){
            $data = [
                'status' => 201,
                'message' => 'User Create Successfully',
            ];
            header("HTTP/1.0 201 Created");
            echo json_encode($data); 
        }else{
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error',
            ];
            header("HTTP/1.0 500 Method Not Allowed");
            echo json_encode($data); 
        }
    }
    
}
function getCustomerList(){
   global $conn;

   $query ="SELECT user_id,username,email,user_type,balance,placed_on FROM users";
   $query_run= mysqli_query($conn,$query);

   if($query_run){
        if(mysqli_num_rows($query_run)>0){
            $res =mysqli_fetch_all($query_run,MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'User List Fetched Sucessfully',
                'data'=>$res
            ];
            header("HTTP/1.0 200 Success");
            echo json_encode($data);
        }else{
            $data = [
                'status' => 404,
                'message' => 'No User Found',
            ];
            header("HTTP/1.0 404 No User Found");
            echo json_encode($data);
        }

   }
   else{
    $data = [
        'status' => 500,
        'message' => 'Internal Server Error',
    ];
    header("HTTP/1.0 500 Method Not Allowed");
    echo json_encode($data); 
   }

}


?>