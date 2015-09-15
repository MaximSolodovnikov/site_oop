<?php
class update_article extends ACore_admin {
	
	protected function obr() {
		
		if(! empty($_FILES['img_src']['tmp_name'])) {
			
			$uploaddir = 'img/';
			if(! move_uploaded_file($_FILES['img_src']['tmp_name'], 
									$uploaddir . $_FILES['img_src']['name'])) {
				exit("Не удалось загрузить изображение.");				
			}
			$img_src = $uploaddir . $_FILES['img_src']['name'];
		}
		
		$title = $_POST['title'];
		$description = $_POST['description'];
		$text = $_POST['text'];
		$date = $_POST['date'];
		$cat = $_POST['cat'];
		
		if(! empty($title) || ! empty($description) || ! empty($text)){
			
			$query = "INSERT INTO articles (title_article, img_src, description_article, text_article, date, cat)
					  VALUES('$title','$img_src', '$description', '$text', '$date', '$cat')";
			if(! mysql_query($query)) {
				
				exit("<br />Ошибка внесения в БД<br />" . mysql_error());
				
			}
			else {
				
				$_SESSION['res'] = "Данные успешно внесены в БД";
				header("Location:?option=add_article");
				exit();
			}
		}
		else {
			exit("<br />Вы не заполнили все поля.<br />");
		}
	}
	
	public function get_content() {
		
		if($_GET['id_text']) {
			
			$id_text = (int)$_GET['id_text'];
			
		}
		else {
			
			exit("Не верные данные для данной страницы.");
			
		}
		
		$data_art = $this->get_data_art($id_text);
		
		echo "<div id='wrapper'>";
		
		if($_SESSION['res']) {
			
			echo $_SESSION['res'];
			unset($_SESSION['res']);
		}
		$cat = $this->get_categories();
				
print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
<p>Заголовок статьи<br />
<input type='text' name='title' value='$data_art[title_article]' />
<input type='hidden' name='id' value='$data_art[id_article]' />
</p>
<p>Изображение<br />
<input type='file' name='img_src' />
</p>
<p>Краткое описание<br />
<textarea name='description' rows='7' cols='50'>$data_art[description_article]</textarea>
</p>
<p>Текст статьи<br />
<textarea name='text' rows='10' cols='50'>$data_art[text_article]</textarea>
</p>
<p>Дата<br />
<input type='date' name='date' value='$data_art[date]' />
</p>
<select name='cat'>
HEREDOC;

foreach($cat as $item) {
	
	if($data_art['cat'] == $item['id_category']) {
		
		echo "<option selected value='" .$item['id_category'] . "'>" . $item['name_category'] . "</option>";
		
	}
	else {
		
		echo "<option value='" .$item['id_category'] . "'>" . $item['name_category'] . "</option>";
		
	}
	
}
	echo "</select><br /><br /><input type='submit' name='bottom' value='Сохранить' /></form></div>";
	}
}
