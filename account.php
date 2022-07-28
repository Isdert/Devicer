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

<div class="mdui-card">
<form name="setname" action="operate.php" method="post">
<input type="hidden" name="as" value="setname">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">设备名称</div>
    <div class="mdui-card-primary-subtitle">修改设备名称</div>
  </div>
  <div class="mdui-card-content">
  <div class="mdui-textfield">
  <input name="name" class="mdui-textfield-input" type="text" placeholder="输入新的设备名称"/>
  </div>
</div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <button class="mdui-btn mdui-ripple">Confirm</button>
  </div></form></div><br/>

<div class="mdui-card">
<form name="setpwd" action="operate.php" method="post">
<input type="hidden" name="as" value="setpwd">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">密码</div>
    <div class="mdui-card-primary-subtitle">修改密码</div>
  </div>
  <div class="mdui-card-content">
  <div class="mdui-textfield">
  <input name="pw1" class="mdui-textfield-input" type="password" placeholder="输入新密码"/>
  </div>
  <div class="mdui-textfield">
  <input name="pw2" class="mdui-textfield-input" type="password" placeholder="再次输入"/>
  </div>
</div>
  <!-- 卡片的按钮 -->
  <div class="mdui-card-actions">
    <button class="mdui-btn mdui-ripple">Confirm</button>
  </div></form>
</div><br/>
<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">我的设备名称</div>
    <div class="mdui-card-primary-subtitle">其他设备与你连接时会默认显示此名称</div>
  </div>
  <div class="mdui-card-content">
<?php
$info = $_COOKIE['device'];
$info = json_decode($info,true);
echo base64_decode($info[1],true);
?>
  </div>
</div><br/>
<div class="mdui-card">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">我的设备码</div>
    <div class="mdui-card-primary-subtitle">其他设备可通过此设备码与你连接</div>
  </div>
  <div class="mdui-card-content">
<?php
$info = $_COOKIE['device'];
$info = json_decode($info,true);
echo $info[0];
?>
  </div>
</div><br/>
</div>



    <!-- MDUI JavaScript -->
    <script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body>
</html>