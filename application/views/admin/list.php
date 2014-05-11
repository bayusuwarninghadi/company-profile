<?
switch ($list) {
    case 'article':
        foreach ($pages as $page) {
            ?>
            <tr class="item">
                <td>
                    <a target="blank" href="<?php echo '/article?id=' . $page->pk_i_id?>" class="bold">
                        <?php echo $page->s_name?>
                    </a>

                    <div class="desc"><?php echo substr(strip_tags(html_entity_decode($page->s_body)), 0, 150)?></div>
                </td>
                <td><a href="<?php echo '/admin/article/edit?id=' . $page->pk_i_id?>">Edit</a></td>
                <td>
                    <a onclick="if (confirm('Are you sure you want delete this from database?')) {location.href = this.href} return false;"
                       href="<?php echo '/admin/article/delete?id=' . $page->pk_i_id?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?
        }
        break;
	case 'product':
		foreach ($pages as $page) {
			?>
		<tr class="item">
			<td>
				<a class="uppercase large" target="blank"
				   href="<?php echo '/product?id=' . $page->pk_i_id?>"><?php echo $page->s_name?></a>

				<div class="desc"><?php echo substr(strip_tags(html_entity_decode($page->s_body)), 0, 150)?></div>
			</td>
			<td>
				<? if (isset($page->s_image)) { ?>
				<img src="<?php echo '/images/product/thumbs/' . $page->s_image;?>" alt="">
				<? } ?>
			</td>
			<td><a href="<?php echo '/admin/product/edit?id=' . $page->pk_i_id?>">Edit</a></td>
			<td>
				<a onclick="if (confirm('Are you sure you want delete this from database?')) {location.href = this.href} return false;"
				   href="<?php echo '/admin/product/delete?id=' . $page->pk_i_id?>">
					Delete
				</a>
			</td>
		</tr>
		<?
		}
		break;
	case 'pages':
		foreach ($pages as $page) {
			?>
		<tr class="item">
			<td>
				<h3>
					<a target="blank" href="<?php echo '/pages?id=' . $page->pk_i_id?>">
						<?php echo $page->s_name?>
					</a>
				</h3>

				<div class="desc"><?php echo substr(strip_tags(html_entity_decode($page->s_body)), 0, 150)?></div>
			</td>
			<td>
				<? if (isset($page->s_image)) { ?>
				<img src="<?php echo '/images/pages/thumbs/' . $page->s_image;?>" alt="" height="50px;">
				<? } ?>
			</td>
			<td><a href="<?php echo '/admin/pages/edit?id=' . $page->pk_i_id?>">Edit</a></td>
		</tr>
		<?
		}
		break;
	case 'user':
		foreach ($pages as $page) {
			?>
		<tr class="item <?=($page->s_active == 0) ? 'unconfirm' : 'confirm'?>">
			<td><?=$page->pk_i_id?></td>
			<td>
				<div><span class="bold"><?php echo $page->s_name?></span> (<?=$page->s_email?>)</div>
				<i class="icon-calendar-empty"></i> <?=$page->dt_created?>
			</td>
			<td>
				<?  if ($isAdminLogin == 1) { ?>
					<a href="<?php echo '/admin/user/edit?id=' . $page->pk_i_id?>"><i class="icon-pencil"></i> Edit</a>
					&nbsp;&nbsp;&nbsp;
					<a onclick="if (confirm('Are you sure you want delete this from database?')) {location.href = this.href} return false;"
					   href="<?php echo '/admin/user/delete?id=' . $page->pk_i_id?>">
						<i class="icon-trash"></i> Delete
					</a>
					&nbsp;&nbsp;&nbsp;
					<? if ($page->s_active == 0) { ?>
						<a href="<?php echo '/admin/user/activate?id=' . $page->pk_i_id . '&key=' . $page->s_key?>"><i
							class="icon-check"></i> activate</a>
					<? } else { ?>
						<a href="<?php echo '/admin/user/deactivate?id=' . $page->pk_i_id . '&key=' . $page->s_key?>"><i
							class="icon-check-minus"></i> Deactivate</a>
					<? } ?>

				<? }?>
			</td>
		</tr>

		<?
		}
		break;
	case 'admin':
		foreach ($pages as $page) {
			?>
		<tr class="item">
			<td><?=$page->pk_i_id?></td>
			<td>
				<span class="bold"><?php echo $page->s_username?></span> (<?=$page->s_email?>)
			</td>
			<td>
				<span class="bold"><?php echo ($page->s_level == 1) ? 'Super Admin' : 'Admin'; ?></span>
			</td>
			<td><a href="<?php echo '/admin/admin/edit?id=' . $page->pk_i_id?>">Edit</a></td>
			<td>
				<a onclick="if (confirm('Are you sure you want delete this from database?')) {location.href = this.href} return false;"
				   href="<?php echo '/admin/admin/delete?id=' . $page->pk_i_id?>">
					Delete
				</a>
			</td>
		</tr>

		<?
		}
		break;
	case 'inbox':
		foreach ($inbox as $page) {
			?>
		<tr class="item">
			<td>
				<div>
					<div><b><?=$page->s_name?></b></div>
					<div><?=$page->s_email?></div>
					<div class="desc gray pad1 italic">
						<?php echo substr(strip_tags(html_entity_decode($page->s_message)), 0, 150)?>
						<a target="blank" href="<?php echo '/admin/email/open?id=' . $page->pk_i_id?>">View
							More</a>
					</div>
				</div>
			</td>
			<td><?=format_date($page->dt_created)?></td>
		</tr>
		<?
		}
		break;
	default:
		echo 'no list-found';
		break;
}
?>
