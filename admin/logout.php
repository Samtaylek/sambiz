<?php
/**
 * Created by PhpStorm.
 * User: O-Temitayo
 * Date: 04/04/2018
 * Time: 11:09
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/SamBiz/core/init.php';
unset($_SESSION['SBUser']);
header('Location: login.php');
?>
