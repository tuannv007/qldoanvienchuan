<?php
include '../../../helpers/init.php';
include '../../../helpers/app.php';
include '../../../helpers/database.php';
	
	$makhoa = $_GET['makhoa'];
	$sql = "select * from lop where makhoa = $makhoa";
	$result = mysqli_query($link, $sql);
	$data = [];
	while ($item = mysqli_fetch_assoc($result)) {
		$data[] = $item;
	}
	$error = null;
  	echo json_encode([
      'code' => 200,
      'message'=> 'Success',
      'error' => $error,
      'data' => $data,
      ]);