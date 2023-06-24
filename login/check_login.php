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
	   if ($NowPsw == $password && $NowName == $name){
		   $flag=1;
	   }
    }
} 
if ($flag == 1){
	echo '登录成功';
}
else{
	echo '登录失败';
}
$conn->close();
?>