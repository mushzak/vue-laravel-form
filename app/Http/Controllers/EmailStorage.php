<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;

class EmailStorage
{
    public static function action($data){
        $form_content = $data['name'].'('.$data['phone'].')'.' message : "'.$data['text'].'"';
          Mail::raw($form_content, function($message)  {
              $message
                  ->subject('New feedback')
                  ->to('test@gmail.com');
          });

          return true;
    }
}
