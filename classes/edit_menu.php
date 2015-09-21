<?php
class edit_menu extends ACore_admin {
    
    public function get_content() {

        $query = "SELECT `id_menu`, `name_menu` FROM `menu`";
        $result = mysql_query($query);

        if( ! $result) {

                exit("<br />Ошибка выборки<br />" . mysql_error());

        }
        echo "<div id='wrapper_admin'>";
        echo "<h2><a href='?option=add_menu'>Добавление пункта меню<a/></h2><hr />";
        
        if($_SESSION['res']) {
            
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        } 

        $row = array();
        
        for($i = 0; $i < mysql_num_rows($result); $i++) {

                $row = mysql_fetch_array($result, MYSQL_ASSOC);?>

                    <h2>Пункт меню: <?php echo $row['name_menu'];?></h2>
                                        
                    <a href='?option=update_menu&id_text=<?php echo $row['id_menu'];?>'>
                        Редактировать пункт меню
                    </a>
                    <a href='?option=delete_menu&del=<?php echo $row['id_menu'];?>'>
                        Удалить пункт меню
                    </a>
                    <hr />
        <?php } 
       
        echo "</div>";
    }
}
