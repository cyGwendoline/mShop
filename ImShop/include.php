<?php
/**
 * 引入文件集合
 */
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once ('common.fns.php');
require_once ('mysql.fns.php');
require_once ('images.fns.php');
require_once ('page.fns.php');
require_once ("string.fns.php");
require_once ("upload.fns.php");
require_once ("configs.php");