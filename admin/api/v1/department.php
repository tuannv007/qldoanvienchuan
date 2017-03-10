<?php
include '../../../helpers/init.php';
include '../../../helpers/app.php';
include '../../../helpers/database.php';
$data = dbGetAll('khoa');
$error = null;
  echo json_encode([
      'code' => 200,
      'message'=> 'Success',
      'error' => $error,
      'data' => $data,
      ]);