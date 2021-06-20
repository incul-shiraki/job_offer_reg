@extends('layouts.app')
@section('title', 'Tutrial for beginner')
@section('content')
  <div class="row">
  <label class="col-sm-4 control-label">お名前</label>
  <div class="col-sm-8">{{$student->name}}</div>
  </div>
  <div class="row">
  <label class="col-sm-4 control-label">メールアドレス</label>
  <div class="col-sm-8">{{$student->email}}</div>
  </div>
  <div class="row">
  <label class="col-sm-4 control-label">電話番号</label>
  <div class="col-sm-8">{{$student->tel}}</div>
  </div>

  <a href="http://localhost/student/list" class="btn btn-primary btn-sm">戻る</a>
  <a href="http://localhost/student/edit/{{$student->id}}" class="btn btn-primary btn-sm">編集</a>
  <a href="http://localhost/student/delete/{{$student->id}}" class="btn btn-danger btn-sm">削除</a>
@endsection
