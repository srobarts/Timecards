<!-- File: /app/views/posts/index.ctp -->

<h1>Time Cards</h1>
<?php echo $html->link('Add Timecard',array('controller' => 'timecards', 'action' => 'add'))?>
<table>
	<tr>
		<th>Employee Name</th>
		<th>Employee Number</th>
		<th>Total Hours</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>

	<!-- Here is where we loop through our $posts array, printing out post info -->

	<?php foreach ($timecards as $timecard): ?>
	<tr>
		<td>
			<?php echo $html->link($timecard['Timecard']['emp_name'], 
				array('controller' => 'timecards', 'action' => 'view_timecard', $timecard['Timecard']['id'])); ?>
		</td>
		<td><?php echo $timecard['Timecard']['emp_num']; ?></td>
		<td><?php echo $timecard['Timecard']['emp_num']; ?></td>
		<td>
			<?php echo $html->link('Delete', array('action' => 'delete', 'id' => $timecard['Timecard']['id']), null, 'Are you sure?' )?>
		</td>
		<td>
			<?php echo $html->link('Edit', array('action'=>'edit', 'id'=>$timecard['Timecard']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Logout', true), array('controller'=>'users', 'action'=>'logout')); ?></li>
	</ul>
</div>