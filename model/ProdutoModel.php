<?php

require_once 'config/conexao.php';

class ProdutoModel{

    function __construct()
    {
        $this->conexao = conexao::getConnection();
    }

    function inserir($nome, $descricao, $preco, $marca, $foto, $idcategoria){
        $sql = "INSERT INTO produto (nome, descricao, preco, marca, foto, categoria_idcategoria) value (?, ?, ?, ?, ?, ?)";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('ssdssi',$nome, $descricao, $preco, $marca, $foto, $idcategoria);
        $comando->execute();
    }

    function excluir($id){
        $sql = 'DELETE FROM produto WHERE idproduto = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('i',$id);
        $comando->execute();
    }

    function atualizar($id, $nome, $descricao, $preco, $marca, $foto, $idcategoria){
        $sql = 'UPDATE produto SET nome = ?, descricao = ?, preco = ?, marca = ?, foto = ?, categoria_idcategoria = ?, WHERE idproduto = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('ssdssii',$nome, $descricao, $preco, $marca, $foto, $idcategoria, $id);
        $comando->execute();
    }

    function buscarPorId($id){
        $sql = 'SELECT * FROM produto WHERE idproduto = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('i',$id);
        if ($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_assoc();
        }
        return null;
    }

    function buscarPorCategoria($idcategoria){
        $sql = 'SELECT * FROM produto WHERE categoria_idcategoria = ?';
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param('i',$idcategoria);
        if ($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    function buscarPorLikeNome($nome){
        $sql = 'SELECT * FROM produto WHERE nome like ?';
        $comando = $this->conexao->prepare($sql);
        $nome = "%$nome%";
        $comando->bind_param('s', $nome);
        if ($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }


    function buscarTodos(){
        $sql = 'SELECT * FROM produto';
        $comando = $this->conexao->prepare($sql);
        if ($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
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
