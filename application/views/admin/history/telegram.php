<div class="page-item container-fluid shadow-sm mt-3">
	<div class="h1 text-secondary text-center p-3">Sent Telegram Messages</div>
	<div class="table-responsive">
		<table class="table table-hover table-bordered align-middle" style=" width: -moz-max-content; width: -webkit-max-content;width: max-content;">
			<thead class="table-light">
				<tr>
					<th scope="col">System Message ID</th>
					<th scope="col">Message ID</th>
					<th scope="col">Message</th>
					<th scope="col">Status</th>
					<th scope="col">Image</th>
					<th scope="col">Error Description(If error happened)</th>
					<th scope="col">System Time</th>
					<th scope="col">Added User ID</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$hasgd = "system-msg-id";
				foreach ($messages as $message): ?>
				<tr>
					<td scope="row"><?php echo $message->$hasgd; ?></td>
					<td><?php echo $message->msg_id; ?></td>
					<td><?php echo $message->message; ?></td>
					<td><?php echo $message->msg_status; ?></td>
					<td><?php echo $message->image; ?></td>
					<td><?php echo $message->description; ?></td>
					<td><?php echo $message->system_time; ?></td>
					<td><?php echo $message->added_user_id; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
    <!-- Pagination Links -->
    <div class="mt-4 mb-3 pb-3">
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-center">
			<li class="page-item <?php if ($currentPageNum == 1){echo "disabled";} ?>"><a class="page-link" href="<?php echo base_url('admin/history_telegrams/'.$currentPageNum-1); ?>">Previous</a></li>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item"><a class="page-link" href="<?php echo base_url('admin/history_telegrams/' . $i); ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
			<li class="page-item <?php if ($currentPageNum == $total_pages){echo "disabled";} ?>"><a class="page-link" href="<?php echo base_url('admin/history_telegrams/'.$currentPageNum+1); ?>">Next</a></li>
		</ul>
	</nav>
    </div>
</div>
