<?php
	class Socio{
		var $id;
		var $nombre;
		var $telefono;
		var $correo;
		var $fecha_nac;
		var $domicilio;
		var $fecha_soc;
		var $vinculo;

		function Socio(){
			$this->nombre = "";
			$this->telefono = "";
			$this->correo = "";
			$this->fecha_nac = "";
			$this->domicilio = "";
			$this->fecha_soc = "";
			$this->vinculo = null;
		}

		function setSocio($nombre, $telefono, $correo, $fecha_nac, $domicilio, $fecha_soc){
			$this->nombre = $nombre;
			$this->telefono = $telefono;
			$this->correo = $correo;
			$this->fecha_nac = $fecha_nac;
			$this->domicilio = $domicilio;
			$this->fecha_soc = $fecha_soc;
			$this->vinculo = "NULL";
		}

		function addSocio(){
			require_once('db.php');
			$data = new DataBase();
			$data->open();
			if($this->nombre!="" && $this->correo!="" && $this->telefono!="" 
				&& $this->domicilio!="" && $this->fecha_nac!=""){
				$query = "INSERT INTO Socio (nombre, telefono, correo, fecha_nac, domicilio, fecha_soc, vinculo)
						VALUES ('$this->nombre', '$this->telefono', '$this->correo', '$this->fecha_nac',
							'$this->domicilio', '$this->fecha_soc', $this->vinculo)";
				$result = $data->execute($query);
				$data->close();
				return $result;
			} else {
				return false;
			}
		}

		function getAll(){
			require_once('db.php');
			$data = new DataBase();
			$data->open();
			$query = "SELECT * FROM Socio";
			$result = $data->execute($query);
			$lista = array();
			while($row = $data->fetch_array($result)){
				$elemento = new Socio();
				$elemento->id = $row[0];
				$elemento->setSocio($row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
				$elemento->setVinculo($row[7]);
				$lista[] = $elemento;
			}
			$data->close();
			return $lista;
		}

		function getSocio($id){
			$this->id = $id;
			require_once('db.php');
			$data = new DataBase();
			$data->open();
			$query = "SELECT * FROM Socio WHERE id_socio = $id";
			$result = $data->execute($query);
			while($row = $data->fetch_array($result)){
				$this->id = $row[0];
				$this->nombre = $row[1];
				$this->telefono = $row[2];
				$this->correo = $row[3];
				$this->fecha_nac = $row[4];
				$this->domicilio = $row[5];
				$this->fecha_soc = $row[6];
				$this->vinculo = $row[7];
			}
			$data->close();
		}

		function addVinculo(){
			require_once('db.php');
			$data = new DataBase();
			$data->open();
			$query = "UPDATE Socio SET Socio.Vinculo = $this->vinculo WHERE Socio.id_socio = $this->id";
			$result = $data->execute($query);
			$data->close();
			return $result;
		}

		function setVinculo($vinculo){
			$this->vinculo = $vinculo;
		}

		function getVinculoId(){
			return $this->vinculo;
		}

		function getVinculo(){
			$svinculo = new Socio();
			require_once('db.php');
			$data = new DataBase();
			$data->open();
			$query = "SELECT * FROM Socio WHERE id_socio = $this->vinculo";
			$resultado = mysqli_query($data->get_connect(), $query);
			while($row = mysqli_fetch_array($resultado)){
				$svinculo->id = $row[0];
				$svinculo->nombre = $row[1];
				$svinculo->telefono = $row[2];
				$svinculo->correo = $row[3];
				$svinculo->fecha_nac = $row[4];
				$svinculo->domicilio = $row[5];
				$svinculo->fecha_soc = $row[6];
				$svinculo->vinculo = $row[7];
			}
			$data->close();
			return $svinculo;
		}

		function setNombre($nombre){
			$this->nombre = $nombre;
		}

		function setTelefono($telefono){
			$this->telefono = $telefono;
		}

		function setCorreo($correo){
			$this->correo = $correo;
		}

		function setFechaNac($fecha_nac){
			$this->fecha_nac = $fecha_nac;
		}

		function setDomicilio($domicilio){
			$this->domicilio = $domicilio;
		}

		function setFechaSoc($fecha_soc){
			$this->fecha_soc = $fecha_soc;
		}

		function getId(){
			return $this->id;
		}

		function getNombre(){
			return $this->nombre;
		}

		function getTelefono(){
			return $this->telefono;
		}

		function getCorreo(){
			return $this->correo;
		}

		function getFechaNac(){
			return $this->fecha_nac;
		}

		function getDomicilio(){
			return $this->domicilio;
		}

		function getFechaSoc(){
			return $this->fecha_soc;
		}
	}
?>