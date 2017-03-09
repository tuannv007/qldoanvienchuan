<?php
    include '../helpers/init.php';
    include '../helpers/app.php';
    include '../helpers/database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 $email = isset($_POST['email']) ? $_POST['email'] : '';
	 $username = isset($_POST['username']) ? $_POST['username'] : '';
	 $password = isset($_POST['password']) ? $_POST['password'] : '';
	 $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
	 $makhoa = isset($_POST['makhoa']) ? $_POST['makhoa'] : '';
	// validate form later
	 $password = md5($password);
	if ($password == md5($confirm_password)) {
	 if (dbCheckExits('admin','email',$email) < 0)

		{
			dbCreate('admin', [
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'makhoa' => $makhoa,
			]);
			redirect(url('admin/login.php'));
		} 
		else
		{
			echo "email da ton tai";
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
	
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link href="<?php echo url(); ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="<?php echo url(); ?>public/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?php echo url(); ?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form"  method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value="">
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" value="">
                                </div>
                            <div class="form-group">
                            	Khoa
                                <select class="form-control" name="makhoa">
                                    <?php 
                                        $sql = "SELECT *FROM khoa";
                                        $query = mysqli_query($link, $sql);
                                        while ($rowKhoa = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $rowKhoa['makhoa']; ?>">
                                            <?php echo $rowKhoa['tenkhoa']; ?>
                                        </option>
                                    <?php
                                        }
                                     ?>
                                </select>
                            </div>
                                <!-- Change this to a button or input when using this as a form -->
                              <input type = "submit" value = "Register" class="btn btn-lg btn-success btn-block"><br/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo url(); ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo url(); ?>public/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo url(); ?>public/dist/js/sb-admin-2.js"></script>
</body>
</html>
