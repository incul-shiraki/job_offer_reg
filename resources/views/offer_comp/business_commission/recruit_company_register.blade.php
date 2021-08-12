<!-- job_offer_registrationのパーツ -->
<!-- 新規募集企業登録 -->
<form action="/corp_cre" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="modal fade" id="Modal_comp_create" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Modal_comp_Label">募集企業情報入力</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group row"><label for="company_name" class="col-sm-3 col-form-label">会社名&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="text" name="company_name" class="form-control" id="company_name" value="{{ old('company_name') }}" placeholder="">
            </div>
          </div>
          <div class="form-group row"><label for="comp_add01" class="col-sm-3 col-form-label">会社住所&nbsp;<span class="text-danger required">*</span></br>都道府県</label>
            <div class="col-sm-9">
              <select name="comp_add01" class="form-control" id="comp_add01_list" >
                <option hidden>--都道府県▼--</option>
                @foreach ($prefectures as $prefecture => $values)
                  <option value={{$prefecture}}>{{$values}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="comp_add02" class="col-sm-3 col-form-label">会社住所&nbsp;<span class="text-danger required">*</span></br>市区町村・番地・建物名</label>
            <div class="col-sm-9">
              <input type="text" name="comp_add02" class="form-control" id="comp_add02" value="{{ old('comp_add02') }}" placeholder="〇〇市〇〇　１−２−３　〇〇ビル">
            </div>
          </div>
          <div class="form-group row"><label for="company_hp" class="col-sm-3 col-form-label">会社HP&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
                <input type="url" name="company_hp" class="form-control" id="company_hp" value="{{ old('company_hp') }}"  placeholder="https://〇〇.com">
            </div>
          </div>
          <div class="form-group row">
            <label for="job1c" class="col-sm-3 col-form-label">業界1&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="job1c" class="job1c_group form-control" id="job1c_list">
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="job2c" class="col-sm-3 col-form-label">業界2&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="job2c" class="job2c_group form-control" id="job2c_list">
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="employee_number" class="col-sm-3 col-form-label">従業員数&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="number" name="employee_number" class="form-control" id="employee_number" value="{{ old('employee_number') }}" placeholder="数値で記載">
            </div>
          </div>
          <div class="form-group row"><label for="foundation_date"
             class="col-sm-3 col-form-label">設立年月&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <input type="month" name="foundation_date" class="form-control" id="foundation_date" value="{{ old('foundation_date') }}" placeholder="">
            </div>
          </div>
          <div class="form-group row"><label for="company_overview" class="col-sm-3 col-form-label">会社概要</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="company_overview" id="company_overview" rows="6">{{ old('company_overview') }}</textarea>
            </div>
          </div>
          <div class="form-group row"><label for="business_guidance" class="col-sm-3 col-form-label">事業内容</label>
            <div class="col-sm-9"> 
              <textarea class="form-control" name="business_guidance" id="business_guidance" rows="6">{{ old('business_guidance') }}</textarea>
            </div>
          </div>
          <div class="form-group row"><label for="company_logo" class="col-sm-3 col-form-label">企業ロゴ</label>
            <div class="col-sm-9">
              <input type="file" name="company_logo" accept="image/png, image/jpg" id="company_logo" value="{{ old('company_logo') }}" >
            </div>
          </div>
          <div class="modal-footer">
            <div class="text-danger">
              <p>※登録した企業情報をフォームに反映させる場合、「募集企業選択」から該当企業を選択してください。</p>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> 
            <button type="button" id="modal_comp_reg_create" onclick="submit();"  class="btn btn-primary" data-dismiss="modal">募集企業登録</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
