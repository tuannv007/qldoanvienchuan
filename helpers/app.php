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