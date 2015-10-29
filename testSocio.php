<?php
	require_once('Socio.php');
	class testSocio extends PHPUnit_Framework_TestCase
	{
		function testSetSocio(){
			$socio = new Socio();
			$socio->setSocio("Socio1", "57545796", "correo1@correo.com", "2/10/1996", "Domicilio1","28/10/2015");
			$this->assertEquals("Socio1",$socio->getNombre());
		}

		function testAddSocioSinVinculo(){
			$socio = new Socio();
			$socio->setSocio("Socio1", "57545796", "correo1@correo.com", "2/10/1996", "Domicilio1","28/10/2015");
			$this->assertTrue($socio->addSocio());
		}

		function testSetVinculo(){
			$socio = new Socio();
			$socio->setVinculo(1);
			$this->assertEquals(1, $socio->getVinculoId());
		}

		function testAddSocioVinculado(){
			$socio = new Socio();
			$socio->setSocio("Socio2", "57545796", "correo2@correo.com", "2/10/1996", "Domicilio2","28/10/2015");
			//$socio->setVinculo(1);
			$this->assertTrue($socio->addSocio());
		}

		function testAddVinculo(){
			$socio = new Socio();
			$socio->getSocio(2);
			$socio->setVinculo(1);
			$this->assertTrue($socio->addVinculo());
		}

		function testGetVinculo(){
			$socio1 = new Socio();
			$socio1->setSocio("Socio1", "57545796", "correo1@correo.com", "2/10/1996", "Domicilio1","28/10/2015");
			$socio2 = new Socio();
			$socio2->setSocio("Socio2", "57545796", "correo2@correo.com", "2/10/1996", "Domicilio2","28/10/2015");
			$socio2->setVinculo(1);
			$sociovinculo = $socio2->getVinculo();
			$this->assertEquals($socio1->getNombre(), $sociovinculo->getNombre());
		}
	}
?>