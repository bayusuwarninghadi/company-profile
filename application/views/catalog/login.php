<div class="product panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Login</h1>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <form action="/login" id="loginForm" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="s_email">Username</label>
                    <input type="email" class="form-control" name="s_email" placeholder="Username / Email">
                </div>
                <div class="form-group">
                    <label for="s_password">Password</label>
                    <input type="password" class="form-control" name="s_password" placeholder="Password">
                </div>
                <input class="btn btn-info" type="submit" value="Sign In">
                <div>Dont have Account? Please <a href="/register">Sign Up</a></div>
            </form>
        </div>
    </div>
</div>