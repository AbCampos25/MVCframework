<?php
class Post extends Controller{

    public function __construct(){
        $this->postM=$this->model('postModel');

        if (!verificar::logado()) {
             url::redireciona('Usuarios/login');
        }
 
    }
   
    public function index(){
        $dados= $this->postM->todosPosts();

        $this->view('Posts/index', $dados);

    }
   
    public function cadastrar(){

        $formulario=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         $dados=[];
        if (isset($formulario)) {
               $dados=[
                  'titulo'=>trim($formulario['titulo']),
                  'texto'=>trim($formulario['texto']),
                  'id_usuario'=>trim($_SESSION['id'])
               ];
  
          if (in_array("", $dados)) {
                 if (empty($dados['titulo'])) {
                    $dados['erro_titulo']='campo obrigatório';
                 }
                 else {
                    $dados['erro_titulo']='';
                 }
                 if (empty($dados['texto'])) {
                    $dados['erro_texto']='inclua um texto de comentario';
                 }
                 else {
                    $dados['erro_texto']='';
                 }
                    
                  
               }
            else {
                if ($this->postM->armazenar($dados)) {
                        
                    url::redireciona('post/index');
                 }
             }   
                 
           }
           
          $this->view('Posts/index', $dados);
       }

       public function editar($id){

         $formulario=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $dados=[];
         if (isset($formulario)) {
                $dados=[
                   'titulo'=>trim($formulario['titulo']),
                   'texto'=>trim($formulario['texto']),
                ];
   
           if (in_array("", $dados)) {
                  if (empty($dados['titulo'])) {
                     $dados['erro_titulo']='campo obrigatório';
                  }
                  else {
                     $dados['erro_titulo']='';
                  }
                  if (empty($dados['texto'])) {
                     $dados['erro_texto']='inclua um texto de comentario';
                  }
                  else {
                     $dados['erro_texto']='';
                  }
                     
                   
                }
             else {
                 if ($this->postM->atualizar($id, $dados['titulo'], $dados['texto'])) {
                         
                     url::redireciona('post/index');
                  }
              }   
                  
            }
            
           $this->view('Posts/index', $dados);
        }

      
     public function editPage($id){

         $dados= $this->postM->umPost($id);
         $this->view('Posts/editar', $dados);
 
     }

     public function deletar($id){

      $this->postM->deletar($id);
      url::redireciona('post/index');
     
   }

 
}