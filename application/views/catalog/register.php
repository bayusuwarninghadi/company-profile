<div class="product panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Register</h1>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <form action="/register" id="loginForm" method="post" autocomplete="off">
                <div class="form-group">
                    <input type="text" class="form-control" name="s_name" placeholder="Full Name" value="<?=$s_name?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="s_email" placeholder="Email" value="<?=$s_email?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="s_phone" class="numeric" placeholder="Phone Number ex : 08123456789" value="<?=$s_phone?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="s_address" placeholder="Address"><?=$s_address?></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="s_password" placeholder="Password">
                </div>
                <div>
                    <div class="form-group">
                        <input name="agreement" type="checkbox" checked="checked" value="1"> I am agree with <a href="/page/29">privacy policy</a> and <a href="/page/30">term
                            of service</a></div>
                </div>
                <input class="btn btn-info" type="submit" value="Sign Up">

            </form>
        </div>

    </div>
</div>