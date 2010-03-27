<!-- File: /app/views/posts/add.ctp -->	
	
<h1>Add Timecard</h1>
<?php
echo $form->create('Timecard');
echo $form->input('emp_name');
echo $form->input('emp_num');
echo $form->input('date_ending');
echo $form->end('Save Timecard');
?>