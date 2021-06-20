@extends('layouts.app')
@section('title', 'Tutrial for beginner')
@section('content')
 <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
  <h1><small>受講生一覧</small></h1>
	<a href='http://localhost/student/new'>新規作成</a>
  </div>
  <table class="table table-striped table-hover">
  <thead>
  <tr>
  <th>No</th>
  <th>name</th>
  <th>email</th>
  <th>tel</th>
  <th>opration</th>
  </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
  <tr>
  <td>{{$student->id}}</td><td>{{$student->name}}</td><td>{{$student->email}}</td><td>{{$student->tel}}</td>
  <td>
  <a href="http://localhost/student/show/{{$student->id}}" class="btn btn-primary btn-sm">詳細</a>
  <a href="http://localhost/student/edit/{{$student->id}}" class="btn btn-primary btn-sm">編集</a>
  <a href="http://localhost/student/delete/{{$student->id}}" class="btn btn-danger btn-sm">削除</a>
  </td>
  </tr>
  @endforeach
  </tbody>
  </table>
</div> 
 <!-- page control -->
 {!! $students->render() !!}
@section('script')
    <script>
    $(function(){
    $(".btn-dell").click(function(){
    if(confirm("本当に削除しますか？")){
    //そのままsubmit（削除）
    }else{
    //cancel
    return false;
    }
    });
    });
    </script> 
@endsection
