<?php
class add_article extends ACore_admin {
	
	public function get_content() {
		
		echo "<div id='wrapper'>";
		$cat = $this->get_categories();
		
		
		
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
HEREDOC;

foreach($cat as $item) {
			
	echo "<option value='" .$item['id_category'] . "'>" . $item['name_category'] . "</option>";
	
}
	echo "</select><br /><br /><input type='submit' name='bottom' value='Сохранить' /></form></div>";
	}
}
