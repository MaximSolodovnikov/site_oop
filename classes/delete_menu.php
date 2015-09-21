<?php
class delete_menu extends ACore_admin {
    
    public function get_content() {  
    }
    
    public function obr() {
        
        if($_GET['del']) {
            
           $id_menu = (int)$_GET['del'];
           
            $query = "DELETE FROM `menu` WHERE `id_menu` = '$id_menu'";
        
            if( ! mysql_query($query)) {
                exit ("Ошибка удаления из БД" . mysql_error());
            }
            else {
                $_SESSION['res'] = "Пункт меню успешно удален";
                header("Location:?option=edit_menu");
                exit();
            }
        }
        else {
            exit ("Не верные данные для отображения страницы");
        }
    }
}