<div class="content">
	<div class="container">
		<?php if ($act == 'edit') { ?>
		<h1>Edit <?php echo $page->s_name?></h1>
		<form name="locationPost" action="/admin/location/edit" method="post">
			<input name="pk_i_id" type="hidden" value="<?php echo $page->pk_i_id; ?>">
			<input name="i_parent_id" type="hidden" value="<?php echo $page->i_parent_id; ?>">

			<div class="row">
				<label>Location Name</label>
				<input name="s_name" type="text" value="<?php echo $page->s_name; ?>">
			</div>
			<div class="row">
				<label>Parrent Location</label>
				<? $this->load->view('admin/location-cb')?>
			</div>
			<input type="submit" value="Edit">
		</form>
		<?php } elseif ($act == 'new') { ?>
		<h1>POST NEW</h1>
		<form name="locationPost" action="/admin/location/new" method="post">
			<input name="i_parent_id" type="hidden" value="0">

			<div class="row">
				<div class="row">
					<label>Location Name</label>
					<input name="s_name" type="text">
				</div>
				<div class="row">
					<label>Parrent Location</label>
					<? $this->load->view('admin/location-cb')?>
				</div>

			</div>
			<input type="submit" value="Post">
		</form>
		<?php } else { ?>
		<h1 class="fleft">Location</h1>
		<a href="/admin/location/new" class="button fright">Add New</a>
		<div class="clear"></div>
		<hr>
		<? function render_locations_table($locations = array())
		{ ?>
			<? foreach ($locations as $loc) { ?>

			<tr class="article">
				<td><?php echo $loc['pk_i_id']?></td>
				<td>
					<?=str_repeat("&nbsp;&nbsp;&nbsp;", $loc['i_depth'])?>
					<?=$loc['s_name']?>
				</td>
				<td><a href="<?php echo '/admin/location/edit?id=' . $loc['pk_i_id']?>">Edit</a></td>
				<td><a href="<?php echo '/admin/location/delete?id=' . $loc['pk_i_id']?>">Delete</a></td>
			</tr>

			<?= render_locations_table($loc['sub']) ?>
			<?php } ?>
			<? } ?>
		<table style="width: auto;">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th colspan="2">options</th>
			</tr>
			<?=render_locations_table($locations)?>
		</table>
		<?php }?>
	</div>
</div>