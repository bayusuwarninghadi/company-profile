<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">Contact Us</h1>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <form action="/contact" id="loginForm" method="post">
                <div class="form-group">
                    <label for="s_name">Name</label>
                    <input type="text" class="form-control" value="<?=@$loggedUser->s_name?>" name="s_name">
                </div>
                <div class="form-group">
                    <label for="s_email">Email</label>
                    <input type="text" class="form-control" value="<?=@$loggedUser->s_email?>" name="s_email">
                </div>
                <div class="form-group">
                    <label for="s_message">Message</label>
                    <textarea name="s_message" class="form-control"></textarea>
                </div>
                <input type="submit" value="Send">

                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>
