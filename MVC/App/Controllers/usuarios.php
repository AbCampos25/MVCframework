<?php
class usuarios extends Controller{

   public function __construct(){
      $this->usuarioModel=$this->model('usuario');
   }
   public function index(){

      url::redireciona('Usuarios/login');

  }
   
   public function cadastrar(){

      $formulario=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

         if (isset($formulario)) {
             $dados=[
                'nome'=>trim($formulario['nome']),
                'email'=>trim($formulario['email']),
                'senha'=>trim($formulario['senha']),
                'senha2'=>trim($formulario['senha2'])
             ];

          if (in_array("", $dados)) {
               if (empty($dados['nome'])) {
                  $dados['erro_nome']='campo obrigatório';
               }
               else {
                  $dados['erro_nome']='';
               }
               if (empty($dados['email'])) {
                  $dados['erro_email']='campo obrigsório';
               }
               else {
                  $dados['erro_email']='';
               }
               if (empty($dados['senha'])) {
                  $dados['erro_senha']='campo obrigatório';
               }
               
               else {
                  $dados['erro_senha']='';
               }


               if (empty($dados['senha2'])) {
                  $dados['erro_senha2']='confirme a senha';
               }

               else {
                  $dados['erro_senha2']='';
               }
            }

         else{

              if (verificar::email($dados['email'])) {
               $dados['erro_email']='E-mail inválido!';
              }
              elseif (strlen($dados['senha'])<6) {
               $dados['erro_senha']='6 caracteres no minimo';
            }

              elseif ($dados['senha2']!=$dados['senha']) {
               $dados['erro_senha2']='a senha deve ser igual';
            }
              elseif ($this->usuarioModel->existeEmail($dados['email'])) {
               $dados['erro_email']='E-mail ja existente!';
            }
      
              else { 
                 
               $dados['senha']= md5($dados['senha']);
                 if ($this->usuarioModel->armazenar($dados)) {
                        $usuario=$this->usuarioModel->loginValido($dados['email'],$dados['senha2']);
                        if ($usuario) {
                          $this->sessaoUsuario($usuario);
                        }
                     }
                  else echo 'falha ao cadastrar';

                  }  

                  
               } 
             
        }



         else {
            $dados=[
                'nome'=>'',
                'email'=> '',
                'senha'=> '',
                'senha2'=> '',
                'erro_nome'=>'',
                'erro_email'=> '',
                'erro_senha'=> '',
                'erro_senha2'=> ''
             ];             
         }
         
        $this->view('Usuarios/cadastrar', $dados);
     }
       
  
    public function login(){
      $formulario=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {
               $dados=[
                  'email'=>trim($formulario['email']),
                  'senha'=>trim($formulario['senha'])
               ];

            if (in_array("", $dados)) {
      
                  if (empty($dados['email'])) {
                     $dados['erro_email']='campo obrigsório';
                  }
                  else {
                     $dados['erro_email']='';
                  }
                  if (empty($dados['senha'])) {
                     $dados['erro_senha']='campo obrigatório';
                  }
                  
                  else {
                     $dados['erro_senha']='';
                  }

               }

            else{
               

               if (verificar::email($dados['email'])) {
                  $dados['erro_email']='E-mail inválido!';
               }
               elseif (strlen($dados['senha'])<6) {
                  $dados['erro_senha']='6 caracteres no minimo';
               }

               elseif ($this->usuarioModel->existeEmail($dados['email'])) {
                     $usuario=$this->usuarioModel->loginValido($dados['email'],$dados['senha']);
                    if ($usuario) {
                      $this->sessaoUsuario($usuario);
                    }
                    else {
                     $dados['erro_senha']='senha errada';
                    }
              
               }
               
               else $dados['erro_email']='conta inexistente!';
 
            }
 
        }
         
        else {
            $dados=[
               'email'=> '',
               'senha'=> '',
               'erro_senha'=> '',
               'erro_email'=> '',
            ];             
            
         }
     
      $this->view('Usuarios/login', $dados );
     
   }

   private function sessaoUsuario($usuario){
      $_SESSION['id']=$usuario->id;
      $_SESSION['nome']=$usuario->nome;
      $_SESSION['email']=$usuario->email;
      url::redireciona('Post');
   }

   public function logout(){
      unset($_SESSION);
      session_destroy();
      url::redireciona('Usuarios/login');
   }
   
}