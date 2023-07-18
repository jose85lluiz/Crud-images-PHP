 <?php

require_once "../config.php";

use \Model\Produto;



if($_SERVER['REQUEST_METHOD']=='GET'){

$ida =$_GET['ida'];
$id = $_GET['id'];

$delete = new Produto();
$delete -> deleteIMG($id);

unlink('../imagens/'.$ida.'.'.$id.'.jpg');

}

header("location:upload.php?ida=$ida");

?>

