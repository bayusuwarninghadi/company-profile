<div class="container white round2 shadow wood-pattern">
        <form action="/register" id="loginForm" method="post" autocomplete="off" style="max-width: 300px; margin: 50px auto">>
            <h1>Register</h1>
            <div class="row">
		        <label>Basic Setting</label>
		        <input type="text" name="s_name" placeholder="Full Name" value="<?=$s_name?>">
		        <input type="text" name="s_email" placeholder="Email" value="<?=$s_email?>">
		        <input type="text" name="s_phone" class="numeric" placeholder="Phone Number ex : 08123456789" value="<?=$s_phone?>">
		        <textarea name="s_address" placeholder="Address"><?=$s_address?></textarea>
	        </div>
	        <div class="row">
		        <label>Password</label>
		        <input type="password" name="s_password" placeholder="Password">
	        </div>
            <div>
                <input name="agreement" type="checkbox" checked="checked" value="1">I am agree with <a href="/page/29">privacy policy</a> and <a href="/page/30">term
                of service</a></div>
            <input type="submit" value="Sign Up">

            <div class="clear"></div>
        </form>

</div>
