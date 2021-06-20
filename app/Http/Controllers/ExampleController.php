<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExampleController extends Controller
{
 
    public function language(Request $request, $language)
    {
        // セッションに言語コードをセット
        Session::put('language',$languqage);
        // ダミーの戻り値
        return ['result'=>'OK'];
    } 
}
