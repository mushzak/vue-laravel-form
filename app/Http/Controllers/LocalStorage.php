<?php


namespace App\Http\Controllers;
use App\Feedback;


class LocalStorage
{
    public static function action($data){
        $feedback = new Feedback();
        if($feedback->fill($data)->save()){
            return true;
        }else{
            return false;
        }
    }
}
