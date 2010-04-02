<!-- File: /app/views/posts/index.ctp -->

<h1>Time Cards</h1>
<?php echo $html->link('Add Timecard',array('controller' => 'timecards', 'action' => 'add'))?>
<table>
	<tr>
		<th>Employee Name</th>
		<th>Employee Number</th>
		<th>Date Ending</th>
		<?php 	$group_id = $session->read('Auth.User.group_id');
				if(!($group_id == 3 || $group_id == 2)){ ?>
		<!--  only allow admins to delete and edit timecards -->
		<th>Delete</th>
		<th>Edit</th>
		<?php } ?>
	</tr>

	<!-- Here is where we loop through our $posts array, printing out post info -->

	<?php foreach ($timecards as $timecard): ?>
	<tr>
		<td>
			<?php echo $html->link($timecard['Timecard']['emp_name'], 
				array('controller' => 'timecards', 'action' => 'view_timecard', $timecard['Timecard']['id'])); ?>
		</td>
		<td><?php echo $timecard['Timecard']['emp_num']; ?></td>
		<td><?php echo $timecard['Timecard']['date_ending']; ?></td>
		<?php 	$group_id = $session->read('Auth.User.group_id');
				if(!($group_id == 3 || $group_id == 2)){ ?>
		<td>
			<?php echo $html->link('Delete', array('action' => 'delete', 'id' => $timecard['Timecard']['id']), null, 'Are you sure?' )?>
		</td>
		<td>
			<?php echo $html->link('Edit', array('action'=>'edit', 'id'=>$timecard['Timecard']['id']));?>
		</td>
		<?php } ?>
	</tr>
	<?php endforeach; ?>
</table>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Logout', true), array('controller'=>'users', 'action'=>'logout')); ?></li>
	</ul>
</div>