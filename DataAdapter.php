<?php
    class DataAdapter {
        protected $_mysply = null;
        public function __construct($mysqli){
            $this->_mysqli=$mysqli;
        }
    }
?>