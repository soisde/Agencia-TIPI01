<?php
require_once('class/blog.php');
$id = $_GET ['id'];
$blog = new BlogClass($id);
$blog->idBlog = $id;
$blog->Desativar() ?>