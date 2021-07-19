@extends('layouts.app')
@section('title', '業務委託案件詳細')
@section('header')
<h1>業務委託案件詳細</h1>
@endsection

@section('content')
  <div id="mainContent">
    <div class="full-container">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 d-none d-md-block d-lg-block d-xl-block">&nbsp;</div>
        <button type="button" id="offer_button"class="btn cur-p btn-outline-dark" data-toggle="modal" data-target="#Modal_offer_open">公開申請</button>
        <div>
          @include('/offer_comp/business_commission/project_release')
        </div>
      </div>
    </div>
  </div>

@endsection

@section('css')

@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="<?= url('/offer_popup.js') ?>"></script> -->

@endsection

