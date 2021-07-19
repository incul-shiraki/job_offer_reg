<!-- job_offer_registrationのパーツ -->
<!-- 募集企業更新 -->
<form action="/corp_edit" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="modal fade" id="Modal_comp_edit" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Modal_comp_Label">募集企業情報入力</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group row"><label for="company_name" class="col-sm-3 col-form-label">会社名&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="company_name" class="form-control" id="company_name_edit" placeholder="">
              <input type="hidden" name="company_id" id="company_id_h">
            </div>
          </div>
          <div class="form-group row"><label for="comp_add01" class="col-sm-3 col-form-label">会社住所&nbsp;<span class="text-danger required">*</span></br>都道府県</label>
            <div class="col-sm-9">
              <select name="comp_add01" class="form-control" id="comp_add01_edit" >
                <option hidden>--都道府県▼--</option>
                @foreach ($prefectures as $prefecture => $values)
                  <option value={{$prefecture}}>{{$values}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="comp_add02" class="col-sm-3 col-form-label">会社住所&nbsp;<span class="text-danger required">*</span></br>市区町村・番地・建物名</label>
            <div class="col-sm-9">
              <input type="text" name="comp_add02" class="form-control" id="comp_add02_edit" placeholder="〇〇市〇〇　１−２−３　〇〇ビル">
            </div>
          </div>
          <div class="form-group row"><label for="company_hp" class="col-sm-3 col-form-label">会社HP&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="url" name="company_hp" class="form-control" id="company_hp_edit" placeholder="https://〇〇.com">
            </div>
          </div>
          <div class="form-group row">
            <label for="job1c" class="col-sm-3 col-form-label">業界1&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="job1c" class="job1c_group form-control" id="job1c_edit">
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="job2c" class="col-sm-3 col-form-label">業界2&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="job2c" class="job2c_group form-control" id="job2c_edit">
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="employee_number" class="col-sm-3 col-form-label">従業員数&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="number" name="employee_number" class="form-control" id="employee_number_edit" placeholder="数値で記載">
            </div>
          </div>
          <div class="form-group row"><label for="foundation_date"
             class="col-sm-3 col-form-label">設立年月&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="month" name="foundation_date" class="form-control" id="foundation_date_edit" placeholder="">
            </div>
          </div>
          <div class="form-group row"><label for="company_overview" class="col-sm-3 col-form-label">会社概要</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="company_overview" id="company_overview_edit" rows="6"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="business_guidance" class="col-sm-3 col-form-label">事業内容</label>
            <div class="col-sm-9"> 
              <textarea class="form-control" name="business_guidance" id="business_guidance_edit" rows="6"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="company_logo" class="col-sm-3 col-form-label">企業ロゴ</label>
            <div class="col-sm-9">
              <img src="" id="image_edit" name="company_logo">   
              <br>
              <input type="file" name="company_logo" accept="image/png, image/jpg" id="company_logo_edit">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> 
            <button type="button" id="modal_comp_reg_edit" onclick="submit();"  class="btn btn-primary" data-dismiss="modal">募集企業更新</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
$(function(){
  //募集企業選択プルダウンリストの表示制御
  $('#open_corp_modal').after().hide();
  var recruit_company = @json($recruit_company);
  var prefectures = @json($prefectures);
  var first = @json($first);
  var second = @json($second);
    $('#corp_link').append('<option hidden>募集企業選択</option>');  
  for ( var i = 0; i < recruit_company.length; i++ ){
    $('#corp_link').append('<option class="dropdown-item" id=' + recruit_company[i]['id'] + ' value=' + recruit_company[i]['id'] + '>' + recruit_company[i]['corporation_name']  + '</option>');  
  }  
  
  //プルダウン選択後の制御
  $('select#corp_link').change(function(){
    var corp_id = $('#corp_link').val();

  if (corp_id >= 0) {
    $('#open_corp_modal').show();
  }
  //会社名と募集企業idの表示とdb登録用の値取得
    document.getElementById('company_name').innerHTML = recruit_company[corp_id-1 ]['corporation_name'] 
    document.getElementById('company_name_edit').value = recruit_company[corp_id-1 ]['corporation_name'] 
    $('#company_id_h').val(recruit_company[corp_id-1]['id']);
  //住所の表示とdb登録用の値取得
    document.getElementById('comp_add02').innerHTML = recruit_company[corp_id-1]['address']
    document.getElementById('comp_add02_edit').value = recruit_company[corp_id-1]['address']

  //会社ホームページの表示とdb登録用の値取得 
    document.getElementById('company_hp').innerHTML = recruit_company[corp_id-1]['home_page']
    document.getElementById('company_hp_edit').value = recruit_company[corp_id-1]['home_page']

  //従業員数の表示とdb登録用の値取得 
    document.getElementById('employee_number').innerHTML = recruit_company[corp_id-1]['employee_number'] 
    document.getElementById('employee_number_edit').value = recruit_company[corp_id-1]['employee_number'] 

  //設立年月の表示とdb登録用の値取得 
    document.getElementById('foundation_date').innerHTML = String(recruit_company[corp_id-1]['establish_year']) + '年' + String(recruit_company[corp_id-1]['establish_month']) + '月';
    if(String(recruit_company[corp_id-1]['establish_month']).length == 1){
      document.getElementById('foundation_date_edit').value = (String(recruit_company[corp_id-1]['establish_year']) + '-0' + String(recruit_company[corp_id-1]['establish_month']));
    } else if(String(recruit_company[corp_id-1]['establish_month']).length == 2){
      document.getElementById('foundation_date_edit').value = (String(recruit_company[corp_id-1]['establish_year']) + '-' + String(recruit_company[corp_id-1]['establish_month']));
    }
  //会社概要の表示とdb登録用の値取得 
    document.getElementById('company_overview').innerHTML = recruit_company[corp_id-1]['company_profile']
    document.getElementById('company_overview_edit').value = recruit_company[corp_id-1]['company_profile']

  //事業内容の表示とdb登録用の値取得 
    document.getElementById('business_guidance').innerHTML = recruit_company[corp_id-1]['business_content']
    document.getElementById('business_guidance_edit').value = recruit_company[corp_id-1]['business_content']
    
  //都道府県
    document.getElementById('comp_add01').innerHTML = prefectures[recruit_company[corp_id-1]['prefecture']]
    $('#comp_add01_edit').val(recruit_company[corp_id-1]['prefecture']);

  //業界1
    document.getElementById('job1c').innerHTML = first[recruit_company[corp_id-1]['industry1'] - 1]['name']
    $('#job1c_edit').val(recruit_company[corp_id-1]['industry1']);

  //業界2
    document.getElementById('job2c').innerHTML = second[recruit_company[corp_id-1]['industry2'] - 1]['name']
    $('#job2c_edit').val(recruit_company[corp_id-1]['industry2']);

  //ロゴ
    document.getElementById('image').src = recruit_company[corp_id-1]['corporation_logo'].replace('public','storage');
    $('#image_h').val(recruit_company[corp_id-1]['corporation_logo']);
    document.getElementById('image_edit').src = recruit_company[corp_id-1]['corporation_logo'].replace('public','storage');
  })
})
</script>
