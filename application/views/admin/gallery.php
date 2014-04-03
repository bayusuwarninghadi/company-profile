<div class="content">
	<div class="container">
		<?php if ($act == 'edit') { ?>
		<h3><?php echo $page->s_name?></h3>
		<form action="/admin/gallery/edit?id=<?=$page->pk_i_id?>" id="pageEdit" enctype="multipart/form-data"
		      method="post">
			<input name="pk_i_id" type="hidden" value="<?php echo $page->pk_i_id; ?>">

			<div class="row">
				<label>Name</label>
				<input name="s_name" type="text" value="<?php echo $page->s_name; ?>">
			</div>
			<div class="row">
				<label>Content</label>
				<textarea class="ckeditor" name="s_body" id="s_body"><?php echo $page->s_body; ?></textarea>
			</div>
			<div class="row">
				<? foreach ($images as $image) { ?>
				<div style="background-image: url('<?=$image['thumb_url'];?>') " class="preview fleft"></div>
				<?}?>
				<div class="clear"></div>

			</div>

			<div class="row">
				<input type="file" name="s_image[]" multiple accept="image/*" />
			</div>

			<?php echo form_submit('upload', 'Upload'); ?>
		</form>
		<?php } elseif ($act == 'new') { ?>
		<h3>Post New</h3>
		<form action="/admin/gallery/new" id="pageNew" enctype="multipart/form-data" method="post">
			<div class="row">
				<input type="file" name="s_image[]" multiple accept="image/*" />
			</div>

			<div class="row">
				<label>Name</label>
				<input name="s_name" type="text">
			</div>
			<div class="row">
				<label>Content</label>
				<textarea class="ckeditor" name="s_body" id="s_body"></textarea>
			</div>
			<?php echo form_submit('upload', 'Upload'); ?>
		</form>
		<?php } else { ?>
		<h1 class="fleft">gallerys</h1>
		<a href="/admin/gallery/new" class="button fright">Add New</a>
		<div class="clear"></div>
		<hr/>
		<table class="items-table">
			<tr>
				<th>Name</th>
				<th>options</th>
			</tr>
			<? foreach ($pages as $page) { ?>
			<tr class="item">
				<td>
					<h3>
						<a target="blank" href="<?php echo '/gallery?id=' . $page->pk_i_id?>">
							<?php echo $page->s_name?>
						</a>
					</h3>
				</td>
				<td>
					<a class="button" href="<?php echo '/admin/gallery/edit?id=' . $page->pk_i_id?>">Edit</a>
					<a class="button"
					   onclick="if (confirm('Are you sure you want delete this into the database?')) {location.href = this.href} return false;"
					   href="<?php echo '/admin/gallery/delete?id=' . $page->pk_i_id?>">
						Delete
					</a>
				</td>
			</tr>
			<? } ?>
		</table>
		<?php }?>
	</div>
</div>
