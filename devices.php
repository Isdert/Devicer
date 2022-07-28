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
    <a href="https://github.com/crillerium/devicer/issues">Help & feedback</a>
  </li>
  <li class="mdui-divider"></li>
  <li class="mdui-menu-item">
    <a href="index.php" class="mdui-ripple">Home</a>
  </li>
</ul>
</div>
<br/>
<div class="mdui-container">
<?php
include('connect.php');
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$id = $info[0];
$item = "SELECT * FROM `user` where id = ".$id;
$result = mysqli_query($conn,$item);
$row = mysqli_fetch_array($result);
$items = $row[3];
$item = json_decode($items,true);
if($items!='[]'){
foreach($item as $id=>$name){
$n = base64_decode($name,true);
echo '
<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">'.$n.'</div>
    <div class="mdui-card-primary-subtitle">'.$id.'</div>
  </div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <a href="send.php?id='.$id.'" class="mdui-btn mdui-ripple">Send</a>
    <a href="receive.php?id='.$id.'" class="mdui-btn mdui-ripple">Receive</a>
  </div>
</div><br/>';
}
}
else{
echo '
<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">当前暂无设备</div>
    <div class="mdui-card-primary-subtitle">点击添加设备</div>
  </div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <a href="newdevice.php" class="mdui-btn mdui-ripple">Add</a>
  </div>
</div><br/>';
}
?>
</div>


    <!-- MDUI JavaScript -->
    <script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body>
</html>