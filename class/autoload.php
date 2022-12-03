<?php

/**
 * @author Santiago Martín Rodriguez
 */


class Autocarga{
    
    static public function cargar_clase($clase){
        $arrayClase = array();
        $arrayClase['base_datos'] = __DIR__ .'/database.php';
        $arrayClase['Categorias'] = __DIR__ .'/categorias.php';
        $arrayClase['Productos'] = __DIR__ .'/productos.php';
        
        if (isset($arrayClase[$clase])) {
            if (file_exists($arrayClase[$clase])) {
                include $arrayClase[$clase];
            } else {
                throw new Exception("Archivo de calse no encontrada [{$arrayClase[$clase]}]");
            }
        }
    }
}

spl_autoload_register('Autocarga::cargar_clase');
