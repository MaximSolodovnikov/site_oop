<?php
class update_category extends ACore_admin {
	
    protected function obr() {
     
        $id = $_POST['id'];
        $title = $_POST['title'];

        if(! empty($title)){

            $query = "UPDATE `categories`
                      SET `name_category`='$title'
                      WHERE `id_category`='$id'";
            
            if(! mysql_query($query)) {
                exit("<br />Ошибка внесения в БД<br />" . mysql_error());
            }
            else {
                $_SESSION['res'] = "Данные успешно внесены в БД";
                header("Location:?option=edit_categories");
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
		
		$category = $this->get_data_cat($id_text);
		echo "<div id='wrapper'>";
		
		if($_SESSION['res']) {
                    echo $_SESSION['res'];
                    unset($_SESSION['res']);
		}
 ?>
    <form action='' method='POST'>
        <p>Название категории<br />
            <input type='text' name='title' value='<?php echo $category['name_category']; ?>' />
            <input type='hidden' name='id' value='<?php echo $category['id_category']; ?>' />
        </p><br />
        <p><input type='submit' name='bottom' value='Сохранить' /></p>
    </form>
<?php echo "</div>";
    }
}