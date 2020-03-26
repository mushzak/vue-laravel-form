<?php


namespace App\Http\Controllers;

class FileStorage
{
    public static function action($data){
        $text = $data['name'] .' | ' .$data['phone'] .' | '. $data['text'];
        file_put_contents('text-base.txt', $text.PHP_EOL , FILE_APPEND | LOCK_EX);

        return true;
    }
}
