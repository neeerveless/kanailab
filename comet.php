<?php
	define('FILE_PATH', './xml/members.xml');
	/*
	* データを取得
	*/
	function getData() {
		return file_get_contents(FILE_PATH);
	}
	
	/*
	* memberx.xmlが更新されるかチェック
	*/
	function checkData() {
		$data = getData();
		$temp = $data;
		while ($temp === $data) {
			$temp = getData();
			sleep(1);
		}
		echo "reload";
	}
	
	checkData();
?>