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
public function __construct($id = false)
{
    if($id){
        $this->idServico = $id;
        $this->Carregar();
    }
}

    public function ListarServico(){
        $query = "SELECT * FROM servico WHERE statusServico = 1 ORDER BY tituloServico ASC ";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $listaServico = $resultado->fetchAll();
        return $listaServico; 
    }

    public function Inserir(){
        $query = "INSERT INTO servico(tituloServico, 
                                      fotoServico, 
                                      descricaoFotoServico, 
                                      descricaoServico, 
                                      urlServico, 
                                      statusServico) 
                VALUES ('".$this->tituloServico."',
                        '".$this->fotoServico."',
                        '".$this->descricaoFotoServico."',
                        '".$this->descricaoServico."',
                        '".$this->urlServico."',
                        '".$this->statusServico."');";
        $conn = Conexao::LigarConexao();
        $conn->exec($query);
        echo "<script> document.location='index.php?p=servico'</script>";

    }

    public function Carregar(){
        $query = "SELECT * FROM servico WHERE idServico =" . $this->idServico;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $listaServico = $resultado->fetchAll();

        foreach($listaServico as $linha){

            $this->tituloServico                = $linha['tituloServico'];
            $this->fotoServico                  = $linha['fotoServico'];
            $this->descricaoFotoServico         = $linha['descricaoFotoServico'];
            $this->descricaoServico             = $linha['descricaoServico'];
            $this->urlServico                   = $linha['urlServico'];
            $this->statusServico                = $linha['statusServico'];
        }

}

public function Atualizar(){
    $query = "UPDATE servico SET  tituloServico         = '".$this->tituloServico."', 
                                  fotoServico           = '".$this->fotoServico."', 
                                  descricaoFotoServico  = '".$this->descricaoFotoServico."', 
                                  descricaoServico      = '".$this->descricaoServico."', 
                                  urlServico            = '".$this->urlServico."',
                                  statusServico         = '".$this->statusServico."' 
                         WHERE servico.idServico        = " . $this->idServico;

                         $conn = Conexao::LigarConexao();
                         $conn->exec($query);
                         echo "<script> document.location='index.php?p=servico'</script>";
                 
                         

                                }


public function Desativar(){
    $query = "UPDATE servico SET 
    statusServico  = '0'
    WHERE servico.idServico = ". $this->idServico;

     $conn = Conexao::LigarConexao();
     $conn->exec($query);
     echo "<script> document.location='index.php?p=servico'</script>";

}


}