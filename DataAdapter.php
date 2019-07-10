<?php
    class DataAdapter {
        protected $mysqli = null;
        public function __construct($mysqli){
            $this->mysqli=$mysqli;
        }
}
?>