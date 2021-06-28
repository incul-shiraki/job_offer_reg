<!doctype html>
<html>

<head>
  <title>新規求人登録画面 </title>
  
  @component('components.headPart')
  @endcomponent
</head>

<body class="app">
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <script>window.addEventListener('load', function load() {
      const loader = document.getElementById('loader');
      setTimeout(function () {
        loader.classList.add('fadeOut');
      }, 300);
    });</script>
  <div>
    <div class="page-container" style="padding-left: 0;">
      <div class="header navbar" style="width:100%;">
        <div class="header-container">
          <ul class="nav-left">
            <div class="logo"><img src="assets/static/images/logo.png" alt=""></div>
          </ul>
        </div>
      </div>
      <main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="row">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card create_page">
                <div class="card-body">
                  <div class="masonry-item">
                    <div class="form-group row">
                      <div class="col-sm-9 input_item" name="other_recruit" class="form-control" id="other_recruit">
                        <label style="padding: .18rem .18rem;"><input type="checkbox" name="other_recruit" value=1 {{ old('other_recruit') == 1 ? 'checked' : '' }} >&nbsp;他の求人や業務委託案件からコピーして作成する</label>
                      </div>
                    </div>
                    <form action="remaking" method="get">
                    <div class="form-group row" id="makecopy">
                      <div class="col-sm-9">
                        <select name="movecopy" class="form-control" id="movecopy">
                        @foreach ($rec_info as $keys => $values)
                            <option value="{{$values["id"]}}">{{$values["job_title"]}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div>
                        <button type="submit">コピーを作成する</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

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
                          <input type="file hidden" name="company_logo" id="image_h">
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
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

          <div class="row">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>募集期間</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                    <div class="form-group row"><label for="recruiting_end_expected_date" class="col-sm-3 col-form-label">募集終了予定日&nbsp;<span class="text-danger required">*</span></label>
                      <div class="col-sm-9 input_item" name="recruiting_end_expected_date" class="form-control" id="recruiting_end_expected_date">
                        <label style="padding: .18rem .18rem;">
                        <input type="checkbox" name="recruiting_end_expected_date" value=1 {{ old('recruiting_end_expected_date',1) == 1 ? 'checked' : '' }} >&nbsp;終了予定日を定めない</label>
                      </div>
                    </div>
                    <div class="form-group row" id="calender_area_view"><label for="calender_area" class="col-sm-3 col-form-label"></label>
                      @if ($rec_info_re === 0)
                        <div class="col-sm-9"><input type="date" name="calender_area" class="form-control" id="calender_area" value="{{ old('calender_area') }}" >
                      @else
                        <div class="col-sm-9"><input type="date" name="calender_area" class="form-control" id="calender_area" value="{{$rec_info_re['recruit_period']}}">
                      @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

          <div class="row">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>募集概要</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                      <div class="form-group row">
                        <label for="job_category1" class="col-sm-3 col-form-label">職種カテゴリー1&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="job_category1" class="form-control" id="job_category1">
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="job_category2"
                          class="col-sm-3 col-form-label">職種カテゴリー2&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="job_category2" class="form-control" id="job_category2">
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="recruiting_job_category_name" class="col-sm-3 col-form-label">募集職種名&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                        @if ($rec_info_re === 0)
                          <input type="text" name="recruiting_job_category_name" class="form-control" id="recruiting_job_category_name" value="{{ old('recruiting_job_category_name') }}" placeholder=""></div>
                        @else
                          <input type="text" name="recruiting_job_category_name" class="form-control" id="recruiting_job_category_name" value="{{$rec_info_re['recruit_ocupation']}}" placeholder=""></div>
                        @endif
                      </div>
                      <div class="form-group row"><label for="job_offer_title" class="col-sm-3 col-form-label">求人タイトル&nbsp;<span class="text-danger required">*</span></label>
                        @if ($rec_info_re === 0)
                          <dev class="col-sm-9"><input type="text" name="job_offer_title" class="form-control" id="job_offer_title" value="{{old('job_offer_title')}}"
                            placeholder=""></div>
                        @else
                          <div class="col-sm-9"><input type="text" name="job_offer_title" class="form-control" id="job_offer_title" value="{{$rec_info_re['job_title']}}"
                            placeholder=""></div>
                        @endif
                      </div>
                      <div class="form-group row"><label class="col-sm-3 col-form-label">特徴・訴求ポイント</label>
                        <div class="col-sm-9 input_item" name="feature_offer_point" class="form-control" id="feature_offer_point">
                          @foreach ($charmpoints as $charmpoint => $values)
                            <label style="padding: .18rem .18rem;"><input id="feature_{{$charmpoint}}" type="checkbox" name="feature_offer_point[]" value={{$charmpoint}} onclick="click_cb();">&nbsp;{{$values}}</label>
                          @endforeach
                        </div>
                      </div>
                      <div class="form-group row"><label for="main_image" class="col-sm-3 col-form-label">画像（メイン）&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9"><input type="file" name="main_image" accept="image/png, image/jpg" id="main_image" value="{{ old('main_image') }}">
                        </div>
                      </div>
                      <div class="form-group row"><label for="sub_image1" class="col-sm-3 col-form-label">画像（サブ1）</label>
                        <div class="col-sm-9"><input type="file" name="sub_image1" accept="image/png, image/jpg" id="sub_image1" value="{{ old('sub_image1') }}">
                        </div>
                      </div>
                      <div class="form-group row"><label for="sub_image2" class="col-sm-3 col-form-label">画像（サブ2）</label>
                        <div class="col-sm-9"><input type="file" name="sub_image2" accept="image/png, image/jpg" id="sub_image2" value="{{ old('sub_image2') }}">
                        </div>
                      </div>
                      <div class="form-group row"><label for="sub_image3" class="col-sm-3 col-form-label">画像（サブ3）</label>
                        <div class="col-sm-9"><input type="file" name="sub_image3" accept="image/png, image/jpg" id="sub_image3" value="{{ old('sub_image3') }}">
                        </div>
                      </div>
                      <div class="form-group row"><label for="sub_image4" class="col-sm-3 col-form-label">画像（サブ4）</label>
                        <div class="col-sm-9"><input type="file" name="sub_image4" accept="image/png, image/jpg" id="sub_image4" value="{{ old('sub_image4') }}">
                        </div>
                      </div>
                      <div class="form-group row"><label for="sub_image5" class="col-sm-3 col-form-label">画像（サブ5）</label>
                        <div class="col-sm-9"><input type="file" name="sub_image5" accept="image/png, image/jpg" id="sub_image5" value="{{ old('sub_image5') }}">
                        </div>
                      </div>
                      <div class="form-group row"><label for="customer_acquisition_use_availability" class="col-sm-3 col-form-label">集客利用の可否</label>
                        <div class="col-sm-9">
                          <select name="customer_acquisition_use_availability" class="form-control" id="customer_acquisition_use_availability">
                            @if ($rec_info_re === 0)
                              <option value=1 @if(old('customer_acquisition_use_availability') == 1) selected @endif>選択しない</option>
                              <option value=2 @if(old('customer_acquisition_use_availability') == 2) selected @endif>集客利用不可</option>
                              <option value=3 @if(old('customer_acquisition_use_availability') == 3) selected @endif>完全非公開設定</option>
                            @else
                              <option value=1 @if($rec_info_re['marketing_use'] == 1) selected @endif>選択しない</option>
                              <option value=2 @if($rec_info_re['marketing_use'] == 2) selected @endif>集客利用不可</option>
                              <option value=3 @if($rec_info_re['marketing_use'] == 3) selected @endif>完全非公開設定</option>
                            @endif
                          </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

          <div class="row">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>勤務地</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                    <div class="form-group row"><label for="home_working" class="col-sm-3 col-form-label">在宅勤務</label>
                      <div class="col-sm-9">
                        <select name="home_working" class="form-control" id="home_working">
                          @if ($rec_info_re === 0)
                            <option value=1 @if(old('home_working') == 1) selected @endif >選択しない</option>
                            <option value=2 @if(old('home_working') == 2) selected @endif >テレワーク(常時)</option>
                            <option value=3 @if(old('home_working') == 3) selected @endif >一部テレワーク</option>
                          @else
                            <option value=1 @if ($rec_info_re['telework'] === 1) selected @endif>選択しない</option>
                            <option value=2 @if ($rec_info_re['telework'] === 2) selected @endif >テレワーク(常時)</option>
                            <option value=3 @if ($rec_info_re['telework'] === 3) selected @endif >一部テレワーク</option>
                          @endif    
                        </select>
                      </div>
                    </div>
                    <div class="form-group row"><label for="home_working_detail" class="col-sm-3 col-form-label">在宅勤務詳細</label>
                      <div class="col-sm-9">
                        @if ($rec_info_re === 0)
                          <textarea class="form-control" name="home_working_detail" id="home_working_detail" rows="6"> {{ old('home_working_detail') }}</textarea>
                        @else
                          <textarea class="form-control" name="home_working_detail" id="home_working_detail" rows="6">{{$rec_info_re['telework_info']}}</textarea>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row" id="input_pluralBox"><label class="col-sm-3 col-form-label">勤務地</label>
                      <div class="col-sm-9" id="input_plural">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">勤務地情報追加</button>
                        <button type="button" class="btn btn-dark" id="work-location-delete">勤務地情報削除</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

  
          <div class="row">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>仕事内容</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                      <div class="form-group row"><label for="job_content" class="col-sm-3 col-form-label">仕事内容&nbsp;<span class="text-danger required">*</span><br>(2000文字以内)</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="job_content" id="job_content" rows="12">{{ old('job_content') }}</textarea>
                          @else
                            <textarea class="form-control" name="job_content" id="job_content" rows="12">{{$rec_info_re['job_description']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="work_appeal" class="col-sm-3 col-form-label">この仕事の醍醐味・魅力・得られるもの<br>(1000文字以内)</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="work_appeal" id="work_appeal" rows="6"> {{ old('work_appeal') }}  </textarea>
                          @else
                            <textarea class="form-control" name="work_appeal" id="work_appeal" rows="6">{{$rec_info_re['job_attraction']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="active_experience" class="col-sm-3 col-form-label">活躍できる経験<br>(1000文字以内)</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="active_experience" id="active_experience" rows="6"> {{ old('active_experience') }}  </textarea>
                          @else
                            <textarea class="form-control" name="active_experience" id="active_experience" rows="6">{{$rec_info_re['job_experience']}}</textarea>
                          @endif
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

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
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="required_requirement" id="required_requirement" rows="6"> {{ old('required_requirement') }}</textarea>
                          @else
                            <textarea class="form-control" name="required_requirement" id="required_requirement" rows="6">{{$rec_info_re['job_requirement']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="last_educational_background" class="col-sm-3 col-form-label">最終学歴&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="last_educational_background" class="form-control" id="last_educational_background">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('last_educational_background') == 1) selected @endif>不問</option>
                              <option value=2 @if(old('last_educational_background') == 2) selected @endif>高校卒業以上</option>
                              <option value=3 @if(old('last_educational_background') == 3) selected @endif>高専卒業以上</option>
                              <option value=4 @if(old('last_educational_background') == 4) selected @endif>短大・専門学校卒業以上</option>
                              <option value=5 @if(old('last_educational_background') == 5) selected @endif>大学卒業以上</option>
                              <option value=6 @if(old('last_educational_background') == 6) selected @endif>MARCH以上</option>
                              <option value=7 @if(old('last_educational_background') == 7) selected @endif>早慶・国立以上</option>
                              <option value=8 @if(old('last_educational_background') == 8) selected @endif>大学院以上</option>
                            @else
                              <option value=1 @if($rec_info_re['final_education'] == 1) selected @endif>不問</option>
                              <option value=2 @if($rec_info_re['final_education'] == 2) selected @endif>高校卒業以上</option>
                              <option value=3 @if($rec_info_re['final_education'] == 3) selected @endif>高専卒業以上</option>
                              <option value=4 @if($rec_info_re['final_education'] == 4) selected @endif>短大・専門学校卒業以上</option>
                              <option value=5 @if($rec_info_re['final_education'] == 5) selected @endif>大学卒業以上</option>
                              <option value=6 @if($rec_info_re['final_education'] == 6) selected @endif>MARCH以上</option>
                              <option value=7 @if($rec_info_re['final_education'] == 7) selected @endif>早慶・国立以上</option>
                              <option value=8 @if($rec_info_re['final_education'] == 8) selected @endif>大学院以上</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      </div>
                      <div class="form-group row"><label class="col-sm-3 col-form-label">応募可能年齢&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-7 form-inline">
                          @if ($rec_info_re === 0)
                            <input type="text" class="col-sm-2 form-control" name="can_apply_age_more" id="can_apply_age_more" value="{{ old('can_apply_age_more') }}"  >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-2 form-control" name="can_apply_age_under" id="can_apply_age_under" value="{{ old('can_apply_age_under') }}"  >
                            <b>&nbsp;歳</b> 
                          @else
                            <input type="text" class="col-sm-2 form-control" name="can_apply_age_more" id="can_apply_age_more" value="{{$rec_info_re['applicable_age_from']}}">
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-2 form-control" name="can_apply_age_under" id="can_apply_age_under" value="{{$rec_info_re['applicable_age_to']}}">
                            <b>&nbsp;歳</b> 
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="working_experience_company_number" class="col-sm-3 col-form-label">就業経験社数&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="working_experience_company_number" class="form-control" id="working_experience_company_number">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('working_experience_company_number') == 1) selected @endif>不問</option>
                              <option value=2 @if(old('working_experience_company_number') == 2) selected @endif>1社まで可</option>
                              <option value=3 @if(old('working_experience_company_number') == 3) selected @endif>2社まで可</option>
                              <option value=4 @if(old('working_experience_company_number') == 4) selected @endif>3社まで可</option>
                              <option value=5 @if(old('working_experience_company_number') == 5) selected @endif>4社まで可</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['company_number'] == 1) selected @endif>不問</option>
                              <option value=2 @if($rec_info_re['company_number'] == 2) selected @endif>1社まで可</option>
                              <option value=3 @if($rec_info_re['company_number'] == 3) selected @endif>2社まで可</option>
                              <option value=4 @if($rec_info_re['company_number'] == 4) selected @endif>3社まで可</option>
                              <option value=5 @if($rec_info_re['company_number'] == 5) selected @endif>4社まで可</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="sex" class="col-sm-3 col-form-label">性別&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="sex" class="form-control" id="sex">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('sex') == 1) selected @endif>不問</option>
                              <option value=2 @if(old('sex') == 2) selected @endif>男性</option>
                              <option value=3 @if(old('sex') == 3) selected @endif>女性</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['sex'] == 1) selected @endif>不問</option>
                              <option value=2 @if($rec_info_re['sex'] == 2) selected @endif>男性</option>
                              <option value=3 @if($rec_info_re['sex'] == 3) selected @endif>女性</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="unexperienced_availability" class="col-sm-3 col-form-label">未経験の可否&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="unexperienced_availability" class="form-control" id="unexperienced_availability">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('unexperienced_availability') == 1) selected @endif>業界未経験可</option>
                              <option value=2 @if(old('unexperienced_availability') == 2) selected @endif>業種未経験可</option>
                              <option value=3 @if(old('unexperienced_availability') == 3) selected @endif>業界・業種未経験可</option>
                              <option value=4 @if(old('unexperienced_availability') == 4) selected @endif>不可</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['inexperienced'] == 1) selected @endif>業界未経験可</option>
                              <option value=2 @if($rec_info_re['inexperienced'] == 2) selected @endif>業種未経験可</option>
                              <option value=3 @if($rec_info_re['inexperienced'] == 3) selected @endif>業界・業種未経験可</option>
                              <option value=4 @if($rec_info_re['inexperienced'] == 4) selected @endif>不可</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="foreign_nationality_availability" class="col-sm-3 col-form-label">外国籍の可否&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="foreign_nationality_availability" class="form-control" id="foreign_nationality_availability">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('foreign_nationality_availability') == 1) selected @endif>可</option>
                              <option value=2 @if(old('foreign_nationality_availability') == 2) selected @endif>不可</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['foregin_nationality'] == 1) selected @endif>可</option>
                              <option value=2 @if($rec_info_re['foregin_nationality'] == 2) selected @endif>不可</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="english_conversation_level" class="col-sm-3 col-form-label">英語レベル&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="english_conversation_level" class="form-control" id="english_conversation_level">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('english_conversation_level') == 1) selected @endif>不問</option>
                              <option value=2 @if(old('english_conversation_level') == 2) selected @endif>日常会話レベル</option>
                              <option value=3 @if(old('english_conversation_level') == 3) selected @endif>ビジネスレベル</option>
                              <option value=4 @if(old('english_conversation_level') == 4) selected @endif>ネイティブレベル</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['english_level'] == 1) selected @endif>不問</option>
                              <option value=2 @if($rec_info_re['english_level'] == 2) selected @endif>日常会話レベル</option>
                              <option value=3 @if($rec_info_re['english_level'] == 3) selected @endif>ビジネスレベル</option>
                              <option value=4 @if($rec_info_re['english_level'] == 4) selected @endif>ネイティブレベル</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="chinese_conversation_level" class="col-sm-3 col-form-label">中国語レベル&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="chinese_conversation_level" class="form-control" id="chinese_conversation_level">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('chinese_conversation_level') == 1) selected @endif>不問</option>
                              <option value=2 @if(old('chinese_conversation_level') == 2) selected @endif>日常会話レベル</option>
                              <option value=3 @if(old('chinese_conversation_level') == 3) selected @endif>ビジネスレベル</option>
                              <option value=4 @if(old('chinese_conversation_level') == 4) selected @endif>ネイティブレベル</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['chinese_level'] == 1) selected @endif>不問</option>
                              <option value=2 @if($rec_info_re['chinese_level'] == 2) selected @endif>日常会話レベル</option>
                              <option value=3 @if($rec_info_re['chinese_level'] == 3) selected @endif>ビジネスレベル</option>
                              <option value=4 @if($rec_info_re['chinese_level'] == 4) selected @endif>ネイティブレベル</option>
                            @endif
                          </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

          <div class="row">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>募集要項</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                      <div class="form-group row"><label for="recruiting_plan_count" class="col-sm-3 col-form-label">募集予定人数&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="recruiting_plan_count" class="form-control" id="recruiting_plan_count">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('recruiting_plan_count') == 1) selected @endif>1人</option>
                              <option value=2 @if(old('recruiting_plan_count') == 2) selected @endif>2人</option>
                              <option value=3 @if(old('recruiting_plan_count') == 3) selected @endif>3人</option>
                              <option value=4 @if(old('recruiting_plan_count') == 4) selected @endif>4人</option>
                              <option value=5 @if(old('recruiting_plan_count') == 5) selected @endif>5〜9人</option>
                              <option value=6 @if(old('recruiting_plan_count') == 6) selected @endif>10〜19人</option>
                              <option value=7 @if(old('recruiting_plan_count') == 7) selected @endif>20〜29人</option>
                              <option value=8 @if(old('recruiting_plan_count') == 8) selected @endif>30人〜</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['recruiting_plan_count'] == 1) selected @endif>1人</option>
                              <option value=2 @if($rec_info_re['recruiting_plan_count'] == 2) selected @endif>2人</option>
                              <option value=3 @if($rec_info_re['recruiting_plan_count'] == 3) selected @endif>3人</option>
                              <option value=4 @if($rec_info_re['recruiting_plan_count'] == 4) selected @endif>4人</option>
                              <option value=5 @if($rec_info_re['recruiting_plan_count'] == 5) selected @endif>5〜9人</option>
                              <option value=6 @if($rec_info_re['recruiting_plan_count'] == 6) selected @endif>10〜19人</option>
                              <option value=7 @if($rec_info_re['recruiting_plan_count'] == 7) selected @endif>20〜29人</option>
                              <option value=8 @if($rec_info_re['recruiting_plan_count'] == 8) selected @endif>30人〜</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="division_name" class="col-sm-3 col-form-label">部署名</label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="division_name" class="form-control" id="division_name" value="{{ old('division_name') }}" placeholder="">
                          @else
                            <input type="text" name="division_name" class="form-control" id="division_name" value="{{$rec_info_re['department']}}" placeholder="">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="division_detail" class="col-sm-3 col-form-label">部署詳細</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="division_detail" id="division_detail" rows="6">{{ old('division_detail') }}</textarea>
                          @else
                            <textarea class="form-control" name="division_detail" id="division_detail" rows="6">{{$rec_info_re['department_detail']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="employment_status" class="col-sm-3 col-form-label">雇用形態&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="employment_status" class="form-control" id="employment_status">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('employment_status') == 1) selected @endif>正社員</option>
                              <option value=2 @if(old('employment_status') == 2) selected @endif>契約社員</option>
                              <option value=3 @if(old('employment_status') == 3) selected @endif>パート・アルバイト</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['employment'] == 1) selected @endif>正社員</option>
                              <option value=2 @if($rec_info_re['employment'] == 2) selected @endif>契約社員</option>
                              <option value=3 @if($rec_info_re['employment'] == 3) selected @endif>パート・アルバイト</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="row"><label for="template" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-7">
                          <select name="template" id="template" class="form-control">
                          <option hidden>勤務時間タイプのテンプレート選択</option>
                          <option value=1 @if(old('template') == 1) selected @endif>固定時間制(一般的な勤務時間)</option>
                          <option value=2 @if(old('template') == 2) selected @endif>フレックス制(コアタイムあり)</option>
                          <option value=3 @if(old('template') == 3) selected @endif>フレックス制(コアタイムなし)</option>
                          <option value=4 @if(old('template') == 4) selected @endif>変形労働時間制(１ヶ月単位)</option>
                          <option value=5 @if(old('template') == 5) selected @endif>変形労働時間制(１年単位)</option>
                          <option value=6 @if(old('template') == 6) selected @endif>裁量労働時間制(みなし労働時間制)</option>
                          <!-- <option value=7>その他</option> -->
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="working_hours_type" class="col-sm-3 col-form-label">勤務時間タイプ&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="working_hours_type" id="working_hours_type" rows="6">{{ old('working_hours_type') }}</textarea>
                          @else
                            <textarea class="form-control" name="working_hours_type" id="working_hours_type" rows="6">{{$rec_info_re['working_time_type']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="working_hours" class="col-sm-3 col-form-label">勤務時間&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="working_hours" id="working_hours" rows="6">{{ old('working_hours') }}</textarea>
                          @else
                            <textarea class="form-control" name="working_hours" id="working_hours" rows="6">{{$rec_info_re['working_time']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="supervisor_job_offer" class="col-sm-3 col-form-label">管理監督者の求人&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                            <div style="display:block;"><input type="radio" name="supervisor_job_offer" id="supervisor_job_offer1" value=1 {{ old('supervisor_job_offer',1) == 1 ? 'checked' : ''}}><label for="supervisor_job_offer1" class="check_radio_label">管理監督者の募集ではない</label></div>
                            <div style="display:block;"><input type="radio" name="supervisor_job_offer" id="supervisor_job_offer2" value=2 {{ old('supervisor_job_offer',1) == 2 ? 'checked' : ''}}><label for="supervisor_job_offer2" class="check_radio_label">管理監督者の募集</label></div>
                        </div>
                      </div>
                      <div class="form-group row" id="hide_menu1"><label for="working_hours_system_fixed_overtime_work_fare" class="col-sm-3 col-form-label">労働時間制・固定残業代&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="working_hours_system_fixed_overtime_work_fare" class="form-control hide" id="working_hours_system_fixed_overtime_work_fare">
                            @if ($rec_info_re === 0)
                              <option value=1 @if(old('working_hours_system_fixed_overtime_work_fare') == 1) selected @endif selected="selected">通常(残業代は別途支給)</option>
                              <option value=2 @if(old('working_hours_system_fixed_overtime_work_fare') == 2) selected @endif>固定残業代制</option>
                              <option value=3 @if(old('working_hours_system_fixed_overtime_work_fare') == 3) selected @endif>みなし労働時間制</option>
                            @else
                              <option value=1 @if($rec_info_re['working_hours_system'] == 1) selected @endif selected="selected">通常(残業代は別途支給)</option>
                              <option value=2 @if($rec_info_re['working_hours_system'] == 2) selected @endif>固定残業代制</option>
                              <option value=3 @if($rec_info_re['working_hours_system'] == 3) selected @endif>みなし労働時間制</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row" id="hide_menu2"><label for="deemed_working_hours_system_type" class="col-sm-3 col-form-label">みなし労働時間制の種類&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="deemed_working_hours_system_type" class="form-control" id="deemed_working_hours_system_type">
                          <option value=0 hidden>選択してください</option>
                          <option value=1 @if(old('deemed_working_hours_system_type') == 1) selected @endif>専門業務型裁量労働制</option>
                          <option value=2 @if(old('deemed_working_hours_system_type') == 2) selected @endif>企画業務型裁量労働制</option>
                          <option value=3 @if(old('deemed_working_hours_system_type') == 3) selected @endif>社内勤務なし 事業場外みなし労働時間制</option>
                          <option value=4 @if(old('deemed_working_hours_system_type') == 4) selected @endif>社内勤務あり 事業場外みなし労働時間制</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row" id="hide_menu3"><label for="deemed_working_hours_per_one_day" class="col-sm-3 col-form-label">1日あたりのみなし労働時間&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9"><input type="text" name="deemed_working_hours_per_one_day" class="form-control" id="deemed_working_hours_per_one_day" value="{{ old('deemed_working_hours_per_one_day') }}" 
                            placeholder="〇〇時間　もしくは　〇〇分"></div>
                      </div>
                      <div class="form-group row"><label for="overtime_hours_detail" class="col-sm-3 col-form-label">残業時間の詳細</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="overtime_hours_detail" id="overtime_hours_detail" rows="6">{{ old('overtime_hours_detail') }}</textarea>
                          @else
                            <textarea class="form-control" name="overtime_hours_detail" id="overtime_hours_detail" rows="6">{{$rec_info_re['overtime_hours']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="shorter_working_hours_working" class="col-sm-3 col-form-label">時短勤務&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <div style="display:block;"><input type="radio" name="shorter_working_hours_working" value=1 id="shorter_working_hours_working1" {{ old('shorter_working_hours_working',1) == 1 ? 'checked' : '' }}><label for="shorter_working_hours_working1" class="check_radio_label">不可</label></div>
                          <div style="display:block;"><input type="radio" name="shorter_working_hours_working" value=2 id="shorter_working_hours_working2" {{ old('shorter_working_hours_working',1) == 2 ? 'checked' : '' }}><label for="shorter_working_hours_working2" class="check_radio_label">可</label></div>
                        </div>
                      </div>
                      <div class="form-group row" id="short_work"><label for="shorter_working_hours_working_detail" class="col-sm-3 col-form-label">時短勤務詳細</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="shorter_working_hours_working_detail" id="shorter_working_hours_working_detail" rows="6">{{ old('shorter_working_hours_working_detail') }}</textarea>
                          @else
                            <textarea class="form-control" name="shorter_working_hours_working_detail" id="shorter_working_hours_working_detail" rows="6">{{$rec_info_re['short_working_hours_system_detail']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="selection_flow" class="col-sm-3 col-form-label">選考フロー&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9" name="selection_flow" class="form-control" id="selection_flow">
                          <div style="display:block;"><input id="selection_flow_1" type="checkbox" name="selection_flow[]" value=1 {{ old('selection_flow[]') == 1 ? 'checked' : '' }} ><label for="selection_flow1" class="check_radio_label">書類選考</label></div>
                          <div style="display:block;"><input id="selection_flow_2" type="checkbox" name="selection_flow[]" value=2 {{ old('selection_flow[]') == 2 ? 'checked' : '' }} ><label for="selection_flow2" class="check_radio_label">筆記・webテスト</label></div>
                          <div style="display:block;"><input id="selection_flow_3" type="checkbox" name="selection_flow[]" value=3 {{ old('selection_flow[]') == 3 ? 'checked' : '' }} ><label for="selection_flow3" class="check_radio_label">面談</label></div>
                          <div style="display:block;"><input id="selection_flow_4" type="checkbox" name="selection_flow[]" value=4 {{ old('selection_flow[]') == 4 ? 'checked' : '' }} ><label for="selection_flow4" class="check_radio_label">一次面談</label></div>
                          <div style="display:block;"><input id="selection_flow_5" type="checkbox" name="selection_flow[]" value=5 {{ old('selection_flow[]') == 5 ? 'checked' : '' }} ><label for="selection_flow5" class="check_radio_label">二次面談</label></div>
                          <div style="display:block;"><input id="selection_flow_6" type="checkbox" name="selection_flow[]" value=6 {{ old('selection_flow[]') == 6 ? 'checked' : '' }} ><label for="selection_flow6" class="check_radio_label">三次面談</label></div>
                          <div style="display:block;"><input id="selection_flow_7" type="checkbox" name="selection_flow[]" value=7 {{ old('selection_flow[]') == 7 ? 'checked' : '' }} ><label for="selection_flow7" class="check_radio_label">四次面談</label></div>
                          <div style="display:block;"><input id="selection_flow_8" type="checkbox" name="selection_flow[]" value=8 {{ old('selection_flow[]') == 8 ? 'checked' : '' }} ><label for="selection_flow8" class="check_radio_label">五次面談</label></div>
                          <div style="display:block;"><input id="selection_flow_9" type="checkbox" name="selection_flow[]" value=9 {{ old('selection_flow[]') == 9 ? 'checked' : '' }} ><label for="selection_flow9" class="check_radio_label">最終面談</label></div>
                        </div>
                      </div>
                      <div class="form-group row"><label for="selection_detail" class="col-sm-3 col-form-label">選考詳細<br>(1000文字以内)</label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="selection_detail" id="selection_detail" rows="6">{{ old('selection_detail') }}</textarea>
                          @else
                            <textarea class="form-control" name="selection_detail" id="selection_detail" rows="6">{{$rec_info_re['selection_detail']}}</textarea>
                          @endif
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

          <div class="row">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>給与・待遇・福利厚生</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                      <div class="form-group row"><label for="payroll_type" class="col-sm-3 col-form-label">給与タイプ&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <div style="display:block;"><input type="radio" name="payroll_type" value=1 class="payroll_type" id="payroll_type1" {{ old('payroll_type',1) == 1 ? 'checked' : '' }}><label for="payroll_type1" class="check_radio_label">年俸</label></div>
                          <div style="display:block;"><input type="radio" name="payroll_type" value=2 class="payroll_type" id="payroll_type2" {{ old('payroll_type',1) == 2 ? 'checked' : '' }}><label for="payroll_type2" class="check_radio_label">月給</label></div>
                          <div style="display:block;"><input type="radio" name="payroll_type" value=3 class="payroll_type" id="payroll_type3" {{ old('payroll_type',1) == 3 ? 'checked' : '' }}><label for="payroll_type3" class="check_radio_label">日給</label></div>
                          <div style="display:block;"><input type="radio" name="payroll_type" value=4 class="payroll_type" id="payroll_type4" {{ old('payroll_type',1) == 4 ? 'checked' : '' }}><label for="payroll_type4" class="check_radio_label">時給</label></div>
                        </div>
                      </div>
                      <div class="form-group row" id="year_pay"><label for="yearly_pay_amount" class="col-sm-3 col-form-label">年俸額&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-7 form-inline">
                          @if ($rec_info_re === 0)
                            <input type="text" class="col-sm-4 form-control" name="yearly_pay_amount_more" id="yearly_pay_amount_more" value="{{ old('yearly_pay_amount_more') }}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="yearly_pay_amount_under" id="yearly_pay_amount_under" value="{{ old('yearly_pay_amount_under') }}" >
                            <b>&nbsp;円</b> 
                          @else
                            <input type="text" class="col-sm-4 form-control" name="yearly_pay_amount_more" id="yearly_pay_amount_more" value="{{$rec_info_re['yearly_pay_amount_from'] }}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="yearly_pay_amount_under" id="yearly_pay_amount_under" value="{{$rec_info_re['yearly_pay_amount_to']}}" >
                            <b>&nbsp;円</b> 
                          @endif
                        </div>
                      </div>
                      <div class="form-group row" id="year_pay_method"><label for="payment_methods" class="col-sm-3 col-form-label">支払い方法&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <div style="display:block;"><input type="radio" name="year_pay_method" value=1 id="year_pay_method1" {{ old('year_pay_method',1) == 1 ? 'checked' : '' }}><label for="year_pay_method1" class="check_radio_label">年俸の1/12を毎月支給</label></div>
                          <div style="display:block;"><input type="radio" name="year_pay_method" value=2 id="year_pay_method2" {{ old('year_pay_method',1) == 2 ? 'checked' : '' }}><label for="year_pay_method2" class="check_radio_label">その他(給与・待遇の詳細に記載)</label></div>
                        </div>
                      </div>
                      <div class="form-group row" id="month_pay"><label for="monthly_pay" class="col-sm-3 col-form-label">月給&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-7 form-inline">
                          @if ($rec_info_re === 0)
                          <input type="text" class="col-sm-4 form-control" name="monthly_pay_more" id="monthly_pay_more" value="{{ old('monthly_pay_more') }}" >
                          <b>&nbsp;〜&nbsp;</b>
                          <input type="text" class="col-sm-4 form-control" name="monthly_pay_under" id="monthly_pay_under" value="{{ old('monthly_pay_under') }}" >
                          <b>&nbsp;円</b> 
                        @else
                          <input type="text" class="col-sm-4 form-control" name="monthly_pay_more" id="monthly_pay_more" value="{{$rec_info_re['monthly_salaly_from']}}" >
                          <b>&nbsp;〜&nbsp;</b>
                          <input type="text" class="col-sm-4 form-control" name="monthly_pay_under" id="monthly_pay_under" value="{{$rec_info_re['monthly_salaly_to']}}" >
                          <b>&nbsp;円</b> 
                        @endif
                        </div>
                      </div>
                      <div class="form-group row" id="12month_pay"><label for="assumption_annual_income" class="col-sm-3 col-form-label">想定年収（万円）&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-7 form-inline">
                          @if ($rec_info_re === 0)
                            <input type="text" class="col-sm-4 form-control" name="assumption_annual_income_more" id="assumption_annual_income_more" value="{{ old('assumption_annual_income_more') }}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="assumption_annual_income_under" id="assumption_annual_income_under" value="{{ old('assumption_annual_income_under') }}" >
                            <b>&nbsp;万円</b> 
                          @else
                            <input type="text" class="col-sm-4 form-control" name="assumption_annual_income_more" id="assumption_annual_income_more" value="{{$rec_info_re['montyly_pay_assumption_annual_income_from']}}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="assumption_annual_income_under" id="assumption_annual_income_under" value="{{$rec_info_re['montyly_pay_assumption_annual_income_to']}}" >
                            <b>&nbsp;万円</b> 
                          @endif
                        </div>
                      </div>
                      <div class="form-group row" id="day_pay"><label for="daily_pay" class="col-sm-3 col-form-label">日給&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-7 form-inline">
                          @if ($rec_info_re === 0)
                            <input type="text" class="col-sm-4 form-control" name="dayly_wage_more" id="dayly_wage_more" value="{{ old('dayly_wage_more') }}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="dayly_wage_under" id="dayly_wage_under" value="{{ old('dayly_wage_under') }}" >
                            <b>&nbsp;円</b> 
                          @else
                            <input type="text" class="col-sm-4 form-control" name="dayly_wage_more" id="dayly_wage_more" value="{{$rec_info_re['daily_salary_from']}}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="dayly_wage_under" id="dayly_wage_under" value="{{$rec_info_re['daily_salary_to']}}" >
                            <b>&nbsp;円</b> 
                          @endif
                        </div>
                      </div>
                      <div class="form-group row" id="time_pay"><label for="hourly_wage" class="col-sm-3 col-form-label">時給&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-7 form-inline">
                          @if ($rec_info_re === 0)
                            <input type="text" class="col-sm-4 form-control" name="hourly_wage_more" id="hourly_wage_more" value="{{ old('hourly_wage_more') }}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="hourly_wage_under" id="hourly_wage_under" value="{{ old('hourly_wage_under') }}" >
                            <b>&nbsp;円</b> 
                          @else
                            <input type="text" class="col-sm-4 form-control" name="hourly_wage_more" id="hourly_wage_more" value="{{$rec_info_re['hourly_wage_from']}}" >
                            <b>&nbsp;〜&nbsp;</b>
                            <input type="text" class="col-sm-4 form-control" name="hourly_wage_under" id="hourly_wage_under" value="{{$rec_info_re['hourly_wage_to']}}" >
                            <b>&nbsp;円</b> 
                          @endif
                        </div>
                      </div>
                      <div class="form-group row" id="hide_menu4"><label for="base_salary_amount" class="col-sm-3 col-form-label">基本給の金額&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="base_salary_amount" class="form-control" id="base_salary_amount" value="{{ old('base_salary_amount') }}"  placeholder="">
                          @else
                            <input type="text" name="base_salary_amount" class="form-control" id="base_salary_amount" value="{{$rec_info_re['basic_salary']}}"  placeholder="">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row" id="hide_menu5"><label for="fixed_overtime_work_fee_amount" class="col-sm-3 col-form-label">固定残業代の金額&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="fixed_overtime_work_fee_amount" class="form-control" id="fixed_overtime_work_fee_amount" value="{{ old('fixed_overtime_work_fee_amount') }}" placeholder="">
                          @else
                            <input type="text" name="fixed_overtime_work_fee_amount" class="form-control" id="fixed_overtime_work_fee_amount" value="{{$rec_info_re['fixed_overtime_fee']}}" placeholder="">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row" id="hide_menu6"><label for="fixed_overtime_work_time" class="col-sm-3 col-form-label">固定残業時間&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="fixed_overtime_work_time" class="form-control" id="fixed_overtime_work_time" value="{{ old('fixed_overtime_work_time') }}" placeholder="">
                          @else
                            <input type="text" name="fixed_overtime_work_time" class="form-control" id="fixed_overtime_work_time" value="{{$rec_info_re['fixed_overtime_hours']}}" placeholder="">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row" id="hide_menu7"><label for="fixed_overtime_hours_excess_part_pay" class="col-sm-3 col-form-label">固定残業時間超過分の支給&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="fixed_overtime_hours_excess_part_pay" class="form-control" id="fixed_overtime_hours_excess_part_pay" value="{{ old('fixed_overtime_hours_excess_part_pay') }}" placeholder="">
                          @else
                            <input type="text" name="fixed_overtime_hours_excess_part_pay" class="form-control" id="fixed_overtime_hours_excess_part_pay" value="{{$rec_info_re['payment_for_fixed_overtime']}}" placeholder="">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="payroll_treatment_detail" class="col-sm-3 col-form-label">給与待遇の詳細<br>(1000文字以内)</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="payroll_treatment_detail" id="payroll_treatment_detail" rows="6">{{ old('payroll_treatment_detail') }}</textarea>
                          @else
                            <textarea class="form-control" name="payroll_treatment_detail" id="payroll_treatment_detail" rows="6">{{$rec_info_re['salary_treatment_detail']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="testing_period" class="col-sm-3 col-form-label">試験期間&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="testing_period" class="form-control" id="testing_period">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('testing_period') == 1) selected @endif>あり</option>
                              <option value=2 @if(old('testing_period') == 2) selected @endif>なし</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['trial_period'] == 1) selected @endif>あり</option>
                              <option value=2 @if($rec_info_re['trial_period'] == 2) selected @endif>なし</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row" id="test_part_detail"><label for="testing_period_detail" class="col-sm-3 col-form-label">試験期間詳細<br>(1000文字以内)</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="testing_period_detail" id="testing_period_detail" rows="6">{{ old('testing_period_detail') }}</textarea>
                          @else
                            <textarea class="form-control" name="testing_period_detail" id="testing_period_detail" rows="6">{{$rec_info_re['trial_period_deatail']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="annual_holiday" class="col-sm-3 col-form-label">年間休日&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="annual_holiday" class="form-control" id="annual_holiday" value="{{ old('annual_holiday') }}" placeholder="">
                          @else
                            <input type="text" name="annual_holiday" class="form-control" id="annual_holiday" value="{{$rec_info_re['annual_holiday']}}" placeholder="">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="holiday_leave" class="col-sm-3 col-form-label">休日・休暇&nbsp;<span class="text-danger required">*</span><br>(1000文字以内)</label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="holiday_leave" id="holiday_leave" rows="6">{{ old('holiday_leave') }}</textarea>
                          @else
                            <textarea class="form-control" name="holiday_leave" id="holiday_leave" rows="6">{{$rec_info_re['holiday_vacation']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="welfare_benefits" class="col-sm-3 col-form-label">福利厚生&nbsp;<span class="text-danger required">*</span><br>(1000文字以内)</label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="welfare_benefits" id="welfare_benefits" rows="6">{{ old('welfare_benefits') }}</textarea>
                          @else
                            <textarea class="form-control" name="welfare_benefits" id="welfare_benefits" rows="6">{{$rec_info_re['welfare']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="passive_smoking_control" class="col-sm-3 col-form-label">受動喫煙対策&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="passive_smoking_control" class="form-control" id="passive_smoking_control">
                            @if ($rec_info_re === 0)
                              <option hidden>選択してください</option>
                              <option value=1 @if(old('passive_smoking_control') == 1) selected @endif>禁煙</option>
                              <option value=2 @if(old('passive_smoking_control') == 2) selected @endif>喫煙スペースあり</option>
                              <option value=3 @if(old('passive_smoking_control') == 3) selected @endif>なし(喫煙可)</option>
                            @else
                              <option hidden>選択してください</option>
                              <option value=1 @if($rec_info_re['counterplan_secound_hand_smok'] == 1) selected @endif>禁煙</option>
                              <option value=2 @if($rec_info_re['counterplan_secound_hand_smok'] == 2) selected @endif>喫煙スペースあり</option>
                              <option value=3 @if($rec_info_re['counterplan_secound_hand_smok'] == 3) selected @endif>なし(喫煙可)</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row"><label for="passive_smoking_control_ditail" class="col-sm-3 col-form-label">受動喫煙対策（詳細）<br>(1000文字以内)</label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="passive_smoking_control_ditail" id="passive_smoking_control_ditail" rows="6">{{ old('passive_smoking_control_ditail') }}</textarea>
                          @else
                            <textarea class="form-control" name="passive_smoking_control_ditail" id="passive_smoking_control_ditail" rows="6">{{$rec_info_re['counterplan_secound_hand_smok_detail']}}</textarea>
                          @endif
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

          <div class="row update_page">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="alert alert-danger" role="alert">
                <h2>エージェント限定情報を編集は運営までご連絡下さい</h2>
                <a href="#">運営へのお問い合わせはこちらへ</a>
              </div>
            </div>
          </div>
            
          <div class="row update_page">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>エージェント限定情報</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                      <div class="form-group row"><label for="successful_reward_calculation_method" class="col-sm-3 col-form-label">成功報酬の算定方法&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <label name="successful_reward_calculation_method" class="form-control" id="edit_successful_reward_calculation_method"></label> 
                        </div>
                      </div>
                      <div class="form-group row chois_ratio" ><label for="ratio" class="col-sm-3 col-form-label">割合（％）&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <label name="ratio" class="form-control" id="edit_ratio"></label>
                        </div>
                      </div>
                      <div class="form-group row chois_ratio" ><label for="terms_at_rate" class="col-sm-3 col-form-label">理論年収の定義&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <textarea name="terms_at_rate" class="form-control" id="edit_terms_at_rate" readonly rows="8"></textarea>
                        </div>
                      </div>
                      <div class="form-group row not_chois_ratio" ><label for="fixed_reward_amount" class="col-sm-3 col-form-label">固定報酬額&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <label name="fixed_reward_amount" class="form-control" id="edit_fixed_reward_amount"></label>
                        </div>
                      </div>
                      <div class="form-group row"><label for="refund_provision" class="col-sm-3 col-form-label">返金規定&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9"> 
                          <textarea name="refund_provision" class="form-control" id="edit_refund_provision" readonly rows="8"></textarea>
                        </div>
                      </div>
                      <div class="form-group row"><label for="memo" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <textarea name="memo" class="form-control" id="edit_memo" readonly rows="8"></textarea>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

             <div class="row create_page">
            <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
            <div class="col-md-8 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class='card_title'>エージェント限定情報</h3>
                </div>
                <div class="card-body">
                  <div class="masonry-item">
                      <div class="form-group row"><label for="successful_reward_calculation_method" class="col-sm-3 col-form-label">成功報酬の算定方法&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          <select name="successful_reward_calculation_method" class="form-control" id="successful_reward_calculation_method">
                            @if ($rec_info_re === 0)
                              <option value=1 @if(old('successful_reward_calculation_method') == 1) selected @endif selected="selected">割合(％)</option>
                              <option value=2 @if(old('successful_reward_calculation_method') == 2) selected @endif>固定報酬</option>
                            @else
                              <option value=1 @if($rec_info_re['calculation_method_performance_fee'] == 1) selected @endif>割合(％)</option>
                              <option value=2 @if($rec_info_re['calculation_method_performance_fee'] == 2) selected @endif>固定報酬</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row chois_ratio" ><label for="ratio" class="col-sm-3 col-form-label">割合（％）&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="ratio" class="form-control" id="ratio" value="{{ old('ratio') }}" placeholder="年収の　〇〇％">
                          @else
                            <input type="text" name="ratio" class="form-control" id="ratio" value="{{$rec_info_re['Theoretical_annual']}}" placeholder="年収の　〇〇％">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row chois_ratio" ><label for="terms_at_rate" class="col-sm-3 col-form-label">割合時の規約&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="terms_at_rate" id="terms_at_rate" rows="6">{{ old('terms_at_rate') }}</textarea>
                          @else
                            <textarea class="form-control" name="terms_at_rate" id="terms_at_rate" rows="6">{{$rec_info_re['Theoretical_annual_income']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row not_chois_ratio" ><label for="fixed_reward_amount" class="col-sm-3 col-form-label">固定報酬額&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <input type="text" name="fixed_reward_amount" class="form-control" id="fixed_reward_amount" value="{{ old('fixed_reward_amount')}}" placeholder="一律固定報酬　〇〇万円">
                          @else
                            <input type="text" name="fixed_reward_amount" class="form-control" id="fixed_reward_amount" value="{{$rec_info_re['fixed_reward']}}" placeholder="一律固定報酬　〇〇万円">
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="refund_provision" class="col-sm-3 col-form-label">返金規定&nbsp;<span class="text-danger required">*</span></label>
                        <div class="col-sm-9"> 
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="refund_provision" id="refund_provision" rows="6">{{ old('refund_provision') }}</textarea>
                          @else
                            <textarea class="form-control" name="refund_provision" id="refund_provision" rows="6">{{$rec_info_re['refund_policy']}}</textarea>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row"><label for="memo" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          @if ($rec_info_re === 0)
                            <textarea class="form-control" name="memo" id="memo" rows="6">{{ old('memo') }}</textarea>
                          @else
                            <textarea class="form-control" name="memo" id="memo" rows="6">{{$rec_info_re['warning_text']}}</textarea>
                          @endif
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

            <div class="form-group row">
              <div class="col-sm-7 text-right">
                <button type="button" onclick="submit();" class="btn btn-primary update_page">更新してプレビュー</button>
                <button type="button" onclick="submit();" class="btn btn-primary create_page">保存してプレビュー</button>
              </div>
            </div>
            <div id='div_footer'>
              <div class="form-group row">
                <div class="col-sm-7 text-right">
                <button type="button" onclick="history.back();" class="btn btn-dark">キャンセル</button>
                <button type="button" onclick="submit();" class="btn btn-primary">保存してプレビュー</button>
              </div>
            </div>
          </div>
</form>
<!-- 新規求人登録 -->
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> 
                        <button type="button" id="modal_comp_reg_create" onclick="submit();"  class="btn btn-primary" data-dismiss="modal">募集企業登録</button>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
        </form>

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
          </div>
          <div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
        </form>

  
          <!-- 勤務地の詳細情報入力モーダル -->
            <div class="mT-30">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">勤務地情報入力</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                      
                        <div class="form-group row"><label for="zip01" class="col-sm-3 col-form-label">郵便番号</label>
                          <div class="col-sm-9">
                            <input type="text" name="zip01" size="10" maxlength="8" id="zip01" class="form-control" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" placeholder="〇〇〇〇〇〇〇">
                            <p style="font-size:0.5rem;">※郵便番号はハイフン抜きの半角英数７桁で入力<p>
                          </div>
                        </div>

                        <div class="form-group row"><label for="pref01" class="col-sm-3 col-form-label">都道府県&nbsp;<span class="text-danger required">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name="pref01" class="form-control" id="pref01" placeholder="〇〇県">
                          </div>
                        </div>

                        <div class="form-group row"><label for="addr01" class="col-sm-3 col-form-label">住所（市区町村・番地・建物名）</label>
                          <div class="col-sm-9">
                            <input type="text" name="addr01" class="form-control" id="addr01" placeholder="〇〇市〇〇１−２−３　建物名">
                          </div>
                        </div>

                        <div class="form-group row"><label for="closest_station_route" class="col-sm-3 col-form-label">最寄駅の路線&nbsp;<span class="text-danger required">*</span></label>
                          <div class="col-sm-9" id="list_closest_station_route_app">
                            <select name="list_closest_station_route" class="form-control" id="list_closest_station_route"></select>
                            <button type="button" id="train_search" class="btn btn-primary">検索</button>
                          </div>
                        </div>

                        <div class="form-group row"><label for="closest_station" class="col-sm-3 col-form-label">最寄駅&nbsp;<span class="text-danger required">*</span></label>
                          <div class="col-sm-9">
                            <select name="list_closest_station" class="form-control" id="list_closest_station"></select>
                            <button type="button" id="station_search" class="btn btn-primary">検索</button>
                          </div>
                        </div>
                        <div class="form-group row"><label for="range_up_to_closest_station" class="col-sm-3 col-form-label">最寄駅までの距離</label>
                          <div class="col-sm-9">
                            <input type="text" name="range_up_to_closest_station" class="form-control" id="range_up_to_closest_station" placeholder="徒歩◯分"></div>
                        </div>

                        <div class="form-group row"><label for="working_place_detail" class="col-sm-3 col-form-label">勤務地詳細</label>
                          <div class="col-sm-9"> <textarea class="form-control" name="working_place_detail" id="working_place_detail" rows="6">{{ old('working_place_detail') }}</textarea>
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> 
                        <button type="button" id="modal_reg" class="btn btn-primary" data-dismiss="modal">勤務地登録</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>

      </main>
      <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
      </footer>
    </div>
  </div>  

  @component('components.footerScripts')
  @endcomponent

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
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
    var temp = @json($rec_info_re);
    var pref = @json($prefectures);
    var first = @json($first);
    var second = @json($second);

console.log(@json($rec_info_re[0]));
console.log(temp);
    document.getElementById('company_name').innerHTML = temp['corp_name'];
    $('#company_name_h').val(temp['corp_name']);
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
    document.getElementById('image').src = temp['logo'].replace('public','storage');
    $('#image_h').val(temp['logo']);

  }
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
  console.log("corp_id");
  console.log(corp_id);
  console.log(recruit_company[corp_id - 1]);
  //会社名と募集企業idの表示とdb登録用の値取得
    document.getElementById('company_name').innerHTML = recruit_company[corp_id-1 ]['corporation_name'] 
    document.getElementById('company_name_edit').value = recruit_company[corp_id-1 ]['corporation_name'] 
    $('#company_name_h').val(recruit_company[corp_id-1]['corporation_name']);
    $('#company_id_h').val(recruit_company[corp_id-1]['id']);

  //住所の表示とdb登録用の値取得
    document.getElementById('comp_add02').innerHTML = recruit_company[corp_id-1]['address']
    document.getElementById('comp_add02_edit').value = recruit_company[corp_id-1]['address']
    $('#comp_add02_h').val(recruit_company[corp_id-1]['address']);

  //会社ホームページの表示とdb登録用の値取得 
    document.getElementById('company_hp').innerHTML = recruit_company[corp_id-1]['home_page']
    document.getElementById('company_hp_edit').value = recruit_company[corp_id-1]['home_page']
    $('#company_hp_h').val(recruit_company[corp_id-1]['home_page']);

  //従業員数の表示とdb登録用の値取得 
    document.getElementById('employee_number').innerHTML = recruit_company[corp_id-1]['employee_number'] 
    document.getElementById('employee_number_edit').value = recruit_company[corp_id-1]['employee_number'] 
    $('#employee_number_h').val(recruit_company[corp_id-1]['employee_number']);

  //設立年月の表示とdb登録用の値取得 
    document.getElementById('foundation_date').innerHTML = String(recruit_company[corp_id-1]['establish_year']) + '年' + String(recruit_company[corp_id-1]['establish_month']) + '月';
    document.getElementById('foundation_date_edit').value = (String(recruit_company[corp_id-1]['establish_year']) + '-' + String(recruit_company[corp_id-1]['establish_month']));
    $('#foundation_date_h').val(recruit_company[corp_id-1]['establish_year'] + '-' + recruit_company[corp_id-1]['establish_month']);

  //会社概要の表示とdb登録用の値取得 
    document.getElementById('company_overview').innerHTML = recruit_company[corp_id-1]['company_profile']
    document.getElementById('company_overview_edit').value = recruit_company[corp_id-1]['company_profile']
    $('#company_overview_h').val(recruit_company[corp_id-1]['company_profile']);

  //事業内容の表示とdb登録用の値取得 
    document.getElementById('business_guidance').innerHTML = recruit_company[corp_id-1]['business_content']
    document.getElementById('business_guidance_edit').value = recruit_company[corp_id-1]['business_content']
    $('#business_guidance_h').val(recruit_company[corp_id-1]['business_content']);
    
  //都道府県
    document.getElementById('comp_add01').innerHTML = prefectures[recruit_company[corp_id-1]['prefecture']]
    $('#comp_add01_edit').val(recruit_company[corp_id-1]['prefecture']);
    $('#comp_add01_h').val(recruit_company[corp_id-1]['prefecture']);

  //業界1
    document.getElementById('job1c').innerHTML = first[recruit_company[corp_id-1]['industry1'] - 1]['name']
    $('#job1c_edit').val(recruit_company[corp_id-1]['industry1']);
    $('#job1c_h').val(recruit_company[corp_id-1]['industry1']);

  //業界2
    document.getElementById('job2c').innerHTML = second[recruit_company[corp_id-1]['industry2'] - 1]['name']
    $('#job2c_edit').val(recruit_company[corp_id-1]['industry2']);
    $('#job2c_h').val(recruit_company[corp_id-1]['industry2']);

  //ロゴ
    document.getElementById('image').src = recruit_company[corp_id-1]['corporation_logo'].replace('public','storage');
    $('#image_h').val(recruit_company[corp_id-1]['corporation_logo']);
  })

  //dbに値を登録してある項目の制御
  //業界１
  $('.job1c_group').html("");
  var first_indust_array = @json($first);
  $('.job1c_group').append('<option hidden class=\"not_select\">選択してください</option>');
  for ( var i = 0; i < first_indust_array.length; i++ ){
    $('.job1c_group').append('<option  value=' + first_indust_array[i]['id'] + '>' + first_indust_array[i]['name']+ '</option>');
  }

  //業界２(新規作成/募集企業登録)
  var first_indust_array = @json($first);
  $('#job1c_list').change(function() {
    var num = $('#job1c_list').val();
    $('#job2c_list').html("");
    var second_indust_array = @json($second);
    $('#job2c_list').append('<option hidden class=\"not_select\">選択してください</option>');
    for ( var i = 0; i < second_indust_array.length; i++ ){
      if (num == second_indust_array[i]['first_industry_id']) {
        $('#job2c_list').append('<option  value=' + second_indust_array[i]['id'] + ' data-val=' + second_indust_array[i]['first_industry_id'] + '>' + second_indust_array[i]['name']+ '</option>');
      }
    }
    });

  //業界２(新規作成/募集企業選択からの編集/first)
  var first_indust_array = @json($first);
  $('select#corp_link').change(function(){
    var num = $('#job1c_edit').val();
    $('#job2c_edit').html("");
    var second_indust_array = @json($second);
    for ( var i = 0; i < second_indust_array.length; i++ ){
      if (num == second_indust_array[i]['first_industry_id']) {
        $('#job2c_edit').append('<option  value=' + second_indust_array[i]['id'] + ' data-val=' + second_indust_array[i]['first_industry_id'] + '>' + second_indust_array[i]['name']+ '</option>');
      }
    }
  })
  //業界２(新規作成/募集企業選択からの編集/after_second)
  $('#job1c_edit').change(function() {
    var num = $('#job1c_edit').val();
    $('#job2c_edit').html("");
    var second_indust_array = @json($second);
    $('#job2c_edit').append('<option hidden class=\"not_select\">選択してください</option>');
    for ( var i = 0; i < second_indust_array.length; i++ ){
      if (num == second_indust_array[i]['first_industry_id']) {
        $('#job2c_edit').append('<option  value=' + second_indust_array[i]['id'] + ' data-val=' + second_indust_array[i]['first_industry_id'] + '>' + second_indust_array[i]['name']+ '</option>');
      }
    }
  });

  //業種１
  $('#job_category1').html("");
  var first_category_array = @json($first_category);
    $('#job_category1').append('<option hidden class=\"not_select\">選択してください</option>');
  for ( var i = 0; i < first_category_array.length; i++ ){
    $('#job_category1').append('<option  value=' + first_category_array[i]['id'] + '>' + first_category_array[i]['name']+ '</option>');
  }

  if (@json($rec_info_re) != 0){
    $('#job_category1').val(@json($rec_info_re['occupation_category_1']));
  }

  //業種２
  var first_category_array = @json($first_category);
  $('#job_category1').change(function() {
    var num = $('#job_category1').val();
    $('#job_category2').html("");
    var second_category_array = @json($second_category);
    $('#job_category2').append('<option hidden class=\"not_select\">選択してください</option>');
    for ( var i = 0; i < second_category_array.length; i++ ){
      if (num == second_category_array[i]['first_job_category_id']) {
        $('#job_category2').append('<option  value=' + second_category_array[i]['id'] + ' data-val=' + second_category_array[i]['first_job_category_id'] + '>' + second_category_array[i]['name']+ '</option>');
      }
    }
  });

  if (@json($rec_info_re) != 0){
    var num = $('#job_category1').val();
    $('#job_category2').html("");
    var second_category_array = @json($second_category);
    for ( var i = 0; i < second_category_array.length; i++ ){
      if (num == second_category_array[i]['first_job_category_id']) {
        $('#job_category2').append('<option  value=' + second_category_array[i]['id'] + ' data-val=' + second_category_array[i]['first_job_category_id'] + '>' + second_category_array[i]['name']+ '</option>');
      }
    }
  //業界2
    $('#job_category2').val(@json($rec_info_re['occupation_category_2']));

  }


//checkbox/radio系の処理
  if (@json($rec_info_re) != 0) {
  //訴求ポイントのチェックをつける
    const feature_str = @json($rec_info_re['job_feature']);
    var feature_array =feature_str.split(',');
    console.log(feature_array);
    for ( var i = 0; i < feature_array.length; i++ ){
      $('input[id="feature_' + feature_array[i] + '"' + ']').prop("checked",true);
    }

  //選考フローのチェックをつける
    const flow_str = @json($rec_info_re['selection_flow']);
    var flow_array =flow_str.split(',');
    for ( var i = 0; i < flow_array.length; i++ ){
      $('input[id="selection_flow_' + flow_array[i] + '"' + ']').prop("checked",true);
    }

  //給与支払い方法のラジオを選択
    const payroll_str = @json($rec_info_re['salary_type']);
      $('input:radio[name="payroll_type"]').val([payroll_str]);

  //管理監督者の求人のラジオを選択
    const supervisor_str = @json($rec_info_re['management_supervisor']);
      $('input:radio[name="supervisor_job_offer"]').val([supervisor_str]);

  //時短勤務のラジオを選択
    const short_work_str = @json($rec_info_re['short_working_hours_system']);
      $('input:radio[name="shorter_working_hours_working"]').val([short_work_str]);

  //支払い方法の選択のラジオを選択
    const year_pay_str = @json($rec_info_re['payment_method']);
      $('input:radio[name="year_pay_method"]').val([year_pay_str]);
  }

// 最寄駅の路線検索
  $('#train_search').click(function(){
    $('#list_closest_station_route').html("");
    var element = $('#pref01').val();
    var trainUrl = 'http://express.heartrails.com/api/json?method=getLines&prefecture=' + element
    $.ajax({
    url: trainUrl,
    type:'GET',
    dataType: 'json', 
    timeout:5000,
    success: function(data, dataType) {
        data.response.line.forEach(function( value ) {
          $('#list_closest_station_route').append('<option>' + value +'</option>');
        });
      },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert("路線情報が取得できませんでした。");
        console.log("路線情報が取得できませんでした。", XMLHttpRequest, textStatus, errorThrown);
      }
    });
  })

// 最寄駅の検索
  $('#station_search').click(function(){
    $('#list_closest_station').html("");
    var element = $('#list_closest_station_route').val();
    var trainUrl = 'http://express.heartrails.com/api/json?method=getStations&line=' + element
    var i = 0
    $.ajax({
    url: trainUrl,
    type:'GET',
    dataType: 'json', 
    timeout:1000,
    success: function(data, dataType) {
        data.response.station.forEach(function( value ) {
          $('#list_closest_station').append('<option>' + value.name +'</option>');
        });
      },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert("最寄駅情報が取得できませんでした。");
        console.log("最寄駅情報が取得できませんでした。", XMLHttpRequest, textStatus, errorThrown);
      }
    });
  })


// 勤務地情報の追加
    var counter = 0;
  $('#modal_reg').click(function(){
    counter++;
    var loc_title = '勤務地詳細' + counter;
    $('#input_plural').after('<div id="work-location-1" class="col-sm-11 text" style="padding: 10;">\
      <div class="card-header" id="locate00"></div>\
      <div class="card-body">\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">郵便番号</label>\
          <label class="col-sm-4 control-label" id="locate01"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">都道府県</label>\
          <label class="col-sm-4 control-label" id="locate02"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">住所（市区町村・番地・建物名）</label>\
          <label class="col-sm-4 control-label" id="locate03"></label>\
        </div>\
        <div class="row" id="app01" style="padding: 10;">\
          <label class="col-sm-4 control-label">最寄駅の路線</label>\
          <label class="col-sm-4 control-label" id="locate04"></label>\
        </div>\
        <div class="row" id="app02" style="padding: 10;">\
          <label class="col-sm-4 control-label">最寄駅</label>\
          <label class="col-sm-4 control-label" id="locate05"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">最寄駅までの距離</label>\
          <label class="col-sm-4 control-label" id="locate06"></label>\
        </div>\
        <div class="row" style="padding: 10;">\
          <label class="col-sm-4 control-label">勤務地詳細</label>\
          <label class="col-sm-4 control-label" id="locate07"></label>\
        </div>\
      </div>\
    </div>');
    //画面に表示用
    document.getElementById('locate01').innerHTML = document.getElementById('zip01').value
    document.getElementById('locate02').innerHTML = document.getElementById('pref01').value
    document.getElementById('locate03').innerHTML = document.getElementById('addr01').value
    document.getElementById('locate04').innerHTML = document.getElementById('list_closest_station_route').value
    document.getElementById('locate05').innerHTML = document.getElementById('list_closest_station').value
    document.getElementById('locate06').innerHTML = document.getElementById('range_up_to_closest_station').value
    document.getElementById('locate07').innerHTML = document.getElementById('working_place_detail').value
    document.getElementById('locate00').innerHTML = loc_title; 
    //DBに保存する用
      $('#input_pluralBox').append('<input type="hidden" name="loc01[]" id=loc01' + counter + '>');
      $('#input_pluralBox').append('<input type="hidden" name="loc02[]" id=loc02' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc03[]" id=loc03' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc04[]" id=loc04' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc05[]" id=loc05' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc06[]" id=loc06' + counter + '>'); 
      $('#input_pluralBox').append('<input type="hidden" name="loc07[]" id=loc07' + counter + '>'); 
    //複数レコード格納するために配列に要素を入れる
      $('#loc01' + counter).val($('#zip01').val());
      $('#loc02' + counter).val($('#pref01').val());
      $('#loc03' + counter).val($('#addr01').val());
      $('#loc04' + counter).val($('#list_closest_station_route').val());
      $('#loc05' + counter).val($('#list_closest_station').val());
      $('#loc06' + counter).val($('#range_up_to_closest_station').val());
      $('#loc07' + counter).val($('#working_place_detail').val());
    
  })

// 勤務地情報の項目削除
  $('#work-location-delete').click(function(){
    if (counter > 0) {
      counter--;
    }
    $('#work-location-1').remove();
  })

//追従フッターの制御
  $(window).on("scroll", function() {
    //コピーから作成と通常の作成で分岐
    //画面全体の高さと開始点＋現在地点の値が一致する場合にフッターを非表示にする
    var scrollHeight = $(document).height();
      // console.log(scrollHeight);
    var scrollPosition = window.innerHeight + $(window).scrollTop();
      // console.log(scrollPosition);
    if ((scrollHeight - scrollPosition) === 0) {
        // スクロールでページ最下部で発火する
      $('#div_footer').after().hide();
    } else {
      $('#div_footer').show();
    }
  });

  if (@json($rec_info_re) != 0) {
    alert('test');
  } 

  //編集・新規作成に応じて表示非表示の切り替え
  if(@json($status) == 1) {
    console.log(@json($status));
      $('.create_page').show();
      $('.update_page').after().hide();
  }else if(@json($status) == 2){
    //編集時に表示する項目
    $('.update_page').show();
    //編集時に非表示にする項目
    $('.create_page').after().hide();
    //エージェント限定情報をラベル化した際の値
    document.getElementById('edit_ratio').innerHTML = @json($rec_info_re['Theoretical_annual']);
    var flg_successful_reword = (@json($rec_info_re['calculation_method_performance_fee']) == 1 ) ? '割合(%)' : '固定報酬' ;
    document.getElementById('edit_successful_reward_calculation_method').innerHTML = flg_successful_reword;
    document.getElementById('edit_terms_at_rate').innerHTML = @json($rec_info_re['Theoretical_annual_income']);
    document.getElementById('edit_fixed_reward_amount').innerHTML = @json($rec_info_re['fixed_reward']);
    document.getElementById('edit_refund_provision').innerHTML = @json($rec_info_re['refund_policy']);
    document.getElementById('edit_memo').innerHTML = @json($rec_info_re['warning_text']);

  }



})


</script>
</body>

</html>

