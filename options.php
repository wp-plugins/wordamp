<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	update_option('wordamp_content_filter', $_POST['wordamp_content_filter']);
	
}

?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>WordAMP Settings</h2>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Add to posts automatically</th>
				<td id="wordamp-content-filter">
					<fieldset>
						<legend class="screen-reader-text"><span>Add WordAMP to posts automatically</span></legend>
						<p><label><input name="wordamp_content_filter" type="radio" value="1" class="tog" <?php if (get_option('wordamp_content_filter') == 1) echo 'checked="checked"'; ?> />Yes, add WordAMP to single post pages automatically.</label></p>
						<p><label><input name="wordamp_content_filter" type="radio" value="0" class="tog" <?php if (get_option('wordamp_content_filter') == 0) echo 'checked="checked"'; ?> />No, I will manually write the WordAMP shortcode into my posts (e.g. <code>[wordamp subject="my subject"]</code> or <code>[wordamp]my subject[/wordamp]</code>).</label></p>
						<p class="description">Note: WordAMP will attempt to detect the subject (a) if the plugin is added to posts automatically or (b) where the subject is omitted from a shortcode (e.g. <code>[wordamp]</code>).</p>
					</fieldset>
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>