<?php

/**
 * @author Santiago Martín Rodriguez
 */

try {
    $conector = new PDO("mysql:dbname=miproyecto;host=127.0.0.1", "root", "");
} catch (Exception $ex) {
    echo "Fallo de conexión". $eq->getMessage();
}

class base_datos {
    private $gbd;
    
    function _construct($driver, $base_datos, $host, $user, $pass){
        $connection = $driver . ":dbname" . $base_datos . ";host= $host";
        $this->gbd = new PDO($connection, $user, $pass);
        
        if ($this->gbd) {
            throw new Exception("No se ha podido realizar la conexión");
        }
    }
    
    function select($tabla, $filtros = null, $arr_propepare = null, $orden = null, $limit = null){
        $this->gbd =new PDO("mysql:dbname=miproyecto;host=127.0.0.1", "root", "");
        $sql = "SELECT * FROM " . $tabla;
        if($filtros != null){
            $sql .= " WHERE " .$filtros;
        }
        if($orden != null){
            $sql .= " ORDER BY " .$orden;
        }
        if($limit != null){
            $sql .= " LIIMT " .$limit;
        }

        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_propepare);
        if ($resource){
            return $resource->fetchAll (PDO::FETCH_ASSOC);
        } else {
            throw new Exception("No se pudo realizar la consulta de selección");
        }
    }

    function delete($tabla, $filtros = null, $arr_propepare = null){
        $this->gbd =new PDO("mysql:dbname=miproyecto;host=127.0.0.1", "root", "");
        $sql = "DELETE FROM " . $tabla . " WHERE " . $filtros;
       
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_propepare);
        if ($resource){
            return true;
        } else {
            throw new Exception("No se pudo realizar la consulta de selección");
        }
    }
    
        function insert($tabla, $campos, $valores, $arr_propepare = null){
        $this->gbd =new PDO("mysql:dbname=miproyecto;host=127.0.0.1", "root", "");
        $sql = "INSERT INTO " . $tabla . " (" . $campos . ") VALUES ($valores)";
        
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_propepare);
        
        if ($resource){
            return true;
        } else {
            throw new Exception("No se pudo realizar la consulta de selección");
        }
    }
    
    function update($tabla, $campos, $filtros, $arr_propepare = null){
        $this->gbd =new PDO("mysql:dbname=miproyecto;host=127.0.0.1", "root", "");
        $sql = " UPDATE " . $tabla . " SET " . $campos . " WHERE " .$filtros;
        
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_propepare);
        
        if ($resource){
            return true;
        } else {
            throw new Exception("No se pudo realizar la consulta de selección");
        }
    }
    
    function selectT($tabla, $tabla2, $campo1, $campo2, $filtros = null, $arr_propepare = null, $orden = null){
        $this->gbd =new PDO("mysql:dbname=miproyecto;host=127.0.0.1", "root", "");
        $sql = "SELECT * FROM " . $tabla . " INNER JOIN " . $tabla2 . " ON " . "$tabla.$campo1" . " = " . "$tabla2.$campo2";
        
        if($filtros != null){
            $sql .= " WHERE " .$filtros;
        }
        
         if($orden != null){
            $sql .= " ORDER BY " .$orden;
        }
        
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_propepare);
        if ($resource){
            return $resource->fetchAll (PDO::FETCH_ASSOC);
        } else {
            throw new Exception("No se pudo realizar la consulta de selección");
        }
    }
}