<!-- job_offer_registrationのパーツ -->
<!-- 募集企業 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title' style="display: inline;" >募集企業</h3>
        <a href='#' id="open_corp_modal" style="float: right; display: inline;" data-toggle="modal" data-target="#Modal_comp_edit">
          <img src="{{asset('storage/img/icon.png')}}" width="20" height="20" >
        </a>
      </div>
      <div class="card-body">
        <div class="masonry-item">
          @if ($status === 1)
            <form action="/posts" method="post" enctype="multipart/form-data">
          @elseif ($status  === 2)
            <form action="{{url('/update',$rec_info_re->id)}}" method="post" enctype="multipart/form-data">
          @endif
            {{ csrf_field() }}
            <div class="form-group row"><label for="company_name" class="col-sm-3 col-form-label">会社名&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <label name="company_name" class="form-control" id="company_name"></label> 
                <input type="hidden" name="company_name" id="company_name_h">
                <!-- create時にコピーから作成した場合の値 -->
                <input type="hidden" name="copyvalue" id="copyvalue">
              </div>
            </div>
            <div class="form-group row"><label for="comp_add01" class="col-sm-3 col-form-label">会社住所&nbsp;<span class="text-danger required">*</span></br>都道府県</label>
              <div class="col-sm-9">
                <label name="comp_add01" class="form-control" id="comp_add01"></label> 
                <input type="hidden" name="comp_add01" id="comp_add01_h">
              </div>
            </div>
            <div class="form-group row"><label for="comp_add02"
                class="col-sm-3 col-form-label">会社住所&nbsp;<span class="text-danger required">*</span></br>市区町村・番地・建物名</label>
              <div class="col-sm-9">
                <label name="comp_add02" class="form-control" id="comp_add02"></label> 
                <input type="hidden" name="comp_add02" id="comp_add02_h">
              </div>
            </div>
            <div class="form-group row"><label for="company_hp" class="col-sm-3 col-form-label">会社HP&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <label name="company_hp" class="form-control" id="company_hp"></label> 
                <input type="hidden" name="company_hp" id="company_hp_h">
              </div>
            </div>
            <div class="form-group row">
              <label for="job1c" class="col-sm-3 col-form-label">業界1&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <label name="job1c" class="form-control" id="job1c"></label> 
                <input type="hidden" name="job1c" id="job1c_h">
              </div>
            </div>
            <div class="form-group row">
              <label for="job2c" class="col-sm-3 col-form-label">業界2&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <label name="job2c" class="form-control" id="job2c"></label> 
                <input type="hidden" name="job2c" id="job2c_h">
              </div>
            </div>
            <div class="form-group row"><label for="employee_number" class="col-sm-3 col-form-label">従業員数&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <label name="employee_number" class="form-control" id="employee_number"></label> 
                <input type="hidden" name="employee_number" id="employee_number_h" value="">
              </div>
            </div>
            <div class="form-group row"><label for="foundation_date"
               class="col-sm-3 col-form-label">設立年月&nbsp;<span class="text-danger required">*</span></label>
              <div class="col-sm-9">
                <label name="foundation_date" class="form-control" id="foundation_date" ></label> 
                <input type="hidden" name="foundation_date" id="foundation_date_h">
              </div>
            </div>
            <div class="form-group row"><label for="company_overview" class="col-sm-3 col-form-label">会社概要</label>
              <div class="col-sm-9">
                <label class="form-control" name="company_overview" id="company_overview"></label> 
                <input type="hidden" name="company_overview" id="company_overview_h">
              </div>
            </div>
            <div class="form-group row"><label for="business_guidance" class="col-sm-3 col-form-label">事業内容</label>
              <div class="col-sm-9"> 
                <label class="form-control" name="business_guidance" id="business_guidance"></label> 
                <input type="hidden" name="business_guidance" id="business_guidance_h">
              </div>
            </div>
            <div class="form-group row"><label for="company_logo" class="col-sm-3 col-form-label">企業ロゴ</label>
              <div class="col-sm-9">
                <img src="" id="image" name="company_logo">   
                <input type="hidden" name="company_logo" id="image_h">
              </div>
            </div>
            <div class="form-group row" id="input_pluralBox"><label class="col-sm-3 col-form-label"></label>
              <div class="col-sm-9" id="input_comp">
                <select id="corp_link" style="display: inline;" class="col-sm-4 form-control" name='selectbox_a'>
                </select>
                <button type="button" style="display: inline;" class="col-sm-4 btn btn-primary" data-toggle="modal" data-target="#Modal_comp_create">新規作成する</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<script>
