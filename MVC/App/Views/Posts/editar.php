<?php
include   App.'/Views/Paginas/header.php';
?> 
<form class="coment" method="POST" action="<?=URL?>/Post/editar/<?=$dados->id?>">
       <h1>Faça seu comentário</h1>
       
       <input type="text" name="titulo" value="<?php if(isset($dados->titulo)){echo $dados->titulo;} echo '';?>" placeholder="titulo"  >
 
       <input type="text" name="texto" value="<?php if(isset($dados->texto)){echo $dados->texto;} echo '';?>" id=" texto" >   
       <input type="submit" value="Atualizar">
       <div><a href="<?=URL?>/Post/deletar/<?=$dados->id?>">Eliminar</a></div>
        
</form>

<h1 style="font-size:15rem; text-align:center;">post <br> page</h1>
<?php
include   App.'/Views/Paginas/footer.php';
?>