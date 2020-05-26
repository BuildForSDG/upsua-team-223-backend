<?php

if (!function_exists('randomString')) {

    /**
     * random string to generate code
     *
     * @param
     * @return
     */
    function randomString($longueur = 10)
    {
        $caracter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = strlen($caracter);
        $str = '';
        for ($i = 0; $i < $longueur; $i++)
        {
            $str .= $caracter[rand(0, $length - 1)];
        }
        return $str;
    }
}

