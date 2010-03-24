<!-- File: /app/views/posts/edit.ctp -->
	
<h1>Edit Timecard</h1>
<?php
	echo $form->create('Timecard', array('action' => 'edit'));
	echo $form->input('class');
	echo $form->input('notes', array('rows' => '3'));
	echo $form->input('id', array('Timecard'=>'hidden')); 
	echo $form->end('Save Timecard');
?>