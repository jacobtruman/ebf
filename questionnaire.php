<?php
require_once("AutoLoad.php");

if(isset($_REQUEST['qid'])) {
	$q = new Questionnaire($_REQUEST['qid']);
	// confirm questionnaire id is valid
	if($q->isValid()) {
		// get all questions for selected questionnaire
		foreach($q->questions as $question) {
			var_dump($question);
		}
	} else {
		echo "Quesionnaire id (".$_REQUEST['qid'].") is invalid\n";
	}
} else {
	echo "No questionnaire id selected\n";
}

?>