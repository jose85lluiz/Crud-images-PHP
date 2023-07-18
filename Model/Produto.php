<?php


namespace Model;

use Sql;


class Produto{
 public $id;

 public $nome ;
 
 public $info;

 

public function getID(){

 return $this -> id;
}

public function setID($id){

    $this-> nome = $id;

}

 public function getNome(){

 return $this -> nome;
}

public function setNome($nome){

    $this-> nome = $nome;

}

public function getDesc(){

 return $this -> desc;
}

public function setEndereco($info){

	$this -> endereco = $info;

}



 
 public function loadID($id){

$sql = new Sql();
return $sql -> select("SELECT * FROM tb_unit WHERE  desid =:ID ",array(


':ID'=>$id));

 }
 public function updateID($nome,$info,$id,$valor){
 
$sql = new Sql();
return $sql -> query("UPDATE tb_unit SET desnome= :NOME, desinfo= :INFO , desval = :VAL  WHERE desid =:ID ",

array(
 ":ID"  => $id,
 ":NOME" => $nome,
 ":INFO" =>  $info,
 ":VAL" => $valor
));

 }

public function listAll(){


$sql = new Sql();
return $sql -> select("SELECT * FROM tb_unit ");

 }
 
 public function deleteID($id){

$sql = new Sql();
$sql -> select("DELETE FROM tb_unit WHERE desid= :ID", array(

":ID" => $id

));

 }

 public function deleteIMG($id){

$sql = new Sql();
$sql -> select("DELETE FROM tb_post WHERE idimg = :ID", array(

":ID" => $id

));

 }


public function cadastrarProduto($id,$nome,$info,$valor){

$sql = new Sql();
$sql -> select("INSERT INTO tb_unit(desid,desnome,desinfo,desval)VALUES(:ID, :NOME, :INFO ,:VAL)", 

array(
  ":ID"  => $id,
 ":NOME" => $nome,
 ":INFO" =>  $info,
 ":VAL"  =>  $valor
 
));

}

 }

?>