<?php
	class DataBase{
		private $server;
		private $user;
		private $password;
		private $db;
		private $connect;

		function open(){
			$this->server="127.0.0.1";
			$this->user="root";
			$this->password="";
			$this->db="screen";
			$this->connect = mysqli_connect($this->server,$this->user,$this->password) or die ('Error conectando con el servidor: '.mysqli_error()); 
			return mysqli_select_db($this->connect, $this->db) or die ('Error seleccionando la DB: '.mysqli_error($this->connect));
		}

		function execute($query){
			return mysqli_query($this->connect, $query);
		}

		function close(){
			return mysqli_close($this->connect);
		}

		function fetch_array($mysql_result){
			return @mysqli_fetch_array($mysql_result);
		}

		function get_connect(){
			return $this->connect;
		}
	}
?>