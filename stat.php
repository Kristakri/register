<?php
    include_once 'DataAdapter.php';
    class Stat extends DataAdapter{

        public function __construct($mysqli){
            parent::__construct($mysqli);
        }

        public function insertData()
        {
            $name = 'Sasha';
            $email = 'sfsf@mail.ru';
            $password = '1313';
        }
    }
?>