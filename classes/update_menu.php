<?php
class update_menu extends ACore_admin {
	
    protected function obr() {
     
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        if(! empty($title) || ! empty($text)){

            $query = "UPDATE `menu`
                      SET `name_menu`='$title', `text_menu`='$text'
                      WHERE `id_menu`='$id'";
            
            if(! mysql_query($query)) {
                exit("<br />Ошибка внесения в БД<br />" . mysql_error());
            }
            else {
                $_SESSION['res'] = "Данные успешно внесены в БД";
                header("Location:?option=edit_menu");
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
		
		$menu = $this->get_data_menu($id_text);
		echo "<div id='wrapper'>";
		
		if($_SESSION['res']) {
                    echo $_SESSION['res'];
                    unset($_SESSION['res']);
		}
 ?>
    <form action='' method='POST'>
        <p>Заголовок пункта меню<br />
            <input type='text' name='title' value='<?php echo $menu['name_menu']; ?>' />
            <input type='hidden' name='id' value='<?php echo $menu['id_menu']; ?>' />
        </p>
        <p>Текст меню<br />
            <textarea name='text' rows='10' cols='50'><?php echo $menu['text_menu']; ?></textarea>
        </p><br />
        <p><input type='submit' name='bottom' value='Сохранить' /></p>
    </form>
<?php echo "</div>";
    }
}