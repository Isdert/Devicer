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
<form action="install.php">
<input type="hidden" name="install" value="true">
<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">安装</div>
  </div>
  <div class="mdui-card-content">Devicer需要使用MySQL数据库,请先配置好connect.php再点击安装按钮</div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <button class="mdui-btn mdui-ripple">开始安装</button>
  </div>
</div>
</form>
</br>
<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">安装进度</div>
  </div>

  <!-- 卡片的内容 -->
  <div class="mdui-card-content">
<?php
if($_GET['install']=="true"){
include('connect.php');
$devices = 'CREATE TABLE `user` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `passwd` TEXT NOT NULL , `item` TEXT NOT NULL , PRIMARY KEY (`id`))';
$msgs = 'CREATE TABLE `devicer`.`msgs` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `from` INT NOT NULL , `to` INT NOT NULL , `msg` TEXT NOT NULL , PRIMARY KEY (`id`))';
if(mysqli_query($conn,$devices)){
if(mysqli_query($conn,$msgs)){
echo "数据库安装成功";
}
else{
echo "数据库安装失败,点击 'Help & Feedback' 给予反馈";
}
}
else{
echo "数据库安装失败,点击 'Help & Feedback' 给予反馈";
}
}
else{
echo "尚未开始安装";
}
?>
  </div>

  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <a href="index.php" class="mdui-btn mdui-ripple">返回主页</a>
  </div>
</div>


</div>

    <!-- MDUI JavaScript -->
    <script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body>
</html>