<?php
function read_file($file_name){
	$file_path = '../config/'.$file_name;
	$fp = fopen($file_path,"r");
	$str = fread($fp,filesize($file_path));
	return $str;
}
$servername = read_file("url.dat");
$username = read_file("user.dat");
$password = read_file("password.dat");
 $conn = new mysqli($servername, $username, $password,'qinzihang','3306');
 if ($conn->connect_error) {
    echo '服务器连接失败，请稍后尝试...';
}

$name = @$_POST['name'];
$password = @$_POST['password'];


$sql = "SELECT name, password, id FROM user";
$result = $conn->query($sql);
$flag = 0;
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
       $NowPsw = $row["password"];
	   $NowName = $row["name"];
	   if ($NowName == $name){
		   $flag=1;
	   }
    }
} 
if ($flag == 1){
	echo '注册失败，用户名已被注册';
}
else{
	$sql = "insert into user (name,password,id) values ('".$name."','".$password."',0)"; 
	//echo $sql;
	if ($conn->query($sql) === TRUE) {
	    echo "注册成功";
	} 
	else {
		echo "无法与服务器取得连接，请稍后重试...";
	}
	
}
$conn->close();
?>