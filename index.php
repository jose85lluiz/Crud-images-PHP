<?php

require_once "config.php";


use \Model\Produto;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/styles.css">
    <script  src="js/sweetalert.min.js"></script>  
    <title>CADASTRO</title>
    
   
</head>
<body>
	
    <header>
        <h1 class="header-title">Cadastro de Produtos</h1>
    </header>
    <main>
        <a href="./actions/Cadastrar.php" class="button_2" >Cadastrar</a>
        <table class="records">
            <thead>
            
       </tbody>
        </table>
       </thead>
        <div class="modal" id="modal">
            <div class="modal-content">
                <header class="modal-header">
                	<div style="text-align:center">
                    <hr>    
                   <h2>PRODUTOS CADASTRADOS:</h2>
                   <hr>
               </div>
                   <?php	

            $produto = new Produto();


            $dados = $produto ->listAll();
             
             $pos = "left";
            

            foreach ($dados as $i => $value) {

                    
                   echo " 
                
                  <table cellpadding='15' align=$pos>
                  <tr> 
                  <td  valing='top'>

                    <b>$value[desid]</b></br>
                    <b> Nome: </b>$value[desnome]</br>
                    <b>Descrição do produto:</br></b> $value[desinfo] </br></br>
                    <b>Preço:</b> $value[desval] </br>
                   
                    
           
                <a href='./actions/Editar.php?id=$value[desid]' class='button_4'>Editar</a>
                <a href='./actions/Excluir.php?id=$value[desid]'class='button_3'>Excluir</a></br></br>
                <a href='./actions/upload.php?ida=$value[desid]'class='button_red'>inserir fotos</a>

                 </td>

               </tr>


               </table>";
               $nomeId = $value['desid'];
             
                } 
 ?>
                    
                </header>
                
                <footer class="modal-footer">
                    
                </footer>
            </div>
        </div>
    </main>
    <footer>
       
    </footer>
</body>
</html>






