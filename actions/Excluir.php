<?php

require_once "../config.php";
use \Model\Produto;

if($_SERVER['REQUEST_METHOD'] == 'GET'){

   $id = $_GET['id'];
   

$delete = new Produto();
$delete -> deleteID($id);
header("location:../index.php");

}



?>