<?php
	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("angulardemo",$conn);
	mysql_query("SET NAMES UTF8");
	$num=$_GET["pageNum"];
	$sql="SELECT * FROM news WHERE page={$num}";
	$opt=array();
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$opt[]=array(
			'id'=>$row['id'],
			'title' => $row['title'],
			'writer' => $row['writer'],
			'date' => $row['date'],
			'content' => $row['content']
			);
	}
	$result = array(
		"errno" => 0,
		"data" => $opt
	);
	echo json_encode($result);