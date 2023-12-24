<?php
include   App.'/Views/Paginas/header2.php';
if (verificar::logado()) {
   url::redireciona('Paginas/home');
}
?>
    <form method="POST" action="<?=URL?>/Usuarios/cadastrar">
       <h1>Preencha o formulário</h1>
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_nome'])){echo $dados['erro_nome'];} echo '';?></div>
       <input type="text" name="nome" value="<?=$dados['nome']?>" placeholder="Nome" maxlength="50"  required >
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_email'])){echo $dados['erro_email'];} echo '';?></div>
       <input type="email" name="email" value="<?=$dados['email']?>" placeholder="Email" maxlength="50" autocomplete="off" required>
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_senha'])){echo $dados['erro_senha'];} echo '';?></div>
       <input type="password" name="senha" value="<?=$dados['senha']?>" placeholder="Senha" maxlength="32" required >
       <div style="color:red; font-size:9pt;"><?php if(isset($dados['erro_senha2'])){echo $dados['erro_senha2'];} echo '';?></div>
       <input type="password" name="senha2" value="<?=$dados['senha2']?>" placeholder="Confirmar senha" required>
       
       <input type="submit" value="Cadastrar">
       <a href="<?=URL?>/Usuarios/login">Já é cadastrado? faça login.</a>
    </form>
   
 