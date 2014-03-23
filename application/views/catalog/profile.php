<div class="container white round2">
    <div class="pad1">
	    <h1 class="center">Update Profile</h1>
	    <hr>
	    <form action="/profile" id="pageEdit" enctype="multipart/form-data" method="post">
            <?php if (isset($page->s_image)) { ?>
            <div class="fleft pad1">
	            <a class="preview" href="<?php echo '/images/user/' . $page->s_image;?>">
		            <img src="<?php echo '/images/user/thumbs/' . $page->s_image;?>" width="200px;" alt="">
	            </a>
	            <div class="row">
		            <?php echo form_upload('s_image'); ?>
	            </div>
            </div>
	        <? } ?>
            <div class="fleft pad1">
	            <div class="row">
		            <label>Full Name</label>
		            <input name="s_name" type="text" value="<?php echo $page->s_name; ?>">
	            </div>
	            <div class="row">
		            <b>Email:</b> <?php echo $page->s_email; ?>
	            </div>
	            <div class="row">
		            <a class="button" href="/change_email">Change Email</a>
		            <a class="button" href="/change_password">Change Password</a>
	            </div>
	            <div class="row">
		            <label>Phone Number</label>
		            <input name="s_phone" class="numeric" type="text" value="<?php echo $page->s_phone; ?>">
	            </div>
	            <div class="row" id="address">
		            <label>Address (billing address)</label>
		            <textarea name="s_address"><?php echo $page->s_address; ?></textarea>
	            </div>
            </div>
	        <div class="clear"></div>
	        <hr>
		    <?php echo form_submit('upload', 'Submit'); ?>
        </form>
        <div class="clear"></div>
    </div>
</div>