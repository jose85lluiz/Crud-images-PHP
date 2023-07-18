<?php

namespace Model; 

use  Pessoa;
use  Sql;


class Endereco {

public $idpessoa;
public $descep;
public $desrua ;
public $descidade;
public $desbairo;

public function getIdpessoa(){

 return	$this -> idpessoa;
}
public function setIdpessoa($idpessoa){

 $this -> idpessoa = $idpessoa;

}

public function getDescep(){

 return	$this -> descep;
}
public function setDescep($descep){

 $this -> descep = $descep;

}

public function getDesrua(){

 return	$this -> desrua;
}
public function setDesrua($desrua){

 $this -> desrua = $desrua;

}

public function getDescidade(){

 return	$this -> descidade;
}
public function setDescidade($descidade){

 $this -> descidade = $descidade;

}

public function getDesbairro(){

 return	$this -> desbairro;
}
public function setDesbairro($desbairro){

 $this -> desbairro = $desbairro;

}



}



?>


