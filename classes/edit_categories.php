<?php
class edit_categories extends ACore_admin {
	
    public function get_content() {

        $query = "SELECT `id_category`, `name_category` FROM `categories`";
        $result = mysql_query($query);

        if( ! $result) {

                exit("<br />Ошибка выборки<br />" . mysql_error());

        }
        echo "<div id='wrapper_admin'>";
        echo "<h2><a href='?option=add_category'>Добавление категории<a/></h2><hr />";
        
        if($_SESSION['res']) {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }

        $row = array();
        
        for($i = 0; $i < mysql_num_rows($result); $i++) {

                $row = mysql_fetch_array($result, MYSQL_ASSOC);?>

                    <h2>Категория: <?php echo $row['name_category'];?></h2>
                               
                    <a href='?option=update_category&id_text=<?php echo $row['id_category'];?>'>
                        Редактировать категорию
                    </a>
                    <a href='?option=delete_category&del=<?php echo $row['id_category'];?>'>
                        Удалить категорию
                    </a>
                    <hr />
        <?php } 
       
        echo "</div>";
    }
}