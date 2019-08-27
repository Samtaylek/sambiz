<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 03/05/2018
 * Time: 21:22
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/SamBiz/core/init.php';
unset($_SESSION['SBSeller']);
header('Location: sellers_login.php');
?>