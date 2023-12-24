<?php
//>>>>>>Todas as paginas view carregam os metodos controladores
class Paginas extends Controller{
   
    //>>>>>METODOS DE ACESSO A TODAS AS PAGINAS QUE O APP CONTEM
        
    //PAGINA INICIAL
    public function index(){
        
        //>>>>DADOS QUE SAO ENVIADOS PARAA PAGINA
        $dados=[ 'nome'=>'Jey', 'idade'=>'23'];
        //>>>>ACESSANDO A PAGINA
        $this->view('Paginas/home',  $dados);
    }
       
    //PAGINA SOBRE 
    public function sobre(){
        $this->view('Paginas/sobre');
    }

}