<html>
<body>

<div class="upper">
<div class="profile">
<h2>Profile</h2>
<img src="defaultpic.png" alt="Profile Picture" width=80 height=80/>
</div>
<div class="profile_details">
Name: <?php echo $username; ?> <br />
email: <?php echo $email; ?> <br />

<a href="<?php echo site_url('profile/follow/'.$user_id);?>">Follow</a>
</div>
</div>
</body>
</html>
