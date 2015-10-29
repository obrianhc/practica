<?php
	require_once('db.php');
	class testDB extends PHPUnit_Framework_TestCase
	{
		function testOpen(){
			$data = new DataBase();
			$this->assertEquals(mysqli_select_db(mysqli_connect("127.0.0.1","root",""),"screen"), $data->open());
			$data->close();
		}

		function testConnection(){
			$data = new DataBase();
			$data->open();
			$this->assertEquals(mysqli_connect("127.0.0.1","root",""), $data->get_connect());
			$data->close();
		}

		function testClose(){
			$server="127.0.0.1";
			$user="root";
			$password="";
			$db="screen";
			$connect = mysqli_connect($server,$user,$password);
			$data = new DataBase();
			$data->open();
			$this->assertEquals(mysqli_close($connect), $data->close());
		}
	}
?>