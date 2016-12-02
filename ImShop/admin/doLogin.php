<?php
/**
 * 后台登陆表单提交处理页面
 */
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];