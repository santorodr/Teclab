<?php

include __DIR__.'/class/autoload.php';



$lista_pro = Productos::listarT();
include __DIR__.'/views/home.html';

