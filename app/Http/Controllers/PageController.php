<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
    public function index(Request $request){
        //var_dump(DB::select('SELECT * from status'));
        return View::make('index', []);
    }
    
    public function login(Request $request){
        return View::make('login', []);
    }
    
    public function joboffer_regist(Request $request){
        DB::table('account')->insert(
            [
                'login_id' => $request->input("email",""),
                'login_password' => null,
            ]
        );
        $accountId = DB::getPdo()->lastInsertId();
        DB::table('corporation')->insert(
            [
                'corporation_name' => '',
                'corporation_logo' => '',
                'prefecture' => -1,
                'address' => '',
                'industry1' => -1,
                'industry2' => -1,
                'employee_number' => 100,
                'establish_year' => 2020,
                'establish_month' => 10,
                'company_profile' => '',
                'business_content' => '',
                'billing_email_1' => '',
                'billing_email_2' => '',
                'email' => '',
                'tel' => '',
                'home_page' => '',
                'anual_recruit_number' => 100,
                'mailing_setting' => 1,
                'consideration_status' => 1,
                'inquiry' => '',
                'privacy_terms_approval' => 1,
            ]
        );
        $corporationId = DB::getPdo()->lastInsertId();
        DB::table('corporation_user')->insert(
            [
                'account_id' => $accountId,
                'corporation_id' => $corporationId,
                'name' => '',
                'ip_address' => $request->ip(),
                /*
                'created_by' => '',
                'created_at' => '',
                'updated_by' => '',
                'updated_at' => '',
                'deleted_by' => '',
                'deleted_at' => '',
                */
            ]
        );
        DB::table('status')->insert(
            [
                'corporation_id' => $corporationId,
                'status_change_datetime' => date("Y-m-d H:i:s"),
                'change_status' => 1,
                'status_change_person' => $accountId,
            ]
        );

        //求人申し込み企業
        Mail::send('emails.test', [], function($message){
    	    $message
            ->from('test@example.com', 'テスト')
            ->to('load1202ea6@gmail.com', 'Test')
            ->subject('This is a test mail');
    	});
        //運営宛
        Mail::send('emails.test', [], function($message){
    	    $message
            ->from('test@example.com', 'テスト')
            ->to('load1202ea6@gmail.com', 'Test')
            ->subject('This is a test mail');
    	});
        return redirect('/regist/end');
    }

    public function request_end(Request $request){
        return View::make('request_end', []);
    }
    public function regist_end(Request $request){
        return View::make('regist_end', []);
    }
    public function test_end(){
        return View::make('job_offer_registration', []);
    }
}
