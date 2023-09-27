<?php

require_once('conexao.php');

class BlogClass{

    //ATRIBUTOS

    public $idBlog; 
    public $tituloBlog; 
    public $fotoBlog; 
    public $descricaoFotoBlog;
    public $descricaoBlog;
    public $urlBlog;
    public $statusBlog;

    //METODOS

    public function ListarBlog(){
        $query = "SELECT * FROM blogs WHERE statusBlog = 1 ORDER BY tituloBlog ASC ";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $listaBlog = $resultado->fetchAll();
        return $listaBlog; 
    }
}