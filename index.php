<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Language" content="ja" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<link rel="stylesheet" type="text/css" charset="utf-8" href="./css/index.css">
	<script type="text/javascript" src="./js/ajax.js"></script>
	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.gpfloat-1.0.min.js"></script>
	<title>金井研出席管理</title>
	</head>
	<body>
	<script>
		var url = "./comet.php";
		var xhr = XMLHttpRequestCreate();
		listen(xhr, url);
	</script>
	<div id="header">
		<table >
			<tr>
				<td class="col0">学年</td>
				<td class="col1">名前</td>
				<td class="col2">研究室</td>
				<td class="col3">学内</td>
				<td class="col4">帰宅</td>
			</tr>
		</table>
	</div>
		<?php
			include_once './class/XmlUtil.class.php';
			include_once './class/HtmlUtil.class.php';
			define('FILE_PATH', './xml/members.xml');
			
			$xmlUtil = new XmlUtil(FILE_PATH);
			$htmlUtil = new HtmlUtil();
			$members = $xmlUtil->getEachElement();
			print($htmlUtil->makeTable($members));
		?>
		<script>
			$('#header').gpFloatX();
		</script>
	</body>
</html>