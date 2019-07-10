<?php
    include_once 'DataAdapter.php';
    include 'bd.php';

    class Stat extends DataAdapter{

        public function __construct ($mysqli){
            parent::__construct($mysqli);
        }

        public function insertData()
        {
          $name='Alex';
          $email='alex123@mail.ru';
          $password='1234567890';
          $sql=$this->mysqli->prepare("INSERT INTO User (name,email,password) VALUES(?,?,?)");
          $sql->bind_param('sss',$name,$email,$password);
          $status=$sql->execute();    
          return $status;
        }

        public function selectStat()
        {
           $sql=$this->mysqli->prepare('SELECT id,name FROM User ');
          //$sql->bind_param();
           $status=$sql->execute();
           if($status){
                $result=$sql->get_result();
                $returnArray=[];
                $row=$result->fetch_assoc();

                while($row){
                    $returnArray[]=$row;
                    $row=$result->fetch_assoc();
                }
                $result->free();
                return $returnArray;
            }
        }   
    }
?>