<?php
include '../../../helpers/init.php';
include '../../../helpers/app.php';
include '../../../helpers/database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){  
    $email = $_POST['email'];  
    $password = $_POST['password'];  
    $password = md5($password);
    $data = null;
    $error = null;

    if (dbCheckLogin($email, $password)) {
        $sql = "select * from admin where email = '$email' and password = '$password'";
        $result = mysqli_query($link,$sql);
        $data[] = mysqli_fetch_assoc($result);
        echo json_encode([
            'code' => 200,
            'message'=> 'Success',
            'error' => $error,
            'data' => $data,
            ]);
    }
    else 
    {
        if (trim($email) == "") {
            echo json_encode([
           'code' => 442,
           'message'=>'error',
           'error' => 'email not empty',
            'data' => $data,
           ]);
            return;
        }

        if (trim($password) == "") {
            echo json_encode([
           'code' => 442,
           'message'=>'error',
           'error' => 'password not empty',
            'data' => $data,
           ]);
            return;
        }
        echo json_encode([
       'code' => 442,
       'message'=>'error',
       'error' => 'email or password not Success',
        'data' => $data,
       ]);
    } 

}  
