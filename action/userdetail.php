<?php
	
	$name=$_GET['userName'];
	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("angulardemo",$conn);
	mysql_query("SET NAMES UTF8");
	$sql="SELECT * FROM　usermessage WHERE xingming='{$name}'";
	$result=mysql_query($sql);
	$opt=mysql_fetch_array($result);
	$data = array(
		"username" => $opt["xingming"],
		"telephone" => $opt["lianxifangshi"],
		"password" => $opt["password"],
		"sex" => $opt["xingbie"],
		"info" => $opt["info"]
	);
	$results = array(
		"errno" => 0,
		"data" => $data
	);
	echo json_encode($results);