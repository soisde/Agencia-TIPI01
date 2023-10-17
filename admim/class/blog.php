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
    public function __construct($id = false)
    {
        if($id){
            $this->idBlog = $id;
            $this->Carregar();
        }
    }
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


public function Carregar(){
    $query = "SELECT * FROM blog WHERE idBlog =" . $this->idBlog;
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($query);
    $listaBlog = $resultado->fetchAll();

    foreach($listaBlog as $linha){

        $this->tituloBlog                = $linha['tituloBlog'];
        $this->fotoBlog                  = $linha['fotoBlog'];
        $this->descricaoFotoBlog         = $linha['descricaoFotoBlog'];
        $this->descricaoBlog             = $linha['descricaoBlog'];
        $this->urlBlog                   = $linha['urlBlog'];
        $this->statusBlog                = $linha['statusBlog'];
    }

}

public function Atualizar(){
$query = "UPDATE blog SET  tituloBlog         = '".$this->tituloBlog."', 
                              fotoBlog           = '".$this->fotoBlog."', 
                              descricaoFotoBlog  = '".$this->descricaoFotoBlog."', 
                              descricaoBlog      = '".$this->descricaoBlog."', 
                              urlBlog            = '".$this->urlBlog."',
                              statusBlog         = '".$this->statusBlog."' 
                     WHERE blog.idBlog        = " . $this->idBlog;

                     $conn = Conexao::LigarConexao();
                     $conn->exec($query);
                     echo "<script> document.location='index.php?p=blog'</script>";
             
                     

                            }


public function Desativar(){
$query = "UPDATE blog SET 
statusBlog  = '0'
WHERE blog.idBlog = ". $this->idBlog;

 $conn = Conexao::LigarConexao();
 $conn->exec($query);
 echo "<script> document.location='index.php?p=blog'</script>";

}


 }