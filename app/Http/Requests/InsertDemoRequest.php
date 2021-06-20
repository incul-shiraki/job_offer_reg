<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \App\Testuser;

class InsertDemoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
	public function rules()
	{
		return [
			'username'=>'required',
			'mail'=>'required|email',
			'age'=>'required|numeric',
		];
	}
	 
	public function messages()
	{
		return [
			"required" => "必須項目です。",
			"email" => "メールアドレスの形式で入力してください。",
			"numeric" => "数値で入力してください。",
		];
	}

	public function getData()
	{
		$user = new User;
		$value = $user->find(1);
		$arr = ['username','mail','age'];
		return view('sample', compact('value','arr'));
	}


}
