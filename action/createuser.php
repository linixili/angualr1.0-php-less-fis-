<?php
	$res = json_decode(file_get_contents('php://input', 'r'), true);
	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("angulardemo",$conn);
	mysql_query("SET NAMES UTF8");
	// session_start();
	// $_SESSION['username'] = $res['username'];
	// $_SESSION['password'] = $res['password'];
	//获取数据总条数
	$sqlr="SELECT COUNT(*) AS count FROM usermessage"; 
	$results=mysql_fetch_array(mysql_query($sqlr)); 
	$count=$results['count']; 
	//计算页码
	$page=ceil((+$count+1)/7);
	$xingming=$res['username'];
	$password=$res['password'];
	$xingbie=$res['sex'];
	$lianxifangshi=$res['tel'];
	$info=$res['info'];
	$sql="INSERT INTO usermessage (xingming,password,xingbie,lianxifangshi,info,page) VALUES ('{$xingming}','{$password}','{$xingbie}','{$lianxifangshi}','{$info}',{$page})";
	$result=mysql_query($sql);
	if($result==1){
		$opt = array("data" => array(),"errno" => 0);
		echo json_encode($opt);
	}else{
		echo -1;
	}



