<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
class UsuarioController{

    private $usuario;
    
    public function __construct(){

        $usuario = new UsuarioModel();
        $this->usuario = $usuario;
    }

    public function index(){

        $usuarioLista = $this->usuario->listarAll();
        require_once('App/Views/Usuario.php');
    }
    public function salvar(array $request){
        $this->usuario->setName($request['name']);
        $this->usuario->setEmail($request['email']);
        return $this->usuario->salvar();
    }
    
    public function buscar($id){
        $this->usuario->setId($id);
        return $this->usuario->buscar();
    }
    
    public function atualizar(array $request){
        
        $this->usuario->setId($request['id']);
        $this->usuario->setName($request['name']);
        $this->usuario->setEmail($request['email']);

        return $this->usuario->atualizar();
    }

    public function deletar(array $request){
        $this->usuario->setId($request['id']);
        return $this->usuario->deletar();
    }
}