<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FirstJobCategory;
use App\Models\SecondJobCategory;

class JobCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_job_categories= [
            1  => '営業',
            2  => '事務・管理',
            3  => 'マーケティング',
            4  => '経営企画・経営戦略',
            5  => 'ディレクター・プロデューサー',
            6  => 'クリエイティブ系',
            7  => 'ITエンジニア',
            8  => 'エンジニア(機械・電気・電子・半導体・制御)',
            9  => '素材・化学・食品・医療品技術職',
            10 => '建築・土木技術',
            11 => '技能工・設備・交通・運輸',
            12 => 'サービス・接客・店舗',
            13 => '専門(コンサルタント・士業・金融・不動産)',
            14 => '医療・福祉・介護',
            15 => '教育・保育',
        ];

        $second_job_categories= collect([
					['first_job_category_id' => 1, 'name' => '法人営業'],
					['first_job_category_id' => 1, 'name' => '個人営業'],
					['first_job_category_id' => 1, 'name' => 'ルートセールス・代理店営業'],
					['first_job_category_id' => 1, 'name' => '内勤営業・カウンターセールス'],
					['first_job_category_id' => 1, 'name' => '海外営業'],
					['first_job_category_id' => 1, 'name' => 'カスタマーサービス(CS)・ユーザーサポート'],
					['first_job_category_id' => 1, 'name' => 'コールセンター運営'],
					['first_job_category_id' => 1, 'name' => 'キャリアカウンセラー・人材コーディネーター'],
					['first_job_category_id' => 2, 'name' => '財務・経理'],
					['first_job_category_id' => 2, 'name' => '人事'],
					['first_job_category_id' => 2, 'name' => '総務・事務'],
					['first_job_category_id' => 2, 'name' => '法務'],
					['first_job_category_id' => 2, 'name' => '広報・IR'],
					['first_job_category_id' => 2, 'name' => '物流・貿易'],
					['first_job_category_id' => 2, 'name' => '一般事務・営業事務'],
					['first_job_category_id' => 2, 'name' => '秘書'],
					['first_job_category_id' => 3, 'name' => '商品企画・商品開発'],
					['first_job_category_id' => 3, 'name' => 'ブランドマネージャー・プロダクトマネージャー'],
					['first_job_category_id' => 3, 'name' => '広告・宣伝'],
					['first_job_category_id' => 3, 'name' => '販売促進・販売企画'],
					['first_job_category_id' => 3, 'name' => '営業企画'],
					['first_job_category_id' => 3, 'name' => 'イベント企画・運営'],
					['first_job_category_id' => 3, 'name' => 'web・SEO・SEM・SNSマーケティング'],
					['first_job_category_id' => 3, 'name' => 'データアナリスト'],
					['first_job_category_id' => 3, 'name' => '市場調査・分析'],
					['first_job_category_id' => 4, 'name' => '経営企画・事務統括'],
					['first_job_category_id' => 4, 'name' => '管理職・エグゼクティブ'],
					['first_job_category_id' => 4, 'name' => 'MD／バイヤー・店舗開発・FCオーナー'],
					['first_job_category_id' => 5, 'name' => 'webディレクター・webプロデューサー'],
					['first_job_category_id' => 5, 'name' => 'テクニカルディレクター・プロジェクトマネージャー'],
					['first_job_category_id' => 5, 'name' => 'プロダクトマネージャー'],
					['first_job_category_id' => 5, 'name' => 'クリエイティブディレクター'],
					['first_job_category_id' => 5, 'name' => 'プランナー'],
					['first_job_category_id' => 5, 'name' => '製作・進行管理(その他)'],
					['first_job_category_id' => 6, 'name' => 'webデザイナー'],
					['first_job_category_id' => 6, 'name' => 'UI/UX デザイナー'],
					['first_job_category_id' => 6, 'name' => 'webコーダー・HTMLコーダー'],
					['first_job_category_id' => 6, 'name' => 'ゲームプログラマー'],
					['first_job_category_id' => 6, 'name' => 'グラフィック・CGデザイナー'],
					['first_job_category_id' => 6, 'name' => 'イラストレーター'],
					['first_job_category_id' => 6, 'name' => '編集・ライター'],
					['first_job_category_id' => 6, 'name' => 'CADオペレーター'],
					['first_job_category_id' => 6, 'name' => '動画・映像製作'],
					['first_job_category_id' => 6, 'name' => 'ファッション・インリア・空間・プロダクトデザイン'],
					['first_job_category_id' => 6, 'name' => 'その他クリエイティブ関連'],
					['first_job_category_id' => 7, 'name' => 'システム開発(web/オープン系)'],
					['first_job_category_id' => 7, 'name' => 'システム開発(モバイル系)'],
					['first_job_category_id' => 7, 'name' => 'システム開発(汎用系)'],
					['first_job_category_id' => 7, 'name' => 'システム開発(制御・組み込み)'],
					['first_job_category_id' => 7, 'name' => 'ネットワーク/サーバ監視・運用・保守・技術サポート'],
					['first_job_category_id' => 7, 'name' => 'ネットワーク/サーバ設計・構築'],
					['first_job_category_id' => 7, 'name' => 'パッケージソフト・ミドルウェア開発'],
					['first_job_category_id' => 7, 'name' => '社内情報システムエンジニア(社内SE)'],
					['first_job_category_id' => 7, 'name' => 'ITコンサルタント・プリセールス'],
					['first_job_category_id' => 7, 'name' => 'データサイエンティスト'],
					['first_job_category_id' => 7, 'name' => '講師'],
					['first_job_category_id' => 7, 'name' => 'その他システム関連'],
					['first_job_category_id' => 8, 'name' => '機械・機構設計・金型設計'],
					['first_job_category_id' => 8, 'name' => '回路・システム設計'],
					['first_job_category_id' => 8, 'name' => 'サービスエンジニア・サポートエンジニア'],
					['first_job_category_id' => 9, 'name' => '素材・半導体素材・化成品関連'],
					['first_job_category_id' => 9, 'name' => '化粧品・食品・香料関連'],
					['first_job_category_id' => 9, 'name' => '医療品関連'],
					['first_job_category_id' => 9, 'name' => '医療用具関連'],
					['first_job_category_id' => 10, 'name' => '研究開発・技術開発・構造解析・特許'],
					['first_job_category_id' => 10, 'name' => '施工管理・設備・環境保全'],
					['first_job_category_id' => 10, 'name' => 'プランニング・測量・設計・積算'],
					['first_job_category_id' => 11, 'name' => '技能工(整備・工場生産・製造・工事)'],
					['first_job_category_id' => 11, 'name' => '生産・品質管理'],
					['first_job_category_id' => 11, 'name' => '運輸・配送・倉庫関連'],
					['first_job_category_id' => 11, 'name' => '交通(鉄道・バス・タクシー)関連'],
					['first_job_category_id' => 12, 'name' => '店長・SV(スーパーバイザー)'],
					['first_job_category_id' => 12, 'name' => 'ホールスタッフ'],
					['first_job_category_id' => 12, 'name' => '料理長'],
					['first_job_category_id' => 12, 'name' => '調理'],
					['first_job_category_id' => 12, 'name' => '警備・施設管理関連職'],
					['first_job_category_id' => 12, 'name' => '販売・サービススタッフ'],
					['first_job_category_id' => 12, 'name' => '宿泊施設・ホテル'],
					['first_job_category_id' => 13, 'name' => 'ビジネスコンサルタント・シンクタンク'],
					['first_job_category_id' => 13, 'name' => '士業・専門コンサルタント'],
					['first_job_category_id' => 13, 'name' => '金融系専門職'],
					['first_job_category_id' => 13, 'name' => '不動産・プロパティマネジメント系専門職'],
					['first_job_category_id' => 14, 'name' => '医療・看護'],
					['first_job_category_id' => 14, 'name' => '薬事'],
					['first_job_category_id' => 14, 'name' => '臨床開発'],
					['first_job_category_id' => 14, 'name' => '福祉・介護'],
					['first_job_category_id' => 15, 'name' => '教育・保育'],
					['first_job_category_id' => 15, 'name' => 'インストラクター・通訳・翻訳'],
					['first_job_category_id' => 15, 'name' => 'その他'],
        ]);

        $grouped_second_job_categories = $second_job_categories->groupBy('first_job_category_id');

        foreach ($grouped_second_job_categories as $first_job_category_id => $second_job_categories) {

            $first_job_category = new FirstJobCategory();
            $first_job_category->name = $first_job_categories[$first_job_category_id];
            $first_job_category->save();

            foreach($second_job_categories as $target_second_job_category) {

                $second_job_category = new SecondJobCategory();
                $second_job_category->first_job_category_id = $first_job_category_id;
                $second_job_category->name = $target_second_job_category['name'];
                $second_job_category->save();

            }

        }

    }
}
