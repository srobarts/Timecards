<!-- File: /app/views/posts/index.ctp -->

<h1>Timecards</h1>
<?php echo $html->link('Add Timecard',array('controller' => 'timecards', 'action' => 'add'))?>
<table>
	<tr>
		<th>Hours</th>
		<th>Class</th>
		<th>Units</th>
		<th>Delete</th>
		<th>Edit</th>
	</tr>

	<!-- Here is where we loop through our $posts array, printing out post info -->

	<?php foreach ($timecards as $timecard): ?>
	<tr>
		<td><?php echo $timecard['Timecard']['id']; ?></td>
		<td>
			<?php echo $html->link($timecard['Timecard']['class'], 
				array('controller' => 'timecards', 'action' => 'view', $timecard['Timecard']['id'])); ?>
		</td>
		<td><?php echo $timecard['Timecard']['created']; ?></td>
		<td>
			<?php echo $html->link('Delete', array('action' => 'delete', 'id' => $timecard['Timecard']['id']), null, 'Are you sure?' )?>
		</td>
		<td>
			<?php echo $html->link('Edit', array('action'=>'edit', 'id'=>$timecard['Timecard']['id']));?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>