<?php
	include_once './class/XmlUtil.class.php';
	define('FILE_PATH', './xml/members.xml');

	$id = $_POST['id'];
	$status = $_POST[$id];
	
	$xmlUtil = new XmlUtil(FILE_PATH);
	$xmlUtil->changeStatus($id, $status);
	
	header("Location:index.php");
	exit();
?>
