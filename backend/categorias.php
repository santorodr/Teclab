<?php

include_once '../class/autoload.php';

  if(isset($_POST['submit'])){
    $miCategoria = new Categorias();
    $miCategoria->nombre = $_POST['categorias'];
    $miCategoria->guardar();
} else if(isset($_GET['add'])){
    include 'views/categorias.html';
    die();
}

$lista_ctg = Categorias::listar();
include __DIR__. '/views/lista_categorias.html';

