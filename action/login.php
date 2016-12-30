<?php

// header("Content-type: text/html; charset=utf-8");
	//获取post数据 username,password；
	$res = json_decode(file_get_contents('php://input', 'r'), true);
	$name=$res['username'];

	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("angulardemo",$conn);
	mysql_query('SET NAMES UTF8');
	$sql="SELECT * FROM usermessage WHERE xingming='{$name}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
		if($row['password']===$res['password']){
			//验证成功设置session,用于checkLogin中验证session
			session_start();
    		$_SESSION['username'] = $row['xingming'];
			// $_SESSION['password'] = $row['password'];
			//向前台返回数据；
			$opt = array('errno' => 0,
			 			'data' => array(
			 				'username' => $row['xingming']));
    		echo json_encode($opt); 
			}else{
				echo(-1);
		}

	


//登录成功
// $_SESSION['username'] = $_POST['username'];
// $_SESSION['userid'] = $_POST['password'];
