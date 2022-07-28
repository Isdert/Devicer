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
    <a href="setting.php" class="mdui-ripple">Account</a>
  </li>
    <li class="mdui-menu-item">
    <a href="https://github.com/crillerium/devicer/issues">Help & feedback</a>
  </li>
  <li class="mdui-divider"></li>
  <li class="mdui-menu-item">
    <a href="setting.php?id=<?php echo $_GET['id'] ?>" class="mdui-ripple">Device Setting</a>
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
if($_GET['id']!=""){
include('connect.php');
$info = $_COOKIE['device'];
$info = json_decode($info,true);
$myid = $info[0];
$yoid = $_GET['id'];
$receive = "SELECT * FROM `msgs` where `from` = ".$yoid." and `to` = ".$myid;
$result = mysqli_query($conn,$receive);
while($row = mysqli_fetch_array($result)){
echo '<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">收到的信息</div>
  </div>
  <div class="mdui-card-content">'.base64_decode($row[3],true).'</div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <a href="send.php?id='.$_GET['id'].'" class="mdui-btn mdui-ripple">Reply</a>
    <a href="operate.php?as=delete&id='.$row[0].'" class="mdui-btn mdui-ripple">Delete</a>
  </div>
</div><br/>';
}
}
else{
echo '<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">未知之地</div>
  </div>
  <div class="mdui-card-content">请求链接中缺少了必要参数</div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <a href="index.php" class="mdui-btn mdui-ripple">返回主页</a>
  </div>
</div>';
}
?>
</div>



    <!-- MDUI JavaScript -->
    <script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body>
</html>