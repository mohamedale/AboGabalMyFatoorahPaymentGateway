<?php
namespace AboGabalMyFatoorah\Src;

class autoload
{
    /**
     * @param $className
     */
    public static function autoload($className){
        $className = str_replace('AboGabalMyFatoorah', '', $className);
        $className = trim($className, '\\');
        $className = str_replace('\\',DS, $className);
        $className = lcfirst($className);
        $className = APP_PATH . $className . '.php';
        if (file_exists($className)){
            require $className;
        }
    }
}

spl_autoload_register(__NAMESPACE__.'\autoload::autoload');
