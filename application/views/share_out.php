<html>
<body>

<h1>ShareOut!</h1>

<nav>
  <ul>
      <li><a href="friends_post.php">Friends Post</a>
	  <li><a href="interests_post.php">Interests Post</a>
	  <li><a href="share_out.php">ShareOut</a>
	  <li><a href="#">Profile</a>
	  </ul>
</nav>
<h2>Go ahead post anything...</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('content/add_post'), array('class'=>'post_anything') ?>

Choose what you are posting...
<select value="post_anything">
 <option value="option1">Advertisement</option>
 <option value="option2">Idea</option>
</select>
<br>
Title:
<input type="text" name="title" value="<?php echo set_value('title'); ?>"/>
<br>
Description:
<textarea name="description" value="<?php echo set_value('description');?>" cols=50 rows=5 placeholder="Please give a description..."></textarea>
<br>
<input type="submit" value="Post"/>
</form>
</body>
</html>