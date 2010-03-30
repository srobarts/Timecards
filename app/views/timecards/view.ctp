

<h1><?php echo $timecards['Timecard']['emp_name']?></h1>
<h1><?php echo $timecards['Timecard']['date_ending']?></h1>
<p><small>Created: <?php echo $timecards['Timecard']['created']?></small></p>

<table>
	<tr>
		<td>
			<?php $id = 15; ?>
			<?php echo $this->requestAction(array('controller' => 'timeentries', 'action' => 'index'), array('return')); ?>		
		</td>
	</tr>
</table>