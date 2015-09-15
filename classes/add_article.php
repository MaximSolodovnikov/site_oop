<?php
class add_article extends ACore_admin {
	
	public function get_content() {
		
		echo "<div id='wrapper'>";
print <<<HEREDOC
<form enctype='multipart' action='' metod='POST'>
<p>Заголовок статьи<br />
<input type='text' name='title' />
</p>
<p>Изображение<br />
<input type='file' name='img_src' />
</p>
<p>Краткое описание<br />
<textarea name='description' rows='7' cols='50'></textarea>
</p>
<p>Краткое описание<br />
<textarea name='text' rows='10' cols='50'></textarea>
</p>
<select name='cat'>
<option value=''></option>
</select><br /><br />
<input type='submit' name='bottom' value='Сохранить' />
</form>
HEREDOC;
echo "</div>";
		
	}
	
}