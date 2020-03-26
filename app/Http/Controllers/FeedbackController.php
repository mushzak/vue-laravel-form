<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * @param Request $request
     * @return bool
     */
    public function send(Request $request){
       return  FeedbackFactory::build($request->all());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function types(){
        $types = Type::get()->toArray();

       return response()->json($types);
    }
}
