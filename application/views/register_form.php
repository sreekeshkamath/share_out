<?php echo form_open('auth/login', array('class' => 'login_label')) ?>

<?php echo validation_errors(); ?>

<?php if ( ! isset($hide_login)) { ?>
	<h2>Log In:</h2>
	
	<br>
	Username:
	<input type="text" name="username" value="<?php echo set_value('username') ?>"/>
	Password:
	<input type="password" name="password"  />

	<input type="submit" name="login_submit" value="Login"/>

	</form>
<?php } ?>




<?php if ( ! isset($hide_register)) { ?>
	<h1>Sign Up</h1>
	
	<?php echo form_open('auth/register', array('class' => 'register_label')) ?>
	Email:
	<input type="text" name="email" value="<?php echo set_value('email')?> "/>

	Username:
	<input type="text" name="username" value="<?php echo set_value('username')?>" />

	Password:
	<input type="password" name="password" />

	Password Confirmation:
	<input type="password" name="passconf" />


	<input type="submit" name="register_submit" value="Sign Up"/>

	</form>

<?php } ?>

