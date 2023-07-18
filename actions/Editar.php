<?php


require_once "../config.php";

use \Model\Produto;

$id="";
$nome ="";
$info ="";
$valor="";

$errorMsg = "";
$sucessrMsg = "";



if($_SERVER['REQUEST_METHOD'] == 'GET'){

   if(!isset($_GET['id'])){

   	header("location:index.php");
   	exit;
   }
   
   $id= $_GET['id'];
   $produto = new Produto();
   $dados = $produto ->loadID($id);
 
 if(!$dados){

 	header("location:index.php");
 }

   foreach ($dados as $i=> $value) {
   	
   	$nome = $value['desnome'];
    $info =  $value['desinfo'];     
    $valor = $value['desval'];
   }

}else{



  $id= $_POST["id"];
  $nome=$_POST["nome"];
  $info=$_POST["info"];
  $valor=$_POST["valor"];
 

  if(empty($nome) || empty($info) || empty($valor) ){

    $errorMsg = "Todos Os Campos Devem Ser Preenchidos!!!";
    
   }else{
    
   $atualiza = new Produto();
   $atualiza->updateID(ucwords($nome),$info,$id,$valor);
   $sucessrMsg = "Dados Atualizados com Sucesso!!!";
  //header("location:index.php");
   

  }
 
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/records.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>CADASTRO</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>-->
    <script src="../js/jquery.mask.min.js"> </script>
    </head>
<body>
    <header>
        <div style="text-align:center">
        <h1 class="header-title">Cadastro de Produtos</h1>

        <?php if(!empty($errorMsg)){
         echo "<div  class='boxred'><strong >$errorMsg</strong> </div>";

        }
      ?>
    </header>
    <main>
        
        <table class="records">
            <thead>
            
       </tbody>
        </table>
       </thead>
        
            <div style="text-align:center">
                <header class="modal-header">
                    </header>
                <form method="post">

                	<input type="hidden" name="id" value="<?php echo $id;?>"></br>
                    <input style="text-transform: capitalize;" class="input_class" placeholder="Nome" name="nome" autocomplete="off" value="<?php echo $nome;?>"></br>
                    <input type="text"  autocomplete="off" class="input_class" placeholder="informações" name ="info"  value ="<?php echo $info;?>"></br>
                     <input type="text"  autocomplete="off" class="input_class" placeholder="informações" name ="valor"  value ="<?php echo $valor;?>"></br>
                   
                    <button type="submit" href="index.php" class="button_blue" >Atualizar</button>
                    <a href="../index.php" class="button_red" >Voltar</a></br>

                     <?php if(!empty($sucessrMsg)){
         echo "</br><div class='boxgree'> <strong>$sucessrMsg </strong> </div>";

        }
      ?>
               
                </form>
             <!-- <script> $('#cpf').mask('000.000.000-00');</script>
                <script> $('#fone').mask('(000)00000-0000');</script> -->
            
                <footer class="modal-footer">
                    
                </footer>
            </div>
        


    </main>
    <footer>
      
    </footer>
</body>
</html>
