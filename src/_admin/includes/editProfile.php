<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'process/editProfileProcess.php';
?>

<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Change your password become...</h1>
                <br>
                <br>
			</div>

			<div class="login-form">
                <form method="post" action="">
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="new password" id="newPassword" name="newPassword"><br><br>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

                <input class="btnx btn-primary btn-large btn-block" type="submit" name="changePassword" value="SAVE">
                </form>
                <form method="post" action="<?php echo $base_url;?>">
                <input class="btnx btn-primary btn-large btn-block" type="submit" name="cancelChangePassword" value="CANCEL"><br><br>
                </form>
                <font color="red"><?php echo (!empty($loginMsg))?$loginMsg:"";?></font>
			</div>
		</div>
</div>

<?php require('../includes/footer.php');?>