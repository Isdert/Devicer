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
  <li class="mdui-menu-item" disabled>
    <a href="#" class="mdui-ripple">添加设备</a>
  </li>
  <li class="mdui-menu-item" disabled>
    <a href="#" class="mdui-ripple">账号设置</a>
  </li>
    <li class="mdui-menu-item">
    <a href="https://github.com/crillerium/devicer/issues">报告错误</a>
  </li>
  <li class="mdui-divider"></li>
  <li class="mdui-menu-item">
    <a href="index.php" class="mdui-ripple">返回主页</a>
  </li>
</ul>
</div>
<br/>
<div class="mdui-container">

<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">首次使用</div>
    <div class="mdui-card-primary-subtitle">创建新的设备ID</div>
  </div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <a href="register.php?as=new" class="mdui-btn mdui-ripple">注册</a>
  </div>
</div><br/>

<?php
if($_GET['as']=="new"){
include('connect.php');
while(true){
$id = rand(100000,999999);
$check = "SELECT * FROM `user` where id = ".$id;
$result = mysqli_query($conn,$check);
$row = mysqli_fetch_array($result);
if($row[1]==""){
break;
}
}
echo <<<new1
<form name="new" action="operate.php" method="get">
<div class="mdui-panel" mdui-panel>

  <div class="mdui-panel-item mdui-panel-item-open">
    <div class="mdui-panel-item-header">
      <div class="mdui-panel-item-title">继续</div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-panel-item-body">
      <p>你的设备码为:
new1;
echo $id.'<input type="hidden" name="id" value="'.$id.'"><input type="hidden" name="as" value="new">';
echo <<<new2
      <div class="mdui-textfield">
  <input name="name" class="mdui-textfield-input" type="text" placeholder="为你的设备添加名称"/>
  </div>
      <div class="mdui-textfield">
  <input name="passwd" class="mdui-textfield-input" type="password" placeholder="为你的设备添加密码"/>
  </div>
      </p>
      <div class="mdui-panel-item-actions">
        <a href="register.php" class="mdui-btn mdui-ripple" mdui-panel-item-close>取消</a>
        <input type="submit" name="go" class="mdui-btn mdui-ripple" value="登录">
      </div>
    </div>
  </div>
  </div>
</form>
new2;
}
?>

<br/>
<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">再次使用</div>
    <div class="mdui-card-primary-subtitle">使用已有的设备ID</div>
  </div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <a href=" register.php?as=old" class="mdui-btn mdui-ripple">登录</a>
  </div>
</div><br/>

<?php
if($_GET['as']=="old"){
echo <<<old
<form name="old" action="operate.php" method="get">
<div class="mdui-panel" mdui-panel>

  <div class="mdui-panel-item mdui-panel-item-open">
    <div class="mdui-panel-item-header">
      <div class="mdui-panel-item-title">继续</div>
      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
    </div>
    <div class="mdui-panel-item-body">
      <div class="mdui-textfield">
  <input class="mdui-textfield-input" name="id" type="text" placeholder="你的设备码"/>
  </div>
      <div class="mdui-textfield">
  <input class="mdui-textfield-input" name="passwd" type="password" placeholder="你的密码"/>
  </div>
      </p>
      <div class="mdui-panel-item-actions">
        <a href="register.php" class="mdui-btn mdui-ripple" mdui-panel-item-close>取消<a>
        <input type="hidden" name="as" value="old">
        <input type="submit" name="go" class="mdui-btn mdui-ripple" value="登录">
      </div>
    </div>
  </div>
  </div>
  </form>
old;
}
?>
</div>
<script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body>
</html>
