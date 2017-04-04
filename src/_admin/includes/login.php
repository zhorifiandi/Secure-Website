<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'process/loginProcess.php';
?>

<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Welcome to Mini Blog!</h1>
                <h1>You are...</h1>
                <br>
                <br>
			</div>

			<div class="login-form">
                <form method="post" action="">
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="username" id="login-name" name="username">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="password" id="login-pass" name="password"><br><br>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<!--<a class="btn btn-primary btn-large btn-block" href="#">login</a>-->
                <input class="btnx btn-primary btn-large btn-block" type="submit" name="submit" value="LOG IN"><br><br>
                </form>
                <font color="red"><?php echo (!empty($loginMsg))?$loginMsg:"";?></font>
			</div>
		</div>
</div>

<?php require('../includes/footer.php');?>