<?php

/**
 * @author Santiago Martín Rodriguez
 */

include_once __DIR__.'/database.php';

class Productos {
    
    protected $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria;
    public $imagenNombre;
    private $exist = false;
    
    function __construct($id = null) {
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        $resp = $db->selectT("productos", "categorias", "categoria_id", "id", "id=?", array($id));
        if(isset($resp[0]['id'])){
            
            $this->id = $resp[0]['id'];
            $this->nombre = $resp[0]['nombre_producto'];
            $this->descripcion = $resp[0]['descripcion'];
            $this->precio = $resp[0]['precio'];
            $this->categoria = $resp[0]['categoria_id'];
            $this->imagenNombre = $resp[0]['imagen'];
            $this->categoriaN = $resp[0]['nombre_categoria'];
            $this->exist = true;
        }
    }
    
    public function mostrar() {
        echo"<pre>";
        print_r($this);
        echo"</pre>";
    }
    
    public function guardar(){
        if ($this->exist) {
            return$this->actualizar();
        }
        else {
            return$this->insertar();
        }
    }
    
    public function eliminar(){
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        return $db->delete("productos", "id=?", array($this->id));
    }
    
    public function insertar() {
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        return $db->insert("productos", "nombre_producto, descripcion, precio, categoria_id, imagen", " ?, ?, ?, ?, ?", array($this->nombre, $this->descripcion, $this->precio, $this->categoria, $this->imagenNombre));
    }
    
    public function actualizar(){
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        return $db->update("productos", "nombre_producto = ?, descripcion = ?, precio = ?, categoria_id = ?, imagen= ?", "id = ?", array($this->nombre, $this->descripcion, $this->precio, $this->categoria, $this->imagenNombre, $this->id));
    }

    static public function listar(){
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        return $db->select("productos");
    }
    
        static public function listarT(){
        $db = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        return $db->selectT("productos", "categorias", "categoria_id", "id");
    }
}
