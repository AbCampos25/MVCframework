<?php
class usuario{

  private $db;

  public function __construct(){
      $this->db=new database();
  }

  public function existeEmail($email){
    $this->db->query(" SELECT * FROM usuario WHERE email=:email");
    $this->db->bind(':email', $email);
    $this->db->executa();

    if ($this->db->totalResultados()>0) {
        return true;
    }
    else
        return false;
  }

  public function armazenar($dados){
      $this->db->query("INSERT INTO usuario(nome,email,senha) VALUES (:nome,:email,:senha)");
      $this->db->bind(':nome', $dados['nome']);
      $this->db->bind(':email', $dados['email']);
      $this->db->bind(':senha', $dados['senha']);
 
     if ($this->db->executa()) {
         return true;
     } 
     else 
         return false;
  }

  public function loginValido($email,$senha){
    $this->db->query(" SELECT * FROM usuario WHERE email=:email");
    $this->db->bind(':email', $email);
      if ($this->db->resultado()) {
        $info=$this->db->resultado();
        if ( md5($senha)==$info->senha) {
            return $info;
        }
        else
            return false;
      }
      else {
          return false;
      }
  
  
  }

}