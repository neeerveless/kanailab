<?php
	class HtmlUtil{
		//member用定数
		private $GRADE	= 0;
		private $NAME		= 1;
		private $STATUS	= 2;
		//status用定数
		private $LAB		= 0;
		private $CAMPUS	= 1;
		private $HOME		= 2;
		
		/*
		* コンストラクタ
		*/
		public function __construct(){
		}
		
		/*
		* デストラクタ
		*/
		public function __destruct(){	
		}
		
		/*
		*	研究室のメンバーの配列からHTMLのTABLEを作る。
		*/
		public function makeTable($members){
			$table ='<table id="members"><tbody>';
			$index = 0;
			foreach($members as $member){
				//ラジオボタンにデフォルトでチェックを入れるための属性
				$status = array('', '', '',);
				//memberのstatusによってcheckedの位置が変わる
				$status[intval($member[$this->STATUS])] = 'checked';
				//gradeによってクラスを変えるため
				switch($member[$this->GRADE]){
				case '教授':
					$class = 'pro_';
				break;
				case'Ｍ２':
					$class = 'm2_';
				break;
				case'Ｍ１':
					$class = 'm1_';
				break;
				case'Ｂ４':
					$class = 'b4_';
				break;
				}
				//偶数行と奇数行のclassを変えるため
				$class .= $index % 2 == 0 ? 'even' : 'odd';
				$table .=
				'<form method="post" action="./corr.php">
					<input type="hidden" name="id" value="' . $index . '">
					<tr class="' . $class . '">
						<td class="col0">' . $member[$this->GRADE] . '</td>
						<td class="col1">' . $member[$this->NAME] . '</td>
						<td class="col2">
							<input id="' . $index . '_0" type="radio" name="' . $index . '" value="0" onchange="submit(this.form)" ' . $status[$this->LAB] . '>
							<label for="' . $index . '_0"></label>
						</td>
						<td class="col3">
							<input id="' . $index . '_1" type="radio" name="' . $index . '" value="1" onchange="submit(this.form)" ' . $status[$this->CAMPUS] . '>
							<label for="' . $index . '_1"></label>
						</td>
						<td class="col4">
							<input id="' . $index . '_2" type="radio" name="' . $index . '" value="2" onchange="submit(this.form)" ' . $status[$this->HOME] . '>
							<label for="' . $index . '_2"></label>
						</td>
					</tr>
				</form>
				';
				$index ++;
			}
			$table .= '</tbody></table>';
			return $table;
		}
	}
?>