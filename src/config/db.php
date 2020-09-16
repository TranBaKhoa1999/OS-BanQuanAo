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

		$this->db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo 'success';
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