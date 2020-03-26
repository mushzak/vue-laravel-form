<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;

class FeedbackFactory
{
    public static function build($data){

        $validator = Validator::make($data, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'text'=>'required',
            'type'=>'required',
        ]);

        if ($validator->fails()) {
            return false;
        }

        switch ($data['type']) {
            case "email" : return EmailStorage::action($data);
            case "local" : return LocalStorage::action($data);
            case "db" : return DbStorage::action($data);
            case "file" : return FileStorage::action($data);
            default : throw new \Exception('Error type');
        }
    }
}
