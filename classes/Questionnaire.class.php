<?php

class Questionnaire
{
	public $name;
	public $id;
	public $questions = array();

	public function __construct($id) {
		$this->id = $id;
		$this->db = new DBConn();
		$this->getQuestionnaireName();
		$this->getQuestions();
	}

	public function isValid() {
		$sql = "SELECT * FROM questionnaires WHERE id = '".$this->id."'";
		$res = $this->db->query($sql);
		if($res->num_rows) {
			return true;
		} else {
			return false;
		}
	}

	protected function getQuestionnaireName() {
		$sql = "SELECT * FROM questionnaires WHERE id = '".$this->id."' LIMIT 1";
		$res = $this->db->query($sql);
		$row = $res->fetch_assoc();
		$this->name = $row['name'];
	}

	private function getQuestions() {
		$sql = "SELECT id FROM questionnaire_questions WHERE qid = '".$this->id."'";
		$res = $this->db->query($sql);
		while($row = $res->fetch_assoc()) {
			$q = new Question($row['id']);
			if($q->valid) {
				$this->questions[] = $q;
			}
		}
	}
}

?>