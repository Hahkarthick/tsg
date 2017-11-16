<?php
 
  class Database {

	  protected static $_instance;
	  protected $_connection;
	  protected $_dns = 'mysql:host=98.130.0.89;dbname=pelluci_santhosh';
	  protected $_username = 'pelluci_calc';
	  protected $_password = 'Santhosh2017';

	  /**
	  * Singleton pattern implementation makes "new" unavailable
	  */
	  protected function __construct()
	  {
		  $this->_connection = 
			  new PDO($this->_dns, $this->_username, $this->_password);
	  }

	  public function getConnection()
	  {
		  return $this->_connection;
	  }

	  public static function getInstance()
	  {
		  if (null === self::$_instance) {
			  self::$_instance = new self();
		  }
		  return self::$_instance;
	  }

	  /**
	  * Singleton pattern implementation makes "clone" unavailable
	  */
	  protected function __clone()
	  {}
  }


  function debug($msg)
  {
	  echo "<br/> debug .... "  . $msg;
  }

  function out($msg)
  {
	  echo "<br/> " . $msg;
  }


  function pvalue($key)
  {
	  return $_POST[$key];
  }

  function gvalue($key)
  {
	  return $_GET[$key];
  }


?>
