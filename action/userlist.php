<?php

	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("angulardemo",$conn);
	mysql_query("SET NAMES UTF8");
	$page=$_GET['pageNum'];
	$sql="SELECT * FROM usermessage WHERE page={$page}";
	$opt=array();
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$opt[]=array(
			'id'=>$row['id'],
			'username' => $row['xingming'],
			'password' => $row['password'],
			'sex' => $row['xingbie'],
			'telephone' => $row['lianxifangshi'],
			'info' => $row['info']
			);
	}
	$result = array(
		"errno" => 0,
		"data" => $opt
	);
	echo json_encode($result);