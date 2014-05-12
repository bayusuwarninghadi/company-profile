    <? if (!$isLogin && !$subscribe) { ?>
        <div class="subscribe alert alert-success">
            <form class="search" action="/subscribe" method="post">
                <div class="form-group">
                    <div class="modal-header">
                        <button type="button" class="close">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">NewsLetter</h4>
                    </div>
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Enter your email here" name="s_email" class="form-control" placeholder="Username">
                    <span class="input-group-addon">@</span>
                </div>
            </form>
        </div>
        <style type="text/css">
            .subscribe {
                position: fixed;
                bottom: 10px;
                right: 10px;
                width: 300px;
            }
        </style>
        <script type="text/javascript">
            $(".subscribe .close").click(function () {
                $('.subscribe').toggle();
                $.post("/session/set?key=subscribe&value=1");
            })
        </script>
    <? } ?>
    </div>
</div>
</body>

<footer style="padding: 60px 0;">
    <div class="container">
        <div class="center">
            <div class="form-group">
                <a href="/about">About Us</a>
                <a href="/contact">Contact Us</a>
                <a href="/carrer">Carrer</a>
                <a href="/page/29">Privacy policy</a>
                <a href="/page/30">Terms of service</a>
                <a href="<?=$setting['facebook_url']?>"><i class="icon-facebook-sign"></i></a>
                <a href="<?=$setting['twitter_url']?>"><i class="icon-twitter-sign"></i></a>
            </div>
            <div class="form-group">
                <small>COPYRIGHT &copy; 2013 <?=strtoupper($setting['site_name'])?></small>
            </div>

        </div>
    </div>

</footer>
</html>