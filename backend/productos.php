<?php

include '../class/autoload.php';

if(isset($_POST['submit'])){
    $miImagen = $_FILES["imagen"];
    
    if (!isset($miImagen)) {
        die('No file uploaded.');
    }
    else{
     move_uploaded_file($miImagen["tmp_name"], "../assets/img/" . $miImagen["name"]);   
    }
    
    $miproducto = new Productos();
    $miproducto->nombre=$_POST['producto'];
    $miproducto->descripcion=$_POST['descripcion'];
    $miproducto->precio=$_POST['precio'];
    $miproducto->categoria=$_POST['categoria'];
    $miproducto->imagenNombre=$miImagen["name"];
    $miproducto->guardar();
    
 }else if(isset($_GET['add'])){
    include 'views/productos.html';
    die();
}

$lista_pro = Productos::listarT();
include'views/lista_productos.html';