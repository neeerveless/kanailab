function XMLHttpRequestCreate(){
	/*
	* XMLHttpRequest オブジェクトを作成
	*/
	try{
		return new XMLHttpRequest();
	}catch(e){}

	/*
	* IE用
	*/
	try{
		return new ActiveXObject('MSXML2.XMLHTTP.6.0');
	}catch(e){}
	try{
		return new ActiveXObject('MSXML2.XMLHTTP.3.0');
	}catch(e){}
	try{
		return new ActiveXObject('MSXML2.XMLHTTP');
	}catch(e){}

	// 未対応
	return null;
}

/*
* urlからのレスポンスが来たらリロード
*/
function listen(xhr, url){
	xhr.open('POST', url, true);
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 3 && xhr.status == 200) {
			window.location.reload();
		}
	}
	xhr.send(null);
}
