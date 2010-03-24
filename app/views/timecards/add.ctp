<!-- File: /app/views/posts/add.ctp -->	
	
<h1>Add Timecard</h1>
<?php
echo $form->create('Timecard');
echo $form->input('class');
echo $form->input('notes', array('rows' => '3'));
echo $form->end('Save Post');
?>