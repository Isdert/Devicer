<!doctype html>
<html lang="zh-cmn-Hans">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- MDUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/mdui@1.0.2/dist/css/mdui.min.css"/>
    <title>Crillerium Devicer</title>
  </head>
    <body class="mdui-theme-primary-indigo mdui-theme-accent-pink">
  <div class="mdui-toolbar mdui-color-theme">
  <span class="mdui-typo-title">Devicer</span>
  <div class="mdui-toolbar-spacer"></div>
    <a class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#example-attr'}">
 <i class="mdui-icon material-icons">more_vert</i></a>
<ul class="mdui-menu" id="example-attr">
  <li class="mdui-menu-item">
    <a href="newdevice.php" class="mdui-ripple">New Device</a>
  </li>
  <li class="mdui-menu-item">
    <a href="account.php" class="mdui-ripple">Account</a>
  </li>
    <li class="mdui-menu-item">
    <a href="https://github.com/crillerium/devicer/issues">Help & Feedback</a>
  </li>
  <li class="mdui-divider"></li>
  <li class="mdui-menu-item">
    <a href="index.php" class="mdui-ripple">Home</a>
  </li>
</ul>
</div>
<br/>
<div class="mdui-container">
<div class="mdui-card">
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">操作进度</div>
  </div>

  <!-- 卡片的内容 -->
  <div class="mdui-card-content">
  
