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
            $sql = $this->_mysqli->prepare("INSERT INTO user (name, email, password)  VALUES(?,?,?)");
            $sql->bind_param('sss', $name, $email, $password);
            $status = $sql -> execute();
            return $status;
        }
    }
?>