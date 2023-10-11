<?php 

$id = $_GET['id'];

require_once('class/servico.php');
$servico = new ServicoClass($id);

    if(isset($_POST['tituloServico'])){
        
        $tituloServico      =$_POST['tituloServico'];
        $descricaoServico   =$_POST['descricaoServico'];
        $urlServico         =$_POST['urlServico'];
        $statusServico      =$_POST['statusServico'];

        $arquivo            =$_FILES['fotoServico'];

        if($arquivo['error']){
            throw new Exception('Error' . $arquivo['Error']);
        }

        if(move_uploaded_file($arquivo['tmp_name'], '../img/servico/' . $arquivo['name'] )){
            $fotoServico = 'servico/' . $arquivo['name'];

        }else{
            throw new Exception('Error' . $arquivo['Error']);
        }

        $servico->tituloServico            =$tituloServico; 
        $servico->fotoServico              =$fotoServico; 
        $servico->descricaoFotoServico     =$descricaoFotoServico;
        $servico->descricaoServico         =$descricaoServico;
        $servico->urlServico               =$urlServico;
        $servico->statusServico            =$statusServico;

        $servico->Inserir();

    }


?>
<head>
<title>Cadastro de Serviços</title>
<style>
        /* Estilos CSS para organizar o layout */
        body{
            background: linear-gradient(to bottom, #fefffe,#fdc5f5,#b388eb,#5f0a87, #2f004f);
        }
        form{
            background-color: #f2f2f2 ;
            border: solid thin #0000002a;
            padding: 30px;
            border-radius: 20px;
            width: 80%;
            margin: 60px auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        textarea {
            width: 100%;
            height: 100px;
            padding: 5px;
            margin-bottom: 10px;
            resize: none;
        }
        .checkbox-label {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }
        .submit-button {
            background-color: #c5c5c5;
            color: #333;
            display: block;
            margin-top: 10px;
            padding: 5px;
            border-radius: 20px;
            cursor: pointer;
            border: none;
        }
</style>
</head>

<body>
<h1>Atualizar Serviços</h1>
<form action="index.php?p=servico&s=atualizar&id=<?php echo $servico->idServico?>" method="POST" enctype="multipart/form-data">
<label for="imagem">Imagem:</label>
<!--<input type=file oninput="pic.src=window.URL.createObjectURL(this.files[0])">
<img id="pic"/>-->
<img src="<?php echo '../img' . $servico->fotoServico ?>" alt="">
<input type="file" id="imagem" name="fotoServico" accept="image/*" required>

        <label for="titulo">Título:</label>
<input type="text" id="titulo" name="tituloServico" required value="<?php echo $servico->tituloServico ?>">

        <label for="texto">Texto:</label>
<textarea id="texto" name="descricaoServico" required> <?php echo $servico->descricaoServico ?></textarea>

        <label>Status:</label>
<input type="checkbox" id="ativo" name="statusServico" value="<?php echo $servico->statusServico ?>" checked>
<label class="checkbox-label" for="ativo">Sim</label>

<label for="link">link:</label>
<input type="link" id="link" name="urlServico" required value="<?php echo $servico->urlServico ?>">


        <input type="submit" value="Inserir Serviço" class="submit-button">
    </form>


<script>
    document.getElementById('imagemExibida').addEventListener('click',function(){
        Document.getElementById('imputImagem').click();
    });

    document.getElementById('inputImagem').addEventListener('change',function(event){
        let imagemExibida = document.getElementById('imagemExibida');
        let arquivo = event.target.files[0];

        if(arquivo){
            //alert('ok');

            let carregar = new FileReader();

            carregar.onload = function(e){
                imagemExibida.src = e.target.result;

            };

            carregar.readAsDataURL(arquivo);
        }
    
    });

</script>


</body>