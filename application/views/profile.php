<html>
<body>

<div class="upper">
<div class="profile">
<h2>Profile</h2>
<img src="/share_out/uploads/defaultpic.png" alt="Profile Picture" width=80 height=80/>
</div>
<div class="profile_details">
Name: <?php echo $username; ?> <br />
email: <?php echo $email; ?> <br />


<?php 
 if ( ! $own_page) {
if ($following)
{ ?>
	<a href="<?php echo site_url('profile/unfollow/'.$user_id);?>">Unfollow</a>
<?php } else { ?>
	<a href="<?php echo site_url('profile/follow/'.$user_id);?>">Follow</a>
<?php } }
?>
</div>
</div>
</body>
</html>
