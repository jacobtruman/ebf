<link href="css/cupertino/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui-1.10.4.custom.js"></script>
<script>
	$(function() {
		$( document ).tooltip({
			position: {
				my: 'left center',
				at: 'right+10 center'
			}
		});
	});

	$(function()
	{
		$("form").form();
	});
</script>
<style>
	* {
		font-size:12px;
		font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	}

	h1 {
		font-size:20px;
		padding:0px 20px 20px;
		margin:0px;
		text-align:center;
	}

	body {
		background-color:#F9F9F9;
	}

	input,textarea {
		padding:7px;
		font-size:14px !important;
		width:250px;
	}

	p > label:first-child {
		display: inline-block;
		font-weight: 700;
		margin-bottom: 5px;
		padding-right: 35px;
		width: 600px;
	}

	#submitbutton {
		width:auto;
	}

	label {
		display: inline-block !important;
		width: 80%;
		vertical-align: top;
	}

	#questionnaire {
		margin:0px auto;
		width:90%;
		background-color:#eee;
		padding:20px;
		border-radius: 5px;
		clear: both;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	}

	.ui-tooltip {
		background: #C0C0C0;
		color: #858585;
	}
</style>
<div id='questionnaire'>
<?php
//error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("AutoLoad.php");

if(isset($_REQUEST['qid'])) {
	$q = new Questionnaire($_REQUEST['qid']);
	// confirm questionnaire id is valid
	if($q->isValid()) {
		echo "<h1>".$q->name." Questionnaire</h1>\n";
		echo "<form action='' method='post' id='questionnaire_form'>\n";
		// get all questions for selected questionnaire
		foreach($q->questions as $question) {
			echo "<p class='question'>\n";
			echo "<label for='question_".$question->id."'>".$question->question."</label>\n";
			echo $question->getInputType()."\n";
			echo "</p>\n";
		}
		echo "</form>\n";
	} else {
		echo "Quesionnaire id (".$_REQUEST['qid'].") is invalid\n";
	}
} else {
	echo "No questionnaire id selected\n";
}

?>
</div>