<?php
if($_GET['as']=="new"){
if($_GET['name']!=""&&$_GET['passwd']!=""){
include('connect.php');
$name = base64_encode($_GET['name']);
$new = "INSERT INTO `user` (`id`, `name`, `passwd`, `item`) VALUES ('".$_GET['id']."', '".$name."', '".$_GET['passwd']."', '[]');";
if(mysqli_query($conn,$new)){
$array = array($_GET['id'],$name);
$json = json_encode($array);
if(setcookie("device",$json,time()+31536000)){
echo "设备注册成功,请牢记你的设备码和密码,现在已经可以开始使用了.";
}
}
else{
echo "设备注册失败,重试或许可以解决问题,若重试失败,请向管理员提交反馈";
}
}
else{
echo "设备名称和密码不能为空";
}
}
else if($_GET['as']=="old"){
if($_GET['id']!=""&&$_GET['passwd']!=""){
include('connect.php');
$check = "SELECT * FROM `user` where id = ".$_GET['id'];
$result = mysqli_query($conn,$check);
@$row = mysqli_fetch_array($result);
if($row[2]==$_GET['passwd']){
$name = base64_encode($row[1]);
$array = array($_GET['id'],$name);
$json = json_encode($array);
if(setcookie("device",$json,time()+31536000)){
echo "通过已有设备码登录成功,现在可以开始使用了";
}
}
else{
echo "设备码或密码不匹配";
}
}
else{
echo "设备码和密码不能为空";
}
}
else if($_GET['as']=="add"){
include('connect.php');
$yoid = $_GET['id'];
$check = "SELECT * FROM `user` where id = ".$yoid;
$result = mysqli_query($conn,$check);
@$row = mysqli_fetch_array($result);
if($row[1]!=""){
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$myid = $info[0];
$myname = $info[1];
$yoname = $row[1];
$yoarr = json_decode($row[3],true);
$yoarr[$myid] = $myname;
$yot = json_encode($yoarr);
$update = "UPDATE `user` SET `item` = '".$yot."' WHERE `id` = ".$yoid;
if(mysqli_query($conn,$update)){
$check = "SELECT * FROM `user` where id = ".$myid;
$result = mysqli_query($conn,$check);
$row = mysqli_fetch_array($result);
$myarr = json_decode($row[3],true);
$myarr[$yoid] = $yoname;
$myt = json_encode($myarr);
$update = "UPDATE `user` SET `item` = '".$myt."' WHERE `id` = ".$myid;
if(mysqli_query($conn,$update)){
echo "关联设备成功";
}
else{
echo "关联设备失败";
}
}
else{
echo "关联设备失败";
}
}
else{
echo "错误,该设备不存在";
}
}
else if($_POST['as']=="send"){
if($_POST['msg']&&$_POST['id']!=""){
include('connect.php');
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$from = $info[0];
$to = $_POST['id'];
$msg = base64_encode($_POST['msg']);
$send = "INSERT INTO `msgs` (`id`, `from`, `to`, `msg`) VALUES ('".time()."','".$from."', '".$to."', '".$msg."')";
if(mysqli_query($conn,$send)){
echo "消息发送成功";
}
else{
echo "消息发送失败";
}
}
else{
echo "发送人或发送文本不能为空";
}
}
else if($_GET['as']=="delete"){
include('connect.php');
$del = "DELETE FROM `msgs` WHERE `id` = ".$_GET['id'];
if(mysqli_query($conn,$del)){
echo "已删除此消息";
}
else{
echo "消息删除失败";
}
}
else if($_POST['as']=="setpwd"){
if($_POST['pw1']==$_POST['pw2']){
include('connect.php');
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$id = $info[0];
$setpwd = "UPDATE `user` SET `passwd` = '".$_POST['pw2']."' WHERE `id` = ".$id;
if(mysqli_query($conn,$setpwd)){
echo "修改密码成功";
}
else{
echo "修改密码失败";
}
}
else{
echo "两次输入的密码不相同";
}
}
else if($_POST['as']=="setname"){
include('connect.php');
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$id = $info[0];
$name = base64_encode($_POST['name']);
$setname = "UPDATE `user` SET `name` = '".$name."' WHERE `id` = ".$id;
if(mysqli_query($conn,$setname)){
$array = array($id,$name);
$json = json_encode($array);
if(setcookie("device",$json,time()+31536000)){
echo "设备名称修改成功";
}
else{
echo "设备名称修改失败";
}
}
else{
echo "设备名称修改失败";
}
}
else if($_GET['as']=="empty"){
include('connect.php');
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$myid = $info[0];
$yoid = $_GET['id'];
$empty = "DELETE FROM `msgs` WHERE `from` = ".$yoid." and `to` = ".$myid;
if(mysqli_query($conn,$empty)){
echo "清空记录成功";
}
else{
echo "清空记录失败";
}
}
else if($_GET['as']=="del"){
include('connect.php');
$yoid = $_GET['id'];
$check = "SELECT * FROM `user` where id = ".$yoid;
$result = mysqli_query($conn,$check);
@$row = mysqli_fetch_array($result);
if($row[1]!=""){
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$myid = $info[0];
$myname = $info[1];
$yoname = $row[1];
$yoarr = json_decode($row[3],true);
unset($yoarr[$myid]);
$yot = json_encode($yoarr);
$update = "UPDATE `user` SET `item` = '".$yot."' WHERE `id` = ".$yoid;
if(mysqli_query($conn,$update)){
$check = "SELECT * FROM `user` where id = ".$myid;
$result = mysqli_query($conn,$check);
$row = mysqli_fetch_array($result);
$myarr = json_decode($row[3],true);
unset($myarr[$yoid]);
$myt = json_encode($myarr);
$update = "UPDATE `user` SET `item` = '".$myt."' WHERE `id` = ".$myid;
if(mysqli_query($conn,$update)){
echo "删除设备成功";
}
else{
echo "删除设备失败";
}
}
else{
echo "删除设备失败";
}
}
else{
echo "错误,该设备不存在";
}
}
else if($_POST['as']=="nick"){
include('connect.php');
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$myid = $info[0];
$check = "SELECT * FROM `user` where id = ".$myid;
$result = mysqli_query($conn,$check);
$row = mysqli_fetch_array($result);
$myarr = json_decode($row[3],true);
$yoid = $_POST['id'];
$myarr[$yoid] = base64_encode($_POST['nick']);
$myt = json_encode($myarr);
$update = "UPDATE `user` SET `item` = '".$myt."' WHERE `id` = ".$myid;
if(mysqli_query($conn,$update)){
echo "修改设备备注成功";
}
else{
echo "修改设备备注失败";
}
}
?>

  </div>
  <div class="mdui-card-actions">
    <a href="index.php" class="mdui-btn mdui-ripple">返回主页</a>
  </div>
</div>
</div>
    <script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body>
</html>