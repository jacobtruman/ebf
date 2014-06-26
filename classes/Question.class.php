<?php

class Question
{
	public $id;
	public $valid = true;
	protected $data;

	public function __construct($id) {
		$this->id = $id;

		if($this->isValid()) {
			$this->getData();
		} else {
			$this->valid = false;
		}
	}

	protected function isValid() {
		$db = new DBConn();
		$sql = "SELECT * FROM questionnaire_questions WHERE id = '".$this->id."' LIMIT 1";
		$res = $db->query($sql);
		if($res->num_rows) {
			return true;
		} else {
			return false;
		}
	}

	protected function getData() {
		$db = new DBConn();
		$sql = "SELECT * FROM questionnaire_questions WHERE id = '".$this->id."' LIMIT 1";
		$res = $db->query($sql);
		$this->data = $res->fetch_assoc();
	}

	public function __get($key) {
		if(isset($this->data[$key])) {
			return $this->data[$key];
		} else {
			return NULL;
		}
	}

	public function __isset($key) {
		if(isset($this->data[$key]) && !empty($this->data[$key])) {
			return true;
		}
		return false;
	}

	public function getQuestion() {
		if(isset($this->data['question'])) {
			return $this->data['question'];
		} else {
			return NULL;
		}
	}

	public function hasToolTip() {
		if(!empty($this->tooltip)) {
			return true;
		}
		return false;
	}

	public function getToolTip() {
		if($this->hasToolTip()) {
			return "Example: ".$this->tooltip;
		}
		return NULL;
	}

	public function getInputType() {
		$ret_val = "";
		if($this->type == "text") {
			$ret_val = "<input type='text' name='question_".$this->id."' title='".$this->getToolTip()."'/>";
		} elseif ("textarea") {
			$ret_val = "<textarea name='question_".$this->id."'cols='30' rows='10' title='".$this->getToolTip()."'></textarea>";
		}
		return $ret_val;
	}

	public function getLabel() {
		return "<label for='question_".$this->id."'>".$this->question."</label>\n";
	}

	public function getQuestionField() {
		return  "<p class='question'>\n".$this->getLabel()."\n".$this->getInputType()."\n</p>\n";
	}
}

?>