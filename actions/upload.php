 
 <div class="header">
 
 <form method='POST' enctype='multipart/form-data'> 
    
                <input type='file' name='fileUpload'></br></br>

               <button  class="button_4" href='index' type= 'submit'>Enviar imagem </button>

                </form>
                <hr>
<a href="../index.php" class="button_2" >Pagina Inicial</a></br>
</div>

<?php

require_once "../config.php";


$id="";
$ida= $_GET['ida'];
$porcent= 0.20; // porcento


$dirUploads = "../imagens";

if(!is_dir($dirUploads)){ // se nao existir o diretorio da variavel $dirUploads ira criar o mesmo

mkdir($dirUploads,777,true);

}


 if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
   // se o metodo usado para upload for "POST" entra na condiçao do if
  $info =$_FILES["fileUpload"];
  
  
   if ($info['error'] <3){

    $objeto = new Sql();
    $objeto->select('INSERT INTO tb_post(desid,idimg) VALUES(:ID,NULL)', array(':ID' => $ida ));

    $result = $objeto->select("SELECT * FROM  tb_post WHERE desid= :ID", array(

":ID" => $ida

));

       foreach ($result as $key => $value) {
       $id = $value['idimg'];

    }
   
  // if ($file["error"]){                      // se acontecer algum erro durante o upload
   	//throw new Exception("Error:".$file["error"]);
 //  }



switch ($_FILES['fileUpload'] ['type']) {
  case 'image/jpeg':
    
  $image_temp = imagecreatefromjpeg($_FILES['fileUpload']['tmp_name']);

  $old_width = imagesx($image_temp);
  $old_heigth= imagesy($image_temp);

  $new_height = $old_heigth * $porcent; //altura

  $new_width = $old_width * $porcent; //largura
  
  $new_image = imagecreatetruecolor($new_width, $new_height);

  $old_image = imagecreatefromjpeg($_FILES['fileUpload']['tmp_name']);


imagecopyresampled($new_image, $old_image, 0, 0, 0, 0,$new_width, $new_height, $old_width, $old_heigth);

imagejpeg($new_image,'../imagens/'.$ida.'.'.$id.'.jpg');

imagedestroy($old_image);
imagedestroy($new_image);

    
  
   }

}else{
    echo "<script> swal('Falha ao carregar, nenhuma imagem selecionada!!!','.','error'); </script>";
   
   }

 }



 $objeto = new Sql();
 $result = $objeto -> select("SELECT * FROM tb_post WHERE desid= :ID", array(

":ID" => $ida

));
foreach ($result as $key => $value) { 
 $id = $value['idimg'];
  //echo "<a href='./actions/Excluir.php?ida=$ida&id=$id'>Excluir</a> ";
 echo " <img src='../imagens/$ida.$id.jpg' style ='width:200px;height=200px; margin-left:80px; margin-top:50px;'><button class='button_3'onclick=document.location='./Exclui-image.php?ida=$ida&id=$id'>excluir</button>";

}

   

  


?>

