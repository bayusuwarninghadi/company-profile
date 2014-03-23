<div class="container white round2 shadow wood-pattern">
    <div class="pad1">
        <div class="fleft banner">
            <h1>Contact Us</h1>
            <hr>
            <?=$store->s_body?>
        </div>
        <form action="/contact" class="fleft" id="loginForm" method="post">
            <div class="field">
                <div class="label">Name</div>
                <input type="text" value="<?=@$loggedUser->s_name?>" name="s_name">
            </div>
            <div class="field">
                <div class="label">Email</div>
                <input type="text" value="<?=@$loggedUser->s_email?>" name="s_email">
            </div>
            <div class="field">
                <div class="label">Message</div>
                <textarea name="s_message" style="width: 350px; height: 200px;"></textarea>
            </div>
            <input type="submit" value="Send">

            <div class="clear"></div>
        </form>
        <div class="clear"></div>
    </div>
</div>