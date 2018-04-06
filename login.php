<?php 
	include('header.php');
	include('menu.php');

?>

	<div class="container-fluid top-sign-in-container">
		<div class="row">
			<div class="col-sm-12">
				<p class="Sign-In">Συνδεθείτε στο<span> my</span><span class="mysign">Constructor</span><span>.gr</span></p>
				<div class="new-sign-in-form">
					<form id="loginForm">
						<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
						<div class="sign-in-from">
							<div class="form-group">
								<input class="form-control" id="exampleInputEmail1" name="username" value="" placeholder="E-mail*" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" id="exampleInputPassword1" placeholder="Κωδικός*" name="pwd" value="" type="password">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-field-inner-part">
								<div class="checkbox">
									<label><input name="rememberme" type="checkbox">Κρατήστε με συνδεδεμένο</label>
								</div>
								<div class="Forgot_your">
									<label for="exampleInputFile"><a href="<?php echo SITE_URL;?>professional-profile/forget_password.html">Ξεχάσατε τον κωδικό σας;</a></label>
								</div>
							</div>
							<div class="login-btn">
								<input value="Συνδεθείτε" type="submit">
								<!--<p class="or"></p>-->
							</div>
							<div class="login-btnfb">

								<a href="javascript:void(0)">
									<button class="fb-login-btn" onclick="javascript:Login();"> 
										<img style="width: 12px; height: 23px" src="<?php echo SITE_URL;?>img/f.png" onclick="Login();" alt="">Συνδεθείτε μέσω Facebook
									</button>
								</a>
							</div>
						</div>
					</form>
				</div><!-- new-sign-in-form -->
			</div>
		</div>
	</div><!-- top-sign-in-container-->
</div>



<script src="js/core.js" type="text/javascript"></script>
<script src="professional-profile/js/professional-profile.js" type="text/javascript"></script>

<?php 
	include('footer.php');

?>