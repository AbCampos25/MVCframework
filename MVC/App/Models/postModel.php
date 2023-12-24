<?php
class postModel{

  private $db;

  public function __construct(){
      $this->db=new database();
  }

  public function armazenar($dados){
      $this->db->query("INSERT INTO post(id_usuario,titulo,texto) VALUES (:ids,:tl,:tx)");
      $this->db->bind(':ids', $dados['id_usuario']);
      $this->db->bind(':tl', $dados['titulo']);
      $this->db->bind(':tx', $dados['texto']);
 
     if ($this->db->executa()) {
         return true;
     } 
     else 
         return false;
  }

  public function atualizar($id,$titulo, $texto){
  $this->db->query("UPDATE post SET titulo=:tl,texto=:tx where id={$id}");
    $this->db->bind(':tl',$titulo);
    $this->db->bind(':tx', $texto);

   if ($this->db->executa()) {
       return true;
   } 
   else 
       return false;
}



public function todosPosts(){
  $this->db->query("SELECT * FROM post ORDER BY data_criacao ASC"); 
  return  $this->db->resultados();
  }



public function umPost($id){
  $this->db->query("SELECT * FROM post WHERE id={$id}"); 
  return  $this->db->resultado();
 
}

public function deletar($id){
    $this->db->query("DELETE FROM post WHERE id={$id}");
    $this->db->executa();

}


}