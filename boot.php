<?php 
//=================================================================//
//=============AUTOLOAD DE CLASES=================================//
//=================================================================//
function __autoload($Class) {

    $cDir = ['Class', 'Controller', 'Model'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.php') && !is_dir(__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.php')):
            include_once (__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.php');
            $iDir = true;
        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);
        die;
    endif;
}

//==============================================================//
//==================== CONFIGRAÇÕES DO BANCO ===================//
//============================================================//

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'repasophp');