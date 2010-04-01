<!-- File: /app/views/posts/add.ctp -->	
	
<h1>Add Timecard</h1>
<?php
$emp_num = $session->read('Auth.User.emp_num');
echo $form->create('Timecard');
echo $form->input('emp_name');
echo $form->input('emp_num', array('default'=>$emp_num));
echo $form->input('date_ending');
echo $form->end('Save Timecard');
?>