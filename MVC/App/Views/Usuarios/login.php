<?php
include   App.'/Views/Paginas/header2.php';
if (verificar::logado()) {
    url::redireciona('Paginas/home');
}
?>
    <form method="POST" action="<?=URL?>/Usuarios/login">
       <h1>Acesse a sua conta </h1>
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_email'])){echo $dados['erro_email'];} echo '';?></div>
       <input type="email" name="email" value="<?=$dados['email']?>" placeholder="Email" maxlength="50" autocomplete="off" required>
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_senha'])){echo $dados['erro_senha'];} echo '';?></div>
       <input type="password" name="senha" value="<?=$dados['senha']?>" placeholder="Senha" maxlength="32" required >       
       <input type="submit" value="Entrar">
       <a href="<?=URL?>/Usuarios/cadastrar">Ainda não é cadastrado? Cadastre-se.</a>
   </form>