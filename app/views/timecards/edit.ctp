<!-- File: /app/views/posts/edit.ctp -->
	
<h1>Edit Timecard</h1>
<?php
	echo $form->create('Timecard', array('action' => 'edit'));
	echo $form->input('emp_name');
	echo $form->input('emp_num');
	echo $form->input('date_ending');
	echo $form->input('id', array('Timecard'=>'hidden')); 
	echo $form->end('Save Timecard');
?>