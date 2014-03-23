<div class="content">
	<div class="container">
		<div class="pad01">
			<h3 class="uppercase">Last Article</h3>
			<table class="items-table">
				<tr>
					<th>Name</th>
					<th width="80">options</th>
				</tr>
				<? foreach ($product as $page) {
				?>
				<tr class="item">
					<td>
						<a target="blank" class="uppercase bold"
						   href="<?php echo '/product?id=' . $page->pk_i_id?>"><?php echo $page->s_name?></a>
					</td>
					<td>
						<a class="fleft" href="<?php echo '/admin/product/edit?id=' . $page->pk_i_id?>">Edit</a>
						<a class="fright"
						   onclick="if (confirm('Are you sure you want delete this into the database?')) {location.href = this.href} return false;"
						   href="<?php echo '/admin/product/delete?id=' . $page->pk_i_id?>">Delete
						</a>
					</td>
				</tr>
				<? }?>
			</table>
			<h3 class="uppercase">Incoming Messages</h3>
			<table class="items-table">
				<tr>
					<th>Message</th>
					<th>Date Post</th>
				</tr>
				<? foreach ($inbox as $page) { ?>
				<tr class="item">
					<td>
						<div>
							<div><b><?=$page->s_name?></b> <?=$page->s_email?></div>
							<div class="desc gray pad1 italic">
								<?php echo substr(strip_tags(html_entity_decode($page->s_message)), 0, 150)?>
								<a target="blank" href="<?php echo '/admin/email/open?id=' . $page->pk_i_id?>">View
									More</a>
							</div>
						</div>
					</td>
					<td><?=format_date($page->dt_created)?></td>
				</tr>
				<? }?>
			</table>
		</div>

	</div>
</div>