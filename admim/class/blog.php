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

public function Inserir(){
    $query = "INSERT INTO blog (tituloBlog, 
                                  fotoBlog, 
                                  descricaoFotoBlog, 
                                  descricaoBlog, 
                                  urlBlog, 
                                  statusBlog) 
            VALUES ('".$this->tituloBlog."',
                    '".$this->fotoBlog."',
                    '".$this->descricaoFotoBlog."',
                    '".$this->descricaoBlog."',
                    '".$this->urlBlog."',
                    '".$this->statusBlog."');";
    $conn = Conexao::LigarConexao();
    $conn->exec($query);
    echo "<script> document.location='index.php?p=blog'</script>";

}

 }