$(function(){
  //企業情報の入力(編集不可)
  if (@json($rec_info_re) === 0) {
    document.getElementById('company_name').innerHTML = @json($corp[0]['corp_name']);
    $('#company_name_h').val(@json($corp[0]['corp_name']));
    document.getElementById('comp_add02').innerHTML = @json($corp[0]['address']);
    $('#comp_add02_h').val(@json($corp[0]['address']));
    document.getElementById('company_hp').innerHTML = @json($corp[0]['home_page']);
    $('#company_hp_h').val(@json($corp[0]['home_page']));
    document.getElementById('employee_number').innerHTML = @json($corp[0]['employee_number']);
    $('#employee_number_h').val(@json($corp[0]['employee_number']));
    document.getElementById('foundation_date').innerHTML = String(@json($corp[0]['establish_year'])) + '年' + String(@json($corp[0]['establish_month']) + '月');
    $('#foundation_date_h').val(@json($corp[0]['establish_year']) + '-' + @json($corp[0]['establish_month']));
    document.getElementById('company_overview').innerHTML = @json($corp[0]['company_profile']);
    $('#company_overview_h').val(@json($corp[0]['company_profile']));
    document.getElementById('business_guidance').innerHTML = @json($corp[0]['business_content']);
    $('#business_guidance_h').val(@json($corp[0]['business_content']));
    //都道府県
    document.getElementById('comp_add01').innerHTML = @json($prefectures[$corp[0]['prefecture']]);
    $('#comp_add01_h').val(@json($corp[0]['prefecture']));
    //業界1
    document.getElementById('job1c').innerHTML = @json($first[$corp[0]['industry1'] - 1]['name']);
    $('#job1c_h').val(@json($corp[0]['industry1']));
    //業界2
    document.getElementById('job2c').innerHTML = @json($second[$corp[0]['industry2'] - 1]['name']);
    $('#job2c_h').val(@json($corp[0]['industry2']));
    //ロゴ
    document.getElementById('image').src = @json($corp[0]['logo']).replace('public','storage');
    $('#image_h').val(@json($corp[0]['logo']));
  } else {
    var http_word = 'http://localhost/';
    var temp = @json($rec_info_re);
    var pref = @json($prefectures);
    var first = @json($first);
    var second = @json($second);

  //企業情報の値を取得（初期状態では編集不可）
    document.getElementById('company_name').innerHTML = temp['corp_name'];
    $('#company_name_h').val(temp['corp_name']);
    $('#copyvalue').val(@json($copy));
    document.getElementById('comp_add02').innerHTML = temp['address'];
    $('#comp_add02_h').val(temp['address']);
    document.getElementById('company_hp').innerHTML = temp['home_page'];
    $('#company_hp_h').val(temp['home_page']);
    document.getElementById('employee_number').innerHTML = temp['employee_number'];
    $('#employee_number_h').val(temp['employee_number']);
    document.getElementById('foundation_date').innerHTML = String(temp['establish_year']) + '年' + String(temp['establish_month']) + '月';
    $('#foundation_date_h').val(temp['establish_year'] + '-' + temp['establish_month']);
    document.getElementById('company_overview').innerHTML = temp['company_profile'];
    $('#company_overview_h').val(temp['company_profile']);
    document.getElementById('business_guidance').innerHTML = temp['business_content'];
    $('#business_guidance_h').val(temp['business_content']);
    //都道府県
    document.getElementById('comp_add01').innerHTML = pref[temp['prefecture']];
    $('#comp_add01_h').val(temp['prefecture']);
    //業界1
    document.getElementById('job1c').innerHTML = first[temp['industry1'] -1]['name'];
    $('#job1c_h').val(temp['industry1']);
    //業界2
    document.getElementById('job2c').innerHTML = second[temp['industry2'] -1]['name']; 
    $('#job2c_h').val(temp['industry2']);
    //ロゴ
    document.getElementById('image').src = http_word + temp['logo'];
    $('#image_h').val(http_word + temp['logo']);
  }
})

</script>

