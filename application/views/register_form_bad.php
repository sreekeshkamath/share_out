<?php echo form_open('auth/login') array('class' => 'login_label'?>

<h2>Log In:</h2>
<br>
Username:
<input type="text" name="username" value="<?php echo set_value('username') ?>">
Password:
<input type="password" name="password" value="<?php echo set_value('password') ?>">

</form>





<h1>Sign Up</h1>

<?php echo form_open('auth/register' array('class' => 'register_label') ?>
Email:
<input type="text" name="email" value="<?php echo set_value('email')?> ">

Username:
<input type="text" name="username" value="<? php echo set_value('username')?>" >

Password:
<input type="password" name="password" value="<? php echo set_value('password')?>">

</form>

