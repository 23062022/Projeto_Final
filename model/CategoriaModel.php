<?php

require_once 'config/conexao.php';

class CategoriaModel{

    function __construct()
    {
        $this->conexao = conexao::getConnection();
    }

    function inserir($nome){
        $sql = "INSERT INTO categoria (nome) value (?)";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('s',$nome);
        $comando->execute();
    }

    function excluir($id){
        $sql = 'DELETE FROM categoria WHERE idcategoria = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('i',$id);
        $comando->execute();
    }

    function atualizar($id,$nome){
        $sql = 'UPDATE categoria SET nome = ? WHERE idcategoria = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('si',$nome, $id);
        $comando->execute();
    }

    function buscarPorId($id){
        $sql = 'SELECT * FROM categoria WHERE idcategoria = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('i',$id);
        if ($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_assoc();
        }
        return null;
    }

    function buscarTodos(){
        $sql = 'SELECT * FROM categoria';
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
