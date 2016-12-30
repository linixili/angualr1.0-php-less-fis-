<?php
$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("angulardemo",$conn);
	mysql_query("SET NAMES UTF8");
	$sqlr="SELECT COUNT(*) AS count FROM news"; 
	$results=mysql_fetch_array(mysql_query($sqlr)); 
	$count=$results['count']; 
	//计算页码
	$page=ceil(($count+1)/7);
	$res = json_decode(file_get_contents('php://input', 'r'), true);
	$title=$res['title'];
	$writer=$res['writer'];
	$date_r=$res['date'];
	$content=$res['content'];
	$sql="INSERT INTO news (title,writer,date,content,page) VALUES ('{$title}','{$writer}','{$date_r}','{$content}',{$page})";
	$result=mysql_query($sql);
	// echo $result;
	if($result==1){
		echo 1;
	}else{
		echo -1;
	}