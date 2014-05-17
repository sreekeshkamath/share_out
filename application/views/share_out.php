<h2>Go ahead post anything...</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('content/add_post', array('class'=>'post_anything')) ?>

<select name="type">
	<option value="0" selected="selected">Select a type</option>
	<option value="1">Advertisement</option>
	<option value="2">Idea</option>
</select>
<br>
Title:
<input type="text" name="title" value="<?php echo set_value('title'); ?>"/>
<br>
Description:<br />
<textarea name="description" cols=50 rows=5 placeholder="Please give a description..."><?php echo set_value('description');?></textarea>
<br>

<input type="submit" value="Post"/>
</form>

