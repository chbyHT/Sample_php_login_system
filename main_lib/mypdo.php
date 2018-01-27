<?php

class MyPDO extends PDO{

  private $_dsn = "mysql:hostname=localhost;dbname=chby";
  private $_user = "root";
  private $_pwd = "112092";
  private $_encode = "utf8";
  private $_stm;

    function __construct(){
        parent::__construct($this->_dsn,$this->_user,$this->_pwd);
        $this -> _setencode();
    }

    private function _setencode(){
        $this -> query("SET NAMES '{$this->_encode}'");
    }

    function bindquery($sql,array $bind = []){
        $this -> _stm = $this  -> prepare($sql);
        $this -> _bind($bind);
        return $this -> _stm -> execute();
    }

    private function _bind($bind){
      foreach ($bind as $key => $value) {
        $this -> _stm -> bindValue($key,$value,PDO::PARAM_STR);
      }
    }

    function getall(){
      return $this -> _stm -> fetchAll();
    }

    function get(){
      return $this -> _stm -> fetch();
    }


    function getall_assoc(){
      return $this -> _stm -> fetchAll(PDO::FETCH_ASSOC);
    }

    function get_assoc(){
      return $this -> _stm -> fetch(PDO::FETCH_ASSOC);
    }


    function getall_num(){
      return $this -> _stm -> fetchAll(PDO::FETCH_NUM);
    }

    function get_num(){
      return $this -> _stm -> fetch(PDO::FETCH_NUM);
    }
}

 ?>
