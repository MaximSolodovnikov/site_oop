<?php
class admin extends ACore_admin {
	
    public function get_content() {

        $query = "SELECT id_article, title_article FROM articles";
        $result = mysql_query($query);

        if(! $result) {

                exit("<br />Ошибка выборки<br />" . mysql_error());

        }
        echo "<div id='wrapper_admin'>";
        echo "<h2><a href='?option=add_article'>Добавление статьи.<a/></h2><hr />";
        
        if($_SESSION['res']) {
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }
        
        $cat = $this->get_categories();  

        $row = array();
        for($i = 0; $i < mysql_num_rows($result); $i++) {

                $row = mysql_fetch_array($result, MYSQL_ASSOC);?>

                    <h2>Статья: <?php echo $row['title_article'];?></h2>
                    <a href='?option=update_article&id_text=<?php echo $row['id_article'];?>'>
                        Редактировать статью.
                    </a>
                    <a href='?option=delete_article&id_text=<?php echo $row['id_article'];?>'>
                        Удалить статью.
                    </a>
                    <hr />
        <?php }		
        echo "</div>";
    }
}