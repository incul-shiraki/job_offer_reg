<!-- job_offer_registrationのパーツ -->
<!-- 案件内容 -->
<div class="row">
  <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
  <div class="col-md-8 col-12">
    <div class="card">
      <div class="card-header">
        <h3 class='card_title'>案件内容</h3>
      </div>
      <div class="card-body">
        <div class="masonry-item">
          <div class="form-group row"><label for="job_content" class="col-sm-3 col-form-label">案件内容&nbsp;<span class="text-danger required">*</span><br>(2000文字以内)</label>
            <div class="col-sm-9"> 
              <textarea class="form-control" name="job_content" id="job_content" rows="12"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="work_appeal" class="col-sm-3 col-form-label">募集背景<br>(1000文字以内)</label>
            <div class="col-sm-9"> 
              <textarea class="form-control" name="work_appeal" id="work_appeal" rows="6"></textarea>
            </div>
          </div>
          <div class="form-group row"><label for="active_experience" class="col-sm-3 col-form-label">チーム規模</label>
            <div class="col-sm-9"> 
              <select name="team_scale" class="form-control" id="team_scale">
                <option hidden>選択してください</option>
                <option value=1>1名</option>
                <option value=2>2〜5名</option>
                <option value=3>6〜10名</option>
                <option value=4>11〜20名</option>
                <option value=5>21〜50名</option>
                <option value=6>50名以上</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
