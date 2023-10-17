<?php 

$id = $_GET['id'];

require_once('class/blog.php');
$blog = new BlogClass($id);

    if(isset($_POST['tituloBlog'])){
        
        $tituloBlog          =$_POST['tituloBlog'];
        $descricaoBlog       =$_POST['descricaoBlog'];
        $descricaoFotoBlog   =$_POST['descricaoFotoBlog'];
        $urlBlog             =$_POST['urlBlog'];
        $statusBlog          =$_POST['statusBlog'];

        if(!empty($__FILES['fotoBlog']['name'])){

            $arquivo            =$_FILES['fotoBlog'];

            if($arquivo['error']){
                throw new Exception('Error' . $arquivo['Error']);
            }
    
            if(move_uploaded_file($arquivo['tmp_name'], '../img/blog/' . $arquivo['name'] )){
                $fotoBlog = 'blog/' . $arquivo['name'];
    
            }else{
                throw new Exception('Error' . $arquivo['Error']);
    
                
            }
        }else{
            $fotoBlog = $blog->fotoBlog;
        }


        $blog->tituloBlog            =$tituloBlog; 
        $blog->fotoBlog              =$fotoBlog; 
        $blog->descricaoFotoBlog     =$descricaoFotoBlog;
        $blog->descricaoBlog         =$descricaoBlog;
        $blog->urlBlog               =$urlBlog;
        $blog->statusBlog            =$statusBlog;

        $blog->Atualizar();

    }


?>
<head>
<title>Cadastro de Novos Blogs</title>
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
<h1>Atualizar Blogs</h1>
<form action="index.php?p=servico&s=atualizar&id=<?php echo $blog->idBlog?>" method="POST" enctype="multipart/form-data">
<label for="imagem">Imagem:</label>
<!--<input type=file oninput="pic.src=window.URL.createObjectURL(this.files[0])">
<img id="pic"/>-->
<img src="<?php echo '../img' . $blog->fotoBlog ?>" alt="">
<input type="file" id="imagem" name="fotoBlog" accept="image/*" required>

        <label for="titulo">Título:</label>
<input type="text" id="titulo" name="tituloBlog" required value="<?php echo $blog->tituloBlog ?>">

        <label for="texto">Texto:</label>
<textarea id="texto" name="descricaoBlog" required> <?php echo $blog->descricaoBlog ?></textarea>

        <label>Status:</label>
<input type="checkbox" id="ativo" name="statusBlog" value="<?php echo $blog->statusBlog ?>" checked>
<label class="checkbox-label" for="ativo">Sim</label>

<label for="link">link:</label>
<input type="link" id="link" name="urlBlog" required value="<?php echo $blog->urlBlog ?>">


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