<?php

namespace App\Models;
use App\DB;

class UsuarioModel{
    
    private $instance;
    private $id;
    private $name;
    private $email;

    public function __construct(){
        $this->instance = DB::getInstance();
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function listarAll(){
      try{
        $sql ="select * from users";
        $stmt = $this->instance->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }catch (PDOException $e){
          $e->getMessage();
      }
    }
    public function salvar(){
        
       try{ 
        $sql="insert into users (name,email) values (:name,:email)";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':name',$this->name);
        $stmt->bindValue(':email',$this->email);
        return $stmt->execute();
       }catch (PDOException $e){
            $e->getMessage();
       }
    }

    public function buscar(){

       try{ 
        $sql ="select * from users where id = :id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':id',$this->id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
       }catch(PDOException $e){
           $e->getMessage();
       }
    }

    public function atualizar(){
      try{
        $sql = "update users set name=:name,email=:email where id=:id";
        $stmt = $this->instance->prepare($sql);
        $stmt->bindValue(':name',$this->name);
        $stmt->bindValue(':email',$this->email);
        $stmt->bindValue(':id',$this->id);
        return $stmt->execute();
      }catch(PDOException $e){
        $e->getMessage();
      }
    }

    public function deletar(){
        try{
            $sql="delete from users where id=:id";
            $stmt=$this->instance->prepare($sql);
            $stmt->bindValue(':id',$this->id);
            return $stmt->execute();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
}