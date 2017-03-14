<?php

function url($uri = null)
{
	return 'http://students.dev/' . ltrim($uri, '/');
}

function redirect($url = '/')
{
	header("Location: $url");
}

function pre($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>'; die;
}

function current_url($https = false)
{
	$protocal = $https === true ? 'https' : 'http';

	return "$protocal://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}