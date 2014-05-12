<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Change Email</h1>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <form action="/change_email" id="pageEdit" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <b>Current Email:</b> <?php echo $page->s_email; ?>
                </div>
                <div class="form-group">
                    <label>New Email</label>
                    <input name="s_email" type="email" class="form-control" value="">
                </div>
                <a href="/profile" class="btn btn-danger btn-sm">Back</a>
                <input class="btn btn-info btn-sm" type="submit" value="Change Email">
            </form>
        </div>
    </div>
</div>