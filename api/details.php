<?php
    class Details extends ACore {   
        public function get_content(){
            if (isset($_GET['id'])) {
                $id=$this->formatstr($_GET['id']);
                include ("modules/mod_detail.php");             
            } else {            
                echo "<p>Не правильные данные</p>";
            }           
        }
    }
