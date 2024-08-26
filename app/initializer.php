<?php

//llamar config

require_once 'config/config.php';

//llamar url helper
require_once 'helpers/url_helper.php';

require_once 'libs/Core.php';
require_once 'libs/Controllers.php';
require_once 'libs/Base.php';
//llamar libs
/* spl_autoload_register(function($files){
    require_once 'libs/'. $file . '.php';
}); *///funcion para llamar a todos los archivos