<!doctype html>
<html>

<head>
  <title>求人登録確認画面 </title>
  
  @component('components.headPart')
  @endcomponent
</head>

<body>
	<div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
	<div class="row">
		<div class="masonry-item col-md-2 d-none d-lg-block d-xl-block d-md-block col-12">&nbsp;</div>
		<div class="col-md-8 col-12">
			<div class="card">
				<div class="card-header">
					<h3 class='card_title'>募集企業</h3>
				</div>
				<div class="card-body">
					<div class="masonry-item">
					<form action="" method="post" class="form-horizontal">
					{{ csrf_field() }}
					<div class="row">
						<label class="col-sm-4 control-label">会社名</label>
						<div class="col-sm-8">{{$company_name}}</div>
						<input type="hidden" name="company_name" value="{{$company_name}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">都道府県</label>
						<div class="col-sm-8">
							@if ($comp_add01 === "1")
								北海道
							@elseif ($comp_add01 === "2")
								青森県
							@elseif ($comp_add01 === "3")
								岩手県
							@elseif ($comp_add01 === "4")
								宮城県
							@elseif ($comp_add01 === "5")
								秋田県
							@elseif ($comp_add01 === "6")
								山形県
							@elseif ($comp_add01 === "7")
								福島県
							@elseif ($comp_add01 === "8")
								茨城県
							@elseif ($comp_add01 === "9")
								栃木県
							@elseif ($comp_add01 === "10")
								群馬県
							@elseif ($comp_add01 === "11")
								埼玉県
							@elseif ($comp_add01 === "12")
								千葉県
							@elseif ($comp_add01 === "13")
								東京都
							@elseif ($comp_add01 === "14")
								神奈川県
							@elseif ($comp_add01 === "15")
								新潟県
							@elseif ($comp_add01 === "16")
								富山県
							@elseif ($comp_add01 === "17")
								石川県
							@elseif ($comp_add01 === "18")
								福井県
							@elseif ($comp_add01 === "19")
								山梨県
							@elseif ($comp_add01 === "20")
								長野県
							@elseif ($comp_add01 === "21")
								岐阜県
							@elseif ($comp_add01 === "22")
								静岡県
							@elseif ($comp_add01 === "23")
								愛知県
							@elseif ($comp_add01 === "24")
								三重県
							@elseif ($comp_add01 === "25")
								滋賀県
							@elseif ($comp_add01 === "26")
								京都府
							@elseif ($comp_add01 === "27")
								大阪府
							@elseif ($comp_add01 === "28")
								兵庫県
							@elseif ($comp_add01 === "29")
								奈良県
							@elseif ($comp_add01 === "30")
								和歌山県
							@elseif ($comp_add01 === "31")
								鳥取県
							@elseif ($comp_add01 === "32")
								島根県
							@elseif ($comp_add01 === "33")
								岡山県
							@elseif ($comp_add01 === "34")
								広島県
							@elseif ($comp_add01 === "35")
								山口県
							@elseif ($comp_add01 === "36")
								徳島県
							@elseif ($comp_add01 === "37")
								香川県
							@elseif ($comp_add01 === "38")
								愛媛県
							@elseif ($comp_add01 === "39")
								高知県
							@elseif ($comp_add01 === "40")
								福岡県
							@elseif ($comp_add01 === "41")
								佐賀県
							@elseif ($comp_add01 === "42")
								長崎県
							@elseif ($comp_add01 === "43")
								熊本県
							@elseif ($comp_add01 === "44")
								大分県
							@elseif ($comp_add01 === "45")
								宮城県
							@elseif ($comp_add01 === "46")
								鹿児島県
							@elseif ($comp_add01 === "47")
								沖縄県
							@endif
						</div>
						<input type="hidden" name="comp_add01" value="{{$comp_add01}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">市区町村・番地・建物名</label>
						<div class="col-sm-8">{{$comp_add02}}</div>
						<input type="hidden" name="comp_add02" value="{{$comp_add02}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">会社HP</label>
						<div class="col-sm-8">{{$company_hp}}</div>
						<input type="hidden" name="company_hp" value="{{$company_hp}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">業界1</label>
						<div class="col-sm-8">
							@if ($job1c === "1")
								IT
							@elseif ($job1c === "2")
								メーカー
							@elseif ($job1c === "3")
								商社
							@elseif ($job1c === "4")
								小売・物流・運輸
							@elseif ($job1c === "5")
								金融
							@elseif ($job1c === "6")
								建築・不動産
							@elseif ($job1c === "7")
								人材・教育
							@elseif ($job1c === "8")
								サービス
							@elseif ($job1c === "9")
								コンサルティング・調査
							@elseif ($job1c === "10")
								広告・出版・マスコミ
							@elseif ($job1c === "11")
								インフラ・官公庁
							@endif
						</div>
						<input type="hidden" name="job1c" value="{{$job1c}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">業界2</label>
							<div class="col-sm-8">
								@if ($job2c === "101")
									ソフトウェア情報処理
								@elseif ($job2c === "102")
									インターネット関連・ゲーム
								@elseif ($job2c === "103")
									通信
								@elseif ($job2c === "201")
									メーカー(自動車・輸送機器)
								@elseif ($job2c === "202")
									メーカー(電子・電子部品・半導体)
								@elseif ($job2c === "203")
									メーカー(機械関連)
								@elseif ($job2c === "204")
									メーカー(医療機器)
								@elseif ($job2c === "205")
									メーカー(食料品)
								@elseif ($job2c === "206")
									メーカー(医療品・化粧品・生活用品)
								@elseif ($job2c === "207")
									メーカー(化学・繊維・素材)
								@elseif ($job2c === "208")
									メーカー(ファッション・アパレル)
								@elseif ($job2c === "209")
									メーカー(その他)
								@elseif ($job2c === "301")
									総合商社
								@elseif ($job2c === "302")
									専門商社
								@elseif ($job2c === "303")
									商社(その他)
								@elseif ($job2c === "401")
									物流・運搬・倉庫
								@elseif ($job2c === "402")
									小売(ファッション・アパレル)
								@elseif ($job2c === "403")
									小売(スーパーCVS)
								@elseif ($job2c === "404")
									小売(専門店)
								@elseif ($job2c === "405")
									小売(その他)
								@elseif ($job2c === "501")
									銀行
								@elseif ($job2c === "502")
									生命保険・損害保険
								@elseif ($job2c === "503")
									証券投資関連
								@elseif ($job2c === "504")
									金融保険(その他)
								@elseif ($job2c === "601")
									建築・土木・設計
								@elseif ($job2c === "602")
									不動産
								@elseif ($job2c === "603")
									不動産・建設系(その他)
								@elseif ($job2c === "701")
									人材サービス
								@elseif ($job2c === "702")
									教育関連
								@elseif ($job2c === "801")
									フード・レストラン
								@elseif ($job2c === "802")
									レジャー・ホテル・旅行
								@elseif ($job2c === "803")
									エンターテイメント・スポーツ
								@elseif ($job2c === "804")
									医療
								@elseif ($job2c === "805")
									福祉・保育
								@elseif ($job2c === "806")
									冠婚葬祭
								@elseif ($job2c === "807")
									サービス(その他)
								@elseif ($job2c === "901")
									シンクタンク・コンサルティングファーム
								@elseif ($job2c === "902")
									監査法人・税理士事務所・法律事務所
								@elseif ($job2c === "903")
									専門コンサル(その他)
								@elseif ($job2c === "1001")
									広告
								@elseif ($job2c === "1002")
									イベントPR
								@elseif ($job2c === "1003")
									放送・映像・音響
								@elseif ($job2c === "1004")
									印刷・出版
								@elseif ($job2c === "1005")
									マスコミ(その他)
								@elseif ($job2c === "1101")
									鉄道・航空
								@elseif ($job2c === "1102")
									団体・連合会・官公庁
								@elseif ($job2c === "1103")
									電気・ガス・水道・エネルギー・環境関連
								@elseif ($job2c === "1104")
									その他業種
								@endif
							</div>



						<input type="hidden" name="job2c" value="{{$job2c}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">従業員数</label>
						<div class="col-sm-8">{{$employee_number}}</div>
						<input type="hidden" name="employee_number" value="{{$employee_number}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">設立年月</label>
						<div class="col-sm-8">{{$foundation_date}}</div>
						<input type="hidden" name="foundation_date" value="{{$foundation_date}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">会社概要</label>
						<div class="col-sm-8">{{$company_overview}}</div>
						<input type="hidden" name="company_overview" value="{{$company_overview}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">事業内容</label>
						<div class="col-sm-8">{{$business_guidance}}</div>
						<input type="hidden" name="business_guidance" value="{{$business_guidance}}">
					</div>
					<div class="row">
						<label class="col-sm-4 control-label">企業ロゴ</label>
						<div class="col-sm-8">{{$company_logo}}</div>
						<input type="hidden" name="company_logo" value="{{$company_logo}}">
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
						<div class="row">
						<label class="col-sm-4 control-label">募集終了予定日</label>
						@if (empty($calender_area))
							<div class="col-sm-8">終了日を定めない</div>
							<input type="hidden" name="calender_area" value="{{$calender_area}}">
						@elseif (!empty($calender_area))
							<div class="col-sm-8">{{$calender_area}}</div>
							<input type="hidden" name="calender_area" value="{{$calender_area}}">
						@endif
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
						<div class="row">
							<label class="col-sm-4 control-label">職種カテゴリー1</label>
							<div class="col-sm-8">
								@if ($job_category1 === "1")
									営業
								@elseif ($job_category1 === "2")
									事務・管理
								@elseif ($job_category1 === "3")
									マーケティング
								@elseif ($job_category1 === "4")
									経営企画・経営戦略
								@elseif ($job_category1 === "5")
									ディレクター・プロデューサー
								@elseif ($job_category1 === "6")
									クリエイティブ系
								@elseif ($job_category1 === "7")
									ITエンジニア
								@elseif ($job_category1 === "8")
									エンジニア(機械・電気・電子・半導体・制御)
								@elseif ($job_category1 === "9")
									素材・化学・食品・医療品技術職
								@elseif ($job_category1 === "10")
									建築・土木技術
								@elseif ($job_category1 === "11")
									技能工・設備・交通・運輸
								@elseif ($job_category1 === "12")
									サービス・接客・店舗
								@elseif ($job_category1 === "13")
									専門(コンサルタント・士業・金融・不動産)
								@elseif ($job_category1 === "14")
									医療・福祉・介護
								@elseif ($job_category1 === "15")
									教育・保育関連
								@endif
							</div>
							<input type="hidden" name="job_category1" value="{{$job_category1}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">職種カテゴリー2</label>
							<div class="col-sm-8">
								@if ($job_category2 === "101")
									法人営業
								@elseif ($job_category2 === "102")
									個人営業
								@elseif ($job_category2 === "103")
									ルートセールス・代理店営業
								@elseif ($job_category2 === "104")
									内勤営業・カウンターセールス
								@elseif ($job_category2 === "105")
									海外営業
								@elseif ($job_category2 === "106")
									カスタマーサービス(CS)・ユーザーサポート
								@elseif ($job_category2 === "107")
									コールセンター運営
								@elseif ($job_category2 === "108")
									キャリアカウンセラー・人材コーディネーター
								@elseif ($job_category2 === "201")
									財務・経理
								@elseif ($job_category2 === "202")
									人事
								@elseif ($job_category2 === "203")
									総務・事務
								@elseif ($job_category2 === "204")
									法務
								@elseif ($job_category2 === "205")
									広報・IR
								@elseif ($job_category2 === "206")
									物流・貿易
								@elseif ($job_category2 === "207")
									一般事務・営業事務
								@elseif ($job_category2 === "208")
									秘書
								@elseif ($job_category2 === "301")
									商品企画・商品開発
								@elseif ($job_category2 === "302")
									ブランドマネージャー・プロダクトマネージャー
								@elseif ($job_category2 === "303")
									広告・宣伝
								@elseif ($job_category2 === "304")
									販売促進・販売企画
								@elseif ($job_category2 === "305")
									営業企画
								@elseif ($job_category2 === "306")
									イベント企画・運営
								@elseif ($job_category2 === "307")
									web・SEO・SEM・SNSマーケティング
								@elseif ($job_category2 === "308")
									データアナリスト
								@elseif ($job_category2 === "309")
									市場調査・分析
								@elseif ($job_category2 === "401")
									経営企画・事務統括
								@elseif ($job_category2 === "402")
									管理職・エグゼクティブ
								@elseif ($job_category2 === "403")
									MD／バイヤー・店舗開発・FCオーナー
								@elseif ($job_category2 === "501")
									webディレクター・webプロデューサー
								@elseif ($job_category2 === "502")
									テクニカルディレクター・プロジェクトマネージャー
								@elseif ($job_category2 === "503")
									プロダクトマネージャー
								@elseif ($job_category2 === "504")
									クリエイティブディレクター
								@elseif ($job_category2 === "505")
									プランナー
								@elseif ($job_category2 === "506")
									製作・進行管理(その他)
								@elseif ($job_category2 === "601")
									webデザイナー
								@elseif ($job_category2 === "602")
									UI/UX デザイナー
								@elseif ($job_category2 === "603")
									webコーダー・HTMLコーダー
								@elseif ($job_category2 === "604")
									ゲームプログラマー
								@elseif ($job_category2 === "605")
									グラフィック・CGデザイナー
								@elseif ($job_category2 === "606")
									イラストレーター
								@elseif ($job_category2 === "607")
									編集・ライター
								@elseif ($job_category2 === "608")
									CADオペレーター
								@elseif ($job_category2 === "609")
									動画・映像製作
								@elseif ($job_category2 === "610")
									ファッション・インリア・空間・プロダクトデザイン
								@elseif ($job_category2 === "611")
									その他クリエイティブ関連
								@elseif ($job_category2 === "701")
									システム開発(web/オープン系)
								@elseif ($job_category2 === "702")
									システム開発(モバイル系)
								@elseif ($job_category2 === "703")
									システム開発(汎用系)
								@elseif ($job_category2 === "704")
									システム開発(制御・組み込み)
								@elseif ($job_category2 === "705")
									ネットワーク/サーバ監視・運用・保守・技術サポート
								@elseif ($job_category2 === "706")
									ネットワーク/サーバ設計・構築
								@elseif ($job_category2 === "707")
									パッケージソフト・ミドルウェア開発
								@elseif ($job_category2 === "708")
									社内情報システムエンジニア(社内SE)
								@elseif ($job_category2 === "709")
									ITコンサルタント・プリセールス
								@elseif ($job_category2 === "710")
									データサイエンティスト
								@elseif ($job_category2 === "711")
									講師
								@elseif ($job_category2 === "712")
									その他システム関連
								@elseif ($job_category2 === "801")
									機械・機構設計・金型設計
								@elseif ($job_category2 === "802")
									回路・システム設計
								@elseif ($job_category2 === "803")
									サービスエンジニア・サポートエンジニア
								@elseif ($job_category2 === "901")
									素材・半導体素材・化成品関連
								@elseif ($job_category2 === "902")
									化粧品・食品・香料関連
								@elseif ($job_category2 === "903")
									医療品関連
								@elseif ($job_category2 === "904")
									医療用具関連
								@elseif ($job_category2 === "1001")
									研究開発・技術開発・構造解析・特許
								@elseif ($job_category2 === "1002")
									施工管理・設備・環境保全
								@elseif ($job_category2 === "1003")
									プランニング・測量・設計・積算
								@elseif ($job_category2 === "1101")
									技能工(整備・工場生産・製造・工事)
								@elseif ($job_category2 === "1102")
									生産・品質管理
								@elseif ($job_category2 === "1103")
									運輸・配送・倉庫関連
								@elseif ($job_category2 === "1104")
									交通(鉄道・バス・タクシー)関連
								@elseif ($job_category2 === "1201")
									店長・SV(スーパーバイザー)
								@elseif ($job_category2 === "1202")
									ホールスタッフ
								@elseif ($job_category2 === "1203")
									料理長
								@elseif ($job_category2 === "1204")
									調理
								@elseif ($job_category2 === "1205")
									警備・施設管理関連職
								@elseif ($job_category2 === "1206")
									販売・サービススタッフ
								@elseif ($job_category2 === "1207")
									宿泊施設・ホテル
								@elseif ($job_category2 === "1301")
									ビジネスコンサルタント・シンクタンク
								@elseif ($job_category2 === "1302")
									士業・専門コンサルタント
								@elseif ($job_category2 === "1303")
									金融系専門職
								@elseif ($job_category2 === "1304")
									不動産・プロパティマネジメント系専門職
								@elseif ($job_category2 === "1401")
									医療・看護
								@elseif ($job_category2 === "1402")
									薬事
								@elseif ($job_category2 === "1403")
									臨床開発
								@elseif ($job_category2 === "1404")
									福祉・介護
								@elseif ($job_category2 === "1501")
									教育・保育
								@elseif ($job_category2 === "1502")
									インストラクター・通訳・翻訳
								@elseif ($job_category2 === "1503")
									その他
								@endif
							</div>
							<input type="hidden" name="job_category2" value="{{$job_category2}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">募集職種名</label>
							<div class="col-sm-8">{{$recruiting_job_category_name}}</div>
							<input type="hidden" name="recruiting_job_category_name" value="{{$recruiting_job_category_name}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">求人タイトル</label>
							<div class="col-sm-8">{{$job_offer_title}}</div>
							<input type="hidden" name="job_offer_title" value="{{$job_offer_title}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">特徴・訴求ポイント</label>
							<div class="col-sm-8">
								@foreach ($feature_offer_point as $key => $value)
									@if ($value == 1)
										正社員経験なしOK</br>
									@elseif ($value == 2)
										既卒・第二新卒歓迎</br>
									@elseif ($value == 3)
										マネージャー・管理職採用</br>
									@elseif ($value == 4)
										上場企業</br>
									@elseif ($value == 5)
										官公庁・学校関連</br>
									@elseif ($value == 6)
										ベンチャー企業</br>
									@elseif ($value == 7)
										外資系企業</br>
									@elseif ($value == 8)
										株式公開準備中</br>
									@elseif ($value == 9)
										設立30年以上</br>
									@elseif ($value == 10)
										女性管理職登録実績あり</br>
									@elseif ($value == 11)
										英語・外国語を使う仕事あり</br>
									@elseif ($value == 12)
										新規事業</br>
									@elseif ($value == 13)
										在宅勤務可</br>
									@elseif ($value == 14)
										車通勤OK</br>
									@elseif ($value == 15)
										転勤なし</br>
									@elseif ($value == 16)
										服装自由</br>
									@elseif ($value == 17)
										社員寮あり</br>
									@elseif ($value == 18)
										年間休日120日以上</br>
									@elseif ($value == 19)
										完全土日祝日休み</br>
									@elseif ($value == 20)
										残業なし</br>
									@elseif ($value == 21)
										残業時間20時間以内</br>
									@elseif ($value == 22)
										週2〜3日からOK</br>
									@elseif ($value == 23)
										10時以降に始業</br>
									@elseif ($value == 24)
										夜勤・深夜・早朝（22時〜7時）</br>
									@elseif ($value == 25)
										副業・WワークOK</br>
									@endif
								@endforeach
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">画像（メイン）</label>
							<div class="col-sm-8">{{$main_image}}</div>
							<input type="hidden" name="main_image" value="{{$main_image}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">画像（サブ1）</label>
							<div class="col-sm-8">{{$sub_image1}}</div>
							<input type="hidden" name="sub_image1" value="{{$sub_image1}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">画像（サブ2）</label>
							<div class="col-sm-8">{{$sub_image2}}</div>
							<input type="hidden" name="sub_image2" value="{{$sub_image2}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">画像（サブ3）</label>
							<div class="col-sm-8">{{$sub_image3}}</div>
							<input type="hidden" name="sub_image3" value="{{$sub_image3}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">画像（サブ4）</label>
							<div class="col-sm-8">{{$sub_image4}}</div>
							<input type="hidden" name="sub_image4" value="{{$sub_image4}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">画像（サブ5）</label>
							<div class="col-sm-8">{{$sub_image5}}</div>
							<input type="hidden" name="sub_image5" value="{{$sub_image5}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">集客利用の可否</label>
							<div class="col-sm-8">
								@if ($customer_acquisition_use_availability === "1")
									選択しない
								@elseif ($customer_acquisition_use_availability === "2")
									集客利用不可	
								@elseif ($customer_acquisition_use_availability === "3")
									完全非公開設定
								@endif
							</div>
							<input type="hidden" name="customer_acquisition_use_availability" value="{{$customer_acquisition_use_availability}}">
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
						<div class="row">
							<label class="col-sm-4 control-label">在宅勤務</label>
							<div class="col-sm-8">
								@if ($home_working === "1")
									選択しない
								@elseif ($home_working === "2")
									テレワーク（常時）	
								@elseif ($home_working === "3")
									一部テレワーク
								@endif
							</div>
							<input type="hidden" name="home_working" value="{{$home_working}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">在宅勤務詳細</label>
							<div class="col-sm-8">{{$home_working_detail}}</div>
							<input type="hidden" name="home_working_detail" value="{{$home_working_detail}}">
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
						<div class="row">
							<label class="col-sm-4 control-label">仕事内容</label>
							<div class="col-sm-8">{{$job_content}}</div>
							<input type="hidden" name="job_content" value="{{$job_content}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">この仕事の醍醐味・魅力・得られるもの</label>
							<div class="col-sm-8">{{$work_appeal}}</div>
							<input type="hidden" name="work_appeal" value="{{$work_appeal}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">活躍できる経験</label>
							<div class="col-sm-8">{{$active_experience}}</div>
							<input type="hidden" name="active_experience" value="{{$active_experience}}">
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
						<div class="row">
							<label class="col-sm-4 control-label">必須要件・応募資格</label>
							<div class="col-sm-8">{{$required_requirement}}</div>
							<input type="hidden" name="required_requirement" value="{{$required_requirement}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">最終学歴</label>
							<div class="col-sm-8">
								@if ($last_educational_background === "1")
									不問
								@elseif ($last_educational_background === "2")
									高校卒業以上
								@elseif ($last_educational_background === "3")
									高専卒業以上
								@elseif ($last_educational_background === "4")
									短大・専門学校卒業以上
								@elseif ($last_educational_background === "5")
									大学卒業以上
								@elseif ($last_educational_background === "6")
									MARCH以上
								@elseif ($last_educational_background === "7")
									早慶・国立以上
								@elseif ($last_educational_background === "8")
									大学院卒業以上
								@endif
							</div>
							<input type="hidden" name="last_educational_background" value="{{$last_educational_background}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">応募可能年齢</label>
							<div class="col-sm-8">{{$can_apply_age_more}}
								<b>&nbsp;〜&nbsp;</b>
							{{$can_apply_age_under}}</div>
							<input type="hidden" name="can_apply_age_more" value="{{$can_apply_age_more}}">
							<input type="hidden" name="can_apply_age_under" value="{{$can_apply_age_under}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">就業経験社数</label>
							<div class="col-sm-8">
								@if ($working_experience_company_number === "1")
									不問
								@elseif ($working_experience_company_number === "2")
									1社まで可
								@elseif ($working_experience_company_number === "3")
									2社まで可
								@elseif ($working_experience_company_number === "4")
									3社まで可
								@elseif ($working_experience_company_number === "5")
									4社まで可
								@endif
							</div>
							<input type="hidden" name="working_experience_company_number" value="{{$working_experience_company_number}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">性別</label>
							<div class="col-sm-8">
								@if ($sex === "1")
									不問
								@elseif ($sex === "2")
									男性
								@elseif ($sex === "3")
									女性
								@endif
							</div>
							<input type="hidden" name="sex" value="{{$sex}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">未経験の可否</label>
							<div class="col-sm-8">
								@if ($unexperienced_availability === "1")
									業界未経験可
								@elseif ($unexperienced_availability === "2")
									業種未経験可
								@elseif ($unexperienced_availability === "3")
									業界・業種未経験可
								@elseif ($unexperienced_availability === "4")
									不可
								@endif
							</div>
							<input type="hidden" name="unexperienced_availability" value="{{$unexperienced_availability}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">外国籍の可否</label>
							<div class="col-sm-8">
								@if ($foreign_nationality_availability === "1")
									可
								@elseif ($foreign_nationality_availability === "2")
									不可
								@endif
							</div>
							<input type="hidden" name="foreign_nationality_availability" value="{{$foreign_nationality_availability}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">英語レベル</label>
							<div class="col-sm-8">
								@if ($english_conversation_level === "1")
									不問
								@elseif ($english_conversation_level === "2")
									日常会話レベル
								@elseif ($english_conversation_level === "3")
									ビジネスレベル
								@elseif ($english_conversation_level === "4")
									ネイティブレベル
								@endif
							</div>
							<input type="hidden" name="english_conversation_level" value="{{$english_conversation_level}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">中国語レベル</label>
							<div class="col-sm-8">
								@if ($chinese_conversation_level === "1")
									不問
								@elseif ($chinese_conversation_level === "2")
									日常会話レベル
								@elseif ($chinese_conversation_level === "3")
									ビジネスレベル
								@elseif ($chinese_conversation_level === "4")
									ネイティブレベル
								@endif
							</div>
							<input type="hidden" name="chinese_conversation_level" value="{{$chinese_conversation_level}}">
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
						<div class="row">
							<label class="col-sm-4 control-label">募集予定人数</label>
							<div class="col-sm-8">
								@if ($recruiting_plan_count === "1")
									1人
								@elseif ($recruiting_plan_count === "2")
									2人
								@elseif ($recruiting_plan_count === "3")
									3人
								@elseif ($recruiting_plan_count === "4")
									4人
								@elseif ($recruiting_plan_count === "5")
									5〜9人
								@elseif ($recruiting_plan_count === "6")
									10〜19人
								@elseif ($recruiting_plan_count === "7")
									20〜29人
								@elseif ($recruiting_plan_count === "8")
									30人〜
								@endif
							</div>
							<input type="hidden" name="recruiting_plan_count" value="{{$recruiting_plan_count}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">部署名</label>
							<div class="col-sm-8">{{$division_name}}</div>
							<input type="hidden" name="division_name" value="{{$division_name}}">
						</div>
					</div>
						<div class="row">
							<label class="col-sm-4 control-label">部署詳細</label>
							<div class="col-sm-8">{{$division_detail}}</div>
							<input type="hidden" name="division_detail" value="{{$division_detail}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">雇用形態</label>
							<div class="col-sm-8">
								@if ($employment_status === "1")
									正社員
								@elseif ($employment_status === "2")
									契約社員
								@elseif ($employment_status === "3")
									パート・アルバイト
								@endif
							</div>
							<input type="hidden" name="employment_status" value="{{$employment_status}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">勤務時間タイプ</label>
							<div class="col-sm-8">{{$working_hours_type}}</div>
							<input type="hidden" name="working_hours_type" value="{{$working_hours_type}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">勤務時間</label>
							<div class="col-sm-8">{{$working_hours}}</div>
							<input type="hidden" name="working_hours" value="{{$working_hours}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">管理監督者の求人</label>
							<div class="col-sm-8">
								@if ($supervisor_job_offer === "1")
									管理監督者の募集ではない
								@elseif ($supervisor_job_offer === "2")
									管理監督者の募集
								@endif
							</div>
							<input type="hidden" name="supervisor_job_offer" value="{{$supervisor_job_offer}}">
						</div>
						@if ($supervisor_job_offer == 1)
						<div class="row">
							<label class="col-sm-4 control-label">労働時間制・固定残業代</label>
							<div class="col-sm-8">
								@if ($working_hours_system_fixed_overtime_work_fare=== "1")
									通常(残業代は別途支給)
								@elseif ($working_hours_system_fixed_overtime_work_fare=== "2")
									固定残業代制
								@elseif ($working_hours_system_fixed_overtime_work_fare=== "3")
									みなし労働時間制
								@endif
							</div>
							<input type="hidden" name="working_hours_system_fixed_overtime_work_fare" value="{{$working_hours_system_fixed_overtime_work_fare}}">
						</div>
							@if ($working_hours_system_fixed_overtime_work_fare == 3)
							<div class="row">
								<label class="col-sm-4 control-label">みなし労働時間制の種類</label>
							<div class="col-sm-8">
								@if ($deemed_working_hours_system_type === "1")
									専門業務型裁量労働制
								@elseif ($deemed_working_hours_system_type === "2")
									企画業務型裁量労働制
								@elseif ($deemed_working_hours_system_type === "3")
									社内勤務なし 事業場外みなし労働時間制
								@elseif ($deemed_working_hours_system_type === "4")
									社内勤務あり 事業場外みなし労働時間制
								@endif
							</div>
								<input type="hidden" name="deemed_working_hours_system_type" value="{{$deemed_working_hours_system_type}}">
							</div>
							<div class="row">
								<label class="col-sm-4 control-label">1日あたりのみなし労働時間</label>
								<div class="col-sm-8">{{$deemed_working_hours_per_one_day}}</div>
								<input type="hidden" name="deemed_working_hours_per_one_day" value="{{$deemed_working_hours_per_one_day}}">
							</div>
							@endif
						@endif
						<div class="row">
							<label class="col-sm-4 control-label">残業時間の詳細</label>
							<div class="col-sm-8">{{$overtime_hours_detail}}</div>
							<input type="hidden" name="overtime_hours_detail" value="{{$overtime_hours_detail}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">時短勤務</label>
							<div class="col-sm-8">
								@if ($shorter_working_hours_working=== "1")
									不可
								@elseif ($shorter_working_hours_working=== "2")
									可
								@endif
							</div>
							<input type="hidden" name="shorter_working_hours_working" value="{{$shorter_working_hours_working}}">
						</div>
						@if ($shorter_working_hours_working == 2)
						<div class="row" >
							<label class="col-sm-4 control-label">時短勤務詳細</label>
							<div class="col-sm-8">{{$shorter_working_hours_working_detail}}</div>
							<input type="hidden" name="shorter_working_hours_working_detail" value="{{$shorter_working_hours_working_detail}}">
						</div>
						@endif
						<div class="row">
							<label class="col-sm-4 control-label">選考フロー</label>
							<div class="col-sm-8">
								@foreach ( $selection_flow as $key => $value )
									@if ($value == 1)
									◯	書類選考</br>
									@elseif ($value == 2)
									◯	筆記・webテスト</br>
									@elseif ($value == 3)
									◯	面談</br>
									@elseif ($value == 4)
									◯	一次面接</br>
									@elseif ($value == 5)
									◯	二次面接</br>
									@elseif ($value == 6)
									◯	三次面接</br>
									@elseif ($value == 7)
									◯	四次面接</br>
									@elseif ($value == 8)
									◯	五次面接</br>
									@elseif ($value == 9)
									◯	最終面接</br>
									@endif
								@endforeach
							</div>
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">選考詳細</label>
							<div class="col-sm-8">{{$selection_detail}}</div>
							<input type="hidden" name="selection_detail" value="{{$selection_detail}}">
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
						<div class="row">
							<label class="col-sm-4 control-label">給与タイプ</label>
							<div class="col-sm-8">
								@if ($payroll_type === "1")
									年俸
								@elseif ($payroll_type === "2")
									月給
								@elseif ($payroll_type === "3")
									日給
								@elseif ($payroll_type === "4")
									時給
								@endif
							</div>
							<input type="hidden" name="payroll_type" value="{{$payroll_type}}">
						</div>
							@if ($payroll_type == 1 )
								<div class="row">
									<label class="col-sm-4 control-label">年俸額</label>
									<div class="col-sm-8">{{$yearly_pay_amount_more}}
										<b>&nbsp;〜&nbsp;</b>
										{{$yearly_pay_amount_under}}
										<b>&nbsp;円</b> 
									</div>
									<input type="hidden" name="yearly_pay_amount_more" value="{{$yearly_pay_amount_more}}">
									<input type="hidden" name="yearly_pay_amount_under" value="{{$yearly_pay_amount_under}}">
								</div>
								<div class="row">
									<label class="col-sm-4 control-label">支払い方法</label>
									<div class="col-sm-8">{{$year_pay_method}}</div>
									<div class="col-sm-8">
										@if ($year_pay_method === "1")
											年俸の1/12を毎月支給
										@elseif ($year_pay_method === "2")
											その他(給与・待遇の詳細に記載)
										@endif
									</div>
									<input type="hidden" name="year_pay_method" value="{{$year_pay_method}}">
								</div>
							@elseif ($payroll_type == 2 )
								<div class="row">
									<label class="col-sm-4 control-label">月給</label>
									<div class="col-sm-8">{{$monthly_pay_more}}
										<b>&nbsp;〜&nbsp;</b>
										{{$monthly_pay_under}}
										<b>&nbsp;円</b> 
									</div>
									<input type="hidden" name="monthly_pay_more" value="{{$monthly_pay_more}}">
									<input type="hidden" name="monthly_pay_under" value="{{$monthly_pay_under}}">
								</div>
								<div class="row">
									<label class="col-sm-4 control-label">想定年収（万円）</label>
									<div class="col-sm-8">{{$assumption_annual_income_more}}
										<b>&nbsp;〜&nbsp;</b>
										{{$assumption_annual_income_under}}
										<b>&nbsp;万円</b> 
									</div>
									<input type="hidden" name="assumption_annual_income_more" value="{{$assumption_annual_income_more}}">
									<input type="hidden" name="assumption_annual_income_under" value="{{$assumption_annual_income_under}}">
								</div>
							@elseif ($payroll_type == 3 )
								<div class="row">
									<label class="col-sm-4 control-label">日給</label>
									<div class="col-sm-8">{{$dayly_wage_more}}
										<b>&nbsp;〜&nbsp;</b>
										{{$dayly_wage_under}}
										<b>&nbsp;円</b> 
									</div>
									<input type="hidden" name="dayly_wage_more" value="{{$dayly_wage_more}}">
									<input type="hidden" name="dayly_wage_under" value="{{$dayly_wage_under}}">
								</div>
							@elseif ($payroll_type == 4 )
								<div class="row">
									<label class="col-sm-4 control-label">時給</label>
									<div class="col-sm-8">{{$hourly_wage_more}}
										<b>&nbsp;〜&nbsp;</b>
										{{$hourly_wage_under}}
										<b>&nbsp;円</b> 
									</div>
									<input type="hidden" name="hourly_wage_more" value="{{$hourly_wage_more}}">
									<input type="hidden" name="hourly_wage_under" value="{{$hourly_wage_under}}">
								</div>
							@endif
						@if ($working_hours_system_fixed_overtime_work_fare == 2)
						<div class="row">
							<label class="col-sm-4 control-label">基本給の金額</label>
							<div class="col-sm-8">{{$base_salary_amount}}</div>
							<input type="hidden" name="base_salary_amount" value="{{$base_salary_amount}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">固定残業代の金額</label>
							<div class="col-sm-8">{{$fixed_overtime_work_fee_amount}}</div>
							<input type="hidden" name="fixed_overtime_work_fee_amount" value="{{$fixed_overtime_work_fee_amount}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">固定残業時間</label>
							<div class="col-sm-8">{{$fixed_overtime_work_time}}</div>
							<input type="hidden" name="fixed_overtime_work_time" value="{{$fixed_overtime_work_time}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">固定残業時間超過分の支給</label>
							<div class="col-sm-8">{{$fixed_overtime_hours_excess_part_pay}}</div>
							<input type="hidden" name="fixed_overtime_hours_excess_part_pay" value="{{$fixed_overtime_hours_excess_part_pay}}">
						</div>
						@endif
						<div class="row">
							<label class="col-sm-4 control-label">給与待遇の詳細</label>
							<div class="col-sm-8">{{$payroll_treatment_detail}}</div>
							<input type="hidden" name="payroll_treatment_detail" value="{{$payroll_treatment_detail}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">試験期間</label>
							<div class="col-sm-8">
								@if ($testing_period === "1")
									あり
								@elseif ($testing_period === "2")
									なし
								@endif
							</div>
							<input type="hidden" name="testing_period" value="{{$testing_period}}">
						</div>
						@if ($testing_period == 1)
						<div class="row">
							<label class="col-sm-4 control-label">試験期間の詳細</label>
							<div class="col-sm-8">{{$testing_period_detail}}</div>
							<input type="hidden" name="testing_period_detail" value="{{$testing_period_detail}}">
						</div>
						@endif
						<div class="row">
							<label class="col-sm-4 control-label">年間休日</label>
							<div class="col-sm-8">{{$annual_holiday}}</div>
							<input type="hidden" name="annual_holiday" value="{{$annual_holiday}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">休日・休暇</label>
							<div class="col-sm-8">{{$holiday_leave}}</div>
							<input type="hidden" name="holiday_leave" value="{{$holiday_leave}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">福利厚生</label>
							<div class="col-sm-8">{{$welfare_benefits}}</div>
							<input type="hidden" name="welfare_benefits" value="{{$welfare_benefits}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">受動喫煙対策</label>
							<div class="col-sm-8">
								@if ($passive_smoking_control === "1")
									禁煙
								@elseif ($passive_smoking_control === "2")
									喫煙スペースあり
								@elseif ($passive_smoking_control === "3")
									なし（喫煙可）
								@endif
							</div>
							<input type="hidden" name="passive_smoking_control" value="{{$passive_smoking_control}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">受動喫煙対策</label>
							<div class="col-sm-8">{{$passive_smoking_control_ditail}}</div>
							<input type="hidden" name="passive_smoking_control_ditail" value="{{$passive_smoking_control_ditail}}">
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
					<h3 class='card_title'>エージェント限定情報</h3>
				</div>
				<div class="card-body">
					<div class="masonry-item">
						<div class="row">
							<label class="col-sm-4 control-label">成功報酬の算定方法</label>
							<div class="col-sm-8">
								@if ($successful_reward_calculation_method === "1")
									割合（％）
								@elseif ($successful_reward_calculation_method === "2")
									固定報酬
								@endif
							</div>
							<input type="hidden" name="successful_reward_calculation_method" value="{{$successful_reward_calculation_method}}">
						</div>
						@if ($successful_reward_calculation_method == 1) 
						<div class="row">
							<label class="col-sm-4 control-label">割合（％）</label>
							<div class="col-sm-8">{{$ratio}}</div>
							<input type="hidden" name="ratio" value="{{$ratio}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label">割合時の規約</label>
							<div class="col-sm-8">{{$terms_at_rate}}</div>
							<input type="hidden" name="terms_at_rate" value="{{$terms_at_rate}}">
						</div>
						@elseif ($successful_reward_calculation_method == 2)
						<div class="row">
							<label class="col-sm-4 control-label">固定報酬額</label>
							<div class="col-sm-8">{{$fixed_reward_amount}}</div>
							<input type="hidden" name="fixed_reward_amount" value="{{$fixed_reward_amount}}">
						</div>
						@endif
						<div class="row">
							<label class="col-sm-4 control-label">返金規定</label>
							<div class="col-sm-8">{{$refund_provision}}</div>
							<input type="hidden" name="refund_provision" value="{{$refund_provision}}">
						</div>
						<div class="row">
							<label class="col-sm-4 control-label"></label>
							<div class="col-sm-8">{{$memo}}</div>
							<input type="hidden" name="memo" value="{{$memo}}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 
	<div class="card">
		<div class="card-body">
		<div class="masonry-item">
		<div class="row" style="margin-top: 30px;">
  			<div class="col-sm-offset-4 col-sm-8">
					<button name="back" type="submit" value="true">戻る</button>
					<button name="regist" type="submit" value="true">登録</button>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>
			<!-- <input type="submit" name="action" value="戻る"> -->
			<!-- <input type="submit" name="action" value="登録">	 -->
  </form>
	
	@component('components.footerScripts')
  @endcomponent
</body>

</html>
