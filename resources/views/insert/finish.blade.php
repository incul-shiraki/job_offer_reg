@extends('layouts.master_insert')
@section('title', 'Laravel チュートリアル（初級）')
 
@section('content')
  <h3>従業員登録画面</h3>
  <p>入力画面 -> 確認画面 -> <span class="label label-danger">完了画面</span></p>
 
  <div class="alert alert-success" role="alert">データベースにデータを挿入しました！</div>

	<div>
		<a href='http://localhost/request' >戻る</a> 
	</div>
@endsection
