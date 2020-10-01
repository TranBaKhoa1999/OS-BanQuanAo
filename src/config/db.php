<?php
  class DBConnection{
	private $db;
    public function __construct() {
    
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'os_banquanao';

	  try{
		$this->db = new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password);
		$this->db->query("SET CHARACTER SET utf8;");

		$this->db->query("SET collation_connection = utf8_unicode_ci;");
		$this->db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  }
	  catch(PDOException $e){
		  echo 'ERR: '. $e->getMessage();
	  };
    }
    protected function runQuery(string $sql) {
		  return $result = $this->db->prepare($sql);
    }
  }
?>