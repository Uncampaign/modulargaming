<h2>Messages - Inbox</h2>

<div class="left w150"><?php echo $sidebar ?></div>

<div class="right w500">

	<?php echo Message::render() ?>
	
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>From</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($messages as $m): ?>
			<tr>
				<td><?php echo html::anchor('message/view/'.$m->id, $m->title) ?></td>
				<td><?php echo $m->from->username ?></td>
				<td><?php echo date('Y-m-d H:i', $m->time) ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	
</div>