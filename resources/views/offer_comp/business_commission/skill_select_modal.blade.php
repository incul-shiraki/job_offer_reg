<!-- project_registrationのパーツ -->
<!-- スキルセット登録モーダル -->
<div class="mT-30">
  <div class="modal fade" id="skill_modal" tabindex="-1" aria-labelledby="skillModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-fluid" role="document">
      <div class="modal-content">
        <div class="modal-header" style="text-align:center;">
          <h1 class="modal-title" id="exampleModalLabel" style="text-align:center;">必須要件・スキルの選択</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <!-- スキルカテゴリー大の表示 -->
          @foreach ($first_skill_category as $key => $value)
            <h2 style="padding: 5px 20px;" id="f_skill_category{{$key}}">{{$value}}</h2>
            <!-- カテゴリー大とカテゴリー中のkeyを見て同じ場合カテゴリー中の表示 -->
            @foreach($second_skill_category as $f_key => $values)
              @if ($key == $f_key)
                @foreach ($values as $s_cate_key => $s_cate_val)
                  <h4 style="padding: 5px 0px 5px 40px ;" id="s_skill_category{{$s_cate_key}}">{{$s_cate_val}}</h4>
                  <!-- カテゴリー中とスキルのkeyを見て同じ場合カテゴリー内のスキルを一覧表示 -->
                  @foreach($skill_name as $skill_key => $skill_values)
                    @if ($s_cate_key == $skill_key)
                      @foreach ($skill_values as $skill_name_key => $skill_name_val)
                        <label class="col-sm-3" style="margin: 2px 0px 0px 60px;text-indent: -1em;" id="skill_label{{$skill_name_key}}" for="skill_name{{$skill_name_key}}">
                          <input id="skill_name{{$skill_name_key}}" type="checkbox" name="req_skill_set[]" value={{$key}},{{$s_cate_key}},{{$skill_name_key}}>&nbsp;{{$skill_name_val}}
													<span id="label_{{$skill_name_key}}" style="visibility:hidden; text-align:right;">経験年数</span>
                        </label>
                      @endforeach
                    @endif
                  @endforeach
                @endforeach
              @endif
            @endforeach
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> 
          <button type="button" id="skill_reg" class="btn btn-primary" data-dismiss="modal">スキルセット登録</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- モーダルエリアここから -->
<section id="modalArea" class="modalArea">
  <div id="modalBg" class="modalBg"></div>
  <div class="modalWrapper">
    <div class="modalContents">
      <ul class="target" style="list-style: none;">
        <li disabled="" class="mdl-menu_year"><p class="title" style="margin:1px;">経験年数</p></li>
         <!-- 経験年数のモーダル表示  -->
        @foreach ($experience_year as $year_key => $year_value)
          <li class="mdl-menu-year"><p class="no-a" id=ex_year{{$year_key}} style="margin:0px;">{{$year_value}}</p></li>
        @endforeach
      </ul>            
    </div>
  </div>
</section>
<!-- モーダルエリアここまで -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(function() {
  const modalArea = $('#modalArea');
  let target_skill;
  let ex_year;
  let label_html;
  let temp;

  $("[id^=skill_name]").on('change', function(){
    target_skill = document.getElementById($(this)[0].id);
    let skill_id = target_skill.id.split('skill_name')[1];
    // label_html = document.getElementById('skill_label' + skill_id);
    label_html = document.getElementById('label_' + skill_id);

    // チェックが外れた時の挙動
    if( $(this).prop('checked') == false ) {
      console.log('test');
      let del_year_index_arr = target_skill.value.split(',');
      let rewrite_target_value;
      for (i = 0;i < 3;i++) {
        if(i == 0){
          rewrite_target_value = del_year_index_arr[i];
        }else{
          rewrite_target_value = rewrite_target_value + ',' + del_year_index_arr[i];
          }
        }
      console.log(rewrite_target_value);
      target_skill.value = rewrite_target_value;
      label_html.style.visibility = "hidden";
    //チェックが付いた時の挙動
    }else{
    modalArea.fadeIn();
    bodyScrollPrevent(true);
      console.log($(this).val())
    }

  });

    $('.no-a').on('click',function(){
      ex_year = $(this)[0].id;
      let year_text = document.getElementById(ex_year).innerHTML;
      let ex_year_id = ex_year.split('ex_year')[1];
      target_skill.value = target_skill.value + ',' + ex_year_id;
      // f = label_html.innerHTML;
      // label_html.insertAdjacentHTML('beforeend', year_text);
      label_html.innerHTML  = year_text;
      label_html.style.visibility = "visible";
      
      console.log (target_skill.value);
      modalArea.fadeOut(function(){
        bodyScrollPrevent(false);
      });
    });


  function bodyScrollPrevent(flag){
    let scrollPosition;
    const body = document.getElementsByTagName('body')[0];
    const ua = window.navigator.userAgent.toLowerCase();
    const scrollBarWidth = window.innerWidth - document.body.clientWidth;
    if(flag){
      body.style.paddingRight = scrollBarWidth + 'px';
      body.style.overflow = 'hidden';
    } else if(!flag) {
      body.style.paddingRight = '';
      body.style.overflow = '';
    }
  }

});
</script>
