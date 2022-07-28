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
<div class="mdui-card">
<form name="send" action="operate.php" method="post">
<input type="hidden" name="as" value="send">
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <!-- 卡片的标题和副标题 -->
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title">发送到 
<?php
include('connect.php');
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM `user` where id = ".$id);
@$row = mysqli_fetch_array($result);
echo base64_decode($row[1],true);
?>
    </div>
  </div>
  <div class="mdui-card-content">
  <div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">Message</label>
  <textarea name="msg" class="mdui-textfield-input"></textarea>
</div></div>
  <div class="mdui-card-actions">
    <button class="mdui-btn mdui-ripple">发送</button>
  </div>
</div>
</div>

    <!-- MDUI JavaScript -->
    <script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
  </body>
</html>