<?php
	class XmlUtil{
		//定数
		public $FILE_NAME;
		public $xml;
		
		/*
		* コンストラクタ
		*/
		public function __construct($_fileName){
			$this->FILE_NAME = $_fileName;
			//members.xmlを取得
			$this->xml = @simplexml_load_file($_fileName);
		}
		
		/*
		* デストラクト
		*/
		public function __destruct(){
		}
		
		/*
		*	fileNameを取得する。
		*/
		public function getFileName(){
			println($this->FILE_NAME);
		}
		
		/*
		*	xmlからmember情報を取得して配列に直す。
		*/
		public function getEachElement(){
			if ($this->xml) {
				foreach ($this->xml->member as $val) {
					$members[] = array($val->grade, $val->name ,$val->status);
				}
			} else {
				//読み込めなかった場合の処理
				echo 'このメッセージが出たら作者まで連絡してください';
			}
			return $members;
		}
		
		/*
		*	members.xmlのElementを修正する。
		*/
		public function corrElement($id, $status){
			if ($this->xml) {
				$this->xml->member[intval($id)]->status = $status;
				$this->xml->asXml($this->FILE_NAME);
			} else {
				//読み込めなかった場合の処理
				echo 'このメッセージが出たら作者まで連絡してください';
			}
		}
	}
?>