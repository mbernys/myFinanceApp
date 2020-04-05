<?php


namespace Core;


class Error
{
    public function saveError($e){
        $path = '../logs/'.date('Y-m-d');
        if(!file_exists($path)){
            $fh = fopen($path, 'w') or die("Can't create file");
        }
        error_log(date('H:i:s').': '.$e.PHP_EOL,3,$path);
    }
}