<?php
if($_COOKIE['device']!=""){
header('location:devices.php');
}
else{
header('location:register.php');
}
?>