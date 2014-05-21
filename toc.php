<?
$toc_items = array(
	array('title'=>'Document Warehouse', 'desc'=>'Click here to Upload and View documents', 'icon'=>'ui-icon-document', 'enabled'=>true),
	array('title'=>'Business Plan Questionnaire', 'desc'=>'Click here to open Questionnaire', 'icon'=>'ui-icon-note', 'enabled'=>true),
	array('title'=>'Entity Formation Questionnaire', 'desc'=>'Click here to open Questionnaire', 'icon'=>'ui-icon-note', 'enabled'=>true),
	array('title'=>'Website Questionnaire', 'desc'=>'Click here to open Questionnaire', 'icon'=>'ui-icon-note', 'enabled'=>false),
	array('title'=>'Personal Credit', 'desc'=>'Click here to access your Credit Profile', 'enabled'=>true),
	//array('title'=>'XXX', 'desc'=>'', 'enabled'=>true),
	array('title'=>'Resource Page', 'desc'=>'Click here to view useful resources', 'icon'=>'ui-icon-help', 'enabled'=>true),
	array('title'=>'Contact', 'desc'=>'Click here to Email Customer Support', 'icon'=>'ui-icon-mail-closed', 'enabled'=>true)
);
$default_icon = 'ui-icon-bullet';
?>
<script>
	$(function() {
		$( "#toc" ).menu();
	});
</script>
<style>
	.ui-menu {
		margin: 10px 0;
		width: 100%;
		height: 90%;
	}
</style>
<ul id="toc">
	<?
		foreach($toc_items as $item) {
			echo "<li".(!$item['enabled'] ? " class='ui-state-disabled'" : '')."><a href='#'><span class='ui-icon ".($item['icon'] ? $item['icon'] : $default_icon)."'></span>".$item['title']."</a></li>\n";
		}
	/*
	<li><a href="#"><span class="ui-icon ui-icon-zoomout"></span>Contact</a></li>
	<li>
		<a href="#">Playback</a>
		<ul>
			<li><a href="#"><span class="ui-icon ui-icon-seek-start"></span>Prev</a></li>
		</ul>
	</li>
	*/
	?>
</ul>

