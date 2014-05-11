		<? if (!$isLogin && !$subscribe) { ?>
		<div class="subscribe pad1 white shadow2">
			<div class="content">
				<div class="close pad1 white bold">&times;</div>
				<form class="search" action="/subscribe" method="post">
					<div class="row">
						<label>Newsletter: </label>
						<hr>
						<p>Read latest news from us by subscribe our website, provide your email below</p>
					</div>
					<input class="fleft" type="text" placeholder="Enter your email here" name="s_email">
					<button class="fleft" type="submit" style="margin: 0 -5px;"><i class="icon-envelope"></i></button>
					<div class="clear"></div>

				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(".subscribe .close").click(function () {
				$('.subscribe').toggle();
				$.post("/session/set?key=subscribe&value=1");
			})
		</script>
		<? ?>
		<? } ?>
	</div>
</body>

<footer>
    <section class="gray-bg">
        <div class="container">
            <div class="center" style="margin-top: 40px;">
                <a href="/about">About Us</a>
                <a href="/contact">Contact Us</a>
                <a href="/carrer">Carrer</a>
                <a href="/page/29">Privacy policy</a>
                <a href="/page/30">Terms of service</a>
                <a href="<?=$setting['facebook_url']?>"><i class="icon-facebook-sign"></i></a>
                <a href="<?=$setting['twitter_url']?>"><i class="icon-twitter-sign"></i></a>
                <hr>
                <small>COPYRIGHT &copy; 2013 FLOW SHOP. All Right Reserved</small>

            </div>
        </div>
    </section>
</footer>
</html>