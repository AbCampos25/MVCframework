<?php
include   App.'/Views/Paginas/header.php';
?> 
<form class="coment" method="POST" action="<?=URL?>/Post/cadastrar">
       <h1>Faça seu comentário</h1>
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_titulo'])){echo $dados['erro_titulo'];} echo '';?></div>
       <input type="text" name="titulo" value="<?php if(isset($dados['titulo'])){echo $dados['titulo'];} echo '';?>" placeholder="titulo"  >
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_texto'])){echo $dados['erro_texto'];} echo '';?></div>
       <textarea name="texto" value="<?php if(isset($dados['texto'])){echo $dados['texto'];} echo '';?>" id=" texto" ></textarea>   
       <input type="submit" value="Comentar">
       <div style="color:red; font-size:14pt;"><?php if(isset($dados['texto'])){echo $dados['texto'];} echo '';?></div>
       <div style="color:red; font-size:14pt;"><?php if(isset($dados['id_usuario'])){echo $dados['id_usuario'];} echo '';?></div>
    </form>
    
    <?php
          if (isset($dados)) {
              foreach ($dados as $comentario) {
    ?>      <div style="text-align:center;">
                  <h1><?=$comentario->titulo?></h1>
                  <p><?=$comentario->texto?></p>
                  <h5><?=$comentario->data_criacao?></h5>
                  <?php
                     if ($_SESSION['id']==$comentario->id_usuario) {
                        ?><a href="<?=URL?>/Post/editPage/<?=$comentario->id?>">Editar</a> <?php 
                      
                  }?> 
            </div>    
                  <?php       }
          }
     ?>   
    </div>

<h1 style="font-size:15rem; text-align:center;">post <br> page</h1>
<?php
include   App.'/Views/Paginas/footer.php';
?>