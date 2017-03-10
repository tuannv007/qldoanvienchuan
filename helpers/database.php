<?php


define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'quanlydoanvien');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

$link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE)
	or die("can't connect this database");


function dbCheckLogin($email, $password)
{
	global $link;

	//
	$sql = "select * from admin where email = '$email' and password = '$password'";
	$result = mysqli_query($link, $sql);


	if (mysqli_num_rows($result) > 0) {
		return mysqli_fetch_assoc($result);
	} else {
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

	$sql = "update $tableName set $data where $key = '$id'";
	return mysqli_query($link, $sql);
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
function getDataWithSelection($tableName,$makhoa,$nienkhoa){
	global $link;
	$sql = "select * from $tableName where makhoa = '$makhoa' and nienkhoa = '$nienkhoa'";
	$result = mysqli_query($link, $sql);

	while ($item = mysqli_fetch_assoc($result)) {
		$items[] = $item;
	}

	return isset($items) ? $items : [];
}
