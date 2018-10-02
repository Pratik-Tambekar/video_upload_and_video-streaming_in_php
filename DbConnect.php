<?php
/**
* Database Connection
*/
class DbConnect
{
	private $server="localhost";
	private $dbname="videos";
	private $username="root";
	private $password="";
	function connect()
	{

		try {
		    $conn = new PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $conn;
		    //echo "Connection ok!";
		    } catch (PDOException $e) {
		    echo "Err: " . $e->getMessage();
		    }
		/*try{

				$conn = new PDO('mysql:host'.$this->server .';dbname='.$this->dbname, $this->user, $this->password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
		}catch(\Exception $e)
		{
			echo "Database Error".$e->getMessage();
		}*/
		
	}
}

/*$db = new DbConnect;
$db->connect();*/
?>