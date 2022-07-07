<?php

require_once 'config/conexao.php';

class UsuarioModel{

    function __construct()
    {
        $this->conexao = conexao::getConnection();
    }

    function inserir($login, $senha){
        $sql = "INSERT INTO usuario (login, senha) value (?, ?)";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('ss',$login, $senha);
        $comando->execute();
    }

    function excluir($id){
        $sql = 'DELETE FROM usuario WHERE idusuario = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('i',$id);
        $comando->execute();
    }

    function atualizar($id, $login, $senha){
        $sql = 'UPDATE usuario SET login = ?, senha = ? WHERE idusuario = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('sii',$login, $senha, $id);
        $comando->execute();
    }

    function buscarPorLogin($login){
        $sql = 'SELECT * FROM usuario WHERE login = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('s',$login);
        if ($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_assoc();
        }
        return null;
    }

    function buscarPorId($id){
        $sql = 'SELECT * FROM usuario WHERE idusuario = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('i',$id);
        if ($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_assoc();
        }
        return null;
    }

    function buscarTodos(){
        $sql = 'SELECT * FROM usuario';
        $comando = $this->conexao->prepare($sql);
        if ($comando->execute()){
            $resultados = $comando->get_result();
            return $resultados->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
}

//$model = new CategoriaModel();
//$model->inserir("Produto de Limpeza");

//$model = new CategoriaModel();
//$model->excluir(1);

//$model = new CategoriaModel();
//$model->atualizar(2, 'Smartphone');

//$model = new CategoriaModel();
//print_r($model->buscarPorId(2));

//$model = new CategoriaModel();
//print_r($model->buscarTodos());/*
