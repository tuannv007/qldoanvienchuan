<?php


define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'quanlydoanvien3');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

$link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE)
	or die("can't connect this database");


function dbCheckLogin($email, $password)
{
	global $link;

	//
	echo $sql = "select * from admin where email = '$email' and password = '$password'";
	$result = mysqli_query($link, $sql);


	if (mysqli_num_rows($result) > 0) {
		echo 'dung';
		return mysqli_fetch_assoc($result);
	} else {
		echo 'sai';
		return false;
	}
}

function dbGetAll($tableName)
{
	global $link;

	$sql = "select * from $tableName";
	$result = mysqli_query($link, $sql);

	while ($item = mysqli_fetch_assoc($result)) {
		$items[] = $item;
	}

	return isset($items) ? $items : [];
}

function dbFind($tableName, $id, $key = 'id')
{
	global $link;

	$sql = "select * from $tableName where $key = '$id'";

	$result = mysqli_query($link, $sql);

	return mysqli_fetch_assoc($result);
}

function dbCreate($tableName, array $data)
{
	global $link;

	foreach ($data as $k => $v) {
		$columns[] = $k;
		$values[] = "'$v'";
	}

	$columns = implode(',', $columns);
	$values = implode(',', $values);

	  $sql = "insert into $tableName($columns) values($values)";
	return mysqli_query($link, $sql);
}

function dbUpdate($tableName, $id, array $data, $key = 'id')
{
	global $link;

	foreach ($data as $column => $value) {
		$data[$column] = "$column = '$value'";
	}

	$data = implode(', ', $data);

	 $sql = "update $tableName set $data where $key = $id";
	return mysqli_query($link, $sql);

}
function dbUpdateSUbkect($malop,$tenlop,$makhoa,$nienkhoa,$id){
	global $link;
	 $sql = "update  lop set malop = '$malop' , tenlop = '$tenlop' , makhoa = $makhoa,nienkhoa = $nienkhoa where id = $id";
	$result = mysqli_query($link, $sql);

	while ($item = mysqli_fetch_assoc($result)) {
		$items[] = $item;
	}

	return isset($items) ? $items : [];
}
function dbDelete($tableName, $id, $key = 'id')
{
	global $link;

	$sql = "delete from $tableName where $key = '$id'";

	return mysqli_query($link, $sql);
}
function dbCheckExits($tableName,$key,$value)
{
	global $link;
	 $sql = "select * from $tableName where $key = '$value'";
	 $result = mysqli_query($link, $sql);
	if (mysqli_num_rows($result) !=0 ) {
	 	# code...
	 	return false;
	 } 
	 else return true;
}
function getDataWithSelection($nienkhoa,$makhoa){
	global $link;
	echo $sql = "select lop.id, malop,tenlop,tenkhoa,tennienkhoa from lop,nienkhoa,khoa where lop.nienkhoa= $nienkhoa and lop.makhoa = $makhoa and lop.makhoa = khoa.id";
	$result = mysqli_query($link, $sql);

	while ($item = mysqli_fetch_assoc($result)) {
		$items[] = $item;
	}

	return isset($items) ? $items : [];
}
function isEmail($email){
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  return true;
	} else {
	  return false;
	}
}
function getSubjectIntDepartment($makhoa,$nienkhoa,$malop){
	global $link;
	$sql = "select * from sinhvien where makhoa = '$makhoa' and nienkhoa = '$nienkhoa' and malop = '$malop'";
	$result = mysqli_query($link, $sql);

	while ($item = mysqli_fetch_assoc($result)) {
		 $items[] = $item;
	}

	return isset($items) ? $items : [];
}