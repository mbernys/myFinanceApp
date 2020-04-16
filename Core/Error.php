<?php


namespace Core;


class Error
{
    public function saveError($error){
        $path = '../logs/'.date('Y-m-d');
        if(!file_exists($path)){
            $fh = fopen($path, 'w') or die("Can't create file");
        }
        error_log(date('H:i:s').': '.$error.PHP_EOL,3,$path);
    }
}