<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Update Profile</h1>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <form action="/profile" id="pageEdit" enctype="multipart/form-data" method="post">
                <?php if (isset($page->s_image)) { ?>
                    <div class="form-group">
                        <a class="preview form-group" href="<?php echo '/images/user/' . $page->s_image;?>">
                            <img src="<?php echo '/images/user/thumbs/' . $page->s_image;?>" width="200px;" alt="">
                        </a>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <?php echo form_upload('s_image'); ?>
                        </div>
                    </div>
                <? } ?>
                <div class="form-group">
                    <label>Full Name</label>
                    <input class="form-control" name="s_name" type="text" value="<?php echo $page->s_name; ?>">
                </div>
                <div class="form-group">
                    <b>Email:</b> <?php echo $page->s_email; ?>
                </div>
                <div class="form-group">
                    <a class="btn btn-info btn-sm" href="/change_email">Change Email</a>
                    <a class="btn btn-danger btn-sm" href="/change_password">Change Password</a>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" name="s_phone" class="numeric" type="text" value="<?php echo $page->s_phone; ?>">
                </div>
                <div class="form-group">
                    <label>Address (billing address)</label>
                    <textarea class="form-control" name="s_address"><?php echo $page->s_address; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-sm">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>