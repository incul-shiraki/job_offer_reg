<!-- job_offer_registrationのパーツ -->
<!-- 必須要件 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>必須要件</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">必須要件・スキル&nbsp;<span class="text-danger required">*</span></label>
            <button type="button" id="add_req_skill" class="btn btn-primary" data-toggle="modal" data-target="#skill_modal">＋必須スキル追加</button>
            <div class="col-sm-9" class="form-control" id="req_skill">
            </div>
            <div class="col-sm-12" class="form-control" style="display:flex;">
              <label class="col-sm-3 col-form-label" style="display:flex;"></label>
              <textarea class="col-sm-9 form-control" name="required_requirement" id="required_requirement" rows="6" style="display:flex;"></textarea>
            </div>
          </div>
          <div class="form-group row"><label class="col-sm-3 col-form-label">歓迎スキル</label>
            <button type="button" class="btn btn-primary" id='add_flow2' style="align:center;">＋歓迎スキル追加</button>
            <div class="col-sm-9" class="form-control" id="wel_skill">
            </div>
            <div class="col-sm-12" class="form-control" style="display:flex;">
              <label class="col-sm-3 col-form-label" style="display:flex;"></label>
              <textarea class="form-control" name="required_requirement" id="required_requirement" rows="6" style="display:flex;"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="required_requirement" class="col-sm-3 col-form-label">必須要件・応募資格&nbsp;<span class="text-danger required">*</span><br>(1000文字以内)</label>
            <div class="col-sm-9"> 
              <textarea class="form-control" name="required_requirement" id="required_requirement" rows="6"></textarea>
            </div>
          </div>
          <div class="form-group row"><label class="col-sm-3 col-form-label">応募可能年齢&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-7 form-inline">
              <input type="text" class="col-sm-2 form-control" name="can_apply_age_more" id="can_apply_age_more">
              <b>&nbsp;〜&nbsp;</b>
              <input type="text" class="col-sm-2 form-control" name="can_apply_age_under" id="can_apply_age_under">
              <b>&nbsp;歳</b> 
            </div>
          </div>
          <div class="form-group row"><label for="sex" class="col-sm-3 col-form-label">性別&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="sex" class="form-control" id="sex">
                <option hidden>選択してください</option>
                <option value=1>男性</option>
                <option value=2>女性</option>
                <option value=3>不問</option>
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="foreign_nationality_availability" class="col-sm-3 col-form-label">外国籍の可否&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="foreign_nationality_availability" class="form-control" id="foreign_nationality_availability">
                <option hidden>選択してください</option>
                <option value=1>可</option>
                <option value=2>不可</option>
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="english_conversation_level" class="col-sm-3 col-form-label">英語レベル&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="english_conversation_level" class="form-control" id="english_conversation_level">
                <option hidden>選択してください</option>
                <option value=1>不問</option>
                <option value=2>日常会話レベル</option>
                <option value=3>ビジネスレベル</option>
                <option value=4>ネイティブレベル</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<script>
arr_fsc                 = @json($first_skill_category); 
arr_ssc                 = @json($second_skill_category); 
arr_skill_name          = @json($skill_name); 
arr_ex_year             = @json($experience_year); 
let max_num             = (Object.keys(arr_skill_name).length);
let arr_skill_name_last = (Object.values(arr_skill_name).slice(-1)[0]);
let last_key            = 0;
$(function(){

  $.each(arr_skill_name_last, function(key, val) {
    last_key = key;
  })

    console.log(last_key);
  $("#add_req_skill").click(function() {
    for (i = 0;i <= last_key;i++) {
      if($("#skill_name" + i).prop("checked") == true ){
        console.log(i);
      }
    }
  })
})


</script>


