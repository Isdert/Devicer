<?php
$host = "localhost";   #MySQL服务器地址
$user = "root";   #MySQL服务器用户名
$pwd = "";   #MySQL服务器用户密码
$db = "devicer";   #MySQL服务器数据库名称

if($conn = mysqli_connect($host,$user,$pwd)){
$state = "MySQL服务器连接成功";
if(mysqli_select_db($conn,$db)){
$state = $state.",MySQL数据库选择成功";
}
else{
$state = $state.",MySQL数据库选择失败";
}
}
else{
$state = "MySQL服务器连接失败";
}
//echo $state;
?>
