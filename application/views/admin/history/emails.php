<div class="page-item container-fluid shadow-sm mt-3">
	<div class="h1 text-secondary text-center p-3">Sent Emails</div>
	<?php 
		if ($this->Emails->historyTotalRows() > 0) {
	?>
	<div class="table-responsive">
		<table class="table table-hover table-bordered align-middle" style=" width: -moz-max-content; width: -webkit-max-content;width: max-content;">
			<thead class="table-light">
				<tr>
					<th scope="col">System Message ID</th>
					<th scope="col">Subject of email</th>
					<th scope="col">Body of emails</th>
					<th scope="col">Sent to</th>
					<th scope="col">Sent by (user Id)</th>
					<th scope="col">Sent at</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$hasgd = "system_email-id";
				foreach ($messages as $message): ?>
				<tr>
					<td scope="row"><?php echo $message->$hasgd; ?></td>
					<td><?php echo $message->e_subject; ?></td>
					<td><?php echo $message->Ebody; ?></td>
					<td><?php echo $message->sent_to; ?></td>
					<td><?php echo $message->sent_user_id; ?></td>
					<td><?php echo $message->sent_at; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- Pagination Links -->
    <div class="mt-4 mb-3 pb-3">
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-center">
			<li class="page-item <?php if ($currentPageNum == 1){echo "disabled";} ?>"><a class="page-link" href="<?php echo base_url('admin/history_emails/'.($currentPageNum-1)); ?>">Previous</a></li>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item"><a class="page-link" href="<?php echo base_url('admin/history_emails/' . $i); ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
			<li class="page-item <?php if ($currentPageNum == $total_pages){echo "disabled";} ?>"><a class="page-link" href="<?php echo base_url('admin/history_emails/'.($currentPageNum+1)); ?>">Next</a></li>
		</ul>
	</nav>
    </div>
	<?php 
		} else {
			?>
			<!-- Nothing -->
			<div class="nothing" id="nothing">
				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
				<div class="h3">Oops!</div>
				<p>It seems there's nothing to display. Please wait until something is added.</p>
			</div>
			<?php
		}
	?>
</div>
