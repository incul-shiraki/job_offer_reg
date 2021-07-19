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
          <div class="form-group row"><label for="required_requirement" class="col-sm-3 col-form-label">必須要件・応募資格&nbsp;<span class="text-danger required">*</span><br>(1000文字以内)</label>
            <div class="col-sm-9"> 
              <textarea class="form-control" name="required_requirement" id="required_requirement" rows="6"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="last_educational_background" class="col-sm-3 col-form-label">最終学歴&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="last_educational_background" class="form-control" id="last_educational_background">
                <option hidden>選択してください</option>
                <option value=1>不問</option>
                <option value=2>高校卒業以上</option>
                <option value=3>高専卒業以上</option>
                <option value=4>短大・専門学校卒業以上</option>
                <option value=5>大学卒業以上</option>
                <option value=6>MARCH以上</option>
                <option value=7>早慶・国立以上</option>
                <option value=8>大学院以上</option>
              </select>
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
          <div class="form-group row"><label for="working_experience_company_number" class="col-sm-3 col-form-label">就業経験社数&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="working_experience_company_number" class="form-control" id="working_experience_company_number">
                <option hidden>選択してください</option>
                <option value=1>不問</option>
                <option value=2>1社まで可</option>
                <option value=3>2社まで可</option>
                <option value=4>3社まで可</option>
                <option value=5>4社まで可</option>
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="sex" class="col-sm-3 col-form-label">性別&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="sex" class="form-control" id="sex">
                <option hidden>選択してください</option>
                <option value=1>不問</option>
                <option value=2>男性</option>
                <option value=3>女性</option>
              </select>
            </div>
          </div>
          <div class="form-group row"><label for="unexperienced_availability" class="col-sm-3 col-form-label">未経験の可否&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="unexperienced_availability" class="form-control" id="unexperienced_availability">
                <option hidden>選択してください</option>
                <option value=1>業界未経験可</option>
                <option value=2>業種未経験可</option>
                <option value=3>業界・業種未経験可</option>
                <option value=4>不可</option>
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
          <div class="form-group row"><label for="chinese_conversation_level" class="col-sm-3 col-form-label">中国語レベル&nbsp;<span class="text-danger required">*</span></label>
            <div class="col-sm-9">
              <select name="chinese_conversation_level" class="form-control" id="chinese_conversation_level">
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
