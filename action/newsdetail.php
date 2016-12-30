<?php
	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("angulardemo",$conn);
	mysql_query("SET NAMES UTF8");
	$id=$_GET['id'];
	$sql="SELECT *FROM news WHERE id={$id}";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);

	$data = array(
		"id" => $row['id'],
		"title" => $row["title"],
		"writer" => $row["writer"],
		"date" => $row["date"],
		"content" => $row["content"]
	);
	$result = array(
		"errno" => 0,
		"data" => $data
	);
	echo json_encode($result);