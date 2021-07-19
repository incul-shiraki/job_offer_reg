<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsertDemoController extends Controller
{
  public function getIndex()
  {  
    $users = \App\Testuser::orderBy('created_at', 'desc')->paginate(10);
    return view('insert.index')->with('testusers',$users);
  }
 
  public function confirm(\App\Http\Requests\InsertDemoRequest $request)
  {
    $data = $request->all();
    return view('insert.confirm')->with($data);
  }
  
  public function finish(\App\Http\Requests\InsertDemoRequest $request)
  {
    $user = new \App\Testuser;
    $user->username = $request->username;
    $user->mail = $request->mail;
    $user->age = $request->age;
    $user->save();
    $username = $request['username'];
    $mail = $request['mail'];
    $age = $request['age'];

    return view('insert.finish');
  }
}
