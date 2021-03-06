<?php

header("Content-Type:application/json");
require "content.php";

if(!empty($_GET['name']))
{
	$name=$_GET['name'];
	$check_data = get_data($name);
    
	if(empty($check_data))
	{
		response(200,"Data Not Found",NULL);
	}
	else
	{
		response(200,"Data Found",$check_data);
	}
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;

	$json_response = json_encode($response);
	echo $json_response;
}

?>