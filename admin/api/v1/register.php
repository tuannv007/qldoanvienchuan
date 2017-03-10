<?php
    include '../../../helpers/init.php';
    include '../../../helpers/app.php';
    include '../../../helpers/database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 $email = isset($_POST['email']) ? $_POST['email'] : '';
	 $username = isset($_POST['username']) ? $_POST['username'] : '';
	 $password = isset($_POST['password']) ? $_POST['password'] : '';
	 $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
	 $makhoa = isset($_POST['makhoa']) ? $_POST['makhoa'] : '';
	 $data= null;
	 $error = null;

	 if (!isEmail($email)) {
	 	echo json_encode([
	            'code' => 422,
	            'message'=> 'error',
	            'error' => 'email invalidate',
	            'data' => $data,
            ]);
	 	return;
	 }
	  if (md5($password) == '') {
	 	echo json_encode([
	            'code' => 422,
	            'message'=> 'error',
	            'error' => 'password not empty',
	            'data' => $data,
            ]);
	 	return;
	 }
	 if (strlen($password) < 6) {
	 	echo json_encode([
	            'code' => 422,
	            'message'=> 'error',
	            'error' => 'length min password 6 charater',
	            'data' => $data,
            ]);
	 	return;
	 }
	 if(md5($confirm_password) == '') {
	 	echo json_encode([
	            'code' => 422,
	            'message'=> 'error',
	            'error' => 'confirm_password not empty',
	            'data' => $data,
            ]);
	 	return;
	 }
	if (md5($password) == md5($confirm_password)) {
	 if (dbCheckExits('admin','email',$email))
		{
			dbCreate('admin', [
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'makhoa' => $makhoa,
			]);
			$sql = "select * from admin where email = '$email' and password = '$password'";
        	$result = mysqli_query($link,$sql);
        	$data[] = mysqli_fetch_assoc($result);
			echo json_encode([
	            'code' => 200,
	            'message'=> 'success',
	            'error' => $error,
	            'data' => $data,
            ]);
		} 
		else
		{
			echo json_encode([
	            'code' => 422,
	            'message'=> 'error',
	            'error' => 'email exits database',
	            'data' => $data,
            ]);
		}
	}
	else{
		echo json_encode([
	            'code' => 422,
	            'message'=> 'error',
	            'error' => ' confirm_password not success',
	            'data' => $data,
            ]);
	}

	
	
}
