<?php
    // Con la siguiente función reemplazamos los caracteres que no queremos por un caracter vacio o nulo (''), esto con el fin de evitar la inyercion de codigos que puedan alterar la base de datos o el codigo php.
    function limpiarTexto($elemento){
        $input = ltrim(rtrim($elemento));
        $simbolosRestinjidos = array("{", "}", "[", "]", "\"", "'", ":", ";", "=", "<", ">", "\\", "&", "#", "(", ")");
        $texto = str_replace($simbolosRestinjidos, '', $input);
        return $texto;
    }

    // Con la siguiente función verificamos si un input o elemento es nulo.
    function campoNull($input){
        if($input == null){
            return true;
        }else{
            return false;
        }
    }

    // Con la siguiente función se comprueba el número de caracteres
    function numCharacters($input, $min, $max){
        if(strlen($input) > $max || strlen($input) < $min){
            return strlen($input);
        }else{
            return false;
        }
    }

    function verificarEmail($mail){
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
?>