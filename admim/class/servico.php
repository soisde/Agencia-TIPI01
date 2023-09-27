<?php

require_once('conexao.php');

class ServicoClass{

    //ATRIBUTOS

    public $idServico; 
    public $tituloServico; 
    public $fotoServico; 
    public $descricaoFotoServico;
    public $descricaoServico;
    public $urlServico;
    public $statusServico;

    //METODOS

    public function ListarServico(){
        $query = "SELECT * FROM servico WHERE statusServico = 1 ORDER BY tituloServico ASC ";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $listaServico = $resultado->fetchAll();
        return $listaServico; 
    }
}