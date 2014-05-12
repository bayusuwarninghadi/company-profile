<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Change Password</h1>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <form action="/change_password" id="pageEdit" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label>Current Password:</label>
                    <input class="form-control" name="old_password" type="password" value="">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" name="password1" type="password" value="">
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    <input class="form-control" name="password2" type="password" value="">
                </div>
                <a href="/profile" class="btn btn-danger btn-sm">Back</a>
                <input class="btn btn-info btn-sm" type="submit" value="Change Password">
            </form>
        </div>
    </div>
</div>