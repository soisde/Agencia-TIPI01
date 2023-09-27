<?php

require_once('conexao.php');

class ContatoClass{

    //ATRIBUTOS

    public $idContato; 
    public $tituloContato; 
    public $nomeContato; 
    public $emailContato;
    public $telefoneContato;
    public $mensagemContato;
    public $urlEnviarWhatsAppContato;
    public $dataContato;
    public $horaContato;

    //METODOS

    public function InserirContato(){
        $sql = "INSERT INTO contato (nomeContato,         
                                     emailContato,
                                     telefoneContato,
                                     mensagemContato,
                                     dataContato,
                                     horaContato)
                    VALUE ('".$this->nomeContato."',
                           '".$this->emailContato."',
                           '".$this->telefoneContato."',
                           '".$this->mensagemContato."',
                           '".$this->dataContato."',
                           '".$this->horaContato."')";
      
    $conn = Conexao::LigarConexao();
    $conn->exec($sql);

    }
}